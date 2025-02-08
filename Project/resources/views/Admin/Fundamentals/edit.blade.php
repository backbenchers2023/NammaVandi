@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3" style="background-color: #FFF4E6;">
        <div class="card-header text-center rounded-top"
            style="background-color: #6E4517; color: #FFF; font-weight: bold; font-size: 1.5rem;">
            Edit Fundamental
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('adminfundamentals.update', $fundamental->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Total Travels -->
                <div class="mb-3">
                    <label for="total_travels" class="form-label">Total Travels</label>
                    <input type="number" class="form-control shadow-sm border-0" id="total_travels" name="total_travels"
                        value="{{ $fundamental->total_travels }}" required>
                </div>

                <!-- Happy Customers -->
                <div class="mb-3">
                    <label for="happy_customers" class="form-label">Happy Customers</label>
                    <input type="number" class="form-control shadow-sm border-0" id="happy_customers"
                        name="happy_customers" value="{{ $fundamental->happy_customers }}" required>
                </div>

                <!-- Total Branches -->
                <div class="mb-3">
                    <label for="total_branches" class="form-label">Total Branches</label>
                    <input type="number" class="form-control shadow-sm border-0" id="total_branches"
                        name="total_branches" value="{{ $fundamental->total_branches }}" required>
                </div>

                <!-- Bike Pricing Image -->
                <div class="mb-3">
                    <label for="bike_pricing_image" class="form-label">Bike Pricing Image</label>
                    <input type="file" class="form-control shadow-sm border-0" id="bike_pricing_image"
                        name="bike_pricing_image" accept="image/*">
                    @if ($fundamental->bike_pricing_image)
                        <div class="mt-3 text-left">
                            <h6>Current Bike Pricing Image:</h6>
                            <img src="data:image/jpeg;base64,{{ $fundamental->bike_pricing_image }}"
                                alt="Bike Pricing Image" class="img-fluid rounded" width="150">
                        </div>
                    @endif
                </div>

                <!-- Car Pricing Image -->
                <div class="mb-3">
                    <label for="car_pricing_image" class="form-label">Car Pricing Image</label>
                    <input type="file" class="form-control shadow-sm border-0" id="car_pricing_image"
                        name="car_pricing_image" accept="image/*">
                    @if ($fundamental->car_pricing_image)
                        <div class="mt-3 text-left">
                            <h6>Current Car Pricing Image:</h6>
                            <img src="data:image/jpeg;base64,{{ $fundamental->car_pricing_image }}" alt="Car Pricing Image"
                                class="img-fluid rounded" width="150">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn c py-2 mt-3"
                    style="background-color: #6E4517; color: #FFF; font-weight: bold;">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection