@extends('layouts.app')

@section('content')

<!-- Background Image -->
<div style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('assets/images/visitedformbg.avif') no-repeat center center;
    background-size: cover;
    z-index: -1;
">
</div>

@if ($errors->any())
    <div class="alert alert-danger" style="background-color: #F9E2E2; color: rgb(57, 37, 14); border-radius: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5 mb-4">
    <!-- Visit Form Container with Blur Effect -->
    <div class="form-container p-4 border rounded shadow"
        style="background: rgba(255, 255, 255, 0.2); /* Semi-transparent white */
               backdrop-filter: blur(10px); /* Blurred effect */
               box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
               position: relative; 
               max-width: 500px; 
               margin: auto;">
        <h1 class="text-center mb-4" style="color: rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">
            Get Started with Us!
        </h1>

        <form action="{{ route('visiteduserstore') }}" method="POST" onsubmit="storeData()">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="user_name" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-person"></i> Customer Name
                </label>
                <input type="text" id="user_name" name="user_name" class="form-control rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone_number" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-telephone"></i> Phone Number
                </label>
                <input type="tel" id="phone_number" name="phone_number" class="form-control rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-geo-alt"></i> Location
                </label>
                <input type="text" id="location" name="location" class="form-control rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
            </div>

            <!-- Purpose -->
            <div class="mb-4">
                <label for="purpose" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-box"></i> Purpose
                </label>
                <select id="purpose" name="purpose" class="form-select rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
                    <option value="">Select Purpose</option>
                    <option value="bike_rent">Bike Rent</option>
                    <option value="car_rent">Car Rent</option>
                    <option value="just_visiting">Just Visiting</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="mt-4 text-center">
                <button type="submit" class="btn w-100 py-2 mt-4"
                    style="background-color: rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; text-transform: uppercase; border-radius: 10px;">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function storeData() {
        const id = crypto.randomUUID();
        const date = new Date().toISOString();
        localStorage.setItem('storedData', id);
        localStorage.setItem('storedDate', date);
    }
</script>
@endsection
