

@extends('layouts.navbar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/talentsearch.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('title', 'Job Seekerh | Profile Project')

@section('content')
<div class="bg">
    <div class="container">
        <div class="row">

                <div class="col-md-3">
                    <img class="profil" src="{{ $user->pelamar->getAvatar() }}" alt="">
                    <p class="text-center" id="teks">Registered on {{ \Carbon\Carbon::parse($user->pelamar->created_at)->diffForHumans(null, true) }}</p>
                    <button type="button" id="btn" class="btn btn-outline-secondary btn-sm white" data-toggle="modal" data-target="#exampleModal">
                        <b>FORWARD RESUME</b>
                    </button>
                </div>

                <div class="col-md-4">
                    <div class="name mt-5">
                        <h4><b>{{ $user->pelamar->nama }}</b></h4>
                        <p class="Major">{{ $user->pelamar->pendidikan->jurusan }} Student at {{ $user->pelamar->pendidikan->nama_sekolah }}</p>
                    </div>
                    <div class="contact">
                        <div class="key">
                            <b><span>Email</span>
                            <span>Phone Number</span>
                            <span>Location</span></b>
                        </div>
                        <div class="value">
                            <span>{{ $user->email }}</span>
                            <br>
                            <span>--</span>
                            <br>
                            <span>{{ $user->pelamar->tempat_lahir }}</span>
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
                <a href="/jobseeker/profile"><button class="aboutme text-center ">About Me</button></a>
                <a href="/jobseeker/profile/project"><button class="projects text-center aktif">Projects</button></a>
                <a href="/jobseeker/profile/backgroundeducation"><button class="backed text-center">Background Education</button></a>
                <a href="/jobseeker/profile/professionalskills"><button class="profskill text-center">Professional Skills</button></a>
                <a href="/jobseeker/profile/basicassessment"><button class="basicass text-center">Basic Assessment</button></a>
                <a href="/jobseeker/profile/advancedassessment"><button class="advanced text-center">Advanced Assessment</button></a>
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
                                <span>{{ $user->project['start'] }} - {{ $user->project['to'] }}</span>
                                {{-- <span class=" d-block">{{ $pelamar->projects->start }}</span>
                                 --}}


                            </div>
                            <div class="col-md-5">
                                <h4 class="d-block">{{ $user->project['position'] }}</h4>
                                <span class="d-block">
                                    {{ $user->project['description'] }}
                                </span>
                            </div>
                            <div class="col-md-2 float-right">
                                <a  href="/jobseeker/profile/project/{{ $user->id }}/edit"><img src="{{ asset('uploads/img/edit3.png') }}" class="float-right" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container edit-data">
    <div class="row mb-5">
        <div class="col-md-3 offset"></div>
        <div class="col-md-7 ml-4">
            <form action="/jobseeker/profile/project/{{ $user->id }}/update" method="post">
                @csrf
                <div class="row ">
                    <h3 class="col-md-12 font-weight-bolder">Add Your Project Data</h3>

                    <div class="form-group col-md-6 mt-2">
                        <label for="Inputstart">Start working</label>
                        <input name="start" type="date" class="form-control" id="Inputstart">
                    </div>
                    <div class="form-group col-md-6  mt-2">
                        <label for="Inputto">Ends work</label>
                        <input name="to" type="date" class="form-control" id="Inputto" >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Inputposition">Position</label>
                        <input name="position" type="text" class="form-control" id="Inputposition" placeholder="What position are you in" value="{{ $user->hobby_three }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Inputdescription w-100">Description</label>
                        <textarea name="description" id="Inputdescription" class="d-block" cols="87" rows="10" placeholder="Describe what you have done during work"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

