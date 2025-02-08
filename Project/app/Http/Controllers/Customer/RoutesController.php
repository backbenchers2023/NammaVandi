<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Bikes;
use App\Models\Blogs;
use App\Models\Cars;
use App\Models\Fundamentals;
use App\Models\Reviews;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        $blogs = Blogs::all();
        $bikes = Bikes::all();
        $cars = Cars::all();
        $reviews = Reviews::all();
        $fundamentals = Fundamentals::first();
        return view('customer.index',compact('blogs','bikes','cars','reviews','fundamentals'));
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function blogs()
    {
        $blogs = Blogs::all();
        return view('customer.blogs.index', compact('blogs'));
    }

    public function showblog($id)
    {
        $blog = Blogs::findOrFail($id);
        $recentBlogs = Blogs::latest()->where('id', '!=', $id)->get();
        return view('customer.blogs.show', compact('blog', 'recentBlogs'));
    }

    public function bikes()
    {
        $bikes = Bikes::all();
        return view('customer.bikes.index', compact('bikes'));
    }

    public function showbike($id)
    {
        $bike = Bikes::with('bikeDetails')->findOrFail($id);
        $bikeImages = json_decode($bike->bikeDetails->bike_images, true);

        $biketype = $bike->bike_type;
        $relatedBikes = Bikes::where('bike_type', $biketype)->where('id', '!=', $id)->get();

        $fundamentals = Fundamentals::first();

        return view('customer.bikes.show', compact('bike', 'bikeImages', 'relatedBikes','fundamentals'));
    }

    public function cars()
    {
        $cars = Cars::all();
        return view('customer.cars.index', compact('cars'));
    }

    public function showcar($id)
    {
        $car = Cars::with('carDetails')->findOrFail($id);

        $carImages = json_decode($car->carDetails->car_images, true);

        $cartype = $car->car_type;
        $relatedCars = Cars::where('car_type', $cartype)->where('id', '!=', $id)->get();

        $fundamentals = Fundamentals::first();

        return view('customer.cars.show', compact('car', 'carImages', 'relatedCars','fundamentals'));
    }

    public function filtercars(Request $request)
    {
        $type = $request->query('type');


        if ($type === 'all' || empty($type)) {
            $cars = Cars::all();
        } else {
            $cars = Cars::where('car_type', $type)->get();
        }

        return response()->json($cars);
    }

    public function filterbikes(Request $request)
    {
        $type = $request->query('type');


        if ($type === 'all' || empty($type)) {
            $bikes = Bikes::all();
        } else {
            $bikes = Bikes::where('bike_type', $type)->get();
        }

        return response()->json($bikes);
    }
}
