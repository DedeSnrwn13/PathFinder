@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/bg.css') }}"> --}}
@endsection

@section('title', 'Talent Search | Background Education')

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

<div class="bg">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="profil" src="{{ $pelamar->getAvatar() }}" alt="">
                <p class="text-center" id="teks">Registered on {{ \Carbon\Carbon::parse($pelamar->created_at)->diffForHumans(null, true) }}</p>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/kirim_pdf">
                    <button type="button" id="btn" class="btn btn-outline-secondary btn-sm white" data-toggle="modal" data-target="#exampleModal">
                        <b>FORWARD RESUME</b>
                    </button>
                </a>
            </div>
            <input type="hidden" name="id" value="{{$pelamar->id}}">
            <div class="col-md-4">
                <div class="name mt-5">
                    <h4><b>{{ $pelamar->nama }}</b></h4>
                    <p class="Major">{{ $pelamar->pendidikan->jurusan }} Student at {{ $pelamar->pendidikan->nama_sekolah }}</p>
                </div>
                <div class="contact">
                    <div class="key">
                        <b><span>Email</span>
                        <span>Phone Number</span>
                        <span>Location</span></b>
                    </div>
                    <div class="value">
                        <span>{{ $pelamar->email }}</span><br>
                        <span>0823423432</span><br>
                        <span>{{ $pelamar->tempat_lahir }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="teks text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus praesentium commodi reiciendis magnam est dolorem impedit voluptates porro? Expedita at eum, adipisci exercitationem obcaecati illum nobis nihil hic voluptates aperiam?</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split" id="drpdwn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MOVE TO
                    </button>
                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/employer/jobvacancy/onlineinterview">ONLINE INTERVIEW</a>
                    <a class="dropdown-item" href="/employer/jobvacancy/onlinetesting">ONLINE TESTING</a>
                    <a class="dropdown-item" href="#">EMPLOYED</a>
                    <a class="dropdown-item" href="#">DROP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row">
        <div class="col-md-3">
            <div class="kategori">
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile"><button class="aboutme text-center">About Me</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/project"><button class="projects text-center">Projects</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/backgroundeducation"><button class="backed text-center aktif">Background Education</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/professionalskills"><button class="profskill text-center">Professional Skills</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/basicassessment"><button class="basicass text-center">Basic Assessment</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/advancedassessment"><button class="advanced text-center">Advanced Assessment</button></a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="hobbybox">
                <div class="row">
                    <div class="col-md-1">
                        <img src="{{ asset('img/edu.png') }}" alt="">
                    </div>
                    <div class="col-md-11">
                        <span class="title">Background Education</span>
                    </div>
                    <div class="col-md-1 offset"></div>
                    <div class="col-md-5">
                        <p class="tanggal"><b>{{ $pelamar->pendidikan->mulai_pendidikan }} to {{ $pelamar->pendidikan->selesai_pendidikan }}</b>
                    </div>
                    <div class="col-md-6">
                        <span class="univ">{{ $pelamar->pendidikan->nama_sekolah }}</span></p>
                    </div>
                    <div class="col-md-6 offset"></div>
                    <div class="col-md-6">
                        <p class="master">-----</p>
                        <p class="major">Major <span class="grey">{{ $pelamar->pendidikan->jurusan }}</span></p>
                        <p class="gpa">GPA <span class="grey">{{ $pelamar->pendidikan->nilai }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

