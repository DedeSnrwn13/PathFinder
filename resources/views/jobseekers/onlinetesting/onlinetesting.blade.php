@extends("layouts.navbar")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/onlinetesting.css') }}">
@endsection
@section('title', 'Online Testing Question')

@section('content')
<div class="container">
    <div class="card p-5">
        <h1 class="text-center">Online Testing</h1>
        <div class="br"></div>
        <p>Prinsip kerja bubble sort adalah sebagai berikut, kecuali</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                    A. Pengecekan dimulai dari data ke 1 sampai data ke n
                </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    B. Membandingkan data ke-n dengan data sebelumnya (n-1)
                </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    C. Data dipindahkan bila bilangan yang dibandingkan lebih kecil dengan angka didepanya. (n-1)
                </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    D. Data dipindahkan bila bilangan yang dibandingkan lebih besar dengan angka didepanya. (n-1)
                </label>
        </div>

        <div class="button">

            <button type="button" class="btn btn-outline-secondary kiri btn-lg"><b>PREVIOUS</b></button>
            <a href="/jobseeker/online-testing-result"><button type="button" class="btn btn-secondary kanan btn-lg"><b>NEXT</b></button></a>
        </div>
    </div>
</div>

@endsection
