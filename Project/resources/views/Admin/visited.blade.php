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
            <span class="fab fa-bars" style="color: #E87C1E; font-size: 20px;"></span>
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
<div class="container mt-5">
    <h2 class="text-center mb-5" style="color:  rgb(57, 37, 14); font-weight: bold; text-transform: uppercase;">Visited
        Users</h2>
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card"
                    style="background-color: #FFF4E6; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-body">
                        <h5 class="card-title" style="color:  rgb(57, 37, 14); font-weight: bold;">{{ $user->user_name }}
                        </h5>
                        <p class="card-text" style="color:  rgb(57, 37, 14);">Phone: {{ $user->phone_number }}</p>
                        <p class="card-text" style="color:  rgb(57, 37, 14);">Location: {{ $user->location }}</p>
                        <p class="card-text" style="color:  rgb(57, 37, 14);">Purpose: {{ ucfirst($user->purpose) }}</p>
                        <form action="{{ route('deletevisiteduser', $user->id) }}" method="POST"
                            class=" d-flex justify-content-end">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm d-flex justify-content-center"
                                style="background-color:  rgb(57, 37, 14); color: white; font-size: 14px; width: 100px;">
                                Delete
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection