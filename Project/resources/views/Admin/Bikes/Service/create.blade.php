@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-4">
    <h2 class="text-center mb-5" style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">Service a Bike</h2>
    <div class="row mb-4 align-items-center" style="background-color: #FFF4E6; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <!-- Left Column: Bike Image -->
        <div class="col-md-3 mb-3">
            <img src="data:image/jpeg;base64,{{ $bike->bike_image }}" alt="Bike Image" class="img-fluid rounded shadow-lg" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);">
        </div>

        <!-- Right Column: Bike Details -->
        <div class="col-md-9 d-flex justify-content-between align-items-center">
            <!-- Left: Company and Brand Name -->
            <div>
                <h4 class="mb-1 mt-4" style="color: rgb(110, 25, 14); font-weight: bold; font-size: 1.3rem;">{{ $bike->bike_companyname }}</h4>
                <p style="color:  rgb(57, 37, 14); font-size: 1.2rem;">{{ $bike->bike_brandname }}</p>
            </div>

            <!-- Right: Price Info -->
            <div class="text-end">
                <p style="margin: 0; font-size: 1rem; color:  rgb(57, 37, 14); font-weight: bold;">STARTS FROM</p>
                <p style="margin: 0; font-size: 1.3rem; color: rgb(110, 25, 14); font-weight: bold;">₹{{ $bike->base_price }} <span style="font-size: 1rem; color: rgb(109, 62, 8);">/day</span></p>
            </div>
        </div>
    </div>

    <!-- Start of the form -->
    <form action="{{ route('bikeservicestore') }}" method="POST" class="bg-light p-4 rounded-lg shadow-lg" style="border: 2px solid rgb(57, 37, 14); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);" id="bike-booking-form">
        @csrf
        <input type="hidden" id="bike_id" name="bike_id" value="{{ $bike->id }}" readonly> <!-- Changed to bike_id -->

        <!-- Pickup Date -->
        <div class="mb-4">
            <label for="pickup_date" style="color: rgb(57, 37, 14); font-weight: bold; font-size: 1rem;">
                <i class="bi bi-calendar-event"></i> Pickup Date
            </label>
            <input type="date" id="pickup_date" name="pickup_date" class="form-control rounded" style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
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
            <input type="date" id="drop_date" name="drop_date" class="form-control rounded" style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;" required>
            <div id="drop-date-error" class="text-danger mt-2" style="display: none;">Please select the pickup date first.</div>
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
        <button type="submit" class="btn w-100 py-2 mt-4" style="background-color: rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; text-transform: uppercase; border-radius: 10px;">Submit</button>
    </form>
</div>

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

    // Function to customize date appearance
    function customizeDayElement(date, element) {
        const dateString = flatpickr.formatDate(date, "Y-m-d");

        // Check if date is in bookedDates (booked dates)
        if (disabledDates.includes(dateString)) {
            element.classList.add('booked-date'); // Red for booked dates
        }

        // Check if date is in serviceDates (service dates)
        if (serviceDates.includes(dateString)) {
            element.classList.add('service-date'); // Blue for service dates
        }
    }

    // Initialize Flatpickr for Pickup Date
    const pickupDatePicker = flatpickr("#pickup_date", {
        dateFormat: "Y-m-d",
        disable: disabledDates,
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
        disable: disabledDates,
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

@endsection