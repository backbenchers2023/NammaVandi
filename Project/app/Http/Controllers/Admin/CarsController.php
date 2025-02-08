<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bikes;
use App\Models\CarDetails;
use App\Models\Cars;
use App\Models\Fundamentals;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index()
    {
        // Display all cars
        $cars = Cars::all();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        // Display the form for creating a new car
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'car_companyname' => 'required|string',
            'car_brandname' => 'required|string',
            'car_type' => 'required|string',
            'car_model' => 'required|string',
            'transmission' => 'required|string',
            'base_price' => 'required|string',
            'fuel' => 'required|string',
            'car_image' => 'required|image',
            'pricing_image' => 'nullable|image',
            'feature_images' => 'nullable|array',
            'feature_images.*' => 'image',
            'package_type' => 'nullable|array',
            'package_12hrs_kms' => 'nullable|string', // Changed to string to handle comma-separated input
            'package_12hrs_rates' => 'nullable|string',
            'package_24hrs_kms' => 'nullable|string',
            'package_24hrs_rates' => 'nullable|string',
        ]);


        // Convert Car Image to Base64
        $carImage = $request->file('car_image');
        $carImageData = base64_encode(file_get_contents($carImage->getRealPath()));


        // Convert Pricing Image to Base64 (if provided)
        $pricingImageData = null;
        if ($request->hasFile('pricing_image')) {
            $pricingImage = $request->file('pricing_image');
            $pricingImageData = base64_encode(file_get_contents($pricingImage->getRealPath()));
        }

        // Convert Feature Images to Base64 (if provided)
        $featureImagesData = [];
        if ($request->hasFile('feature_images')) {
            foreach ($request->file('feature_images') as $image) {
                $featureImagesData[] = base64_encode(file_get_contents($image->getRealPath()));
            }
        }

        // Convert comma-separated values into arrays
        $package_12hrs_kms = isset($validated['package_12hrs_kms']) ? explode(',', str_replace(' ', '', $validated['package_12hrs_kms'])) : [];
        $package_12hrs_rates = isset($validated['package_12hrs_rates']) ? explode(',', str_replace(' ', '', $validated['package_12hrs_rates'])) : [];

        $package_24hrs_kms = isset($validated['package_24hrs_kms']) ? explode(',', str_replace(' ', '', $validated['package_24hrs_kms'])) : [];
        $package_24hrs_rates = isset($validated['package_24hrs_rates']) ? explode(',', str_replace(' ', '', $validated['package_24hrs_rates'])) : [];


        // Store the package details as JSON
        $packageDetails = [
            'selected_types' => $validated['package_type'] ?? [],
            '12hrs' => [
                'kms' => $package_12hrs_kms,
                'rates' => $package_12hrs_rates,
            ],
            '24hrs' => [
                'kms' => $package_24hrs_kms,
                'rates' => $package_24hrs_rates,
            ],
        ];



        if (json_last_error() !== JSON_ERROR_NONE) {
            dd('JSON encoding failed: ' . json_last_error_msg());  // Dump the error message
        }

        $packageDetailsJson = json_encode($packageDetails);

        try {
            $car = new Cars();
            $car->car_companyname = $validated['car_companyname'];
            $car->car_brandname = $validated['car_brandname'];
            $car->car_type = $validated['car_type'];
            $car->car_model = $validated['car_model'];
            $car->transmission = $validated['transmission'];
            $car->base_price = $validated['base_price'];
            $car->fuel = $validated['fuel'];
            $car->car_image = $carImageData; // Save the car image as base64
            $car->pricing_image = $pricingImageData; // Save the pricing image as base64 (if provided)
            $car->package_details = $packageDetailsJson;
            $car->save();
        } catch (\Exception $e) {
            dd('Error while saving bike: ' . $e->getMessage());
        }

        $carDetails = new CarDetails();
        $carDetails->car_id = $car->id;
        $carDetails->car_images = json_encode($featureImagesData); // Store feature images as JSON encoded base64 data
        $carDetails->save();

        return redirect()->route('admincars.index')->with('success', 'Car added successfully!');
    }

    public function show($id)
    {
        // Show car details
        $car = Cars::with('carDetails')->findOrFail($id);

        $carImages = json_decode($car->carDetails->car_images, true);

        $fundamentals = Fundamentals::first();

        return view('admin.cars.show', compact('car', 'carImages', 'fundamentals'));
    }

    public function edit($id)
    {
        // Show the form to edit a car
        $car = Cars::with('carDetails')->findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'car_companyname' => 'required|string',
            'car_brandname' => 'required|string',
            'car_type' => 'required|string',
            'transmission' => 'required|string',
            'fuel' => 'required|string',
            'car_model' => 'required|string',
            'base_price' => 'required|numeric',
            'car_image' => 'nullable|image',
            'pricing_image' => 'nullable|image',
            'feature_images' => 'nullable|array',
            'feature_images.*' => 'image',
            'delete_feature_images' => 'nullable|array',
            'package_type' => 'nullable|array',
            'package_12hrs_kms' => 'nullable|string', // Changed to string to handle comma-separated input
            'package_12hrs_rates' => 'nullable|string',
            'package_24hrs_kms' => 'nullable|string',
            'package_24hrs_rates' => 'nullable|string',
        ]);

        // Retrieve the car record by ID
        $car = Cars::findOrFail($id);

        // Handle Car Image update
        $carImage = $car->car_image;
        if ($request->hasFile('car_image')) {
            $carImage = base64_encode(file_get_contents($request->file('car_image')->getRealPath()));
        }

        // Handle Pricing Image update
        $pricingImage = $car->pricing_image;
        if ($request->hasFile('pricing_image')) {
            $pricingImage = base64_encode(file_get_contents($request->file('pricing_image')->getRealPath()));
        }

        // Convert comma-separated values into arrays
        $package_12hrs_kms = isset($validated['package_12hrs_kms']) ? explode(',', str_replace(' ', '', $validated['package_12hrs_kms'])) : [];
        $package_12hrs_rates = isset($validated['package_12hrs_rates']) ? explode(',', str_replace(' ', '', $validated['package_12hrs_rates'])) : [];

        $package_24hrs_kms = isset($validated['package_24hrs_kms']) ? explode(',', str_replace(' ', '', $validated['package_24hrs_kms'])) : [];
        $package_24hrs_rates = isset($validated['package_24hrs_rates']) ? explode(',', str_replace(' ', '', $validated['package_24hrs_rates'])) : [];


        // Store the package details as JSON
        $packageDetails = [
            'selected_types' => $validated['package_type'] ?? [],
            '12hrs' => [
                'kms' => $package_12hrs_kms,
                'rates' => $package_12hrs_rates,
            ],
            '24hrs' => [
                'kms' => $package_24hrs_kms,
                'rates' => $package_24hrs_rates,
            ],
        ];



        if (json_last_error() !== JSON_ERROR_NONE) {
            dd('JSON encoding failed: ' . json_last_error_msg());  // Dump the error message
        }

        $packageDetailsJson = json_encode($packageDetails);

        // Update Car properties and images
        $car->update([
            'car_companyname' => $validated['car_companyname'],
            'car_brandname' => $validated['car_brandname'],
            'car_type' => $validated['car_type'],
            'car_model' => $validated['car_model'],
            'transmission' => $validated['transmission'],
            'fuel' => $validated['fuel'],
            'base_price' => $validated['base_price'],
            'car_image' => $carImage,
            'pricing_image' => $pricingImage,
            'package_details' => $packageDetailsJson,
        ]);

        // Update car specifications (stored as an array)
        $carDetails = $car->carDetails;

        // Handle feature images and deletion
        $featureImagesData = []; // Initialize the array to hold feature images

        if ($request->hasFile('feature_images')) {
            // Get existing feature images
            $existingFeatureImages = $carDetails->car_images ? json_decode($carDetails->car_images) : [];

            // Process newly uploaded feature images
            foreach ($request->file('feature_images') as $image) {
                $featureImagesData[] = base64_encode(file_get_contents($image->getRealPath()));
            }

            // Merge existing feature images with the new ones
            $featureImagesData = array_merge($existingFeatureImages, $featureImagesData);
            $carDetails->car_images = json_encode($featureImagesData);
        }

        // Handle deletion of selected feature images
        if ($request->has('delete_feature_images')) {
            $imagesToDelete = $request->input('delete_feature_images');
            $featureImagesData = json_decode($carDetails->car_images, true);

            // Filter out the deleted images
            $featureImagesData = array_filter($featureImagesData, function ($image) use ($imagesToDelete) {
                return !in_array($image, $imagesToDelete);
            });

            // Reindex the array to maintain sequential keys
            $featureImagesData = array_values($featureImagesData);
            $carDetails->car_images = json_encode($featureImagesData);
        }

        // Save the car details
        $carDetails->save();

        // Return a success message
        return redirect()->route('admincars.index')->with('success', 'Car updated successfully!');
    }



    public function destroy($id)
    {
        // Find the car and delete the associated data
        $car = Cars::findOrFail($id);
        $car->carDetails->delete(); // Delete car details
        $car->delete(); // Delete car record

        return redirect()->route('admincars.index')->with('success', 'Car deleted successfully!');
    }

    public function filter(Request $request)
    {
        $type = $request->query('type');


        if ($type === 'all' || empty($type)) {
            $cars = Cars::all();
        } else {
            $cars = Cars::where('car_type', $type)->get();
        }

        return response()->json($cars);
    }

    public function getCarBooked(Request $request)
    {
        $query = Cars::with('bookings');
        $startDate = $request->start_date ?? null;
        $endDate = $request->end_date ?? null;

        if ($startDate && $endDate) {
            $query->with(['bookings' => function ($q) use ($startDate, $endDate) {
                $q->where(function ($q) use ($startDate, $endDate) {
                    $q->whereDate('pickup_date', '<=', $endDate)
                        ->whereDate('drop_date', '>=', $startDate);
                });
            }]);
        }

        $cars = $query->get();

        // Categorize cars as booked or free
        $bookedCars = $cars->filter(function ($car) {
            return $car->bookings->count() > 0;
        });
        $freeCars = $cars->filter(function ($car) {
            return $car->bookings->count() === 0;
        });

        return view('admin.cars.booked', compact('bookedCars', 'freeCars', 'startDate', 'endDate'));
    }

    public function check(Request $request)
    {
        $month = $request->get('month', now()->format('Y-m'));
        $startDate = Carbon::parse("$month-01");
        $endDate = $startDate->copy()->endOfMonth();

        $cars = Cars::with(['bookings' => function ($query) use ($startDate, $endDate) {
            $query->where(function ($q) use ($startDate, $endDate) {
                $q->whereBetween('pickup_date', [$startDate, $endDate])
                    ->orWhereBetween('drop_date', [$startDate, $endDate])
                    ->orWhere(function ($q2) use ($startDate, $endDate) {
                        $q2->where('pickup_date', '<=', $startDate)
                            ->where('drop_date', '>=', $endDate);
                    });
            });
        }, 'services' => function ($query) use ($startDate, $endDate) {
            $query->where(function ($q) use ($startDate, $endDate) {
                $q->whereBetween('pickup_date', [$startDate, $endDate])
                    ->orWhereBetween('drop_date', [$startDate, $endDate])
                    ->orWhere(function ($q2) use ($startDate, $endDate) {
                        $q2->where('pickup_date', '<=', $startDate)
                            ->where('drop_date', '>=', $endDate);
                    });
            });
        }])->get();

        return view('admin.cars.checklist', compact('cars', 'month'));
    }
}
