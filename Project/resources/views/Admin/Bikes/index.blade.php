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
<section class="ftco-section" style="background-color: #f5f5f5; padding: 50px 0;">
	<!-- Background updated for consistency -->
	<div class="container">
		<!-- Header Section -->
		<div class="row justify-content-between align-items-center mb-5">
			<!-- Add Bike Button -->
			<div class="col-md-6 text-center text-md-left">
				<a href="{{ route('adminbikes.create') }}" class="btn" style="
					background-color:  rgb(57, 37, 14); 
					color: #FFF; 
					font-weight: bold; 
					padding: 10px 20px; 
					border-radius: 10px; 
					text-transform: uppercase;">
					<i class="fas fa-plus mr-2"></i> Add Bike
				</a>
			</div>

			<!-- Filter Dropdown -->
			<div class="col-md-4">
				<div class="filter-box d-flex align-items-center shadow-sm rounded p-2" style="
					background-color: #FFF; 
					border: 2px solid  rgb(57, 37, 14);">
					<label for="typeFilter" class="mb-0 font-weight-bold me-2"
						style="color:  rgb(57, 37, 14);">Filter:</label>
					<select class="form-control border-0 shadow-none filter-select" id="typeFilter" style="
						background-color: transparent; 
						color:  rgb(57, 37, 14);" onchange="applyFilters()">
						<option value="all" selected>All</option>
						<option value="Gear">Bikes</option>
						<option value="Scooty">Scooty</option>
					</select>
				</div>
			</div>
		</div>

		<!-- Bikes Grid -->
		<div class="row" id="bikes-container">
			@foreach ($bikes as $bike)
					<div class="col-md-4 mb-4">
						<div class="bike-wrap rounded shadow-lg" style="
				background-color: #FFF4E6; 
				border: 2px solid rgb(110, 25, 14); 
				overflow: hidden;">
							<!-- Bike Image -->
							<div class="img d-flex align-items-end" style="
					background-image: url('data:image/jpeg;base64,{{ $bike->bike_image }}'); 
					height: 200px; 
					background-size: cover; 
					background-position: center;">
							</div>

							<!-- Bike Details -->
							<div class="p-3" style="color:  rgb(57, 37, 14);">
								<!-- Company Name and Starts From -->
								<div class="d-flex justify-content-between align-items-center">
									<h2 class="mb-0" style="font-size: 18px; font-weight: bold;">{{ $bike->bike_companyname }}
									</h2>
									<p class="price text-dark" style="font-size: 14px;">Starts from</p>
								</div>

								<!-- Brand and Base Price -->
								<div class="d-flex justify-content-between align-items-center mb-1">
									<span class="cat" style="font-size: 14px;">{{ $bike->bike_brandname }}</span>
									<p class="price" style="font-size: 16px; color: rgb(110, 25, 14);">
										₹{{ $bike->base_price }}<span
											style="font-size: 12px; color: rgb(109, 62, 8);">/Day</span></p>
								</div>

								<!-- Details Button -->
								<p class="text-center">
									<a href="{{ route('adminbikes.show', $bike->id) }}" class="btn" style="
							background-color:  rgb(57, 37, 14); 
							color: #FFF; 
							padding: 10px 20px; 
							border-radius: 10px; 
							font-weight: bold; 
							text-transform: uppercase;">
										Details
									</a>
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
		const type = document.getElementById("typeFilter").value;
		console.log(`Fetching bikes with type: ${type}`);

		fetch(`/admin/112233/filter-bikes?type=${encodeURIComponent(type)}`)
			.then(response => response.json())
			.then(data => {
				console.log('Filtered bikes data:', data);
				displayBikes(data);
			})
			.catch(error => console.error('Error fetching bikes:', error.message));
	}


	function displayBikes(bikes) {
		const bikesContainer = document.getElementById("bikes-container");

		if (!bikes || bikes.length === 0) {
			bikesContainer.innerHTML = '<div class="col-12 text-center"><p>No bikes available for the selected type.</p></div>';
			return;
		}

		bikesContainer.innerHTML = '';

		bikes.forEach(bike => {
			const bikeElement = `
    <div class="col-md-4 mb-4">
        <div class="bike-wrap rounded shadow-lg" style="background-color: #FFF4E6; border: 2px solid rgb(110, 25, 14); overflow: hidden;">
            <!-- Bike Image -->
            <div class="img d-flex align-items-end" style="background-image: url('data:image/jpeg;base64,${bike.bike_image}'); height: 200px; background-size: cover; background-position: center; filter: brightness(95%);">
            </div>
            
            <!-- Bike Details -->
            <div class="text p-3" style="color:  rgb(57, 37, 14);">
                <!-- Company Name and Starts From -->
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0" style="font-size: 18px; font-weight: bold;">${bike.bike_companyname}</h2>
                    <p class="price text-muted" style="font-size: 14px;">Starts from</p>
                </div>

                <!-- Brand and Base Price -->
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="cat" style="font-size: 14px;">${bike.bike_brandname}</span>
                    <p class="price" style="font-size: 16px; color: rgb(110, 25, 14);">₹${bike.base_price} <span style="font-size: 12px; color: rgb(109, 62, 8);">/day</span></p>
                </div>

                <!-- Details Button -->
                <p class="text-center">
                    <a href="bikes/${bike.id}" class="btn rounded-pill"style="
                    background-color:  rgb(57, 37, 14); 
                    color: #FFF; 
                    padding: 10px 20px; 
                    border-radius: 1px; 
                    font-weight: bold; 
                    text-transform: uppercase;">
                        Details
                    </a>
                </p>
            </div>
        </div>
    </div>
    `;
			bikesContainer.innerHTML += bikeElement;
		});

	}
</script>
@endsection