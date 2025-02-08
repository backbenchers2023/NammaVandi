@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <!-- Edit Blog Form Container -->
    <div class="form-container p-4 border rounded shadow"
        style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
        <h1 class="text-center mb-4" style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">Edit
            Blog</h1>

        <form method="POST" enctype="multipart/form-data" action="{{ route('adminblogs.update', $blog->id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->

            <!-- Blog Title -->
            <div class="mb-4">
                <label for="blog_title" class="form-label" style="color:  rgb(57, 37, 14); font-weight: bold;">Blog
                    Title</label>
                <input type="text" class="form-control @error('blog_title') is-invalid @enderror" id="blog_title"
                    name="blog_title" placeholder="Enter blog title" value="{{ old('blog_title', $blog->blog_title) }}"
                    required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('blog_title')
                <div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Blog Link -->
            <div class="mb-4">
                <label for="blog_link" class="form-label" style="color:  rgb(57, 37, 14); font-weight: bold;">Blog
                    Link</label>
                <input type="url" class="form-control @error('blog_link') is-invalid @enderror" id="blog_link"
                    name="blog_link" placeholder="Enter blog link" value="{{ old('blog_link', $blog->blog_link) }}"
                    required style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">
                @error('blog_link')
                <div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>


            <!-- Blog Description -->
            <div class="mb-4">
                <label for="blog_description" class="form-label"
                    style="color:  rgb(57, 37, 14); font-weight: bold;">Blog Description</label>
                <textarea class="form-control @error('blog_description') is-invalid @enderror" id="blog_description"
                    name="blog_description" rows="4" placeholder="Enter blog description" required
                    style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">{{ old('blog_description', $blog->blog_description) }}</textarea>
                @error('blog_description')
                <div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Blog Image -->
            <div class="mb-4">
                <label for="blog_image" class="form-label" style="color:  rgb(57, 37, 14); font-weight: bold;">Blog
                    Image</label>
                <input type="file" class="form-control @error('blog_image') is-invalid @enderror" name="blog_image"
                    accept="image/*" style="border: 2px solid  rgb(57, 37, 14); border-radius: 10px;">

                @if($blog->blog_image)
                    <!-- Display existing image if it exists -->
                    <div class="mt-3">
                        <img src="data:image/jpeg;base64,{{ $blog->blog_image }}" alt="Blog Image" class="img-fluid rounded"
                            style="width: 150px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                    </div>
                @endif

                @error('blog_image')
                <div class="text-danger mt-1">{{ $message }}</div>@enderror
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn" style="background-color:  rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; 
                               padding: 10px 20px; border-radius: 10px; text-transform: uppercase;">
                    Update Blog
                </button>
            </div>
        </form>
    </div>
</div>

@endsection