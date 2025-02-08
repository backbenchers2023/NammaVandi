@extends('layouts.app')

@section('content')
<div
    style="margin: 0; overflow: hidden; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: black;">
    <video autoplay muted onclick="redirectToIndex()" style="max-width: 100%; max-height: 100%; cursor: pointer;">
        <source src="{{ asset('assets/videos/intro.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<script>
    function redirectToIndex() {
        window.location.href = "{{ route('index') }}";
    }
</script>
@endsection