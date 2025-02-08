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

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-between align-items-center mb-5">
            <!-- Heading Section on Left -->
            <div class="col-md-7 text-md-left text-center heading-section ftco-animate">
                <h2 class="font-weight-bold" style="color:  rgb(57, 37, 14);">BLOGS</h2>
            </div>

            <!-- Button Section on Right -->
            <div class="col-md-3 text-center text-md-right mb-4">
                <a href="{{ route('adminblogs.create') }}"
                    class="btn shadow-sm d-flex align-items-center justify-content-center"
                    style="background-color: rgb(57, 37, 14) ;color:#FFF">
                    <i class="fas fa-plus mr-2"></i> Add Blogs
                </a>
            </div>
        </div>

        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 d-flex ftco-animate mb-4">
                    <div class="blog-entry card shadow-sm" style="height: 100%;">
                        <!-- Blog Image -->
                        <a href="{{ route('adminblogs.show', $blog->id) }}" class="block-20 card-img-top"
                            style="background-image: url('data:image/jpeg;base64,{{ $blog->blog_image }}'); background-size: cover; background-position: center; height: 200px;">
                        </a>

                        <!-- Blog Content -->
                        <div class="card-body d-flex flex-column justify-content-center"
                            style="background-color:  #FFF4E6; ">
                            <div class="mb-2">
                                <!-- Blog Title -->
                                <h5 class="card-title">
                                    <a href="{{ route('adminblogs.show', $blog->id) }}"
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
                                <a href="{{ route('adminblogs.show', $blog->id) }}" class="btn btn-secondary p-2  btn-sm"
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

@endsection