@extends('layouts.app')

@section('content')
<!-- Enhanced Navbar with gradient background -->
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

<div class="container mt-4 ">
    <div class="row justify-content-between align-items-center mb-5">
        <!-- Heading Section on Left -->
        <div class="col-md-7 text-md-left text-center heading-section ftco-animate">
            <h2 class="font-weight-bold" style="color: rgb(57, 37, 14);">CAR &nbsp; AVAILABILITY</h2>
        </div>

        <!-- Button Section on Right -->
        <div class="col-6 col-md-2 text-center mb-2">
            <a href="{{ route('getcarchecklist') }}"
                class="btn btn-success d-flex align-items-center justify-content-center w-100"
                style="color: #FFF; 
                border-radius: 12px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); text-transform: uppercase; font-weight: bold; transition: transform 0.3s, box-shadow 0.3s;">
                Availability Graph
            </a>
        </div>
    </div>
</div>

<div class="container mb-4 mt-2 p-2">
    <div class="card shadow-sm border-0 rounded-3"
        style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <form method="GET" action="{{ route('getcarbooked') }}" id="dateFilterForm" class="row align-items-end g-3">
                <div class="col-md-4">
                    <div class="date-picker-wrapper">
                        <label for="start_date" class="form-label fw-bold text-dark" style="font-size: 16px;">
                            <i class="bi bi-calendar-event"></i> Start Date
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-warning text-white">
                                <i class="bi bi-calendar-date"></i>
                            </span>
                            <input type="date" id="start_date" name="start_date"
                                class="form-control form-control-lg date-input" value="{{ $startDate ?? '' }}"
                                style="border-radius: 10px; border: 2px solid rgb(57, 37, 14);">
                        </div>
                        <div class="error-message" id="start-date-error" style="color: rgb(110, 25, 14);"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="date-picker-wrapper">
                        <label for="end_date" class="form-label fw-bold text-dark" style="font-size: 16px;">
                            <i class="bi bi-calendar-event"></i> End Date
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-warning text-white">
                                <i class="bi bi-calendar-date"></i>
                            </span>
                            <input type="date" id="end_date" name="end_date"
                                class="form-control form-control-lg date-input" value="{{ $endDate ?? '' }}" disabled
                                style="border-radius: 10px; border: 2px solid rgb(57, 37, 14);">
                        </div>
                        <div class="error-message" id="end-date-error" style="color: rgb(110, 25, 14);"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-lg flex-grow-1"
                            style="background-color: rgb(57, 37, 14); color: #FFF; border-radius: 10px; border: none; padding: 10px 20px; transition: background-color 0.3s;">
                            <i class="bi bi-search"></i> Filter
                        </button>
                        <button type="button" id="resetButton" class="btn btn-lg"
                            style="background-color: rgb(109, 62, 8); color: #FFF; border-radius: 10px; border: none; padding: 10px 20px; transition: background-color 0.3s;">
                            <i class="bi bi-arrow-counterclockwise"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Main Content Section -->
