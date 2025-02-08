@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <!-- Brand Logo -->
    <a class="navbar-brand" href="{{ route('index') }}" id="navbar-logo">
      <img src="assets/images/logo.png" alt="Namma Vandi">
    </a>
    <!-- Toggler Button for Mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
      aria-expanded="false" aria-label="Toggle navigation" id="navbar-toggler">
      <span class="fas fa-bars"></span> Menu
    </button>

    <!-- Navbar Menu -->
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('index') }}" class="nav-link">HOME</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('cars') }}" class="nav-link">CARS</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('bikes') }}" class="nav-link">BIKES</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('blogs') }}" class="nav-link">BLOGS</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('contact') }}" class="nav-link">CONTACT</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="hero-wrap" style="background-image: url('assets/images/bg_1.jpg');"
  style="background-size: cover; background-position: center; height: 100vh;">
  <!-- data-stellar-background-ratio="0.5"  -->
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">

          <h1 class="mb-4" style="font-size: 32px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            Bike & Car Rental Service
          </h1>
          <p style="font-size: 22px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
            <span style="color: orange; font-weight: bold;">Ride it</span>... like you <span
              style="color: orange; font-weight: bold;">own it</span>...
          </p>
        </div>
      </div>
    </div>
  </div>
</div>




<section class="ftco-section" style="background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;
  padding: 3rem 0;">
  <div class=" container" style="overflow: hidden;">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading" style="font-size: 18px; color: rgb(109, 62, 8); font-weight: bold;">Services</span>
        <h2 class="mb-3" style="color: rgb(110, 25, 14); font-weight: bold;">Our Latest Services</h2>
      </div>
    </div>
    <div class="row">
      <!-- Service Card 1 -->
      <div class="col-md-3 mb-2" data-aos="fade-right" data-aos-duration="2000">
        <div class="services services-2 w-100 text-center" style="
          background-color: #FDE0B8; 
          border-radius: 10px; 
          padding: 2rem; 
          transition: transform 0.3s ease, box-shadow 0.3s ease;">
          <div class="icon d-flex align-items-center justify-content-center" style="
            background-color: rgb(110, 25, 14); 
            color: #FFF; 
            width: 70px; 
            height: 70px; 
            border-radius: 50%; 
            margin: 0 auto 1rem;">
            <span class="fas fa-car" style="font-size: 24px;"></span>
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2" style="color: rgb(57, 37, 14); font-weight: bold;">Car Rentals</h3>
            <p style="color: rgb(57, 37, 14);">Choose from a wide range of vehicles, enjoy flexible rentals, and hit the
              road with ease.</p>
          </div>
        </div>
      </div>
      <!-- Service Card 2 -->
      <div class="col-md-3 mb-2" data-aos="fade-left" data-aos-duration="2000">
        <div class="services services-2 w-100 text-center" style="
          background-color: #FDE0B8; 
          border-radius: 10px; 
          padding: 2rem; 
          transition: transform 0.3s ease, box-shadow 0.3s ease;">
          <div class="icon d-flex align-items-center justify-content-center" style="
            background-color: rgb(110, 25, 14); 
            color: #FFF; 
            width: 70px; 
            height: 70px; 
            border-radius: 50%; 
            margin: 0 auto 1rem;">
            <span class="fas fa-motorcycle" style="font-size: 24px;"></span>
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2" style="color: rgb(57, 37, 14); font-weight: bold;">Bike Rentals</h3>
            <p style="color: rgb(57, 37, 14);">Choose from a variety of bikes and enjoy the freedom of two wheels with
              comfort and style.</p>
          </div>
        </div>
      </div>
      <!-- Service Card 3 -->
      <div class="col-md-3 mb-2" data-aos="fade-right" data-aos-duration="2000">
        <div class="services services-2 w-100 text-center" style="
          background-color: #FDE0B8; 
          border-radius: 10px; 
          padding: 2rem; 
          transition: transform 0.3s ease, box-shadow 0.3s ease;">
          <div class="icon d-flex align-items-center justify-content-center" style="
            background-color: rgb(110, 25, 14); 
            color: #FFF; 
            width: 70px; 
            height: 70px; 
            border-radius: 50%; 
            margin: 0 auto 1rem;">
            <span class="fas fa-user-tie" style="font-size: 24px;"></span>
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2" style="color: rgb(57, 37, 14); font-weight: bold;">Acting Drivers</h3>
            <p style="color: rgb(57, 37, 14);">Relax and enjoy the ride. Our experienced drivers offer safe and secured
              services.</p>
          </div>
        </div>
      </div>
      <!-- Service Card 4 -->
      <div class="col-md-3 mb-2" data-aos="fade-left" data-aos-duration="2000">
        <div class="services services-2 w-100 text-center" style="
          background-color: #FDE0B8; 
          border-radius: 10px; 
          padding: 2rem; 
          transition: transform 0.3s ease, box-shadow 0.3s ease;">
          <div class="icon d-flex align-items-center justify-content-center" style="
            background-color: rgb(110, 25, 14); 
            color: #FFF; 
            width: 70px; 
            height: 70px; 
            border-radius: 50%; 
            margin: 0 auto 1rem;">
            <span class="fas fa-route" style="font-size: 24px;"></span>
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2" style="color: rgb(57, 37, 14); font-weight: bold;">Tour Packages</h3>
            <p style="color: rgb(57, 37, 14);">Explore Munnar, Kodaikanal, Valparai with our expertly crafted tour
              packages.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Animated Car Divider -->
