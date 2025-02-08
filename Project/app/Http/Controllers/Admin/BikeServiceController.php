<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BikeBookings;
use App\Models\Bikes;
use App\Models\BikeServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BikeServiceController extends Controller
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

        return view('admin.bikes.service.create', compact('bike', 'bookedDates', 'serviceDates')); // Changed the view name from 'cars.booking' to 'bikes.booking'
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'bike_id' => 'required|exists:bikes,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'drop_date' => 'required|date',
        ]);

        try {
            BikeServices::create($validated->validated());
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        
        return redirect()->route('bikebooking');

    }
}
