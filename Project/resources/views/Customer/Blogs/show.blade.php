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
                <!-- Left Column: Blog Image -->
                <div class="col-md-6 text-center mb-4 mb-md-0">
                    <a href="#" data-toggle="modal" data-target="#imageModal">
                        <img src="data:image/jpeg;base64,{{ $blog->blog_image }}" alt="Blog Image"
                            class="img-fluid rounded shadow" style="max-height: 400px; width: 100%; object-fit: cover;">
                    </a>
                </div>
                <!-- Right Column: Blog Details -->
                <div class="col-md-6">
                    <div class="blog-content text-md-start text-center">
                        <div class="text mb-4">
                            <h2 style="font-size: 28px; color:  rgb(57, 37, 14); font-weight: bold;">
                                {{ $blog->blog_title }}
                            </h2>
                            <span class="subheading"
                                style="font-size: 16px; color: rgb(109, 62, 8);">{{ $blog->blog_created_date }}</span>
                        </div>
                        <!-- Instagram Button -->
                        <div class="mt-3">
                            <a href="{{ $blog->blog_link }}" class="btn btn-danger"
                                style="padding: 10px 20px; font-size: 16px; text-transform: uppercase; border-radius: 5px; background-color: rgb(110, 25, 14); color: white; text-decoration: none;">
                                View on Instagram
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Modal for Full Image View -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <img src="data:image/jpeg;base64,{{ $blog->blog_image }}" class="img-fluid"
                                alt="Blog Image">
                        </div>
                        <div class="modal-header d-flex justify-content-center">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"
                                style="border-radius: 5px; padding: 5px 10px;">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mt-5">
            <!-- Blog Description with Heading and Enhanced Design -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Heading -->
                    <h2 class="text-center mb-4"
                        style="font-size: 2.5rem; font-weight: bold; color:  rgb(57, 37, 14); text-transform: uppercase; letter-spacing: 2px;">
                        INFORMATION
                    </h2>

                    <!-- Description -->
                    <div class="blog-description "
                        style="background: linear-gradient(145deg, #f8f9fa, #e2e2e2); padding: 30px;border:1px solid black; border-radius: 10px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);">
                        <p style="font-size: 1.2rem; color: #555; line-height: 1.8; font-family: 'Arial', sans-serif;">
                            {{ $blog->blog_description }}
                        </p>
                    </div>

                    <!-- Optional: Add a separator to further break content -->
                    <div class="separator" style="height: 2px; background-color: #ccc; margin: 30px 0;"></div>
                </div>
            </div>
        </section>

        @if($recentBlogs->isNotEmpty())
        <section class="ftco-section ftco-no-pt">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                        <span class="subheading" style="color: rgb(110, 25, 14);">Choose Blog</span>
                        <h2 class="mb-2" style="color:  rgb(57, 37, 14);">Recent Blog</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($recentBlogs as $blog)
                    <div class="col-md-4 d-flex ftco-animate mb-4">
                        <div class="blog-entry card shadow-sm" style="height: 100%;">
                            <!-- Blog Image -->
                            <a href="{{ route('blogsshow', $blog->id) }}" class="block-20 card-img-top"
                                style="background-image: url('data:image/jpeg;base64,{{ $blog->blog_image }}'); background-size: cover; background-position: center; height: 200px;">
                            </a>

                            <!-- Blog Content -->
                            <div class="card-body d-flex flex-column justify-content-center"
                                style="background-color:  #FFF4E6; ">
                                <div class="mb-2">
                                    <!-- Blog Title -->
                                    <h5 class="card-title">
                                        <a href="{{ route('blogsshow', $blog->id) }}"
                                            class="text-bold d-flex justify-content-start"
                                            style="font-size: 16px; color:  #FF8C00;">
                                            {{ $blog->blog_title }}
                                        </a>
                                    </h5>

                                    <!-- Blog Date -->
                                    <div class="meta mb-2 d-flex justify-content-start"
                                        style="font-size: 16px; color: rgb(109, 62, 8);">
                                        {{ \Carbon\Carbon::parse($blog->created_date)->format('F j, Y') }}
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="mt-0 d-flex justify-content-end">
                                    <a href="{{ route('blogsshow', $blog->id) }}" class="btn btn-secondary p-2  btn-sm"
                                        style="background-color:  rgb(57, 37, 14); ">
                                        Read More
                                    </a>
                                </div>
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