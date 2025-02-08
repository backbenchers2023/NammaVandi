<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fundamentals;
use Illuminate\Http\Request;

class FundamentalController extends Controller
{
    public function index()
    {
        $fundamentals = Fundamentals::first();
        if($fundamentals)
        {
            return view('admin.fundamentals.index', compact('fundamentals'));
        }else{
            return view('admin.fundamentals.create');
        }
    }

    public function create()
    {
        return view('admin.fundamentals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'total_travels' => 'required|integer',
            'happy_customers' => 'required|integer',
            'total_branches' => 'required|integer',
            'bike_pricing_image' => 'image|required',
            'car_pricing_image' => 'image|required',
        ]);

        $bike_image = base64_encode(file_get_contents($request->file('bike_pricing_image')->getRealPath()));
        $car_image = base64_encode(file_get_contents($request->file('car_pricing_image')->getRealPath()));

        Fundamentals::create([
            'total_travels' => $validated['total_travels'],
            'happy_customers' => $validated['happy_customers'],
            'total_branches' => $validated['total_branches'],
            'bike_pricing_image' => $bike_image,
            'car_pricing_image' => $car_image,
        ]);

        return redirect()->route('adminfundamentals.index')->with('success', 'Fundamental created successfully');
    }

    public function show(Fundamentals $fundamental)
    {
        return view('admin.fundamentals.show', compact('fundamental'));
    }

    public function edit(Fundamentals $fundamental)
    {
        return view('admin.fundamentals.edit', compact('fundamental'));
    }

    public function update(Request $request, Fundamentals $fundamental)
    {
        $validated = $request->validate([
            'total_travels' => 'required|integer',
            'happy_customers' => 'required|integer',
            'total_branches' => 'required|integer',
            'bike_pricing_image' => 'image|nullable',
            'car_pricing_image' => 'image|nullable',
        ]);

        if ($request->hasFile('bike_pricing_image')) {
            $bike_image = base64_encode(file_get_contents($request->file('bike_pricing_image')->getRealPath()));
            $fundamental->bike_pricing_image = $bike_image;
        }

        if ($request->hasFile('car_pricing_image')) {
            $car_image = base64_encode(file_get_contents($request->file('car_pricing_image')->getRealPath()));
            $fundamental->car_pricing_image = $car_image;
        }

        $fundamental->update([
            'total_travels' => $validated['total_travels'],
            'happy_customers' => $validated['happy_customers'],
            'total_branches' => $validated['total_branches'],
            'bike_pricing_image' => $fundamental->bike_pricing_image ?? $fundamental->getOriginal('bike_pricing_image'),
            'car_pricing_image' => $fundamental->car_pricing_image ?? $fundamental->getOriginal('car_pricing_image'),
        ]);

        return redirect()->route('adminfundamentals.index')->with('success', 'Fundamental updated successfully');
    }
}
