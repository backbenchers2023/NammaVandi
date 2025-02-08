@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg"
    style="background-color: rgb(11, 11, 11); padding: 15px 20px; border-bottom: 2px solid rgb(110, 25, 14);">
    <div class="container">
        <!-- Brand Name -->
        <a class="navbar-brand" href="index.html" style="font-size: 28px; font-weight: bold; letter-spacing: 1px;">
            <span style="color: #E87C1E; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">NAMMA</span>
            <span style="color: #FFF; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">VANDI</span>
        </a>

        <!-- Mobile Menu Toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation"
            style="border: none; outline: none;">
            <span class="fab fa-bars" style="color: rgb(110, 25, 14); font-size: 20px;"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link"
                        style="color: #FFF; font-size: 16px; text-transform: uppercase; font-weight: bold; padding: 10px 20px; transition: color 0.3s;">
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-0 rounded-3" style="background-color: #FFF4E6;">
        <div class="card-header text-center rounded-top"
            style="background-color: rgb(57, 37, 14); color: #FFF; font-weight: bold; font-size: 1.5rem;">
            Fundamentals Details
        </div>
        <div class="card-body p-4">
            @if($fundamentals->count() <= 0)
                <div class="text-center py-4">
                    <p class="text-muted" style="font-size: 1.2rem;">No fundamental data available. Please add a new entry.
                    </p>
                </div>
            @else
                <div class="row text-center text-md-start">

                    <!-- Total Travels -->
                    <div class="col-md-4 mb-4">
                        <div class="p-3 rounded shadow-sm" style="border: 2px solid rgb(57, 37, 14);">
                            <h5 style="color: rgb(57, 37, 14); font-weight: bold;"><i class="bi bi-map"></i> Total Travels
                            </h5>
                            <p style="font-size: 1.2rem; color: rgb(110, 25, 14); font-weight: bold;">
                                {{ $fundamentals->total_travels }}</p>
                        </div>
                    </div>

                    <!-- Happy Customers -->
                    <div class="col-md-4 mb-4">
                        <div class="p-3 rounded shadow-sm" style="border: 2px solid rgb(57, 37, 14);">
                            <h5 style="color: rgb(57, 37, 14); font-weight: bold;"><i class="bi bi-emoji-smile"></i> Happy
                                Customers</h5>
                            <p style="font-size: 1.2rem; color: rgb(110, 25, 14); font-weight: bold;">
                                {{ $fundamentals->happy_customers }}</p>
                        </div>
                    </div>

                    <!-- Total Branches -->
                    <div class="col-md-4 mb-4">
                        <div class="p-3 rounded shadow-sm" style="border: 2px solid rgb(57, 37, 14);">
                            <h5 style="color: rgb(57, 37, 14); font-weight: bold;"><i class="bi bi-geo-alt"></i> Total
                                Branches</h5>
                            <p style="font-size: 1.2rem; color: rgb(110, 25, 14); font-weight: bold;">
                                {{ $fundamentals->total_branches }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Bike Pricing Image -->
                    <div class="col-md-6 mb-4">
                        <div class="text-center">
                            <h5 style="color: rgb(57, 37, 14); font-weight: bold;"><i class="bi bi-image"></i> Bike Pricing
                                Image</h5>
                            <img src="data:image/jpeg;base64,{{ $fundamentals->bike_pricing_image }}" alt="Bike Pricing"
                                class="img-fluid rounded shadow"
                                style="max-width: 100%; border: 2px solid rgb(57, 37, 14);">
                        </div>
                    </div>

                    <!-- Car Pricing Image -->
                    <div class="col-md-6 mb-4">
                        <div class="text-center">
                            <h5 style="color: rgb(57, 37, 14); font-weight: bold;"><i class="bi bi-image"></i> Car Pricing
                                Image</h5>
                            <img src="data:image/jpeg;base64,{{ $fundamentals->car_pricing_image }}" alt="Car Pricing"
                                class="img-fluid rounded shadow"
                                style="max-width: 100%; border: 2px solid rgb(57, 37, 14);">
                        </div>
                    </div>
                </div>
            @endif

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('adminfundamentals.edit', $fundamentals->id) }}" class="btn px-4 py-2"
                    style="background-color: rgb(57, 37, 14); color: #FFF; font-weight: bold; border-radius: 10px;">
                    Edit Pricing
                </a>
            </div>
        </div>
    </div>
</div>
@endsection