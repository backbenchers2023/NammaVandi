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

<div class="container mt-5">
    <!-- Month Filter -->
    <form method="GET" action="{{ route('checkcar.index') }}" class="mb-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <select name="month" class="form-select shadow-sm filter-select"
                    style="border: 2px solid #7F5A3C; border-radius: 10px; background-color: #F7F5F2; color:  rgb(57, 37, 14);"
                    onchange="this.form.submit()">
                    @for ($i = -3; $i <= 6; $i++) <!-- Loop from 6 months before to 6 months after -->
                                        @php
                                            $date = now()->startOfMonth()->addMonths($i); // Calculate each month
                                            $formatted = $date->format('Y-m'); // Format as Y-m
                                            $label = $date->format('F Y'); // Display Month and Year
                                        @endphp
                                        <option value="{{ $formatted }}" {{ $formatted === request('month', now()->format('Y-m')) ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                    @endfor
                </select>
            </div>
        </div>
    </form>

    <div class="table-responsive" style="max-height: 500px; overflow: auto;">
        <table class="table table-bordered text-center"
            style="border: 2px solid #7F5A3C; width: 100%; background-color: #FFFFFF;">
            <thead style="background-color: #F4E1A1; color: #7F5A3C; position: sticky; top: 0; z-index: 2;">
                <tr>
                    <th class="sticky-left"
                        style="border: 2px solid #7F5A3C; font-weight: bold; font-size: 1.1rem; color: #7F5A3C; background-color: #F4E1A1;">
                        Car Name
                    </th>
                    @for ($date = \Carbon\Carbon::parse($month . '-01'); $date->lte(\Carbon\Carbon::parse($month . '-01')->endOfMonth()); $date->addDay())
                        <th
                            style="border: 2px solid #7F5A3C; font-size: 0.9rem; color: #7F5A3C; position: sticky; top: 0; background-color: #F4E1A1; z-index: 1;">
                            {{ $date->format('d') }}
                        </th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                            <tr>
                                <td class="sticky-left"
                                    style="border: 2px solid #7F5A3C; font-weight: bold; font-size: 1rem; color: #7F5A3C; background-color: #FFF4E6;">
                                    {{ $car->car_brandname }}
                                </td>
                                @for ($date = \Carbon\Carbon::parse($month . '-01'); $date->lte(\Carbon\Carbon::parse($month . '-01')->endOfMonth()); $date->addDay())
                                                @php
                                                    $isBooked = $car->bookings->contains(function ($booking) use ($date) {
                                                        return $date->between(
                                                            \Carbon\Carbon::parse($booking->pickup_date),
                                                            \Carbon\Carbon::parse($booking->drop_date)
                                                        );
                                                    });

                                                    $isServiceDate = $car->services->contains(function ($service) use ($date) {
                                                        return $date->between(
                                                            \Carbon\Carbon::parse($service->pickup_date),
                                                            \Carbon\Carbon::parse($service->drop_date)
                                                        );
                                                    });
                                                @endphp

                                                <!-- Highlighting Booked and Service Dates -->
                                                <td class="{{ $isBooked ? 'bg-danger text-white' : ($isServiceDate ? 'bg-info text-white' : 'bg-success text-white') }}"
                                                    style="border: 2px solid #7F5A3C; font-weight: bold; font-size: 0.9rem;">
                                                </td>
                                @endfor
                            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .sticky-left {
        position: sticky;
        left: 0;
        background-color: #FFF4E6;
        z-index: 3;
    }
</style>

@endsection