<div class="container">
    <!-- Booked Cars Section -->
    <div class="card shadow-sm border-0 rounded-3 mb-4">
        <div class="card-header"
            style="background-color:   rgb(57, 37, 14); color: #FFF; border-bottom: 3px solid rgb(110, 25, 14);">
            <h3 class="mb-0" style="color: white;"><i class="bi bi-car-front"></i> BOOKED CARS</h3>
        </div>
        <div class="card-body">
            @if($bookedCars->count() > 0)
                @foreach($bookedCars as $car)
                    <div class="row mb-4 car-card">
                        <div class="col-md-4">
                            <img src="data:image/jpeg;base64,{{ $car->car_image }}" alt="{{ $car->car_brandname }}"
                                class="img-fluid rounded-3 shadow hover-zoom">
                        </div>
                        <div class="col-md-8">
                            <h4 style="color:  rgb(57, 37, 14);">
                                <i class="bi bi-car-front"></i>
                                {{ $car->car_companyname }} - {{ $car->car_brandname }}
                            </h4>
                            <h5 class="text-muted">{{ $car->car_model }}</h5>
                            <div class="mt-3">
                                @foreach($car->bookings as $booking)
                                    <div class="card shadow-sm mb-3 border-primary">
                                        <div class="card-header"
                                            style="background-color: #FFF4E6; border-bottom: 2px solid  rgb(57, 37, 14);">
                                            <strong style="color:  rgb(57, 37, 14);">Booking Details</strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>
                                                        <i class="bi bi-person"></i>
                                                        <strong>Customer:</strong> {{ $booking->customer_name }}
                                                    </p>
                                                    <p>
                                                        <i class="bi bi-telephone"></i>
                                                        <strong>Phone:</strong> {{ $booking->phone_number }}
                                                    </p>
                                                    <p>
                                                        <i class="bi bi-box"></i>
                                                        <strong>Package Type:</strong> {{ $booking->package_type }}
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        <i class="bi bi-calendar-check"></i>
                                                        <strong>Pickup:</strong> {{ $booking->pickup_date }}
                                                    </p>
                                                    <p>
                                                        <i class="bi bi-calendar-x"></i>
                                                        <strong>Drop:</strong> {{ $booking->drop_date }}
                                                    </p>
                                                    <p>
                                                        <i class="bi bi-box"></i>
                                                        <strong>Package Details:</strong> {{ $booking->package_detail}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info"
                    style="background-color: #FFF4E6; color:  rgb(57, 37, 14); border-left: 5px solid rgb(110, 25, 14);">
                    <i class="bi bi-info-circle"></i> No booked cars in this range.
                </div>
            @endif
        </div>
    </div>

    <!-- Free Cars Section -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header"
            style="background-color:  rgb(57, 37, 14); color: #FFF; border-bottom: 3px solid rgb(110, 25, 14);">
            <h3 class="mb-0" style="color: white;"><i class="bi bi-car-front"></i> FREE CARS</h3>
        </div>
        <div class="card-body">
            @if($freeCars->count() > 0)
                <div class="row g-4">
                    @foreach($freeCars as $car)
                        <div class="col-md-4">
                            <div class="card h-100 shadow-sm hover-lift" style="border: 1px solid  rgb(57, 37, 14);">
                                <img src="data:image/jpeg;base64,{{ $car->car_image }}" class="card-img-top"
                                    alt="{{ $car->car_brandname }}">
                                <div class="card-body">
                                    <h5 class="card-title" style="color:  rgb(57, 37, 14);">
                                        <i class="bi bi-car-front"></i>
                                        {{ $car->car_companyname }} - {{ $car->car_brandname }}
                                    </h5>
                                    <p class="card-text">{{ $car->car_model }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info"
                    style="background-color: #FFF4E6; color:  rgb(57, 37, 14); border-left: 5px solid rgb(110, 25, 14);">
                    <i class="bi bi-info-circle"></i> No free cars in this range.
                </div>
            @endif
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');
        const form = document.getElementById('dateFilterForm');
        const resetButton = document.getElementById('resetButton');
        const startDateError = document.getElementById('start-date-error');
        const endDateError = document.getElementById('end-date-error');

        // Set min date as today for start date
        const today = new Date().toISOString().split('T')[0];
        startDate.setAttribute('min', today);

        // Initially disable end date
        endDate.disabled = true;

        // Make the whole date picker wrapper clickable
        document.querySelectorAll('.date-picker-wrapper').forEach(wrapper => {
            wrapper.addEventListener('click', function (e) {
                const input = this.querySelector('input[type="date"]');
                if (!input.disabled) {
                    input.showPicker();
                }
            });
        });

        startDate.addEventListener('change', function () {
            if (this.value) {
                endDate.disabled = false;
                endDate.value = '';
                endDate.setAttribute('min', this.value);
                validateDates();

                // Clear end date error when start date changes
                endDateError.style.display = 'none';
                endDate.classList.remove('is-invalid');
            } else {
                endDate.disabled = true;
                endDate.value = '';
                clearErrors();
            }
        });

        endDate.addEventListener('change', function () {
            validateDates();
        });

        resetButton.addEventListener('click', function () {
            form.reset();
            clearErrors();
            endDate.disabled = true;
            if (window.location.search) {
                window.location = window.location.pathname;
            }
        });

        form.addEventListener('submit', function (e) {
            if (!validateDates()) {
                e.preventDefault();
            }
        });

        function validateDates() {
            let isValid = true;
            const start = new Date(startDate.value);
            const end = new Date(endDate.value);

            clearErrors();

            if (!startDate.value) {
                showError(startDateError, "Please select a start date");
                startDate.classList.add('is-invalid');
                isValid = false;
            }

            if (endDate.value && end < start) {
                showError(endDateError, "End date must be after start date");
                endDate.classList.add('is-invalid');
                isValid = false;
            }

            return isValid;
        }

        function showError(element, message) {
            element.textContent = message;
            element.style.display = 'block';
        }

        function clearErrors() {
            startDate.classList.remove('is-invalid');
            endDate.classList.remove('is-invalid');
            startDateError.style.display = 'none';
            endDateError.style.display = 'none';
        }

        // Initialize state if there are existing values
        if (startDate.value) {
            endDate.disabled = false;
            if (endDate.value) {
                validateDates();
            }
        }

        // Add touch support for mobile devices
        if ('ontouchstart' in window) {
            document.querySelectorAll('.date-input').forEach(input => {
                input.addEventListener('touchend', function (e) {
                    e.preventDefault();
                    if (!this.disabled) {
                        this.showPicker();
                    }
                });
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection