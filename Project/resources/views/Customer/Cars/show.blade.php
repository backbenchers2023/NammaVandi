@extends('layouts.app') <!-- Replace with your layout -->

@section('content')

<div class="paraent">
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
	<section style="position: relative; overflow: hidden;">
		<img src="{{ asset('assets/images/bgtexture.jpg') }}" alt="Background Image"
			style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; 
               object-fit: cover; z-index: -1;">

		<section class="container pt-5">
			<div class="row align-items-center"
				style="background-color: #FFF4E6; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
				<!-- Left Column: Car Image -->
				<div class="col-md-6 text-center mb-4 mb-md-0">
					<img src="data:image/jpeg;base64,{{ $car->car_image }}" alt="Car Image"
						style="width: 100%; max-width: 400px; height: auto; border-radius: 10px; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);">
				</div>

				<!-- Right Column: Car Details -->
				<div class="col-md-6">
					<!-- Car Name and Price Info -->
					<div
						class="availability-content d-flex justify-content-between align-items-center text-md-start text-center mb-3">
						<!-- Car Name -->
						<div class="text-left">
							<span
								style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 14px;">{{ $car->car_companyname }}</span>
							<h2 style="color: rgb(110, 25, 14); font-size: 24px; font-weight: bold;">
								{{ $car->car_brandname }}
							</h2>
						</div>

						<!-- Price Info -->
						<div class="availability-status text-end">
							<p style="margin: 0; font-size: 14px; color:  rgb(57, 37, 14);">STARTS FROM</p>
							<p style="margin: 0; font-size: 20px; font-weight: bold; color: rgb(110, 25, 14);">
								₹{{ $car->base_price }} <span
									style="font-size: 14px; color: rgb(109, 62, 8);">/day</span></p>
						</div>
					</div>

					<!-- Button -->
					<div class="d-flex justify-content-center mt-4">
						<a href="{{ route('carnotify', $car->id) }}"
							class="btn"
							style="background-color:  rgb(57, 37, 14); color: #FFF; font-size: 16px; padding: 10px 20px; border-radius: 5px; text-transform: uppercase; text-decoration: none; font-weight: bold; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
							Book Now
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section pt-5 pb-5"> <!-- Section 3 -->
			<div class="container pt-5">
				<!-- Heading for Car Pricing -->
				<div class="row justify-content-center mb-4">
					<div class="col-md-12 text-center">
						<h2 class="font-weight-bold"
							style="color:  rgb(57, 37, 14); font-size: 36px; text-transform: uppercase; letter-spacing: 2px;">
							Pricing Images</h2>
					</div>
				</div>

				<!-- New Layout for Car Image and Availability -->
				<div class="row align-items-center">
					<!-- Left Column: Car Pricing -->
					<div class="col-md-6 text-center mb-4 mb-md-0">
						<!-- Clickable Image -->
						<img src="data:image/jpeg;base64,{{ $car->pricing_image }}" alt="Car Image"
							class="img-fluid rounded shadow car-image"
							style="width: 100%; height: auto; object-fit: cover;" data-bs-toggle="modal"
							data-bs-target="#imageModal">
					</div>

					<!-- Right Column: Car Image (Clickable) -->
					<div class="col-md-6 text-center mb-4 mb-md-0">
						<!-- Clickable Image -->
						<img src="data:image/jpeg;base64,{{ $fundamentals->car_pricing_image }}" alt="Car Image"
							class="img-fluid rounded shadow car-image"
							style="width: 100%; height: auto; object-fit: cover;" data-bs-toggle="modal"
							data-bs-target="#proofimage">
					</div>
				</div>
			</div>
		</section>

		<!-- Modal for Full Image View -->
		<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<div class="modal-body">
						<!-- Image in Modal -->
						<img src="data:image/jpeg;base64,{{ $car->pricing_image }}" alt="Car Image" class="img-fluid">
					</div>
					<div class="modal-header d-flex justify-content-center">
						<!-- Custom Close Button -->
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
							style="border-radius: 5px; padding: 5px 10px;">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal for Full Image View (Second Image) -->
		<div class="modal fade" id="proofimage" tabindex="-1" aria-labelledby="imageModal2Label" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body  d-flex justify-content-center">
						<!-- Image in Modal -->
						<img src="data:image/jpeg;base64,{{ $fundamentals->car_pricing_image }}" alt="Car Image"
							class="img-fluid">
					</div>
					<div class="modal-header d-flex justify-content-center">
						<!-- Custom Close Button -->
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
							style="border-radius: 5px; padding: 5px 10px;">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>

		<section class="ftco-section ftco-car-details"> <!-- Section 1 -->
			<div class="container">
				<!-- Section Title -->
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="car-details text-center">
							<div class="row justify-content-center mb-4">
								<div class="col-md-12 text-center">
									<h2 class="font-weight-bold"
										style="color:  rgb(57, 37, 14); font-size: 36px; text-transform: uppercase; letter-spacing: 2px;">
										Car Images</h2>
									<p class="text-muted"
										style="font-size: 20px; color: rgb(109, 62, 8); font-style: normal;">Explore Our
										Stunning Images of Our <span
											class="text-uppercase bold text-dark">{{$car->car_brandname}}</span></p>
								</div>
							</div>

							<!-- Centered Thumbnail Gallery -->
							<div class="d-flex justify-content-center flex-wrap">
								@foreach($carImages as $index => $image)
								<div class="gallery-item me-2 mb-3 ">
									<img src="data:image/jpeg;base64,{{ $image }}"
										class="img-thumbnail gallery-thumbnail border-dark" alt="Car Image {{$index + 1}}"
										data-bs-toggle="modal" data-bs-target="#imageModal{{$index}}">
								</div>

								<!-- Modal for Viewing Image -->
								<div class="modal fade" id="imageModal{{$index}}" tabindex="-1"
									aria-labelledby="imageModalLabel{{$index}}" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">

											<div class="modal-body">
												<img src="data:image/jpeg;base64,{{ $image }}" class="img-fluid rounded"
													alt="Car Image {{$index + 1}}">
											</div>
											<div class="modal-header d-flex justify-content-center">
												<!-- Custom Close Button -->
												<button type="button" class="btn btn-danger" data-bs-dismiss="modal"
													aria-label="Close" style="border-radius: 5px; padding: 5px 10px;">
													Close
												</button>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section pt-4 pb-4"> <!-- Section 2 -->
			<div class="container">
				<!-- Heading for Features Section -->
				<div class="row justify-content-center mb-4">
					<div class="col-md-12 text-center">
						<h2 class="font-weight-bold"
							style="color:  rgb(57, 37, 14); font-size: 36px; text-transform: uppercase; letter-spacing: 2px;">
							Car Features</h2>
						<p class="text-muted" style="font-size: 20px; color: rgb(109, 62, 8); font-style: normal;">
							Explore the key features of <span
								class="text-uppercase bold text-dark">{{$car->car_brandname}}</span></p>
					</div>
				</div>

				<div class="row text-center">
					<!-- Transmission -->
					<div class="col-md-3 col-sm-6 mb-3">
						<div class="card border-dark shadow-sm">
							<div class="card-body">
								<div class="d-flex justify-content-center mb-3">
									<div
										class="icon d-flex align-items-center justify-content-center bg-warning text-white rounded-circle p-3">
										<span class="fa fa-cogs" style="font-size: 24px;"></span>
									</div>
								</div>
								<h5 class="card-title font-weight-bold mb-0 text-dark">Transmission</h5>
								<p class="card-text text-muted">{{$car->transmission}}</p>
							</div>
						</div>
					</div>

					<!-- Seating -->
					<div class="col-md-3 col-sm-6 mb-3">
						<div class="card border-dark shadow-sm">
							<div class="card-body">
								<div class="d-flex justify-content-center mb-3">
									<div
										class="icon d-flex align-items-center justify-content-center bg-warning text-white rounded-circle p-3">
										<span class="fa fa-chair" style="font-size: 24px;"></span>
									</div>
								</div>
								<h5 class="card-title font-weight-bold mb-0 text-dark">Seating</h5>
								<p class="card-text text-muted">{{$car->car_type}}</p>
							</div>
						</div>
					</div>

					<!-- Model -->
					<div class="col-md-3 col-sm-6 mb-3">
						<div class="card border-dark shadow-sm">
							<div class="card-body">
								<div class="d-flex justify-content-center mb-3">
									<div
										class="icon d-flex align-items-center justify-content-center bg-warning text-white rounded-circle p-3">
										<span class="fa fa-car" style="font-size: 24px;"></span>
									</div>
								</div>
								<h5 class="card-title font-weight-bold mb-0 text-dark">Model</h5>
								<p class="card-text text-muted">{{$car->car_model}}</p>
							</div>
						</div>
					</div>

					<!-- Fuel -->
					<div class="col-md-3 col-sm-6 mb-3">
						<div class="card border-dark shadow-sm">
							<div class="card-body">
								<div class="d-flex justify-content-center mb-3">
									<div
										class="icon d-flex align-items-center justify-content-center bg-warning text-white rounded-circle p-3">
										<span class="fa fa-tint" style="font-size: 24px;"></span>
									</div>
								</div>
								<h5 class="card-title font-weight-bold mb-0 text-dark">Fuel</h5>
								<p class="card-text text-muted">{{$car->fuel}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		@if($relatedCars->isNotEmpty())
		<section class="ftco-section pt-4 pb-4"> <!-- Related Cars Section -->
			<div class="container">
				<div class="row justify-content-center mb-4">
					<div class="col-md-12 text-center">
						<h2 class="font-weight-bold"
							style="color:  rgb(57, 37, 14); font-size: 36px; text-transform: uppercase; letter-spacing: 2px;">
							RELATED CARS</h2>
						<p class="text-muted" style="font-size: 20px; color: rgb(109, 62, 8); font-style: normal;">
							Choose our wide range of cars wisely</p>
					</div>
				</div>
				<div class="row">
					@foreach ($relatedCars as $car)
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
									<h2 class="mb-0" style="font-size: 18px; font-weight: bold;">
										{{ $car->car_companyname }}
									</h2>
									<p class="price text-muted" style="font-size: 12px;">Starts from</p>
								</div>

								<!-- Brand and Base Price -->
								<div class="d-flex justify-content-between align-items-center mb-3">
									<span class="cat" style="font-size: 14px;">{{$car->car_brandname}}</span>
									<p class="price" style="font-size: 16px; color: rgb(110, 25, 14);">
										₹{{$car->base_price}}<span
											style="font-size: 12px; color: rgb(109, 62, 8);">/Day</span></p>
								</div>

								<!-- Buttons -->
								<p class="d-flex mb-0 d-block">
									<a href="{{ route('carnotify', $car->id) }}" class="btn py-2 px-3 mr-2" style="
										font-size: 14px; 
										background-color: rgb(110, 25, 14); color:white;
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
		@endif
	</section>


	<!-- Bootstrap Modal JS Script -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</div>
@endsection