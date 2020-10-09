@extends("layouts.navbar")
<link rel="stylesheet" href="{{ asset('css/onlinetestingresult.css') }}">
@section('title', 'Online Testing Result')

@section('content')
<div class="container pb-3">

    <div class="card">
        <h1 class="text-center">Online Testing</h1>
        <div class="br"></div>
        <h3 class="text-center result">RESULTS</h3>
        <section class="pt-5 d-flex align-items-center">
            <p class="Algorithm mb-0">Algorithm</p>
            <div id="slider" class="range-field">
                <input type="range" min="0" max="100" value="89" class="slider" id="algoritmarange">
            </div>
            <p class="nilai_hasil py-2 px-2 mb-0">89%</p>
            <div class="bg-success rounded ml-5">
                <p class="good py-2 px-3 mb-0 ml">G</p>
            </div>
        </section>

        <section class="pt-5 d-flex align-items-center">
            <p class="Statistics mb-0">Statistics</p>
            <div id="slider" class="range-field">
                <input type="range" min="0" max="100" value="45" class="slider" id="statisticsrange">
            </div>
            <p class="nilai_hasil py-2 px-3 mb-0">45%</p>
            <div class="bg-secondary rounded ml-5 mr-0">
                <p class="good py-2 px-3 mb-0">B</p>
            </div>
        </section>

        <section class="pt-5 d-flex align-items-center">
            <p class="Avarage mb-0"><b>Avarage</b></p>
            <div id="slider" class="range-field">
                <input type="range" min="0" max="100" value="67" class="slider" id="Avaragerange">
            </div>
            <p class="nilai_hasil py-2 px-3 mb-0">67%</p>
            <div class="bg-success rounded ml-5 mr-0">
                <p class="good py-2 px-3 mb-0">G</p>
            </div>
        </section>

        <div class="button">
            <button type="button" class="btn btn-primary ok btn-lg"><b>OK</b></button>
        </div>
    </div>
</div>

@endsection
