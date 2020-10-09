@extends('layouts.main')
@section('title', 'Job Vacancy|Candidate')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jobvacancy.css') }}">
    <link rel="stylesheet" href="{{ asset('css/candidate.css') }}">
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
                        <a class="nav-link active" id="pills-candidate-tab" href="/employer/jobvacancy/candidate" role="tab">
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
                        <a class="nav-link" id="pills-online-testing-tab" href="/employer/jobvacancy/onlinetesting" role="tab">
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
                            <h5 class="text-center"><b>{{ $d->nama }}</b></h5>
                            <p class="text-center">{{ $d->gender }} | {{ $d->usia }} yrs</p>
                            <img class="profil" src="{{ asset('img/profil.png') }}" alt="">
                            <p class="text-center" id="teks">Applied on {{ $d->created_at }}</p>
                        </div>
                        <div class="col-md-5">
                            <img class="kiri" src="{{ asset('img/suitcase.png') }}" alt="">
                            <p class="teks1">{{ $d->pekerjaan1 }}</p>
                            <p class="kanan">at {{ $d->tempatkerja1 }}</p>
                            <p class="lamakerja">{{ $d->lamakerja1 }} yrs of experience</p>

                            <img class="kiri" src="{{ asset('img/suitcase.png') }}" alt="">
                            <p class="teks1">{{ $d->pekerjaan2 }}</p>
                            <p class="kanan">at {{ $d->tempatkerja2 }}</p>
                            <p class="lamakerja">{{ $d->lamakerja2 }} yrs of experience</p>

                            <img class="kiri" src="{{ asset('img/edu.png') }}" alt="">
                            <p class="teks">{{ $d->pendidikan }}</p>
                            <p class="kanan">{{ $d->fakultas }} {{ $d->ipk }}</p>
                        </div>
                        <div class="col-md-4">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split" id="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    MOVE TO
                                </button>
                                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalinter" href="/employer/jobvacancy/onlineinterview">ONLINE INTERVIEW</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModaltest" href="/employer/jobvacancy/onlinetesting">ONLINE TESTING</a>
                                    <a class="dropdown-item" href="#">EMPLOYED</a>
                                    <a class="dropdown-item" href="#">DROP</a>
                                </div>
                            </div>
                                <p id="alamat">{{ $d->alamat }}</p>
                                <img id="imglocation" src="{{ asset('img/location.png') }}" alt="">
                                <p id="gaji">IDR {{ $d->mingaji }} - IDR {{ $d->maxgaji }}</p>
                                <img id="imgsalary" src="{{ asset('img/salary.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

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
