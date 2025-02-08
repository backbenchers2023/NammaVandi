@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="form-container p-4 rounded shadow-lg"
        style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        <h1 class="text-center mb-4" style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">Add
            New Bike</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('adminbikes.store') }}">
            @csrf

            <!-- Bike Company Name -->
            <div class="mb-4">
                <label for="bike_companyname" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-building"></i> Bike Company Name
                </label>
                <input type="text" class="form-control rounded @error('bike_companyname') is-invalid @enderror"
                    id="bike_companyname" name="bike_companyname" placeholder="Enter Bike Company Name"
                    value="{{ old('bike_companyname') }}"
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;" required>
                @error('bike_companyname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bike Brand Name -->
            <div class="mb-4">
                <label for="bike_brandname" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-tag"></i> Bike Brand Name
                </label>
                <input type="text" class="form-control rounded @error('bike_brandname') is-invalid @enderror"
                    id="bike_brandname" name="bike_brandname" placeholder="Enter Bike Brand Name"
                    value="{{ old('bike_brandname') }}" style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;"
                    required>
                @error('bike_brandname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bike Type -->
            <div class="mb-4">
                <label for="bike_type" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-bicycle"></i> Bike Type
                </label>
                <select class="form-select rounded @error('bike_type') is-invalid @enderror" id="bike_type"
                    name="bike_type" style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;" required>
                    <option value="Scooty" {{ old('bike_type') == 'Scooty' ? 'selected' : '' }}>Scooty</option>
                    <option value="Gear" {{ old('bike_type') == 'Gear' ? 'selected' : '' }}>Gear</option>
                </select>
                @error('bike_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bike Model -->
            <div class="mb-4">
                <label for="bike_model" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-speedometer"></i> Bike Model
                </label>
                <input type="text" class="form-control rounded @error('bike_model') is-invalid @enderror"
                    id="bike_model" name="bike_model" placeholder="Enter Bike Model" value="{{ old('bike_model') }}"
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;" required>
                @error('bike_model')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Transmission -->
            <div class="mb-4">
                <label for="transmission" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-gear"></i> Transmission
                </label>
                <select class="form-select rounded @error('transmission') is-invalid @enderror" id="transmission"
                    name="transmission" style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;" required>
                    <option value="Gear" {{ old('transmission') == 'Gear' ? 'selected' : '' }}>Gear</option>
                    <option value="Non-Gear" {{ old('transmission') == 'Non-Gear' ? 'selected' : '' }}>Non-Gear</option>
                </select>
                @error('transmission')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Base Price -->
            <div class="mb-4">
                <label for="base_price" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-currency-rupee"></i> Base Price
                </label>
                <input type="text" class="form-control rounded @error('base_price') is-invalid @enderror"
                    id="base_price" name="base_price" placeholder="Enter Base Price" value="{{ old('base_price') }}"
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;" required>
                @error('base_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fuel -->
            <div class="mb-4">
                <label for="fuel" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-fuel-pump"></i> Fuel
                </label>
                <input type="text" class="form-control rounded @error('fuel') is-invalid @enderror" id="fuel"
                    name="fuel" placeholder="Enter Fuel Type" value="{{ old('fuel') }}"
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;" required>
                @error('fuel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Full Bike Image -->
            <div class="mb-4">
                <label for="bike_image" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-image"></i> Full Bike Image
                </label>
                <input type="file" class="form-control rounded @error('bike_image') is-invalid @enderror"
                    name="bike_image" accept="image/*" style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;"
                    required>
                @error('bike_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pricing Image -->
            <div class="mb-4">
                <label for="pricing_image" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-tag"></i> Pricing Image
                </label>
                <input type="file" class="form-control rounded @error('pricing_image') is-invalid @enderror"
                    name="pricing_image" accept="image/*"
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('pricing_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Feature Images -->
            <div class="mb-4">
                <label for="feature_images" style="color:  rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-images"></i> Feature Images
                </label>
                <input type="file" class="form-control rounded @error('feature_images.*') is-invalid @enderror"
                    name="feature_images[]" accept="image/*" multiple
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('feature_images.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Package Type Selection -->
            <div class="mb-4  rounded ">
                <label class="d-block mb-3" style="color: rgb(57, 37, 14); font-weight: bold;">
                    <i class="bi bi-box-seam"></i> Select Package Type
                </label>

                <div class="d-flex justify-content-around flex-wrap gap-3">
                    <!-- 12 Hrs Package -->
                    <div class="form-check form-check-inline p-3 rounded border shadow-sm package-selection"
                        style="background: #fff; border: 2px solid rgb(57, 37, 14); cursor: pointer; transition: 0.3s;">
                        <input class="form-check-input package-checkbox" type="checkbox" id="package_12hrs"
                            name="package_type[]" value="12hrs">
                        <label class="form-check-label fw-bold" for="package_12hrs" style="color: rgb(57, 37, 14);">
                            <i class="bi bi-clock-history"></i> 12 Hrs
                        </label>
                    </div>

                    <!-- 24 Hrs Package -->
                    <div class="form-check form-check-inline p-3 rounded border shadow-sm package-selection"
                        style="background: #fff; border: 2px solid rgb(57, 37, 14); cursor: pointer; transition: 0.3s;">
                        <input class="form-check-input package-checkbox" type="checkbox" id="package_24hrs"
                            name="package_type[]" value="24hrs">
                        <label class="form-check-label fw-bold" for="package_24hrs" style="color: rgb(57, 37, 14);">
                            <i class="bi bi-clock"></i> 24 Hrs
                        </label>
                    </div>

                    <!-- More than One Day Package -->
                    <div class="form-check form-check-inline p-3 rounded border shadow-sm package-selection"
                        style="background: #fff; border: 2px solid rgb(57, 37, 14); cursor: pointer; transition: 0.3s;">
                        <input class="form-check-input" type="checkbox" id="package_more" name="package_type[]"
                            value="More than One Day">
                        <label class="form-check-label fw-bold" for="package_more" style="color: rgb(57, 37, 14);">
                            <i class="bi bi-calendar-check"></i> More than One Day
                        </label>
                    </div>
                </div>
            </div>

            <!-- 12 Hrs Package Details -->
            <div id="package_12hrs_details" class="package-details mb-4" style="display: none;">
                <label style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">12 Hrs Package</label>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" name="package_12hrs_kms"
                        placeholder="Enter KMs (comma-separated)">
                    <input type="text" class="form-control" name="package_12hrs_rates"
                        placeholder="Enter Rates (comma-separated)">
                </div>
            </div>

            <!-- 24 Hrs Package Details -->
            <div id="package_24hrs_details" class="package-details mb-4" style="display: none;">
                <label style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">24 Hrs Package</label>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control" name="package_24hrs_kms"
                        placeholder="Enter KMs (comma-separated)">
                    <input type="text" class="form-control" name="package_24hrs_rates"
                        placeholder="Enter Rates (comma-separated)">
                </div>
            </div>




            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn w-50"
                    style="background-color:  rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; text-transform: uppercase; border-radius: 10px;">Add
                    Bike</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Show/Hide package input fields based on selection
        document.querySelectorAll(".package-checkbox").forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                const targetId = "#package_" + this.value + "_details";
                if (this.checked) {
                    document.querySelector(targetId).style.display = "block";
                } else {
                    document.querySelector(targetId).style.display = "none";
                }
            });
        });
    });

</script>

@endsection