@extends('layouts.main')
@section('title', 'Job Vacancy | Online Interview')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jobvacancy.css') }}">
    <link rel="stylesheet" href="{{ asset('css/onlinetesting.css') }}">
    <link rel="stylesheet" href="{{ asset('css/set_date.css') }}">
@endsection
@section('content')

{{-- Navbar --}}
    <div class="nav">
        <div class="container">
            <div class="navbar-tengah">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" href="/employer/jobvacancy"><b>Job Vacancy</b></a>
                            <a class="nav-link" href="#"><b>My Candidates</b></a>
                            <a class="nav-link" href="/employer/talentsearch"><b>Talent Search</b></a>
                            <a class="nav-link" href="#"><b>Online Testing Configuration</b></a>
                            <a class="nav-link" href="#"><b>Client Managament</b></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
{{-- EndNavbar --}}


{{-- List --}}
    <div class="list-konten">
        <div class="container">
            <div class="row">
                <div class="col-md-3 quality">
                <img src="" alt="">
                    <div class="qual">
                    <p class="qualit"><b>Quality Assurance</b></p>
                    <p class="view">1500 views</p>
                    </div>
                    <p class="date">Date posted: 10 july 2019</p>
                </div>
                <ul class="row nav nav-pills tanpa" id="pills-tab" role="tablist">

                    <li class="nav-item text-center">
                        <a class="nav-link" id="pills-suggestion-tab" href="#pills-suggestion" role="tab">
                            <p class="title">Suggestions</p>
                            <p class="ket"><b>10</b> (2)</p>
                        </a>
                    </li>

                    <li class="nav-item text-center">
                        <a class="nav-link" id="pills-aplicant-tab" href="/employer/jobvacancy/apllicant" role="tab">
                            <p class="title">Applicants</p>
                            <p class="ket"><b>20</b> (1)</p>
                        </a>
                    </li>

                    <li class="nav-item text-center">
                        <a class="nav-link" id="pills-candidate-tab" href="/employer/jobvacancy/candidate" role="tab">
                            <p class="title">Candidates</p>
                            <p class="ket"><b>10</b> (2)</p>
                        </a>
                    </li>

                    <li class="nav-item text-center">
                        <a class="nav-link" id="pills-online-interview-tab" href="/employer/jobvacancy/onlineinterview" role="tab">
                            <p class="title">Online Interview</p>
                            <p class="ket"><b>2</b></p>
                        </a>
                    </li>

                    <li class="nav-item text-center">
                        <a class="nav-link active" id="pills-online-testing-tab" href="/employer/jobvacancy/onlinetesting" role="tab">
                            <p class="title">Online Testing</p>
                            <p class="ket"><b>2</b></p>
                        </a>
                    </li>

                    <li class="nav-item text-center">
                        <a class="nav-link" id="pills-bucket-tab" href="#pills-bucket" role="tab">
                            <p class="title">My Buckets</p>
                            <p class="ket"><b>2</b></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
        {{-- Card --}}
            @php
                $i = 1;
            @endphp
            @foreach ($data as $d)
            <div class="card">
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="text-center nama"><b>{{ $d->nama }}</b></h5>
                        <p class="text-center nama">{{ $d->gender }} | {{ \Carbon\Carbon::parse($d->tanggal_lahir)->diffForHumans(null, true) }}</p>
                        <img class="profil mx-2 my-3" src="{{ $d->getAvatar() }}" alt="">
                        <p class="text-center" id="teks">Applied on {{ \Carbon\Carbon::parse($d->created_at)->diffForHumans(null, false) }}</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="set">
                            <p class="tag"><b>ONLINE TESTING</b></p>
                            <p class="miring">Has not yet been scheduled</p>
                        </div>

                        <div class="set2">
                            <p class="tag"><b>ONLINE INTERVIEW</b></p>
                            <p class="miring">Has not yet been scheduled</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-secondary btn-sm btn-set" data-toggle="modal" data-target="#exampleModalset">
                                    SET SCHEDULED
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-sm dropdown-toggle dropdown-toggle-split" id="btn-move" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    MOVE TO
                                </button>
                                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item pointer" data-toggle="modal" data-target="#exampleModalinter" href="/employer/jobvacancy/onlineinterview">ONLINE INTERVIEW</a>
                                    <a class="dropdown-item pointer" data-toggle="modal" data-target="#exampleModaltest" href="#">ONLINE TESTING</a>
                                    <a class="dropdown-item" href="#">EMPLOYED</a>
                                    <a class="dropdown-item" href="#">DROP</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-right">
                                <span class="tgl-desk">Moved to Online Interview on 22 Sep 2019</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <span class="tgl-desk">Moved to Online Testing on 23 Sep 2019</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

{{-- Set Schedule --}}
<div class="modal fade modal-set" id="exampleModalset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body text-center">
            <h5 class="">Set Scheduled - <span class="warna">Online Interview</span></h5>
            <p class="warna">Choose at least 2 date for online interview</p>
        </div>
        <div class="pilih">
            <div class="card-date">
                <div class="row">
                    <div class="col-md-5">
                        <p class="ss">Date</p>
                        <p class="ss1">Start Time Range</p>
                    </div>
                    <div class="col-md-8">
                        <input type="date" class="date">
                        <div class="bwah1">
                            <input type="time" class="time">
                            <span>-</span>
                            <input type="time" class="time">
                        </div>
                        <div class="bwah2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                            <button type="submit" class="btn btn-submit">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
{{-- End Set Schedule --}}

{{-- modal interview --}}
<div class="modal fade" id="exampleModalinter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body text-center">
            <p class="atas">You have successfully moved the candidate to <a href="/employer/jobvacancy/onlineinterview">Online Interview</a></p>
            <p class="atas">Please go to <a href="/employer/jobvacancy/onlineinterview">Online Interview</a> if you want to modify</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-orange"><a href="/employer/jobvacancy/onlineinterview">OK</a></button>
        </div>
        </div>
    </div>
</div>
{{-- End Interview --}}

{{-- modal Testing --}}
<div class="modal fade" id="exampleModaltest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body text-center">
            <p class="atas">You have successfully moved the candidate to <a href="/employer/jobvacancy/onlinetesting">Online Testing</a></p>
            <p class="atas">Please go to <a href="/employer/jobvacancy/onlinetesting">Online Testing</a> if you want to modify</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-orange"><a href="/employer/jobvacancy/onlinetesting">OK</a></button>
        </div>
        </div>
    </div>
</div>
{{-- End Testing --}}

            @endforeach
            @php
                $i++;
            @endphp
            {{-- EndCard --}}
        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
