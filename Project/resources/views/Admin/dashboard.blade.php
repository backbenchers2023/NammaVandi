@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg" id="ftco-navbar"
    style="background-color:rgb(11, 11, 11); padding: 15px 20px; border-bottom: 2px solid rgb(110, 25, 14);">
    <div class="container">
        <!-- Brand Name -->
        <a class="navbar-brand" href="index.html"
            style="font-size: 28px; font-weight: bold; letter-spacing: 1px; display: flex; align-items: center;">
            <span style="color:  #E87C1E; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);">NAMMA</span>
            <span style="color:   #FFF; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); margin-left: 5px;">VANDI</span>
        </a>

        <!-- Profile Dropdown -->
        <div class="dropdown ml-3">
            <button class="btn rounded-circle shadow-sm" type="button" id="profileDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"
                style="width: 40px; height: 40px; background-color: #E87C1E; color: #FFF; font-size: 18px; text-align: center; padding: 0;">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </button>
            <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="profileDropdown"
                style="border: none; border-radius: 8px;">
                <a class="dropdown-item" href="{{ route('password') }}"
                    style="font-size: 14px; color:  rgb(57, 37, 14);">Change Password</a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item text-center"
                        style="font-size: 14px; color: rgb(110, 25, 14); border: none; background: none; padding: 5px;">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>



<section class="ftco-section " style="background-color: #f5f5f5;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('getcarNotifications') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/Admin_carnotify_image.webp') }}" alt="Booking Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">CAR NOTIFICATION</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('getbikeNotifications') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/Admin_bikenotify_image.webp') }}" alt="Booking Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">BIKE NOTIFICATION</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('getcarbooked') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/carbooked.png') }}" alt="Booking Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">BOOKED CARS</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('getbikebooked') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/bikebooked.jpg') }}" alt="Booking Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">BOOKED BIKES</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('carbooking') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/Admin_carbook_image.webp') }}" alt="Booking Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">CAR BOOKINGS</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('bikebooking') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/Admin_bikebook_image.webp') }}" alt="Booking Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">BIKE BOOKINGS</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admincars.index') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/Admin_Car_image.jpeg') }}" alt="Car Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>

                        <div class="text mt-3">
                            <h2 class="mb-2">CARS</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('adminbikes.index') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/Admin_Bike_image.webp') }}" alt="Bike Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">BIKES</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('adminblogs.index') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/Admin_Blog_image.jpg') }}" alt="Blog Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">BLOGS</h2>
                        </div>
                    </div>
                </a>
            </div>
            @if(Auth::user()->role === 'super admin')
                <div class="col-md-4">
                    <a href="{{ route('users') }}" class="text-decoration-none">
                        <div class="car-wrap rounded ftco-animate text-center">
                            <div class="img rounded d-flex align-items-center justify-content-center"
                                style="height: 200px;">
                                <img src="{{ asset('assets/images/Admin_user_image.webp') }}" alt="Booking Image"
                                    class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                            </div>
                            <div class="text mt-3">
                                <h2 class="mb-2">USER MANAGE</h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <div class="col-md-4">
                <a href="{{ route('visited') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/visited_user.jpg') }}" alt="Bike Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">VISITED USERS</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('adminfundamentals.index') }}" class="text-decoration-none">
                    <div class="car-wrap rounded ftco-animate text-center">
                        <div class="img rounded d-flex align-items-center justify-content-center"
                            style="height: 200px;">
                            <img src="{{ asset('assets/images/credentials.jpg') }}" alt="Bike Image"
                                class="img-fluid rounded" style="object-fit: cover; height: 100%; width: 100%;">
                        </div>
                        <div class="text mt-3">
                            <h2 class="mb-2">FUNDAMENTALS</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection