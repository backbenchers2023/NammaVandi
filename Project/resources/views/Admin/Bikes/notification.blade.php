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

<div class="container my-5">
    <h3 class="mb-4 text-center"
        style="color:  rgb(57, 37, 14); font-size: 2rem; font-weight: bold; text-transform: uppercase; letter-spacing: 2px;">
        BIKE NOTIFICATION</h3>
    <div class="row">
        @foreach($notifications as $notification)
            <div class="col-12 my-3">
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden d-flex flex-column position-relative"
                    style="background-color: #FFF4E6; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="row align-items-center m-3">
                        <!-- Left: Bike Image -->
                        <div class="col-md-4 p-0">
                            <img src="data:image/jpeg;base64,{{ $notification->bike->bike_image }}"
                                alt="{{ $notification->bike->name }}"
                                class="img-fluid w-100 h-100 object-fit-cover rounded-left"
                                style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);">
                        </div>

                        <!-- Middle: Vertical Line -->
                        <div class="col-md-1 text-center d-none d-md-block">
                            <div style="width: 2px; height: 100%; background-color: rgb(110, 25, 14);"></div>
                        </div>

                        <!-- Right: Details -->
                        <div class="col-md-7 p-3 ">
                            <h5 class="font-weight-bold text-danger" style="font-size: 1.25rem; text-transform: uppercase;">
                                {{ $notification->bike->bike_brandname }}</h5>
                            <ul class="list-unstyled" style="font-size: 1rem; color:  rgb(57, 37, 14);">
                                <li><strong>Model:</strong> {{ $notification->bike->bike_model }}</li>
                                <li><strong>Customer:</strong> {{ $notification->customer_name }}</li>
                                <li><strong>Phone:</strong> {{ $notification->phone_number }}</li>
                                <li><strong>Pickup:</strong> {{ $notification->pickup_date }}</li>
                                <li><strong>Drop:</strong> {{ $notification->drop_date }}</li>
                                <li><strong>Package Type:</strong> {{ ucfirst($notification->package_type) }}</li>
                                @if($notification->package_type === 'More than One Day')
                                    <li><strong>Number of Days:</strong> {{ $notification->package_detail }} days</li>
                                @else
                                    <li><strong>Package Details:</strong> {{ $notification->package_detail }}</li>
                                @endif
                            </ul>
                            <div class="d-flex justify-content-end mt-4">
                                <!-- Book Button -->
                                <a href="{{ route('bikebookingcreate', $notification->bike->id) }}"
                                    class="btn py-2 px-4 w-2 me-2"
                                    style="background-color:  rgb(57, 37, 14); color:white;">BOOK</a>

                                <!-- Delete Button -->
                                <form action="{{ route('deletebikenotification', $notification->id) }}" method="POST"
                                    class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn py-2 px-3"
                                        style="background-color:  rgb(57, 37, 14); color:white;">DELETE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection