@extends('layouts.navbar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/onlineinterviewvideo.css') }}">
@endsection
@section('title', 'Online Interview')

@section('content')
<div>
    <h1 class="text-center">Online Interview</h1>
        </div>
            <div class="container pb-4">
                <div class="card">
                <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yBtMwyQFXwA" allowfullscreen></iframe>
        </div>
    </div>
</div>

@endsection
