@extends('layouts.app') <!-- Replace with your layout -->

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

<section style="background-color: #f5f5f5;">
	<section class="container pt-5">
		<div class="row align-items-center"
			style="background-color: #FFF4E6; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
			<!-- Left Column: Car Image -->
			<div class="col-md-6 text-center mb-4 mb-md-0">
				<img src="data:image/jpeg;base64,{{ $car->car_image }}" alt="Car Image" width="350" height="200"
					class="img-fluid rounded shadow-lg">
			</div>

			<!-- Right Column: Car Name and Availability in the Same Line -->
			<div class="col-md-6">
				<div
					class="availability-content d-flex justify-content-between align-items-center text-md-start text-center mb-3">
					<div class="text-left">
						<span
							style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 14px;">{{ $car->car_companyname }}</span>
						<h2 style="color: rgb(110, 25, 14); font-size: 24px; font-weight: bold;">
							{{ $car->car_brandname }}
						</h2>
					</div>

					<div class="availability-status text-end">
						<p style="margin: 0; font-size: 14px; color:  rgb(57, 37, 14);">STARTS FROM</p>
						<p style="margin: 0; font-size: 20px; font-weight: bold; color: rgb(110, 25, 14);">
							₹{{ $car->base_price }} <span style="font-size: 14px; color: rgb(109, 62, 8);">/day</span>
						</p>
					</div>
				</div>

				<!-- Buttons Section -->
				<div class="d-flex justify-content-center mt-4">
					<a href="{{ route('admincars.edit', $car->id) }}" class="btn"
						style="background-color:  rgb(57, 37, 14); color: #FFF; font-size: 16px; padding: 10px 40px; border-radius: 10px; text-transform: uppercase; text-decoration: none; font-weight: bold; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">
						EDIT
					</a>
				</div>
				<div class="d-flex justify-content-center mt-4">
					<form action="{{ route('admincars.destroy', $car->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn"
							style="background-color: rgb(110, 25, 14); color: #FFF; font-size: 16px; padding: 10px 30px; border-radius: 10px; text-transform: uppercase; font-weight: bold;">
							DELETE
						</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</section>

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
							<p class="text-muted" style="font-size: 20px; color: rgb(109, 62, 8); font-style: normal;">
								Explore Our Stunning Images of Our <span
									class="text-uppercase bold text-dark">{{$car->car_brandname}}</span></p>
						</div>
					</div>

					<!-- Centered Thumbnail Gallery -->
					<div class="d-flex justify-content-center flex-wrap">
						@foreach($carImages as $index => $image)
							<div class="gallery-item me-2 mb-3">
								<img src="data:image/jpeg;base64,{{ $image }}" class="img-thumbnail gallery-thumbnail"
									alt="Car Image {{$index + 1}}" data-bs-toggle="modal"
									data-bs-target="#imageModal{{$index}}">
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
				<p class="text-muted" style="font-size: 20px; color: rgb(109, 62, 8); font-style: normal;">Explore the
					key features of <span class="text-uppercase bold text-dark">{{$car->car_brandname}}</span></p>
			</div>
		</div>

		<div class="row text-center">
			<!-- Transmission -->
			<div class="col-md-3 col-sm-6 mb-3">
				<div class="card border-light shadow-sm">
					<div class="card-body">
						<div class="d-flex justify-content-center mb-3">
							<div class="icon d-flex align-items-center justify-content-center rounded-circle p-3">
								<span class="fa fa-cogs"></span>
							</div>

						</div>
						<h5 class="card-title font-weight-bold mb-0 text-dark">Transmission</h5>
						<p class="card-text text-muted">{{$car->transmission}}</p>
					</div>
				</div>
			</div>

			<!-- Seating -->
			<div class="col-md-3 col-sm-6 mb-3">
				<div class="card border-light shadow-sm">
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
				<div class="card border-light shadow-sm">
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
				<div class="card border-light shadow-sm">
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

<section class="ftco-section pt-5 pb-5"> <!-- Section 3 -->
	<div class="container mt-5 pt-5">
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
					class="img-fluid rounded shadow car-image" style="width: 100%; height: 400px; object-fit: cover;"
					data-bs-toggle="modal" data-bs-target="#imageModal">
			</div>

			<!-- Right Column: Car Image (Clickable) -->
			<div class="col-md-6 text-center mb-4 mb-md-0">
				<!-- Clickable Image -->
				<img src="data:image/jpeg;base64,{{ $fundamentals->car_pricing_image }}" alt="Car Image"
					class="img-fluid rounded shadow car-image" style="width: 100%; height: 400px; object-fit: cover;"
					data-bs-toggle="modal" data-bs-target="#proofimage">
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

<!-- Bootstrap Modal JS Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection