<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\BikeBookings;
use App\Models\BikeNotifications;
use App\Models\Bikes;
use App\Models\BikeServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BikeNotificationsController extends Controller
{
    public function create($id)
    {
        $bike = Bikes::findOrFail($id); // Changed 'Cars' to 'Bikes'

        // Fetch booked dates for bike bookings
        $bookedDates = BikeBookings::where('bike_id', $id) // Changed 'car_id' to 'bike_id'
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

        // Fetch service dates for the bike
        $serviceDates = BikeServices::where('bike_id', $id)
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

        $packageDetails = json_decode($bike->package_details, true) ?? []; 
        
        return view('customer.bikes.booking', compact('bike', 'bookedDates', 'serviceDates', 'packageDetails'));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bike_id' => 'required|exists:bikes,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'drop_date' => 'required|date',
            'customer_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:15',
            'package_type' => 'required|string|in:12hrs,24hrs,More than One Day',
            'package_detail' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $booking = BikeNotifications::create($validator->validated());

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
        $bikenotification = BikeNotifications::findOrFail($id);
        $bikenotification->delete(); // Delete car record


        return redirect()->route('getbikeNotifications')->with('success', 'Notification deleted successfully');
    }
}
