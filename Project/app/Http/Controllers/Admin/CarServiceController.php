<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarBookings;
use App\Models\Cars;
use App\Models\CarServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarServiceController extends Controller
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

        return view('admin.cars.service.create', compact('car', 'bookedDates', 'serviceDates'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,id',
            'pickup_date' => 'required|date|after_or_equal:today',
            'drop_date' => 'required|date',
        ]);
        try {
            CarServices::create($validated->validated());
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        
        return redirect()->route('carbooking');


    }
}
