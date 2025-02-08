@extends('layouts.app')

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

    <section class="ftco-section" style="background: url('assets/images/bgtexture.jpg') no-repeat center center; 
  background-size: cover;
  background-attachment: fixed;">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading" style="color:  rgb(57, 37, 14);">Blog</span>
                    <h2 class="font-weight-bold" style="color:  rgb(57, 37, 14);">Recent Blog</h2>
                </div>
            </div>

            <div class="row">
                @foreach ($blogs as $blog)
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

</div>
@endsection