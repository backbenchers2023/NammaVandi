@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark"
    style="background-color:  rgb(57, 37, 14); box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <div class="container">
        <!-- Navbar Brand -->
        <a class="navbar-brand" href="index.html">
            <span
                style="font-size: 30px; text-transform: uppercase; letter-spacing: 2px; color: #F1C40F; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">NAMMA</span>
            <span
                style="font-size: 30px; text-transform: uppercase; letter-spacing: 2px; color: #fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">VANDI</span>
        </a>

        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars" style="font-size: 24px; color: #fff;"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{ route('index')}}" class="nav-link"
                        style="font-size: 16px; padding: 12px 20px; color: #fff; text-transform: uppercase; letter-spacing: 1px; transition: color 0.3s ease;">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cars')}}" class="nav-link"
                        style="font-size: 16px; padding: 12px 20px; color: #fff; text-transform: uppercase; letter-spacing: 1px; transition: color 0.3s ease;">
                        Cars
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bikes')}}" class="nav-link"
                        style="font-size: 16px; padding: 12px 20px; color: #fff; text-transform: uppercase; letter-spacing: 1px; transition: color 0.3s ease;">
                        Bikes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blogs')}}" class="nav-link"
                        style="font-size: 16px; padding: 12px 20px; color: #fff; text-transform: uppercase; letter-spacing: 1px; transition: color 0.3s ease;">
                        Blogs
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact')}}" class="nav-link"
                        style="font-size: 16px; padding: 12px 20px; color: #fff; text-transform: uppercase; letter-spacing: 1px; transition: color 0.3s ease;">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="ftco-section" style="
  background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;
  padding: 3rem 0;">
    <div class="container">
        <!-- Title Section -->
        <div class="row justify-content-center mb-5 mt-4 ml-2 mr-2">
            <div class="col-md-7 heading-section text-center ftco-animate" style="border: 2px solid #6E4517; border-radius: 10px; padding: 40px; background-color: #fff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <h2 class="font-weight-bold " style="color: rgb(57, 37, 14); font-size: 2.5rem; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                    Udumalpet Office
                </h2>
                <p class="lead" style="color: rgba(57, 37, 14, 0.7); font-size: 1.2rem; margin-bottom: 20px;">
                    Welcome to our Udumalpet office, a vibrant hub for creativity and team collaboration.
                </p>
            </div>
        </div>

        <!-- Upper Section -->

        <div class="row">
            <!-- Address Section -->
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <div class="p-4 rounded shadow-sm" style="background-color: #FFF4E6; border: 1px solid #ddd;">
                            <div class="icon mr-3" style="color: rgb(110, 25, 14); font-size: 24px;">
                                <span class="fas fa-map-marker-alt"></span>
                            </div>
                            <p style="color:  rgb(57, 37, 14); font-size: 14px; margin-bottom: 0;">
                                <strong>Address:</strong> Reliance Petrol Bunk, Express Avenue, ANUSH CARS PRIVATE
                                LIMITED, 60, Backside, Pollachi Main Rd, Udumalaipettai, Tamil Nadu-642126
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="p-4 rounded shadow-sm" style="background-color: #FFF4E6; border: 1px solid #ddd;">
                            <div class="icon mr-3" style="color: rgb(110, 25, 14); font-size: 24px;">
                                <span class="fas fa-phone-alt"></span>
                            </div>
                            <p style="color:  rgb(57, 37, 14); font-size: 14px; margin-bottom: 0;">
                                <strong>Phone:</strong> <a href="tel://1234567920" style="color: rgb(110, 25, 14);">+91
                                    7373106161</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="p-4 rounded shadow-sm" style="background-color: #FFF4E6; border: 1px solid #ddd;">
                            <div class="icon mr-3" style="color: rgb(110, 25, 14); font-size: 24px;">
                                <span class="fas fa-envelope"></span>
                            </div>
                            <p style="color:  rgb(57, 37, 14); font-size: 14px; margin-bottom: 0;">
                                <strong>Email:</strong> <a href="mailto:info@yoursite.com"
                                    style="color: rgb(110, 25, 14);">nammavandiii@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3921.8825766909526!2d77.23602509999999!3d10.588352900000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba9cdf761e0028f%3A0x4a9e37ce68edebc6!2sNAMMA%20VANDI%20-%20Self%20Driving%20Rental%20Cars%20%26%20Bikes%20%7C%20Tours%20%26%20Travels!5e0!3m2!1sen!2sin!4v1722507960198!5m2!1sen!2sin"
                    width="100%" height="450" style="border: 4px solid brown; border-radius: 10px;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <div class="row justify-content-center mb-5 mt-4 ml-2 mr-2">
            <div class="col-md-7 heading-section text-center ftco-animate" style="border: 2px solid #6E4517; border-radius: 10px; padding: 40px; background-color: #fff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <h2 class="font-weight-bold" style="color: rgb(57, 37, 14); font-size: 2.5rem; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">
                    Polachi Office
                </h2>
                <p class="lead" style="color: rgba(57, 37, 14, 0.7); font-size: 1.2rem; margin-bottom: 20px;">
                    Welcome to our Polachi office, a space designed to bring innovation and collaboration.
                </p>
            </div>
        </div>


        <!-- Lower Section -->
        <div class="row">
            <!-- Address Section -->
            <div class="col-md-6">
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <div class="p-4 rounded shadow-sm" style="background-color: #FFF4E6; border: 1px solid #ddd;">
                            <div class="icon mr-3" style="color: rgb(110, 25, 14); font-size: 24px;">
                                <span class="fas fa-map-marker-alt"></span>
                            </div>
                            <p style="color:  rgb(57, 37, 14); font-size: 14px; margin-bottom: 0;">
                                <strong>Address:</strong> Opposite to Rukhmani Ammal School, Jothi Nagar, Pollachi, Tamil Nadu 642001
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="p-4 rounded shadow-sm" style="background-color: #FFF4E6; border: 1px solid #ddd;">
                            <div class="icon mr-3" style="color: rgb(110, 25, 14); font-size: 24px;">
                                <span class="fas fa-phone-alt"></span>
                            </div>
                            <p style="color:  rgb(57, 37, 14); font-size: 14px; margin-bottom: 0;">
                                <strong>Phone:</strong> <a href="tel://1234567920" style="color: rgb(110, 25, 14);">+91
                                    73731 06161</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="p-4 rounded shadow-sm" style="background-color: #FFF4E6; border: 1px solid #ddd;">
                            <div class="icon mr-3" style="color: rgb(110, 25, 14); font-size: 24px;">
                                <span class="fas fa-envelope"></span>
                            </div>
                            <p style="color:  rgb(57, 37, 14); font-size: 14px; margin-bottom: 0;">
                                <strong>Email:</strong> <a href="mailto:info@yoursite.com"
                                    style="color: rgb(110, 25, 14);">nammavandiii@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3921.1390993076966!2d77.01101797508684!3d10.646300189494625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba837cc44f879b9%3A0x54af48bdf27ed634!2sNamma%20Vandi%20Self%20Drive%20Rental%20Cars%20%26%20Bikes%20-%20Pollachi!5e0!3m2!1sen!2sin!4v1738659993591!5m2!1sen!2sin"
                    width="100%" height="450" style="border: 4px solid brown; border-radius: 10px;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>


@endsection