<div class="animated-car-section" style="position: relative; height: 60px;padding-top: 11px;padding-bottom: 15px; background-color: #FFF4E6; overflow: hidden;">
  <img
    src="assets\images\animate.gif"
    alt="Moving Car"
    class="animated-car"
    style="
      position: absolute; 
      width: 130px; 
      height: auto; 
      transform: scaleX(-1); /* Mirror the GIF */
      animation: moveCar 5s linear infinite;
    ">
</div>

<section class="ftco-section" style="background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;
  padding: 3rem 0;">
  <div class="container">
    <div class="row justify-content-end align-items-center mb-4">
      <div class="col-auto">
        <a href="{{ route('cars') }}" class="bike-btn d-flex align-items-center text-decoration-none p-2 rounded-pill border border-dark shadow-sm">
          <!-- Bike Icon Circle -->
          <div class="bike-icon d-flex align-items-center justify-content-center rounded-circle bg-gradient" style="width: 35px; height: 35px;"> <!-- Reduced from 45px -->
            <span class="fas fa-car" style="font-size: 30px;"></span> <!-- Reduced from 24px -->
          </div>
          <!-- Button Content -->
          <span class="bike-text ms-2 text-uppercase fw-light text-dark rounded py-1 px-2">VIEW ALL</span>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-4">
        <div class="carousel-car owl-carousel">
          @foreach ($cars as $car)
          <div class="item" data-aos="zoom-in-down" data-aos-duration="4000">
            <div class="car-wrap rounded ftco-animate" style="
        border: 1px solid #ddd; 
        border-radius: 10px; 
        overflow: hidden; 
        background-color: #FFF4E6; 
        transition: transform 0.3s ease, box-shadow 0.3s ease;">
              <!-- Car Image -->
              <div class="img rounded d-flex align-items-end" style="
        background-image: url('data:image/jpeg;base64,{{ $car->car_image }}'); 
        background-size: cover; 
        background-position: center; 
        height: 200px;">
              </div>
              <!-- Car Info -->
              <div class="text p-3" style="color: rgb(57, 37, 14);">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h2 class="mb-0" style="font-size: 18px; font-weight: bold;">{{ $car->car_companyname }}</h2>
                  <p class=" price text-muted" style="font-size: 12px;">Starts from</p>
                </div>

                <!-- Brand and Base Price -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <span class="cat" style="font-size: 14px;">{{$car->car_brandname}}</span>
                  <p class=" price" style="font-size: 16px; color: rgb(110, 25, 14);">₹{{$car->base_price}}<span
                      style="font-size: 12px; color: rgb(109, 62, 8);">/Day</span></p>
                </div>
                <p class="d-flex mb-0 d-block">
                  <a href="{{ route('carnotify', $car->id) }}" class="btn  py-2 px-3 mr-2" style="
        font-size: 14px; 
        background-color: rgb(110, 25, 14); 
        border: none;
        color: white;">Book now</a>
                  <a href="{{ route('carshow', $car->id) }}" class="btn py-2 px-3" style="
        font-size: 14px; 
        color:white;
        background-color: rgb(57, 37, 14); 
        border: none;">Details</a>
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<div class="animated-bike-section" style="position: relative; height: 60px;padding-top: 11px;padding-bottom: 15px; background-color: #FFF4E6; overflow: hidden;">
  <img
    src="assets/images/animatebike.gif"
    id="movingBike"
    alt="Moving Bike"
    class="animated-bike"
    style="
      position: absolute; 
      width: 80px; 
      height: auto; 
      transform: scaleX(-1); /* Mirror the GIF */
      animation: moveBike 5s linear infinite;
    ">
