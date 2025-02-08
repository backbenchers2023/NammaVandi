<!DOCTYPE html>
<html lang="en">

<head>
    <title>NAMMA VANDI RENTAL SERVICE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/images/logo.png" type="image/png" style="width: 100px; height: 100px;">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">

    <link href="https://example.com/CloneWarsFont.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Add Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">


    <!-- CSS Libraries -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Google Maps Async Load -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false" async
        defer></script>
</head>

<body>

    <div id="loading-overlay" class="loading-overlay" style="visibility: hidden;">
        <img src="{{ asset('assets/videos/loading.gif') }}" alt="Loading..." class="loading-image">
    </div>

    @yield('content') <!-- Content will be injected here -->


    <!-- JS Libraries -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('assets/js/google-map.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const loadingOverlay = document.getElementById("loading-overlay");

            // Show loading overlay when any form is submitted
            document.querySelectorAll("form").forEach(form => {
                form.addEventListener("submit", function () {
                    loadingOverlay.style.visibility = "visible";
                });
            });

            // Show loading overlay for AJAX requests (for Laravel apps using jQuery)
            $(document).ajaxStart(function () {
                loadingOverlay.style.visibility = "visible";
            });

            $(document).ajaxStop(function () {
                loadingOverlay.style.visibility = "hidden";
            });

            // // Show loading when clicking any button or link
            // document.querySelectorAll("button, a").forEach(element => {
            //     element.addEventListener("click", function() {
            //         loadingOverlay.style.visibility = "visible";
            //     });
            // });

            // Hide loading overlay when page is fully loaded
            window.onload = function () {
                loadingOverlay.style.visibility = "hidden";
            };

            // Browser reload
            window.addEventListener("beforeunload", function () {
                document.getElementById("loading-overlay").style.visibility = "visible";
            });

            // Show loading overlay when a filter is applied
            document.querySelectorAll(".filter-button, .filter-select").forEach(element => {
                element.addEventListener("change", function () {
                    loadingOverlay.style.visibility = "visible";

                    // Simulating data fetch delay
                    setTimeout(function () {
                        // Hide the loading overlay after data is fetched (simulated)
                        loadingOverlay.style.visibility = "hidden";
                    }, 6000); // Adjust this to match your data-fetching duration
                });
            });
            // Ensure overlay doesn't persist after navigating back in history (e.g., swipe back)
            window.addEventListener("pageshow", function (event) {
                // Check if page was loaded from cache (this happens during navigation back)
                if (event.persisted) {
                    loadingOverlay.style.visibility = "hidden"; // Hide overlay if coming from cache
                }
            });

            // Hide loading overlay in case of browser history navigation (back or forward)
            window.addEventListener("popstate", function () {
                loadingOverlay.style.visibility = "hidden"; // Hide overlay when navigating back
            });
        });
    </script>


</body>

</html>