<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarBookings;
use App\Models\Cars;
use App\Models\CarServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CarBookingsController extends Controller
{
    public function index() {
        
    }

    public function create($id)
    {
        $car = Cars::findOrFail($id);

        // Fetch booked dates
        $bookedDates = CarBookings::where('car_id', $id)
            ->get(['pickup_date', 'drop_date'])
            ->map(function ($booking) {
                $start = Carbon::parse($booking->pickup_date);
                $end = Carbon::parse($booking->drop_date);

                $dates = [];
                while ($start <= $end) {
                    $dates[] = $start->format('Y-m-d');
                    $start->addDay();
                }

                return $dates;
            })
            ->flatten()
            ->unique()
            ->toArray(); // Ensure this is an array of strings

        // Fetch service dates
        $serviceDates = CarServices::where('car_id', $id)
            ->get(['pickup_date', 'drop_date'])
            ->map(function ($service) {
                $start = Carbon::parse($service->pickup_date);
                $end = Carbon::parse($service->drop_date);

                $dates = [];
                while ($start <= $end) {
                    $dates[] = $start->format('Y-m-d');
                    $start->addDay();
                }

                return $dates;
            })
            ->flatten()
            ->unique()
            ->toArray(); // Convert to array

            $packageDetails = json_decode($car->package_details, true) ?? [];

        return view('admin.cars.booking', compact('car', 'bookedDates', 'serviceDates','packageDetails'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'drop_date' => 'required|date',
            'customer_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
            'package_type' => 'required|string|in:12hrs,24hrs,More than One Day',
            'package_detail' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Create the booking
            $booking = CarBookings::create($validator->validated());

            return response()->json([
                'success' => true,
                'message' => 'Booking completed successfully',
                'booking' => $booking
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(CarBookings $carBooking)
    {
        return view('carbooking.show', compact('carBooking'));
    }

    public function edit(CarBookings $carBooking)
    {
        $cars = Cars::all();
        return view('carbooking.edit', compact('carBooking', 'cars'));
    }

    public function update(Request $request, CarBookings $carBooking)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'drop_date' => 'required|date',
            'customer_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
            'package_type' => 'required|string|max:20',
            'package_detail' => 'required|string|max:50',
        ]);

        $carBooking->update([
            'car_id' => $validated['car_id'],
            'pickup_date' => $validated['pickup_date'],
            'drop_date' => $validated['drop_date'],
            'customer_name' => $validated['customer_name'],
            'phone_number' => $validated['phone_number'],
            'package_type' => $validated['package_type'],
            'package_detail' => $validated['package_detail'],
        ]);

        return redirect()->route('carbooking.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(CarBookings $carBooking)
    {
        if (!$carBooking) {
            return redirect()->route('cars')->with('error', 'Car not found');
        }
        $carBooking->delete();
        return redirect()->route('carbooking.index')->with('success', 'Booking deleted successfully.');
    }
}