</div>

<section class="ftco-section" style="background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;
  padding: 3rem 0;">
  <div class="container">
    <div class="row justify-content-end align-items-center mb-4">
      <div class="col-auto">
        <a href="{{ route('bikes') }}" class="bike-btn d-flex align-items-center text-decoration-none p-2 rounded-pill border border-dark shadow-sm">
          <!-- Bike Icon Circle -->
          <div class="bike-icon d-flex align-items-center justify-content-center rounded-circle bg-gradient" style="width: 35px; height: 35px;"> <!-- Reduced from 45px -->
            <span class="fas fa-motorcycle" style="font-size: 30px;"></span> <!-- Reduced from 24px -->
          </div>
          <!-- Button Content -->
          <span class="bike-text ms-2 text-uppercase fw-light text-dark rounded py-1 px-2">VIEW ALL</span>
        </a>
      </div>
    </div>

    <!-- Carousel Section -->
    <div class="row">
      <div class="col-md-12 mt-4">
        <div class="carousel-car owl-carousel">
          @foreach ($bikes as $bike)
          <div class="item" data-aos="zoom-in-down" data-aos-duration="4000">
            <div class="car-wrap rounded ftco-animate" style="
        border: 1px solid #ddd; 
        border-radius: 10px; 
        overflow: hidden; 
        background-color: #FFF4E6; 
        transition: transform 0.3s ease, box-shadow 0.3s ease;">
              <!-- Bike Image -->
              <div class="img rounded d-flex align-items-end" style="
        background-image: url('data:image/jpeg;base64,{{ $bike->bike_image }}'); 
        background-size: cover; 
        background-position: center; 
        height: 200px;">
              </div>
              <!-- Bike Info -->
              <div class="text p-3" style="color: rgb(57, 37, 14);">
                <div class="d-flex mb-1">
                  <h2 class="mb-0">{{ $bike->bike_companyname }}</h2>
                  <p class=" price text-muted ml-auto">Starts from</p>
                </div>
                <div class="d-flex mb-3">
                  <span class="cat" style="font-size: 14px;">{{$bike->bike_brandname}}</span>
                  <p class=" price ml-auto" style="font-size: 16px; color: rgb(110, 25, 14);">
                    ₹{{$bike->base_price}}<span style="font-size: 12px; color: rgb(109, 62, 8);">/Day</span></p>
                </div>
                <p class="d-flex mb-0 d-block">
                  <a href="{{ route('bikenotify', $bike->id) }}" class="btn py-2 px-3 mr-2" style="
        font-size: 14px; 
        background-color: rgb(110, 25, 14); 
        border: none;
        color: white;">Book now</a>
                  <a href="{{ route('bikeshow', $bike->id) }}" class="btn py-2 px-3" style="
        font-size: 14px;
        color:white; 
        background-color: rgb(57, 37, 14); 
        border: none;">Details</a>
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-counter ftco-section img" id="section-counter" style="background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;
  padding: 3rem 0;">
  <div class="container mb-1">
    <div class="row ">
      <div class="col-md-6 col-lg-3  justify-content-center counter-wrap ftco-animate ">
        <div class="block-18"
          style="border: 1px solid rgb(110, 25, 14); border-radius: 10px; background-color: #FFF4E6; padding: 20px;">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="3" style="font-size: 40px; color: rgb(110, 25, 14);">0</strong>
            <span style="font-size: 18px; color: rgb(57, 37, 14);">Year <br>Experienced</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18"
          style="border: 1px solid rgb(110, 25, 14); border-radius: 10px; background-color: #FFF4E6; padding: 20px;">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="{{$fundamentals->total_travels}}"
              style="font-size: 40px; color: rgb(110, 25, 14);">0</strong>
            <span style="font-size: 18px; color: rgb(57, 37, 14);">Total <br>Travels</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18"
          style="border: 1px solid rgb(110, 25, 14); border-radius: 10px; background-color: #FFF4E6; padding: 20px;">
          <div class="text text-border d-flex align-items-center">
            <strong class="number" data-number="{{$fundamentals->happy_customers}}"
              style="font-size: 40px; color: rgb(110, 25, 14);">0</strong>
            <span style="font-size: 18px; color: rgb(57, 37, 14);">Happy <br>Customers</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
        <div class="block-18"
          style="border: 1px solid rgb(110, 25, 14); border-radius: 10px; background-color: #FFF4E6; padding: 20px;">
          <div class="text d-flex align-items-center">
            <strong class="number" data-number="{{$fundamentals->total_branches}}"
              style="font-size: 40px; color: rgb(110, 25, 14);">0</strong>
            <span style="font-size: 18px; color: rgb(57, 37, 14);">Total <br>Branches</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section py-5" style="background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;
  padding: 3rem 0;">
  <div class="container">
    <div class="row justify-content-center mb-2">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading" style="font-size: 18px; color: rgb(109, 62, 8); font-weight: bold;">BLOGS</span>
        <h2 class="mb-3" style="color: rgb(110, 25, 14); font-weight: bold;">Latest Updates</h2>
      </div>
    </div>
    <div class="row justify-content-center align-items-center mb-4">
      <div class="col-auto">
        <a href="{{ route('blogs') }}" class="bike-btn d-flex align-items-center text-decoration-none p-2 rounded-pill border border-dark shadow-sm">
          <!-- Bike Icon Circle -->
          <div class="bike-icon d-flex align-items-center justify-content-center rounded-circle bg-gradient" style="width: 35px; height: 35px;"> <!-- Reduced from 45px -->
            <span class="fas fa-camera" style="font-size: 30px;"></span> <!-- Reduced from 24px -->
          </div>
          <!-- Button Content -->
          <span class="bike-text ms-2 text-uppercase fw-light text-dark rounded py-1 px-2">VIEW ALL</span>
        </a>
      </div>
    </div>

    <!-- Blog Cards Row -->
    <div class="row mt-4">
      <div class="col-12">
        <div class="carousel-car owl-carousel ftco-owl">
          @foreach ($blogs as $blog)
          <div class="item p-2">
            <div class="card border-0 h-100 shadow-sm" data-aos="fade-up" data-aos-duration="4000">
              <!-- Blog Image -->
              <a href="{{ route('blogsshow', $blog->id) }}" class="text-decoration-none">
                <div class="position-relative">
                  <div style="
        background-image: url('data:image/jpeg;base64,{{ $blog->blog_image }}');
        background-size: cover;
        background-position: center;
        height: 280px;
        width: 100%;
        border-radius: 4px 4px 0 0;
        "></div>
                </div>
              </a>

              <!-- Blog Content -->
              <div class="card-body" style="background-color: #FFF4E6; border-radius: 0 0 4px 4px;">
                <div class="mb-3">
                  <!-- Date -->
                  <div class="text-start mb-2">
                    <span style="color: rgb(109, 62, 8); font-size: 14px;">
                      {{ \Carbon\Carbon::parse($blog->created_date)->format('F j, Y') }}
                    </span>
                  </div>

                  <!-- Title -->
                  <h5 class="card-title mb-0">
                    <a href="{{ route('blogsshow', $blog->id) }}" class="text-decoration-none"
                      style="color: rgb(110, 25, 14); font-size: 18px; font-weight: 600; line-height: 1.4;">
                      {{ $blog->blog_title }}
                    </a>
                  </h5>
                </div>

                <!-- Read More Button -->
                <div class="text-end mt-3">
                  <a href="{{ route('blogsshow', $blog->id) }}" class="btn btn-sm px-3 py-2"
                    style="background-color: rgb(57, 37, 14); color: white;">
                    Read More
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>





