@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="form-container p-4 border rounded shadow"
        style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        <h1 class="text-center mb-4" style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">Edit
            Bike</h1>

        <form method="POST" action="{{ route('adminbikes.update', $bike->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Bike Company Name -->
            <div class="mb-4">
                <label for="bike_companyname" style="color:  rgb(57, 37, 14); font-weight: bold;">Bike Company
                    Name</label>
                <input type="text" class="form-control @error('bike_companyname') is-invalid @enderror"
                    id="bike_companyname" name="bike_companyname"
                    value="{{ old('bike_companyname', $bike->bike_companyname) }}" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('bike_companyname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bike Brand Name -->
            <div class="mb-4">
                <label for="bike_brandname" style="color:  rgb(57, 37, 14); font-weight: bold;">Bike Brand Name</label>
                <input type="text" class="form-control @error('bike_brandname') is-invalid @enderror"
                    id="bike_brandname" name="bike_brandname" value="{{ old('bike_brandname', $bike->bike_brandname) }}"
                    required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('bike_brandname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bike Type -->
            <div class="mb-4">
                <label for="bike_type" style="color:  rgb(57, 37, 14); font-weight: bold;">Bike Type</label>
                <input type="text" class="form-control @error('bike_type') is-invalid @enderror" id="bike_type"
                    name="bike_type" value="{{ old('bike_type', $bike->bike_type) }}" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('bike_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Transmission -->
            <div class="mb-4">
                <label for="transmission" style="color:  rgb(57, 37, 14); font-weight: bold;">Transmission</label>
                <select class="form-select @error('transmission') is-invalid @enderror" id="transmission"
                    name="transmission" required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                    <option value="Manual" {{ old('transmission', $bike->transmission) == 'Manual' ? 'selected' : '' }}>
                        Manual</option>
                    <option value="Automatic" {{ old('transmission', $bike->transmission) == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                </select>
                @error('transmission')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bike Model -->
            <div class="mb-4">
                <label for="bike_model" style="color:  rgb(57, 37, 14); font-weight: bold;">Bike Model</label>
                <input type="text" class="form-control @error('bike_model') is-invalid @enderror" id="bike_model"
                    name="bike_model" value="{{ old('bike_model', $bike->bike_model) }}" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('bike_model')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fuel Type -->
            <div class="mb-4">
                <label for="fuel" style="color:  rgb(57, 37, 14); font-weight: bold;">Fuel Type</label>
                <input type="text" class="form-control @error('fuel') is-invalid @enderror" id="fuel" name="fuel"
                    placeholder="Enter Fuel Type" value="{{ old('fuel', $bike->fuel) }}"
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;" required>
                @error('fuel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!-- Base Price -->
            <div class="mb-4">
                <label for="base_price" style="color:  rgb(57, 37, 14); font-weight: bold;">Base Price</label>
                <input type="number" class="form-control @error('base_price') is-invalid @enderror" id="base_price"
                    name="base_price" value="{{ old('base_price', $bike->base_price) }}" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('base_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bike Image -->
            <div class="mb-4">
                <label for="bike_image" style="color:  rgb(57, 37, 14); font-weight: bold;">Bike Image</label>
                <input type="file" class="form-control @error('bike_image') is-invalid @enderror" name="bike_image"
                    accept="image/*">
                @error('bike_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if ($bike->bike_image)
                    <div class="mt-3">
                        <h6>Current Bike Image:</h6>
                        <img src="data:image/jpeg;base64,{{ $bike->bike_image }}" alt="Bike Image" class="img-fluid rounded"
                            width="150">
                    </div>
                @endif
            </div>

            <!-- Pricing Image -->
            <div class="mb-4">
                <label for="pricing_image" style="color:  rgb(57, 37, 14); font-weight: bold;">Pricing Image</label>
                <input type="file" class="form-control @error('pricing_image') is-invalid @enderror"
                    name="pricing_image" accept="image/*">
                @error('pricing_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if ($bike->pricing_image)
                    <div class="mt-3">
                        <h6>Current Pricing Image:</h6>
                        <img src="data:image/jpeg;base64,{{ $bike->pricing_image }}" alt="Pricing Image"
                            class="img-fluid rounded" width="150">
                    </div>
                @endif
            </div>

            <!-- Feature Images -->
            <div class="mt-4">
                <label for="feature_images" style="color:  rgb(57, 37, 14); font-weight: bold;">Add New Feature
                    Images</label>
                <input type="file" class="form-control @error('feature_images') is-invalid @enderror"
                    name="feature_images[]" accept="image/*" multiple>
                @error('feature_images')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="feature-images-section mt-4 p-4 rounded border bg-light"
                style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <h5 class="text-center text-success mb-4" style="font-size: 1.25rem; font-weight: bold;">Current Feature
                    Images</h5>

                @php
                    $featureImages = json_decode($bike->bikeDetails->bike_images);
                @endphp

                @if (count($featureImages) > 0)
                    <div class="row g-4">
                        @foreach ($featureImages as $image)
                            <div class="col-md-3 text-center">
                                <div class="image-card border rounded p-2 shadow-sm bg-white"
                                    style="transition: transform 0.3s ease;">
                                    <img src="data:image/jpeg;base64,{{ $image }}" alt="Feature Image" class="img-fluid rounded"
                                        style="height: 150px; object-fit: cover;">
                                    <div class="mt-3">
                                        <input type="checkbox" name="delete_feature_images[]" value="{{ $image }}"
                                            id="delete_feature_image_{{ $loop->index }}" class="form-check-input">
                                        <label class="text-danger small" for="delete_feature_image_{{ $loop->index }}"
                                            style="cursor: pointer;">Delete this image</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-warning" style="font-size: 1rem;">No feature images available.</p>
                @endif
            </div>

            <!-- Package Type Selection -->
            <div class="mb-4 rounded">
                <label class="d-block mb-3" style="color: rgb(57, 37, 14); font-weight: bold;">
                    <i class="bi bi-box-seam"></i> Select Package Type
                </label>

                <div class="d-flex justify-content-around flex-wrap gap-3">
                    <!-- 12 Hrs Package -->
                    <div class="form-check form-check-inline p-3 rounded border shadow-sm package-selection"
                        style="background: #fff; border: 2px solid rgb(57, 37, 14); cursor: pointer; transition: 0.3s;">
                        <input class="form-check-input package-checkbox" type="checkbox" id="package_12hrs"
                            name="package_type[]" value="12hrs" {{ in_array('12hrs', old('package_type', json_decode($bike->package_details)->selected_types ?? [])) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="package_12hrs" style="color: rgb(57, 37, 14);">
                            <i class="bi bi-clock-history"></i> 12 Hrs
                        </label>
                    </div>

                    <!-- 24 Hrs Package -->
                    <div class="form-check form-check-inline p-3 rounded border shadow-sm package-selection"
                        style="background: #fff; border: 2px solid rgb(57, 37, 14); cursor: pointer; transition: 0.3s;">
                        <input class="form-check-input package-checkbox" type="checkbox" id="package_24hrs"
                            name="package_type[]" value="24hrs" {{ in_array('24hrs', old('package_type', json_decode($bike->package_details)->selected_types ?? [])) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="package_24hrs" style="color: rgb(57, 37, 14);">
                            <i class="bi bi-clock"></i> 24 Hrs
                        </label>
                    </div>

                    <!-- More than One Day Package -->
                    <div class="form-check form-check-inline p-3 rounded border shadow-sm package-selection"
                        style="background: #fff; border: 2px solid rgb(57, 37, 14); cursor: pointer; transition: 0.3s;">
                        <input class="form-check-input" type="checkbox" id="package_more" name="package_type[]"
                            value="More than One Day" {{ in_array('More than One Day', old('package_type', json_decode($bike->package_details)->selected_types ?? [])) ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="package_more" style="color: rgb(57, 37, 14);">
                            <i class="bi bi-calendar-check"></i> More than One Day
                        </label>
                    </div>
                </div>
            </div>

            <!-- 12 Hrs Package Details -->
            <div id="package_12hrs_details"
                class="package-details mb-4 {{ in_array('12hrs', old('package_type', json_decode($bike->package_details)->selected_types ?? [])) ? 'd-block' : 'd-none' }}">
                <label style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">12 Hrs Package</label>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" name="package_12hrs_kms"
                        placeholder="Enter KMs (comma-separated)"
                        value="{{ old('package_12hrs_kms', implode(',', json_decode($bike->package_details)->{'12hrs'}->kms ?? [])) }}">
                    <input type="text" class="form-control" name="package_12hrs_rates"
                        placeholder="Enter Rates (comma-separated)"
                        value="{{ old('package_12hrs_rates', implode(',', json_decode($bike->package_details)->{'12hrs'}->rates ?? [])) }}">
                </div>
            </div>

            <!-- 24 Hrs Package Details -->
            <div id="package_24hrs_details"
                class="package-details mb-4 {{ in_array('24hrs', old('package_type', json_decode($bike->package_details)->selected_types ?? [])) ? 'd-block' : 'd-none' }}">
                <label style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">24 Hrs Package</label>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" name="package_24hrs_kms"
                        placeholder="Enter KMs (comma-separated)"
                        value="{{ old('package_24hrs_kms', implode(',', json_decode($bike->package_details)->{'24hrs'}->kms ?? [])) }}">
                    <input type="text" class="form-control" name="package_24hrs_rates"
                        placeholder="Enter Rates (comma-separated)"
                        value="{{ old('package_24hrs_rates', implode(',', json_decode($bike->package_details)->{'24hrs'}->rates ?? [])) }}">
                </div>
            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-success">Update Bike</button>
            </div>
        </form>
    </div>
</div>

@endsection