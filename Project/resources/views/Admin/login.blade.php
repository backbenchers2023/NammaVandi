@extends('layouts.app')

@section('content')
<div class="vh-100 d-flex align-items-center justify-content-center" style="position: relative;">
    <img src="{{ asset('assets/images/loginbg.jpeg') }}" alt="Rental Vehicle" class="background-img bg-blur">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-3"
                    style="background-color: #FFF4E6; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);">
                    <div class="card-header text-center"
                        style="background-color: rgb(57, 37, 14); color: #FFF; border-radius: 10px 10px 0 0;">
                        <h4 style="font-size: 1.5rem; font-weight: bold; color: #FFF; text-transform: uppercase;">Admin Login
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        @if($errors->any())
                            <div class="alert alert-danger"
                                style="background-color: rgb(110, 25, 14); color: #FFF; border-left: 5px solid rgb(57, 37, 14);">
                                <ul class="mb-0" style="list-style-type: none; padding-left: 0;">
                                    @foreach($errors->all() as $error)
                                        <li style="font-size: 14px;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <!-- Email Field -->
                            <div class="form-group mb-3">
                                <label for="email" style="color: rgb(57, 37, 14); font-size: 1rem; font-weight: bold;">
                                    <i class="bi bi-envelope"></i> Admin Email
                                </label>
                                <input type="email" name="email" id="email" class="form-control rounded"
                                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;"
                                    placeholder="Enter admin email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <!-- Password Field -->
                            <div class="form-group mb-3">
                                <label for="password"
                                    style="color: rgb(57, 37, 14); font-size: 1rem; font-weight: bold;">
                                    <i class="bi bi-lock"></i> Password
                                </label>
                                <input type="password" name="password" id="password" class="form-control rounded"
                                    style="border: 2px solid rgb(57, 37, 14); border-radius: 10px;"
                                    placeholder="Enter your password" required>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn"
                                    style="background-color: rgb(57, 37, 14); color: #FFF; font-size: 1rem; font-weight: bold; padding: 10px; border-radius: 10px; text-transform: uppercase; border: none;">
                                    Sign In to Dashboard
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .background-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the whole container */
        z-index: -1; /* Places the image behind the content */
    }

    .bg-blur{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Dark overlay */
        z-index: -1; /* Ensure it's below the image and above the form */
        filter: blur(2px); /* Apply blur effect to the background */

    }
</style>
