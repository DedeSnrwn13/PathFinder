@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/talentsearch.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('title', 'Talent Search | Profile Project')

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
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/project"><button class="projects text-center aktif">Projects</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/backgroundeducation"><button class="backed text-center">Background Education</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/professionalskills"><button class="profskill text-center">Professional Skills</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/basicassessment"><button class="basicass text-center">Basic Assessment</button></a>
                <a href="/employer/talentsearch/{{ $pelamar->id }}/profile/advancedassessment"><button class="advanced text-center">Advanced Assessment</button></a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="hobbybox">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="{{ asset('images/suitcase.png') }}" alt="">
                            </div>
                            <div class="col-md-4">
                                <h3>Project</h3>
                                <span>{{ $pelamar->user->project->start }} - {{ $pelamar->user->project->to }}</span>
                                {{-- <span class=" d-block">{{ $pelamar->projects->start }}</span>
                                 --}}


                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class=>{{ $pelamar->user->project->position }}</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <p>{{ $pelamar->user->project->description }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-2 float-right">
                                <a  href="/jobseeker/profile/project/{{ $user->id }}/edit"><img src="{{ asset('uploads/img/edit3.png') }}" class="float-right" alt=""></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

