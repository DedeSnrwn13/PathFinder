@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/talentsearch.css') }}">
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/bg.css') }}">

@section('title', 'Talent Search | Profile')

@section('content')


{{-- Header --}}
<div class="container">
    <a class="navbar-brand" href="#">
        <b>Path</b>Finder
    </a>
</div>
{{-- EndHeader --}}

{{-- Navbar --}}
<div class="nav">
    <div class="container">
        <div class="navbar-tengah">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="#"><b>Job Vacancy</b></a>
                        <a class="nav-link" href="#"><b>My Candidates</b></a>
                        <a class="nav-link active" href="#"><b>Talent Search</b></a>
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
                <img class="profil" src="{{ asset('images/default.png') }}" alt="">
                <p class="text-center" id="teks">Registered on September 5th, 2019 on</p>
                <button type="button" id="btn" class="btn btn-outline-secondary btn-sm white" data-toggle="modal" data-target="#exampleModal">
                    <b>FORWARD RESUME</b>
                </button>
            </div>

            <div class="col-md-4">
                <div class="name mt-5">
                    <h4><b>Zahirudin Mapusay</b></h4>
                    <p class="Major">Multimedia Student at SMK XYZ</p>
                </div>
                <div class="contact">
                    <div class="key">
                        <b><span>Email</span>
                        <span>Phone Number</span>
                        <span>Location</span></b>
                    </div>
                    <div class="value">
                        <span>zahirudinmapusay@gmail.com</span>
                        <span>0817100754</span><br>
                        <span>Cisauk, Tangerang Selatan</span>
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
                <a href="/employer/talentsearch/profile"><button class="aboutme text-center">About Me</button></a>
                <a href="/employer/talentsearch/profile/project"><button class="projects text-center">Projects</button></a>
                <a href="/employer/talentsearch/profile/backgroundeducation"><button class="backed text-center aktif2">Background Education</button></a>
                <a href="/employer/talentsearch/profile/professionalskills"><button class="profskill text-center">Professional Skills</button></a>
                <a href="/employer/talentsearch/profile/basicassessment"><button class="basicass text-center">Basic Assessment</button></a>
                <a href="/employer/talentsearch/profile/advancedassessment"><button class="advanced text-center">Advanced Assessment</button></a>
            </div>
        </div>
        <div class="col-md-9">
                <div class="hobbybox">
                    <div class="konten">
                        <img src="{{ asset('img/edu.png') }}" alt="">
                        <span class="title">Background Education</span>
                        <p class="tanggal"><b>May 2007 - Dec 2010</b> <span class="univ">Universitas Pelita Harapan</span></p>
                        <div class="bwah">
                            <p class="master">Master's Degree Graduate</p>
                            <p class="major">Major <span class="grey">Data Analyst</span></p>
                            <p class="gpa">GPA <span class="grey">3.43</span></p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


@endsection

