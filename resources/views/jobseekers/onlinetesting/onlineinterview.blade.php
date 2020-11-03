
@extends('layouts.navbar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/onlineinterview.css') }}">
@endsection
@section('title', 'Online Interview')

@section('content')
<div class="container">
    <div class="card">
        <h1 class="text-center">Online Interview</h1>
        <div class="br"></div>
        <h3 class="teks">Online Interview <br>Posisi : .NET Programmer <br>Level : Junior </h3>

        <div class="button">
            <button type="button" class="btn btn-primary next btn-lg"><b><a href="/jobseeker/online-interview-video" class="text-white text-decoration-none">NEXT</a></b></button>
        </div>
    </div>
</div>

@endsection
