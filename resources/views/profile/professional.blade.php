@extends('layouts.navbar')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pro.css') }}">
@endsection

@section('title', 'Job Seekers | Profesional Skills')

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
                <a href="/jobseeker/profile"><button class="aboutme text-center">About Me</button></a>
                <a href="/jobseeker/profile/project"><button class="projects text-center">Projects</button></a>
                <a href="/jobseeker/profile/backgroundeducation"><button class="backed text-center">Background Education</button></a>
                <a href="/jobseeker/profile/professionalskills"><button class="profskill text-center aktif2">Professional Skills</button></a>
                <a href="/jobseeker/profile/basicassessment"><button class="basicass text-center">Basic Assessment</button></a>
                <a href="/jobseeker/profile/advancedassessment"><button class="advanced text-center">Advanced Assessment</button></a>
            </div>
        </div>
        <div class="col-md-9">
                <div class="hobbybox">
                    <div class="konten">
                        <img src="{{ asset('img/skills.png') }}" alt="">
                        <span class="title">Professional Skills</span>
                        <div class="bwah">
                            <div class="skill">
                                <ul>
                                    <li><span class="hitam">{{ $user->skill['skill_one'] }}</span></li>
                                    <li><span class="hitam">{{ $user->skill['skill_two'] }}</span></li>
                                    <li><span class="hitam">{{ $user->skill['skill_three'] }}</span></li>
                                    <li><span class="hitam">{{ $user->skill['skill_four'] }}</span></li>
                                    <li><span class="hitam">{{ $user->skill['skill_five'] }}</span></li>
                                </ul>
                            </div>
                            <div class="tingkat">
                                <div class="ting1">{{ $user->skill['skill_level_one'] }}</div>
                                <div class="ting1">{{ $user->skill['skill_level_two'] }}</div>
                                <div class="ting1">{{ $user->skill['skill_level_three'] }}</div>
                                <div class="ting1">{{ $user->skill['skill_level_four'] }}</div>
                                <div class="ting1">{{ $user->skill['skill_level_five'] }}</div>
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
            <form action="/jobseeker/profile/professionalskills/{{ $user->id }}/update" method="post">
                @csrf
                <div class="row ">
                    <h3 class="col-md-12 font-weight-bolder">Add Your Skills Data</h3>

                    <div class="form-group col-md-6 mt-2">
                        <label for="Inputskill_one">Skill 1</label>
                        <input name="skill_one" type="text" class="form-control" id="Inputskill_one">
                    </div>
                    <div class="form-group col-md-6  mt-2">
                        <label for="Inputlevel_skill_one">Level Skill 1</label>
                        <select name="skill_level_one" id="Inputlevel_skill_two" class="form-control">
                            <option value="" disabled selected>Select Skill Level</option>
                            <option value="advanced">Advanced</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="beginner">Beginner</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Inputskill_two">Skill 2</label>
                        <input name="skill_two" type="text" class="form-control" id="Inputskill_two">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Inputlevel_skill_two">Level Skill 2</label>
                        <select name="skill_level_two" id="Inputlevel_skill_two" class="form-control">
                            <option value="" disabled selected>Select Skill Level</option>
                            <option value="advanced">Advanced</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="beginner">Beginner</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 mt-2">
                        <label for="Inputskill_three">Skill 3</label>
                        <input name="skill_three" type="text" class="form-control" id="Inputskill_three">
                    </div>
                    <div class="form-group col-md-6  mt-2">
                        <label for="Inputlevel_skill_three">Level Skill 3</label>
                        <select name="skill_level_three" id="Inputlevel_skill_two" class="form-control">
                            <option value="" disabled selected>Select Skill Level</option>
                            <option value="advanced">Advanced</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="beginner">Beginner</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Inputskill_four">Skill 4</label>
                        <input name="skill_four" type="text" class="form-control" id="Inputskill_four">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Inputlevel_skill_four">Level Skill 4</label>
                        <select name="skill_level_four" id="Inputlevel_skill_two" class="form-control">
                            <option value="" disabled selected>Select Skill Level</option>
                            <option value="advanced">Advanced</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="beginner">Beginner</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Inputskill_five">Skill 5</label>
                        <input name="skill_five" type="text" class="form-control" id="Inputskill_five">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Inputlevel_skill_five">Level Skill 5</label>
                        <select name="skill_level_five" id="Inputlevel_skill_two" class="form-control">
                            <option disabled selected>Select Skill Level</option>
                            <option value="advanced">Advanced</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="beginner">Beginner</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>


@endsection

