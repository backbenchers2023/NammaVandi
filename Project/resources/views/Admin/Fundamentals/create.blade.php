@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg" style="border: 2px solid #6E4517; background-color: #FFF4E6;">
        <div class="card-header text-center" style="background-color: #6E4517; color: #FFF; font-weight: bold;">
            Create Fundamental
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('adminfundamentals.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Total Travels -->
                <div class="mb-3">
                    <label for="total_travels" class="form-label">Total Travels</label>
                    <input type="number" class="form-control" id="total_travels" name="total_travels" required>
                </div>

                <!-- Happy Customers -->
                <div class="mb-3">
                    <label for="happy_customers" class="form-label">Happy Customers</label>
                    <input type="number" class="form-control" id="happy_customers" name="happy_customers" required>
                </div>

                <!-- Total Branches -->
                <div class="mb-3">
                    <label for="total_branches" class="form-label">Total Branches</label>
                    <input type="number" class="form-control" id="total_branches" name="total_branches" required>
                </div>

                <!-- Bike Pricing Image -->
                <div class="mb-3">
                    <label for="bike_pricing_image" class="form-label">Bike Pricing Image</label>
                    <input type="file" class="form-control" id="bike_pricing_image" name="bike_pricing_image"
                        accept="image/*" required>
                </div>

                <!-- Car Pricing Image -->
                <div class="mb-3">
                    <label for="car_pricing_image" class="form-label">Car Pricing Image</label>
                    <input type="file" class="form-control" id="car_pricing_image" name="car_pricing_image"
                        accept="image/*" required>
                </div>

                <button type="submit" class="btn w-100 " style="color:#FFF; background-color: #6E4517;">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection