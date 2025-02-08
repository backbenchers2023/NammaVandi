@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <!-- User Form Container -->
    <div class="form-container p-4 border rounded shadow" 
         style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        <h1 class="text-center mb-4" 
            style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">Create New User</h1>

        <form method="POST" action="{{ route('storeuser') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       placeholder="Enter user's name" value="{{ old('name') }}" 
                       required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       placeholder="Enter user's email" value="{{ old('email') }}" 
                       required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Password</label>
                <input type="password" class="form-control" id="password" name="password" 
                       placeholder="Enter a secure password" 
                       required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('password')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Role</label>
                <select class="form-control" id="role" name="role" 
                        required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                    <option value="" disabled {{ old('role') === null ? 'selected' : '' }}>Select a role</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="super admin" {{ old('role') == 'super admin' ? 'selected' : '' }}>Super Admin</option>
                </select>
                @error('role')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn" 
                        style="background-color:  rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; padding: 10px 20px; border-radius: 10px; text-transform: uppercase;">
                    Create User
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
