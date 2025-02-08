@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <!-- Blog Form Container -->
    <div class="form-container p-4 border rounded shadow"
        style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        <h1 class="text-center mb-4" style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">
            Create New Blog</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('adminblogs.store') }}">
            @csrf

            <!-- Blog Title -->
            <div class="mb-4">
                <label for="blog_title" class="form-label" style="color:  rgb(57, 37, 14); font-weight: bold;">Blog
                    Title</label>
                <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Enter blog title"
                    value="{{ old('blog_title') }}" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('blog_title')
                <div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Blog Link -->
            <div class="mb-4">
                <label for="blog_link" class="form-label" style="color:  rgb(57, 37, 14); font-weight: bold;">Blog
                    Link</label>
                <input type="url" class="form-control" id="blog_link" name="blog_link" placeholder="Enter blog link"
                    value="{{ old('blog_link') }}" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('blog_link')
                <div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>


            <!-- Blog Description -->
            <div class="mb-4">
                <label for="blog_description" class="form-label"
                    style="color:  rgb(57, 37, 14); font-weight: bold;">Blog Description</label>
                <textarea class="form-control" id="blog_description" name="blog_description" rows="4"
                    placeholder="Enter blog description" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">{{ old('blog_description') }}</textarea>
                @error('blog_description')
                <div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Blog Image -->
            <div class="mb-4">
                <label for="blog_image" class="form-label" style="color:  rgb(57, 37, 14); font-weight: bold;">Blog
                    Image</label>
                <input type="file" class="form-control" name="blog_image" accept="image/*" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('blog_image')
                <div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn"
                    style="background-color:  rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; padding: 10px 20px; border-radius: 10px; text-transform: uppercase;">
                    Create Blog
                </button>
            </div>
        </form>
    </div>
</div>

@endsection