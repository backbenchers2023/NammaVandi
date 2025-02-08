@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <!-- Password Change Form Container -->
    <div class="form-container p-4 border rounded shadow" 
         style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        <h1 class="text-center mb-4" 
            style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">Change Password</h1>

        <form method="POST" action="{{ route('updatepassword') }}">
            @csrf
            @method('PUT')

            <!-- Current Password -->
            <div class="mb-4">
                <label for="current_password" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Current Password</label>
                <input type="password" class="form-control" id="current_password" name="current_password" 
                       placeholder="Enter current password" required 
                       style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('current_password')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label for="new_password" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" 
                       placeholder="Enter new password" required 
                       style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('new_password')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm New Password -->
            <div class="mb-4">
                <label for="new_password_confirmation" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Confirm New Password</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" 
                       placeholder="Confirm new password" required 
                       style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn" 
                        style="background-color:  rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; padding: 10px 20px; border-radius: 10px; text-transform: uppercase;">
                    Change Password
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
