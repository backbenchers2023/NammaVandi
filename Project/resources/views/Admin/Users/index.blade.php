@extends('layouts.app')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color: rgb(11, 11, 11); padding: 15px 20px; border-bottom: 2px solid rgb(110, 25, 14);">
    <div class="container">
        <!-- Brand Name -->
        <a class="navbar-brand" href="index.html" style="font-size: 28px; font-weight: bold; letter-spacing: 1px;">
            <span style="color: #E87C1E; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">NAMMA</span>
            <span style="color: #FFF; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">VANDI</span>
        </a>

        <!-- Mobile Menu Toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" style="border: none; outline: none;">
            <span class="fab fa-bars" style="color: rgb(110, 25, 14); font-size: 20px;"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link" style="color: #FFF; font-size: 16px; text-transform: uppercase; font-weight: bold; padding: 10px 20px; transition: color 0.3s;">
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!<!-- Page Content -->
<div class="container mt-5">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h1 class="text-dark" style="font-size: 2rem; font-weight: bold; color:  rgb(57, 37, 14); text-transform: uppercase;">User Management</h1>
        <a href="{{ route('createuser') }}" class="btn" style="background-color:  rgb(57, 37, 14); color: white; font-size: 16px; padding: 10px 20px; border-radius: 5px; transition: background-color 0.3s;">
            <i class="fas fa-user-plus"></i> Add New User
        </a>
    </div>

    <!-- User Cards -->
    <div class="row">
        @foreach($users as $user)
        <div class="col-md-4 col-sm-6 col-12 mb-4">
            <div class="card user-card border-0 shadow-sm h-100" style="background-color: #FFF4E6; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                <div class="card-body text-center d-flex flex-column align-items-center">
                    <!-- Profile Picture Placeholder -->
                    <div class="profile-pic mb-3">
                        <div class="rounded-circle bg-warning text-white d-flex justify-content-center align-items-center" style="width: 80px; height: 80px; font-size: 24px;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    </div>
                    <!-- User Info -->
                    <h5 class="card-title mb-1" style="color:  rgb(57, 37, 14);">{{ $user->name }}</h5>
                    <span class="badge bg-secondary mb-3" style="font-size: 14px; background-color: rgb(109, 62, 8);">{{ ucfirst($user->role) }}</span>
                    <!-- Actions -->
                    <div class="d-flex justify-content-center gap-2 mt-auto w-100">
                        <!-- Edit Button -->
                        <a href="{{ route('edituser', $user->id) }}" class="btn btn-warning btn-sm px-3 shadow-sm" style="background-color: rgb(110, 25, 14); color: white; border-radius: 5px;">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('deleteuser', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm px-3 shadow-sm" style="background-color:  rgb(57, 37, 14); color: white; border-radius: 5px;">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
