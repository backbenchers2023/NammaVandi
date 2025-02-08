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
		<div class="container">
			<div class="row justify-content-between align-items-center mb-5">
				<!-- Heading Section -->
				<div class="col-auto text-left text-md-center heading-section ftco-animate">
					<h2 class="font-weight-bold" style="color: rgb(57, 37, 14);">OUR CARS</h2>
				</div>

				<!-- Filters Section -->
				<div class="col-md-4">
					<div class="filter-box d-flex align-items-center shadow-sm rounded text-white p-2"
						style="background-color: rgb(57, 37, 14);">
						<label for="seaterFilter" class="mr-3 mb-0 font-weight-bold text-white">Filter:</label>
						<select class="form-control border-0 shadow-none filter-select" id="seaterFilter"
							onchange="applyFilters()">
							<option value="all" selected>All</option>
							<option value="5-seater">5-seater</option>
							<option value="7-seater">7-seater</option>
						</select>
					</div>
				</div>

			</div>
		</div>

		<div class="row" id="cars-container" data-aos="fade-up" data-aos-duration="4000">
			@foreach ($cars as $car)
			<div class="col-md-4">
				<div class="car-wrap rounded ftco-animate" style="
						border: 1px solid #ddd; 
						border-radius: 10px; 
						overflow: hidden; 
						background-color:#FFF4E6;  
						transition: transform 0.3s ease, box-shadow 0.3s ease;">

					<!-- Car Image -->
					<div class="img rounded d-flex align-items-end" style="
							background-image: url('data:image/jpeg;base64,{{ $car->car_image }}'); 
							background-size: cover; 
							background-position: center; 
							height: 200px; 
							filter: brightness(95%);">
					</div>

					<!-- Car Info -->
					<div class="text p-3" style="color:  rgb(57, 37, 14);">
						<!-- Car Name and Price Info -->
						<div class="d-flex justify-content-between align-items-center mb-2">
							<h2 class="mb-0" style="font-size: 18px; font-weight: bold;">{{ $car->car_companyname }}
							</h2>
							<p class="price text-muted" style="font-size: 12px;">Starts from</p>
						</div>

						<!-- Brand and Base Price -->
						<div class="d-flex justify-content-between align-items-center mb-3">
							<span class="cat" style="font-size: 14px;">{{$car->car_brandname}}</span>
							<p class="price" style="font-size: 16px; color: rgb(110, 25, 14);">
								₹{{$car->base_price}}<span style="font-size: 12px; color: rgb(109, 62, 8);">/Day</span>
							</p>
						</div>

						<!-- Buttons -->
						<p class="d-flex mb-0 d-block">
							<a href="{{ route('carnotify', $car->id) }}" class="btn py-2 px-3 mr-2" style="
									font-size: 14px; 
									background-color:rgb(110, 25, 14); color:white;
									border: none;">Book now</a>
							<a href="{{ route('carshow', $car->id) }}" class="btn  py-2 px-3" style="
									font-size: 14px; 
									background-color:  rgb(57, 37, 14); color:white;
									border: none;">Details</a>
						</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<script>
	function applyFilters() {
		const type = document.getElementById("seaterFilter").value;
		console.log(`Fetching cars with type: ${type}`);

		fetch(`filter-cars?type=${encodeURIComponent(type)}`)
			.then(response => response.json())
			.then(data => {
				console.log('Filtered cars data:', data);
				displayCars(data);
			})
			.catch(error => console.error('Error fetching cars:', error.message));
	}

	function displayCars(cars) {
		const carsContainer = document.getElementById("cars-container");

		if (!cars || cars.length === 0) {
			carsContainer.innerHTML = '<div class="col-12 text-center"><p>No cars available for the selected type.</p></div>';
			return;
		}

		carsContainer.innerHTML = '';

		cars.forEach(car => {
			const carElement = `
        <div class="col-md-4">
            <div class="car-wrap rounded" style="
                border: 1px solid #ddd; 
                border-radius: 10px; 
                overflow: hidden; 
                background-color: #FFF4E6; 
                transition: transform 0.3s ease, box-shadow 0.3s ease;">
                
                <!-- Car Image -->
                <div class="img rounded d-flex align-items-end" style="
                    background-image: url('data:image/jpeg;base64,${car.car_image}'); 
                    background-size: cover; 
                    background-position: center; 
                    height: 200px; 
                    filter: brightness(95%);">
                </div>
                
                <!-- Car Info -->
                <div class="text p-3" style="color:  rgb(57, 37, 14);">
                    <!-- Car Name and Price Info -->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h2 class="mb-0" style="font-size: 18px; font-weight: bold;">${car.car_companyname}</h2>
                        <p class="price text-muted" style="font-size: 12px;">Starts from</p>
                    </div>

                    <!-- Brand and Base Price -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="cat" style="font-size: 14px;">${car.car_brandname}</span>
                        <p class="price" style="font-size: 16px; color: rgb(110, 25, 14);">₹${car.base_price}<span style="font-size: 12px; color: rgb(109, 62, 8);">/Day</span></p>
                    </div>

                    <!-- Buttons -->
                    <p class="d-flex mb-0 d-block">
							<a href="{{ route('carnotify', $car->id) }}" class="btn py-2 px-3 mr-2" style="
                    font-size: 14px; 
                    background-color: rgb(110, 25, 14); color:white;
                    border: none;">Book now</a>
							<a href="{{ route('carshow', $car->id) }}" class="btn py-2 px-3" style="
                    font-size: 14px; 
                    background-color:  rgb(57, 37, 14); color:white;
                    border: none;">Details</a>
						</p>
                </div>
            </div>
        </div>
    `;
			carsContainer.innerHTML += carElement;
		});

	}
</script>


@endsection