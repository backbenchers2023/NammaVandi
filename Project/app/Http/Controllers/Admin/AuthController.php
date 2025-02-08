<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        // Check if no users exist
        if (DB::table('users')->count() === 0) {
            // Create a default user if no users exist
            DB::table('users')->insert([
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'super admin',
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }

        return view('admin.login');
    }


    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Show dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
