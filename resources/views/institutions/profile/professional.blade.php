@extends('layouts.app-two')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pro.css') }}">
@endsection

@section('title', 'My Student Profile | Profesional Skills')

@section('content')

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
    <div class="row mb-5">
        <div class="col-md-3">
            <div class="kategori">
                <a href="/institutions/mystudent/{{ $pelamar->id }}/profile"><button class="aboutme text-center">About Me</button></a>
                <a href="/institutions/mystudent/{{ $pelamar->id }}/profile/project"><button class="projects text-center">Projects</button></a>
                <a href="/institutions/mystudent/{{ $pelamar->id }}/profile/backgroundeducation"><button class="backed text-center">Background Education</button></a>
                <a href="/institutions/mystudent/{{ $pelamar->id }}/profile/professionalskills"><button class="profskill text-center aktif">Professional Skills</button></a>
                <a href="/institutions/mystudent/{{ $pelamar->id }}/profile/basicassessment"><button class="basicass text-center">Basic Assessment</button></a>
                <a href="/institutions/mystudent/{{ $pelamar->id }}/profile/advancedassessment"><button class="advanced text-center">Advanced Assessment</button></a>
            </div>
        </div>
        <div class="col-md-9">
                <div class="hobbybox">
                    <div class="">
                        <img src="{{ asset('img/skills.png') }}" alt="">
                        <span class="title">Professional Skills</span>
                        <div class="bwah">
                            <div class="skill">
                                <ul>
                                    <li><span class="hitam">{{ $pelamar->user->skill['skill_one'] }}</span></li>
                                    <li><span class="hitam">{{ $pelamar->user->skill['skill_two'] }}</span></li>
                                    <li><span class="hitam">{{ $pelamar->user->skill['skill_three'] }}</span></li>
                                    <li><span class="hitam">{{ $pelamar->user->skill['skill_four'] }}</span></li>
                                    <li><span class="hitam">{{ $pelamar->user->skill['skill_five'] }}</span></li>
                                </ul>
                            </div>
                            <div class="tingkat">
                                <div class="ting1">{{ $pelamar->user->skill['skill_level_one'] }}</div>
                                <div class="ting1">{{ $pelamar->user->skill['skill_level_two'] }}</div>
                                <div class="ting1">{{ $pelamar->user->skill['skill_level_three'] }}</div>
                                <div class="ting1">{{ $pelamar->user->skill['skill_level_four'] }}</div>
                                <div class="ting1">{{ $pelamar->user->skill['skill_level_five'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


@endsection

