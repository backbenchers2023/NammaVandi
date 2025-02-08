@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <!-- User Form Container -->
    <div class="form-container p-4 border rounded shadow" 
         style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        <h1 class="text-center mb-4" 
            style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">Edit User</h1>

        <form method="POST" action="{{ route('updateuser', $user->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="{{ old('name', $user->name ?? '') }}" placeholder="Enter user's name" 
                       required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email', $user->email ?? '') }}" placeholder="Enter user's email" 
                       required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="form-label" 
                       style="color:  rgb(57, 37, 14); font-weight: bold;">Role</label>
                <select class="form-control" id="role" name="role" required 
                        style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                    <option value="" disabled {{ old('role', $user->role ?? '') === null ? 'selected' : '' }}>Select a role</option>
                    <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="super admin" {{ old('role', $user->role ?? '') == 'super admin' ? 'selected' : '' }}>Super Admin</option>
                </select>
                @error('role')<div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn" 
                        style="background-color:  rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; padding: 10px 20px; border-radius: 10px; text-transform: uppercase;">
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
