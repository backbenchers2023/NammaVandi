@extends('layouts.app')

@section('content')

<div class="parallax-wrapper">
    <div class="overlay"></div>
    <img src="data:image/jpeg;base64,{{ $bike->bike_image }}" class="parallax-img" alt="Background">
</div>

<div class="paraent">
    <div class="container mt-5 mb-4">
        <h2 class="text-center mb-5" style="color: rgb(57, 37, 14) ; font-weight: bold; text-transform: uppercase;">
            Reserve Your Ride!</h2>
        <div class="row mb-4 align-items-center"
            style="background-color: #FFF4E6; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <!-- Left Column: Bike Image -->
            <div class="col-md-3 mb-3">
                <img src="data:image/jpeg;base64,{{ $bike->bike_image }}" alt="Bike Image"
                    class="img-fluid rounded shadow-lg" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);">
            </div>

            <!-- Right Column: Bike Details -->
            <div class="col-md-9 d-flex justify-content-between align-items-center">
                <!-- Left: Company and Brand Name -->
                <div>
                    <h4 class="mb-1 mt-4" style="color: rgb(110, 25, 14); font-weight: bold; font-size: 1.3rem;">
                        {{ $bike->bike_companyname }}
                    </h4>
                    <p style="color:  rgb(57, 37, 14); font-size: 1.2rem;">{{ $bike->bike_brandname }}</p>
                </div>

                <!-- Right: Price Info -->
                <div class="text-end">
                    <p style="margin: 0; font-size: 1rem; color:  rgb(57, 37, 14); font-weight: bold;">STARTS FROM</p>
                    <p style="margin: 0; font-size: 1.3rem; color: rgb(110, 25, 14); font-weight: bold;">
                        ₹{{ $bike->base_price }} <span style="font-size: 1rem; color: rgb(109, 62, 8);">/day</span></p>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Start of the form -->
        <form action="{{ route('bikenotifystore') }}" method="POST" class="bg-light p-4 rounded-lg shadow-lg"
            style="border: 2px solid rgb(57, 37, 14); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);"
            id="bike-booking-form">
            @csrf
            <input type="hidden" id="bike_id" name="bike_id" value="{{ $bike->id }}" readonly>
            <!-- Changed to bike_id -->

            <!-- Customer Name -->
            <div class="mb-4">
                <label for="customer_name" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-person"></i> Customer Name
                </label>
                <input type="text" id="customer_name" name="customer_name" class="form-control rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone_number" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-telephone"></i> Phone Number
                </label>
                <input type="tel" id="phone_number" name="phone_number" class="form-control rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
            </div>

            <!-- Package Type Selection -->
            <div class="mb-4">
                <label for="package_type" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-box"></i> Package Type
                </label>
                <select id="package_type" name="package_type" class="form-select rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px; padding:17px;" required
                    onchange="togglePackageOptions()">
                    <option value="" selected disabled>Select Package</option>
                    @foreach($packageDetails['selected_types'] ?? [] as $type)
                    <option value="{{ $type }}">{{ ucfirst($type) }} Hours</option>
                    @endforeach
                </select>
            </div>

            <!-- Package Details (Dynamic) -->
            <div id="package-details" class="mb-4">
                @foreach (['12hrs', '24hrs'] as $type)
                @if(in_array($type, $packageDetails['selected_types'] ?? []))
                <div id="{{ $type }}" style="display: none;">
                    <div class="row">
                        @foreach ($packageDetails[$type]['kms'] ?? [] as $index => $kms)
                        <div class="col-md-4 mb-3">
                            <div class="border p-3 rounded">
                                <label for="{{ $type }}_package_{{ $kms }}" class="d-block font-weight-bold"
                                    style="color: rgb(57, 37, 14);">
                                    {{ $kms }} kms for ₹{{ $packageDetails[$type]['rates'][$index] }}
                                </label>
                                <input type="radio" id="{{ $type }}_package_{{ $kms }}" name="package_detail"
                                    value="{{ $kms }} kms for ₹{{ $packageDetails[$type]['rates'][$index] }}"
                                    class="form-check-input">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @endforeach

                <!-- More Than One Day Option -->
                <div id="More than One Day" style="display:none;">
                    <div class="form-group border p-3 rounded">
                        <label for="more_than_one_day" class="d-block font-weight-bold" style="color: rgb(57, 37, 14);">
                            More than one day
                        </label>
                        <input type="number" id="more_than_one_day" name="package_detail" class="form-control"
                            placeholder="Enter number of days" min="1" step="1"
                            style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;">
                    </div>
                </div>
            </div>


            <!-- Pickup Date -->
            <div class="mb-4">
                <label for="pickup_date" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-calendar-event"></i> Pickup Date
                </label>
                <input type="date" id="pickup_date" name="pickup_date" class="form-control rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
                <div class="d-flex gap-4 mt-2 align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="legend-box booked-date-box"></div>
                        <small style="color: rgb(110, 25, 14);">Booked Dates</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="legend-box service-date-box"></div>
                        <small style="color: rgb(110, 25, 14);">Service Dates</small>
                    </div>
                </div>
            </div>

            <!-- Drop Date -->
            <div class="mb-4">
                <label for="drop_date" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                    <i class="bi bi-calendar-event"></i> Drop Date
                </label>
                <input type="date" id="drop_date" name="drop_date" class="form-control rounded"
                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
                <div id="drop-date-error" class="text-danger mt-2" style="display: none;">Please select the pickup date
                    first.</div>
                <div class="d-flex gap-4 mt-2 align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="legend-box booked-date-box"></div>
                        <small style="color: rgb(110, 25, 14);">Booked Dates</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="legend-box service-date-box"></div>
                        <small style="color: rgb(110, 25, 14);">Service Dates</small>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn w-100 py-2 mt-4"
                style="background-color: rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; text-transform: uppercase; border-radius: 10px;">Submit</button>
        </form>

    </div>

    <!-- Bike Booking Modal -->
    <div class="modal fade" id="bikeBookingModal" tabindex="-1" aria-labelledby="bikeBookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bikeBookingModalLabel"
                        style="font-weight: bold; color:  rgb(57, 37, 14);">
                        Booking Completed
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" style="padding: 30px;">
                    <!-- Tick Mark -->
                    <div id="tick-icon" class="tick-icon"
                        style="font-size: 80px; color: #28a745; display: none; margin-bottom: 20px;">
                        <i class="bi bi-check-circle"></i>
                    </div>

                    <!-- Static Success Message -->
                    <h4 style="font-size: 1.25rem; color: #333; font-weight: bold; margin-bottom: 15px;">
                        Your bike booking has been completed successfully.
                    </h4>

                    <p style="font-size: 1rem; color: #555; margin-bottom: 20px;">
                        Thank you for choosing us! Our officer will contact you shortly at the phone number you
                        provided.
                    </p>

                    <p style="font-size: 1rem; color: #555;">
                        If you do not receive a call within a few hours, please feel free to contact us directly at our
                        helpline.
                    </p>

                    <p style="margin-top: 20px; font-size: 1.125rem; color: #28a745; font-weight: bold;">
                        Thank you for your patience!
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="closeBikeModalBtn">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const packageTypeDropdown = document.getElementById('package_type');
            const bikeBookingForm = document.getElementById('bike-booking-form');
            const packageDetailsContainer = document.getElementById('package-details');
            const loadingOverlay = document.getElementById("loading-overlay");

            function togglePackageOptions() {
                const selectedType = packageTypeDropdown.value;

                console.log(packageTypeDropdown.value);

                // Hide all package sections
                document.querySelectorAll("#package-details > div").forEach(div => div.style.display = 'none');

                // Show selected package section
                if (selectedType) {
                    document.getElementById(selectedType).style.display = 'block';
                }
            }

            if (packageTypeDropdown) {
                packageTypeDropdown.addEventListener("change", togglePackageOptions);
            }

            if (bikeBookingForm) {
                bikeBookingForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const selectedPackageType = packageTypeDropdown.value;
                    let packageDetail = '';
                    console.log("aaa", packageTypeDropdown.value);

                    // Handling selection based on package type
                    if (selectedPackageType === '12hrs' || selectedPackageType === '24hrs') {
                        const selectedPackage = document.querySelector('input[name="package_detail"]:checked');
                        if (selectedPackage) {
                            packageDetail = selectedPackage.value;
                        }
                    } else if (selectedPackageType === 'More than One Day') {
                        const moreThanOneDayValue = document.getElementById('more_than_one_day').value;
                        console.log("aaa", moreThanOneDayValue);
                        if (moreThanOneDayValue) {
                            packageDetail = `${moreThanOneDayValue} days`;
                        }
                    }

                    if (!packageDetail) {
                        alert("Please select or enter a valid package detail.");
                        return;
                    }
                    console.log("111");

                    // Show loading overlay when the form is being submitted
                    loadingOverlay.style.visibility = "visible";

                    // Prepare form data
                    const formData = new FormData(bikeBookingForm);
                    console.log("1133");
                    formData.set('package_detail', packageDetail); // Replace existing package detail
                    console.log("113");
                    // Fetch CSRF token
                    const csrfToken = document.querySelector('input[name="_token"]').value;
                    console.log("112");
                    // Submit the form using Fetch API
                    fetch(bikeBookingForm.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Show success tick icon
                                const tickIcon = document.getElementById('tick-icon');
                                if (tickIcon) tickIcon.style.display = 'block';

                                // Show success modal if available
                                if (typeof $ !== 'undefined' && $('#bikeBookingModal').length) {
                                    $('#bikeBookingModal').modal('show');
                                } else {
                                    alert('Booking completed successfully!');
                                }

                                // Reset form after submission
                                bikeBookingForm.reset();

                                // Hide all package details
                                document.querySelectorAll("#package-details > div").forEach(div => div.style.display = 'none');
                            } else if (data.errors) {
                                alert(Object.values(data.errors).flat().join('\n'));
                            } else {
                                alert("Something went wrong. Please try again.");
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("Network error. Please try again.");
                        })
                        .finally(() => {
                            // Hide the loading overlay after form submission is complete (success or failure)
                            loadingOverlay.style.visibility = "hidden";
                        });
                });
            }

            // Handle modal close and redirection
            $('#bikeBookingModal').on('hidden.bs.modal', function() {
                window.location.href = "{{ route('bikes') }}";
            });

            // Close modal and redirect
            const closeBikeModalBtn = document.getElementById('closeBikeModalBtn');
            if (closeBikeModalBtn) {
                closeBikeModalBtn.addEventListener('click', function() {
                    window.location.href = "{{ route('bikes') }}";
                });
            }

            // Show loading overlay when the page is fully loaded
            window.onload = function() {
                loadingOverlay.style.visibility = "hidden";
            };

            // Browser reload
            window.addEventListener("beforeunload", function() {
                loadingOverlay.style.visibility = "visible";
            });
        });
    </script>





    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        // Ensure both booked and service dates are passed as arrays
        let disabledDates = <?php echo json_encode($bookedDates); ?>;
        let serviceDates = <?php echo json_encode($serviceDates); ?>;

        if (!Array.isArray(serviceDates)) {
            serviceDates = Object.values(serviceDates); // Or Array.from(serviceDates);
        }

        let isPickupDateSelected = false;

        // Function to check if there are any booked dates or service dates between two dates
        function hasUnavailableDatesBetween(startDate, endDate) {
            const start = new Date(startDate);
            const end = new Date(endDate);

            // Check for booked dates
            const hasBookedDates = disabledDates.some(disabledDate => {
                const disabled = new Date(disabledDate);
                return disabled >= start && disabled <= end;
            });

            // Check for service dates
            const hasServiceDates = serviceDates.some(serviceDate => {
                const service = new Date(serviceDate);
                return service >= start && service <= end;
            });

            return {
                hasBookedDates,
                hasServiceDates,
            };
        }

        function customizeDayElement(date, element) {
            const dateString = flatpickr.formatDate(date, "Y-m-d");

            // Reset styles first to maintain consistency
            element.classList.remove("booked-date", "service-date");

            // Check if the date is in bookedDates (booked dates)
            if (disabledDates.includes(dateString)) {
                element.classList.add("booked-date"); // Red for booked dates
            }

            // Check if the date is in serviceDates (service dates)
            if (serviceDates.includes(dateString)) {
                element.classList.add("service-date"); // Blue for service dates
            }
        }


        // Initialize Flatpickr for Pickup Date
        const pickupDatePicker = flatpickr("#pickup_date", {
            dateFormat: "Y-m-d",
            disable: disabledDates.length > 0 || serviceDates.length > 0 ? [...disabledDates, ...serviceDates] : ["9999-12-31"],
            minDate: "today",
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                customizeDayElement(dayElem.dateObj, dayElem);
            },
            onChange: function(selectedDates, dateStr) {
                isPickupDateSelected = !!dateStr;
                const dropDatePicker = document.getElementById("drop_date")._flatpickr;

                if (dropDatePicker) {
                    dropDatePicker.set("minDate", dateStr);
                    document.getElementById("drop-date-error").style.display = "none";

                    // Clear drop date when pickup date changes
                    dropDatePicker.clear();

                    const selectedDate = new Date(dateStr);
                    const currentDate = new Date();

                    if (currentDate.getMonth() === 11 && selectedDate.getMonth() === 0) {
                        dropDatePicker.setDate(new Date(selectedDate.getFullYear(), 0, 1));
                    }
                }
            }
        });

        // Initialize Flatpickr for Drop Date
        flatpickr("#drop_date", {
            dateFormat: "Y-m-d",
            disable: disabledDates.length > 0 || serviceDates.length > 0 ? [...disabledDates, ...serviceDates] : ["9999-12-31"],
            minDate: "today",
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                customizeDayElement(dayElem.dateObj, dayElem);
            },
            onOpen: function() {
                if (!isPickupDateSelected) {
                    document.getElementById("drop-date-error").style.display = "block";
                    this.close();
                }
            },
            onChange: function(selectedDates, dateStr) {
                if (dateStr && pickupDatePicker.selectedDates[0]) {
                    const pickupDate = pickupDatePicker.selectedDates[0];
                    const dropDate = selectedDates[0];

                    const dateCheck = hasUnavailableDatesBetween(pickupDate, dropDate);

                    if (dateCheck.hasBookedDates || dateCheck.hasServiceDates) {
                        this.clear();
                        let errorMessage = "Cannot select this date - ";
                        if (dateCheck.hasBookedDates && dateCheck.hasServiceDates) {
                            errorMessage += "there are booked dates and service dates in between";
                        } else if (dateCheck.hasBookedDates) {
                            errorMessage += "there are booked dates in between";
                        } else {
                            errorMessage += "there are service dates in between";
                        }
                        document.getElementById("drop-date-error").textContent = errorMessage;
                        document.getElementById("drop-date-error").style.display = "block";
                    } else {
                        document.getElementById("drop-date-error").style.display = "none";
                    }
                }
            }

        });
        // Close the calendar when clicking outside the datepicker
        document.addEventListener('click', function(event) {
            // Check if the click is outside the datepickers
            if (!pickupDatePicker.calendarContainer.contains(event.target) && !document.getElementById('pickup_date').contains(event.target)) {
                pickupDatePicker.close();
            }
            if (!dropDatePicker.calendarContainer.contains(event.target) && !document.getElementById('drop_date').contains(event.target)) {
                dropDatePicker.close();
            }
        });
    </script>
</div>
@endsection