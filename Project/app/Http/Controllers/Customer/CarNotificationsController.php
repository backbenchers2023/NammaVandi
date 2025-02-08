<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CarBookings;
use App\Models\CarNotifications;
use Illuminate\Support\Facades\Validator;
use App\Models\Cars;
use App\Models\CarServices;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CarNotificationsController extends Controller
{
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

        return view('customer.cars.booking', compact('car', 'bookedDates', 'serviceDates', 'packageDetails'));
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
            $booking = CarNotifications::create($validator->validated());

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


    public function delete($id)
    {
        $carnotification = CarNotifications::findOrFail($id);
        $carnotification->delete(); // Delete car record


        return redirect()->route('getcarNotifications')->with('success', 'Notification deleted successfully');
    }
}
