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
                        <h2 style="font-size: 28px; color:  rgb(57, 37, 14); font-weight: bold;">{{ $blog->blog_title }}
                        </h2>
                        <span class="subheading"
                            style="font-size: 16px; color: rgb(109, 62, 8);">{{ $blog->blog_created_date }}</span>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('adminblogs.edit', $blog->id) }}" class="btn py-3 px-5 me-2"
                            style="background-color:  rgb(57, 37, 14);color:white">EDIT </a>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <form action="{{ route('adminblogs.destroy', $blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn py-3 px-5"
                                style="background-color: rgb(110, 25, 14); color:white">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Modal for Full Image View -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body text-center">
                        <img src="data:image/jpeg;base64,{{ $blog->blog_image }}" class="img-fluid" alt="Blog Image">
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
                <div class="blog-description"
                    style="background: linear-gradient(145deg, #f8f9fa, #e2e2e2); padding: 30px; border-radius: 10px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);">
                    <p style="font-size: 1.2rem; color: #555; line-height: 1.8; font-family: 'Arial', sans-serif;">
                        {{ $blog->blog_description }}
                    </p>
                </div>

                <!-- Optional: Add a separator to further break content -->
                <div class="separator" style="height: 2px; background-color: #ccc; margin: 30px 0;"></div>
            </div>
        </div>
    </section>





    @endsection