<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\VisitedUsers;
use Illuminate\Http\Request;

class VisitedController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'purpose' => 'required|string|in:bike_rent,car_rent,just_visiting',
        ]);

        // Store the validated data in the database (adjust table name as needed)
        VisitedUsers::create([
            'user_name' => $validated['user_name'],
            'phone_number' => $validated['phone_number'],
            'location' => $validated['location'],
            'purpose' => $validated['purpose'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('index')->with('success', 'Your visit has been recorded!');
    }

    public function index()
    {
        $users = VisitedUsers::all(); 
        return view('admin.visited', compact('users')); 
    }

    // Delete the visited user
    public function destroy($id)
    {
        $user = VisitedUsers::findOrFail($id);
        $user->delete();

        return redirect()->route('visited')->with('success', 'User deleted successfully!');
    }
}