<section class="ftco-section testimony-section" style="background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;
  padding: 3rem 0;">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading" style="font-size: 18px; color: rgb(109, 62, 8); font-weight: bold;">Reviews</span>
        <h2 class="mb-3" style="color: rgb(110, 25, 14); font-weight: bold;">Happy Clients</h2>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl" data-aos="fade-up" data-aos-duration="4000">
          @foreach($reviews as $review)
          <div class="item">
            <div class="testimony-wrap rounded py-4 px-3"
              style="border: 1px solid #ddd;padding:20px; border-radius: 10px; overflow: hidden; background-color: #FFF4E6; height: 250px;">
              <div class="d-flex align-items-center mb-3">
                <!-- Profile Logo -->
                <div class="flex-shrink-0">
                  <!-- <img src="{{  asset('assets/images/visited_user.jpg') }}" alt="Profile Logo" class="img-fluid rounded-circle" style="width: 60px; height: 60px; object-fit: cover;"> -->
                  <span class="fa fa-user-circle fa-3x text-secondary"></span>
                </div>
                <!-- Name and Location -->
                <div class="ms-3">
                  <p class="name mb-0" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    {{ $review->name }}
                  </p>
                  <span class="position"
                    style="color: rgb(109, 62, 8); font-size: 0.9rem;">{{ $review->location }}</span>
                </div>
              </div>
              <!-- Ratings -->
              <div class="mb-3">
                <div class="ratings d-flex">
                  @for ($i = 1; $i <= 5; $i++)
                    <span class="fa fa-star {{ $i <= $review->ratings ? 'text-warning' : 'text-secondary' }} me-1"></span>
                    @endfor
                </div>
              </div>
              <!-- Review Details -->
              <div class="text" style="color: rgb(57, 37, 14);">
                <p style="font-size: 0.95rem; line-height: 1.5;">{{ $review->thoughts }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section" style="background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;
  padding: 3rem 0;">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-3 img img-2 d-flex justify-content-center align-items-center" style="
          background-image: url(assets/images/about.jpg); 
          background-size: cover; 
          background-position: center; 
          border-radius: 10px;">
      </div>
      <div class="col-md-6 wrap-about ftco-animate" style="padding: 2.5rem; border-radius: 10px;">
        <div class="heading-section heading-section-black pl-md-5">
          <span class="subheading" style="font-size: 18px; color:rgb(109, 62, 8); font-weight: bold;">About us</span>
          <h2 class="mb-6" style="color: rgb(110, 25, 14); font-weight: bold;">NAMMA VANDI</h2>
          <p style="color: rgb(57, 37, 14); font-size: 16px; line-height: 1.8;">
            Namma Vandi, a trusted name in car rentals, is your go-to choice for seamless travel across Udumalpet,
            Pollachi, and Tirupur. Founded in 2022 by S. Anush Ibrahim, we've grown rapidly, serving over 1500 satisfied
            customers with our fleet of meticulously maintained cars.
          </p>
          <p style="color: rgb(57, 37, 14); font-size: 16px; line-height: 1.8;">
            Experience the freedom of the road with our diverse range of vehicles, from compact city cars to spacious
            SUVs. Our commitment to punctuality and exceptional customer service sets us apart. With over 2500
            successful trips completed, we're your reliable partner for every journey.
          </p>
          <p>
            <a href="https://www.instagram.com/namma_vandi?igsh=b2dodHdseWFndDB1"
              class="btn d-flex justify-content-center  py-3 px-4" style="
              background-color: rgb(110, 25, 14); 
              color: #FFF; 
              border: none; 
              border-radius: 5px; 
              font-weight: bold; 
              transition: all 0.3s ease;">
              EXPLORE US
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


<footer class="ftco-footer ftco-section" style="background-color: rgb(57, 37, 14); color: #FFF4E6;">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">
            <a class="navbar-brand" href="index.html"
              style="color: rgb(110, 25, 14); text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);">
              <span style="color: #E87C1E; font-family: 'Cinzel', serif;">NAMMA</span>
              <span style="color: #FFF4E6; font-family: 'Cinzel', serif;">VANDI</span>
            </a>
          </h2>
          <p style="color: #FFF4E6;">Self-drive rental cars give travelers the freedom to explore at their own pace.
            Without relying on a driver, you can choose your routes, make impromptu stops, and enjoy complete control
            over your journey. Perfect for road trips and spontaneous adventures, these rentals offer flexibility and
            independence for a personalized travel experience.</p>
          <ul class="ftco-footer-social list-unstyled d-flex mt-5" style="gap: 20px;">
            <li class="ftco-animate">
              <a href="#"
                style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background-color: rgb(109, 62, 8);">
                <i class="fab fa-twitter" style="color: #FFF4E6; font-size: 18px;"></i>
              </a>
            </li>
            <li class="ftco-animate">
              <a href="#"
                style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background-color: rgb(109, 62, 8);">
                <i class="fab fa-facebook-f" style="color: #FFF4E6; font-size: 18px;"></i>
              </a>
            </li>
            <li class="ftco-animate">
              <a href="https://www.instagram.com/namma_vandi?igsh=b2dodHdseWFndDB1"
                style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background-color: rgb(109, 62, 8);">
                <i class="fab fa-instagram" style="color: #FFF4E6; font-size: 18px;"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2" style="color:#E87C1E;">Have a Question?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li class="d-flex mb-2">
                <i class="fas fa-map-marker-alt me-2"
                  style="color: #E87C1E; font-size: 15px; margin-top: 6px; flex-shrink: 0;"></i>
                <span class="text" style="color: #FFF4E6; line-height: 1.5;">Reliance Petrol Bunk, Express Avenue, ANUSH
                  CARS PRIVATE LIMITED, 60, Backside, Pollachi Main Rd, Udumalaipettai, Tamil Nadu-642126</span>
              </li>
              <li class="d-flex mb-2">
                <i class="fas fa-phone-alt me-2"
                  style="color: #E87C1E; font-size: 15px; margin-top: 6px; flex-shrink: 0;"></i>
                <a href="tel:+917373106161" style="color: #FFF4E6; line-height: 1.5;">+91 7373106161</a>
              </li>
              <li class="d-flex">
                <i class="fas fa-envelope me-2"
                  style="color: #E87C1E; font-size: 15px; margin-top: 6px; flex-shrink: 0;"></i>
                <a href="mailto:nammavandiii@gmail.com"
                  style="color: #FFF4E6; line-height: 1.5;">nammavandiii@gmail.com</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p style="color: #FFF4E6;">
          Copyright &copy;
          <script>
            document.write(new Date().getFullYear());
          </script> All rights reserved
        </p>
      </div>
    </div>
  </div>
</footer>




<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#E87C1E" />
  </svg></div>


<!-- Add Custom JavaScript to Hide Logo when Menu Opens and Close Menu on Outside Click -->
<script>
  const navbarToggler = document.getElementById('navbar-toggler');
  const navbarLogo = document.getElementById('navbar-logo');
  const navbarCollapse = document.getElementById('ftco-nav');

  // Toggle logo visibility when menu opens/closes
  navbarToggler.addEventListener('click', () => {
    if (navbarLogo.style.display === 'none') {
      navbarLogo.style.display = 'block'; // Show logo if menu is closed
    } else {
      navbarLogo.style.display = 'none'; // Hide logo when menu is opened
    }
  });

  // Close the menu when clicking outside of the navbar
  document.addEventListener('click', (event) => {
    const isClickInsideNavbar = navbarToggler.contains(event.target) || navbarCollapse.contains(event.target);

    if (!isClickInsideNavbar) {
      // Close the navbar if the click is outside
      if (navbarCollapse.classList.contains('show')) {
        navbarCollapse.classList.remove('show');
        navbarLogo.style.display = 'block'; // Show the logo again
      }
    }
  });
</script>
@if(session('success'))
<script>
  // Example: After form submission
  localStorage.setItem('storedData', 'Visit Recorded'); // Adjust as needed
  localStorage.setItem('storedDate', new Date().toISOString());
</script>
@endif
<script>
  function checkData() {
    const storedDate = localStorage.getItem('storedDate');

    // Check if storedDate is neither null nor the string "null"
    if (storedDate && storedDate !== "null") {
      console.log(localStorage.getItem('storedData'));
      const lastVisit = new Date(storedDate);
      const today = new Date();
      const diffInDays = Math.floor((today - lastVisit) / (1000 * 3600 * 24));

      if (diffInDays >= 10) {
        localStorage.removeItem('storedData');
        localStorage.removeItem('storedDate');
        window.location.href = "{{ route('visited.show') }}";
      }
    } else {
      window.location.href = "{{ route('visited.show') }}";
    }
  }

  setTimeout(checkData, 4000);
</script>
<script>
  function restartGif() {
    const bike = document.getElementById("movingBike");
    bike.src = bike.src.split("?")[0] + "?" + new Date().getTime();
  }

  setInterval(restartGif, 5000);
</script>

@endsection