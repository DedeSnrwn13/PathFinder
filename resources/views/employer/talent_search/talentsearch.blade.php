@extends('layouts.main')
@section('title', 'Talent Search')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/talentsearch.css') }}">
@endsection
@section('content')

{{-- Navbar --}}
    <div class="nav">
        <div class="container">
            <div class="navbar-tengah">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="/employer/jobvacancy/apllicant"><b>Job Vacancy</b></a>
                            <a class="nav-link" href="#"><b>My Candidates</b></a>
                            <a class="nav-link active" href="/employer/talentsearch"><b>Talent Search</b></a>
                            <a class="nav-link" href="#"><b>Online Testing Configuration</b></a>
                            <a class="nav-link" href="#"><b>Client Managament</b></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
{{-- EndNavbar --}}

{{-- Search --}}
    <div class="container">
        <div class="search">
            <div class="row">
                <div class="col-md-10">
                    <form method="get" action="/employer/talentsearch/cari">
                        <div class="form-bg">
                            <input class="form-control" type="search" name="cari" value="{{ old('cari') }}" placeholder="Search by Name, gender, email" aria-label="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
{{-- EndSearch --}}


{{-- Card --}}
        @foreach ($pelamars as $pelamar)
            <div class="card">
                <div class="row">
                            <div class="col-md-3">
                                <h5 class="text-center"><b><a href="/employer/talentsearch/profile">{{ $pelamar->nama }}</a></b></h5>
                                <p class="text-center">{{ $pelamar->gender }} | {{ \Carbon\Carbon::parse($pelamar->tanggal_lahir)->diffForHumans(null, true) }} yrs</p>
                                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile"><img class="px-3 py-3 profil" src="{{ $pelamar->getAvatar() }}" alt=""></a>
                                <p class="text-center" id="teks">Registered on {{ \Carbon\Carbon::parse($pelamar->created_at)->diffForHumans(null, true) }} </p>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img class="" src="{{ asset('img/suitcase.png') }}" alt="">
                                    </div>
                                    <div class="col-md-10">
                                        <p class="pt-2 pl-2">{{ $pelamar->pekerjaan->posisi }}</p>
                                    </div>
                                    <div class="col-md-2 offset"></div>
                                    <div class="col-md-10 ">
                                        <p class="pl-2">at {{ $pelamar->pekerjaan->nama_perusahaan }}</p>
                                    </div>
                                    <div class="col-md-2 offset"></div>
                                    <div class="col-md-10 ">
                                        <p class="pl-2">{{ $pelamar->pengalaman() }} yrs of experience</p>
                                    </div>

                                    {{-- <img class="kiri" src="{{ asset('img/suitcase.png') }}" alt="">
                                    <p class="teks1">{{ $pekerjaan2 }}</p>
                                    <p class="kanan">at {{ $tempatkerja2 }}</p>
                                    <p class="lamakerja">{{ $lamakerja2 }} yrs of experience</p> --}}

                                    <div class="col-md-2 mt-3">
                                        <img class="" src="{{ asset('img/edu.png') }}" alt="">
                                    </div>
                                    <div class="col-md-10 mt-3">
                                        <p class="pt-2 pl-2">{{ $pelamar->pendidikan->nama_sekolah }}</p>
                                    </div>
                                    <div class="col-md-2 offset"></div>
                                    <div class="col-md-10">
                                        <p class="pl-2">{{ $pelamar->pendidikan->jurusan }} {{ $pelamar->pendidikan->nilai }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                {{--<a href="/employer/talentsearch/{{ $id }}/kirim_pdf">--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="/employer/talentsearch/{{ $pelamar->id }}/kirim_pdf">
                                            <button type="button" id="btn" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                FORWARD RESUME
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" id="btn1" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#exampleModal1">
                                            OFFER A JOB
                                        </button>
                                    </div>
                                    {{-- <a href="/employer/talentsearch/{{ $id }}/offer"> --}}
                                    <div class="col-md-10 mt-3">
                                        <p id="" class="float-left">{{ $pelamar->tempat_lahir }}</p>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <img id="" src="{{ asset('img/location.png') }}" alt="">
                                    </div>
                                    <div class="col-md-10 mt-3">
                                        <p id="">IDR {{ $pelamar->mingaji }} - IDR {{ $pelamar->maxgaji }}</p>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <img id="" src="{{ asset('img/salary.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                </div>
            </div>

            {{-- Modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <p class="text-center">Forward Resume to:</p>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('email.send') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input class="form-control text-center" type="text" name="nama" placeholder="Email Address" aria-label="Search">
                                        <input type="file" class="inputfile" name="file">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                            <input id="pi" type="submit" class="btn">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>

            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <p class="text-center">Are you sure you want to offer a job to this applicant?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                    <a href="/employer/jobvacancy/apllicant">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">YES</button>
                                    </a>
                                </div>
                            </div>
                        </div>
            </div>
        {{-- EndModal --}}
        @endforeach
    </div>
{{-- EndCard --}}




@endsection

