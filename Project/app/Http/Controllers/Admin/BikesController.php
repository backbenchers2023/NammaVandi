<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BikeDetails;
use App\Models\Bikes;
use App\Models\Fundamentals;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BikesController extends Controller
{
    public function index()
    {
        // Display all bikes
        $bikes = Bikes::all();
        return view('admin.bikes.index', compact('bikes'));
    }

    public function create()
    {
        // Display the form for creating a new bike
        return view('admin.bikes.create');
    }

    public function store(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'bike_companyname' => 'required|string',
            'bike_brandname' => 'required|string',
            'bike_type' => 'required|string',
            'bike_model' => 'required|string',
            'transmission' => 'required|string',
            'base_price' => 'required|string',
            'fuel' => 'required|string',
            'bike_image' => 'required|image',
            'pricing_image' => 'nullable|image',
            'feature_images' => 'nullable|array',
            'feature_images.*' => 'image',
            'package_type' => 'nullable|array',
            'package_12hrs_kms' => 'nullable|string', // Changed to string to handle comma-separated input
            'package_12hrs_rates' => 'nullable|string',
            'package_24hrs_kms' => 'nullable|string',
            'package_24hrs_rates' => 'nullable|string',
        ]);



        // Convert Bike Image to Base64
        $bikeImage = $request->file('bike_image');
        $bikeImageData = base64_encode(file_get_contents($bikeImage->getRealPath()));

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
            // Save the bike in the database
            $bike = new Bikes();
            $bike->bike_companyname = $validated['bike_companyname'];
            $bike->bike_brandname = $validated['bike_brandname'];
            $bike->bike_type = $validated['bike_type'];
            $bike->bike_model = $validated['bike_model'];
            $bike->transmission = $validated['transmission'];
            $bike->base_price = $validated['base_price'];
            $bike->fuel = $validated['fuel'];
            $bike->bike_image = $bikeImageData;
            $bike->pricing_image = $pricingImageData;
            $bike->package_details = $packageDetailsJson; // Ensure this is properly encoded before saving
            $bike->save();
        } catch (\Exception $e) {
            dd('Error while saving bike: ' . $e->getMessage()); // Dump the error message for debugging
        }

        // Save bike details
        $bikeDetails = new BikeDetails();
        $bikeDetails->bike_id = $bike->id;
        $bikeDetails->bike_images = json_encode($featureImagesData);
        $bikeDetails->save();

        return redirect()->route('adminbikes.index')->with('success', 'Bike added successfully!');
    }

    public function show($id)
    {
        $bike = Bikes::with('bikeDetails')->findOrFail($id);
        $bikeImages = json_decode($bike->bikeDetails->bike_images, true);

        $fundamentals = Fundamentals::first();

        return view('admin.bikes.show', compact('bike', 'bikeImages', 'fundamentals'));
    }

    public function edit($id)
    {
        $bike = Bikes::with('bikeDetails')->findOrFail($id);
        return view('admin.bikes.edit', compact('bike'));
    }

    // Update a bike
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'bike_companyname' => 'required|string',
            'bike_brandname' => 'required|string',
            'bike_type' => 'required|string',
            'transmission' => 'required|string',
            'fuel' => 'required|string',
            'bike_model' => 'required|string',
            'base_price' => 'required|numeric',
            'bike_image' => 'nullable|image',
            'pricing_image' => 'nullable|image',
            'feature_images' => 'nullable|array',
            'feature_images.*' => 'image',
            'delete_feature_images' => 'nullable|array',
            'package_type' => 'nullable|array',
            'package_12hrs_kms' => 'nullable|string',
            'package_12hrs_rates' => 'nullable|string',
            'package_24hrs_kms' => 'nullable|string',
            'package_24hrs_rates' => 'nullable|string',
        ]);

        // Retrieve the bike record by ID
        $bike = Bikes::findOrFail($id);

        // Handle Bike Image update
        $bikeImage = $bike->bike_image;
        if ($request->hasFile('bike_image')) {
            $bikeImage = base64_encode(file_get_contents($request->file('bike_image')->getRealPath()));
        }

        // Handle Pricing Image update
        $pricingImage = $bike->pricing_image;
        if ($request->hasFile('pricing_image')) {
            $pricingImage = base64_encode(file_get_contents($request->file('pricing_image')->getRealPath()));
        }

        // Handle package details (12hrs, 24hrs) update
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

        $packageDetailsJson = json_encode($packageDetails);

        // Update Bike properties and images
        $bike->update([
            'bike_companyname' => $validated['bike_companyname'],
            'bike_brandname' => $validated['bike_brandname'],
            'bike_type' => $validated['bike_type'],
            'bike_model' => $validated['bike_model'],
            'transmission' => $validated['transmission'],
            'fuel' => $validated['fuel'],
            'base_price' => $validated['base_price'],
            'bike_image' => $bikeImage,
            'pricing_image' => $pricingImage,
            'package_details' => $packageDetailsJson,
        ]);

        // Update bike specifications (stored as an array)
        $bikeDetails = $bike->bikeDetails;

        // Handle feature images and deletion
        $featureImagesData = []; // Initialize the array to hold feature images

        if ($request->hasFile('feature_images')) {
            // Get existing feature images
            $existingFeatureImages = $bikeDetails->bike_images ? json_decode($bikeDetails->bike_images) : [];

            // Process newly uploaded feature images
            foreach ($request->file('feature_images') as $image) {
                $featureImagesData[] = base64_encode(file_get_contents($image->getRealPath()));
            }

            // Merge existing feature images with the new ones
            $featureImagesData = array_merge($existingFeatureImages, $featureImagesData);
            $bikeDetails->bike_images = json_encode($featureImagesData);
        }

        // Handle deletion of selected feature images
        if ($request->has('delete_feature_images')) {
            $imagesToDelete = $request->input('delete_feature_images');
            $featureImagesData = json_decode($bikeDetails->bike_images, true);

            // Filter out the deleted images
            $featureImagesData = array_filter($featureImagesData, function ($image) use ($imagesToDelete) {
                return !in_array($image, $imagesToDelete);
            });

            // Reindex the array to maintain sequential keys
            $featureImagesData = array_values($featureImagesData);
            $bikeDetails->bike_images = json_encode($featureImagesData);
        }

        // Save the bike details
        $bikeDetails->save();

        // Return a success message
        return redirect()->route('adminbikes.index')->with('success', 'Bike updated successfully!');
    }

    public function destroy($id)
    {
        // Find the bike and delete it along with its details
        $bike = Bikes::findOrFail($id);
        $bike->bikeDetails->delete();
        $bike->delete();

        return redirect()->route('adminbikes.index')->with('success', 'Bike deleted successfully!');
    }

    public function filter(Request $request)
    {
        $type = $request->query('type', 'all'); // Default to 'all' if 'type' is not provided

        if ($type === 'all') {
            $bikes = Bikes::all();
        } else {
            $bikes = Bikes::where('bike_type', $type)->get();
        }

        // If there are no bikes available, you could return a message or empty array.
        if ($bikes->isEmpty()) {
            return response()->json([], 404);  // You could return 404 if no bikes are found
        }

        return response()->json($bikes);
    }


    public function getBikeBooked(Request $request)
    {
        $query = Bikes::with('bookings');
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

        $bikes = $query->get();

        // Categorize bikes as booked or free
        $bookedBikes = $bikes->filter(function ($bike) {
            return $bike->bookings->count() > 0;
        });
        $freeBikes = $bikes->filter(function ($bike) {
            return $bike->bookings->count() === 0;
        });

        return view('admin.bikes.booked', compact('bookedBikes', 'freeBikes', 'startDate', 'endDate'));
    }

    public function check(Request $request)
    {
        $month = $request->get('month', now()->format('Y-m'));
        $startDate = Carbon::parse("$month-01");
        $endDate = $startDate->copy()->endOfMonth();

        $bikes = Bikes::with(['bookings' => function ($query) use ($startDate, $endDate) {
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

        return view('admin.bikes.checklist', compact('bikes', 'month')); // Change to 'bikes.checklist'
    }
}
