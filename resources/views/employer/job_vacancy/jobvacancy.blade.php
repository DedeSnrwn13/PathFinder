@extends('layouts.main')
@section('title', 'Job Vacancy')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/jobvacancy.css') }}">
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
                        <a class="nav-link" id="pills-suggestion-tab" href="" role="tab">
                            <p class="title">Suggestions</p>
                            <p class="ket"><b>10</b> (2)</p>
                        </a>
                    </li>

                    <li class="nav-item text-center">
                        <a class="nav-link active" id="pills-aplicant-tab" href="/employer/jobvacancy/apllicant" role="tab">
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
                        <a class="nav-link" id="pills-online-interview-tab"  href="/employer/jobvacancy/onlineinterview" role="tab">
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
                        <a class="nav-link" href="" role="tab">
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
                            <p class="text-center">{{ $d->gender }} | {{ \Carbon\Carbon::parse($d->tanggal_lahir)->diffForHumans(null, true) }}</p>
                            <a href="/employer/talentsearch/{{ $d->id }}/profile"><img class="profil" src="{{ $d->getAvatar() }}" alt=""></a>
                            <p class="text-center" id="teks">Registered on {{ \Carbon\Carbon::parse($d->created_at)->diffForHumans(null, true) }}</p>
                        </div>
                        <div class="col-md-5">
                            <img class="kiri" src="{{ asset('img/suitcase.png') }}" alt="">
                            <p class="teks1">{{ $d->pekerjaan->posisi }}</p>
                            <p class="kanan">at {{ $d->pekerjaan->nama_perusahaan }}</p>
                            <p class="lamakerja">{{ $d->berakhir_kerja-$d->mulai_kerja }}-4 yrs of experience</p>

                            <img class="kiri" src="{{ asset('img/suitcase.png') }}" alt="">
                            <p class="teks1">{{ $d->pekerjaan->posisi }}</p>
                            <p class="kanan">at {{ $d->pekerjaan->nama_perusahaan }}</p>
                            <p class="lamakerja">{{ $d->berakhir_kerja-$d->mulai_kerja }}-4 yrs of experience</p>

                            <img class="kiri" src="{{ asset('img/edu.png') }}" alt="">
                            <p class="teks">{{ $d->pendidikan->nama_sekolah }}</p>
                            <p class="kanan">{{ $d->pendidikan->jurusan }} {{ $d->pendidikan->nilai }}</p>
                        </div>
                    <div class="col-md-4">
                        <button type="button" id="btn" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            UNSUITABLE
                        </button>
                        <button type="button" id="btn1" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal1">
                            CANDIDATE
                        </button>
                        <div class="mt-3">
                            <p id="alamat">{{ $d->tempat_lahir }}</p>
                            <img id="imglocation" src="{{ asset('img/location.png') }}" alt="">
                            <p id="gaji">IDR {{ $d->mingaji }} - IDR {{ $d->maxgaji }}</p>
                            <img id="imgsalary" src="{{ asset('img/salary.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
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

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body text-center">
            <p class="atas">You have successfully moved the candidate to <a href="/employer/jobvacancy/candidate">Candidates</a></p>
            <p class="atas">Please go to <a href="/employer/jobvacancy/candidate">Candidates</a> if you want to modify</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-orange"><a href="/employer/jobvacancy/candidate">OK</a></button>
        </div>
        </div>
    </div>
</div>






{{-- EndList --}}

{{-- <div class="row nav-pills" id="pills-tab" role="tablist">

                <a href="#suggestion" data-toggle="pill"><div class="col-md-2 text-center suggestions kanan nav-links">
                    <p class="title">Suggestions</p>
                    <p><b>10</b> (2)</p>
                </a>
                </div>

                <a href="#applicant" data-toggle="pill">
                <div class="col-md-2 text-center applicants kanan nav-links">
                    <p class="title">Applicants</p>
                    <p><b>20</b> (1)</p>
                </a>
                </div>

                <a href="#candidates" data-toggle="pill">
                <div class="col-md-2 text-center candidates kanan nav-links">
                    <p class="title">Candidates</p>
                    <p><b>5</b></p>
                </a>
                </div>

                <a href="#">
                <div class="col-md-3 text-center interviews kanan nav-links">
                    <p class="title">Online Interviews</p>
                    <p><b>2</b></p>
                </a>
                </div>

                <a href="#">
                <div class="col-md-3 text-center testing kanan nav-links">
                    <p class="title">Online Testing</p>
                    <p><b>2</b></p>
                </a>
                </div>

                <a href="#">
                <div class="col-md-3 text-center buckets kanan nav-links nav-links">
                    <p class="title">My Buckets</p>
                    <p><b>2</b></p>
                </a>
                </div> --}}

@endsection


{{-- <div class="dropdown">
                                <button class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split" id="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    MOVE TO
                                </button>
                                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">ONLINE INTERVIEW</a>
                                    <a class="dropdown-item" href="#">ONLINE TESTING</a>
                                    <a class="dropdown-item" href="#">EMPLOYED</a>
                                    <a class="dropdown-item" href="#">DROP</a>
                                </div>
                            </div>
                                <p id="alamat">{{ $d->alamat }}</p>
                                <img id="imglocation" src="{{ asset('img/location.png') }}" alt="">
                                <p id="gaji">IDR {{ $d->mingaji }} - IDR {{ $d->maxgaji }}</p>
                                <img id="imgsalary" src="{{ asset('img/salary.png') }}" alt="">
                            </div> --}}
