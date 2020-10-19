@extends('layouts.navbar')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('title', 'Job Seekers | Profile')


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
                    <a href="/jobseeker/profile"><button class="aboutme text-center aktif">About Me</button></a>
                    <a href="/jobseeker/profile/project"><button class="projects text-center">Projects</button></a>
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
                                <div class="col-md-3">
                                    <h4 class="font-weight-bolder">Hobby(s)</h4>
                                </div>
                                <div class="col-md-7">
                                    <span class=" d-block">{{ $user->about->hobby_one }}</span>

                                    <span class=" d-block">{{ $user->about->hobby_two }}</span>

                                    <span class=" d-block">{{ $user->about->hobby_three }}</span>

                                    <span class="d-block">{{ $user->about->hobby_four }}</span>

                                    <span class="d-block">{{ $user->about->hobby_five }}</span>
                                </div>
                                {{-- <div class="col-md-2 float-right">
                                    <a  href="/jobseeker/profile/{{ $user->id }}/edit"><img src="{{ asset('uploads/img/edit3.png') }}" class="float-right" alt=""></a>
                                </div> --}}
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('images/smileyface.png') }}" width="30px" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <h5 class="font-weight-bolder d-block">Strenghts</h5>

                                            <span class="d-block">{{ $user->about->strenght_one }}</span>
                                            <span class="d-block">{{ $user->about->strenght_two }}</span>
                                            <span class="d-block">{{ $user->about->strenght_three }}</span>
                                            <span class="d-block">{{ $user->about->strenght_four }}</span>
                                            <span class="d-block">{{ $user->about->strenght_five }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('images/frownface.png') }}" width="30px" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <h5 class="font-weight-bolder d-block">Weaknesses</h5>

                                            <span class="d-block">{{ $user->about->weakness_one }}</span>
                                            <span class="d-block">{{ $user->about->weakness_two }}</span>
                                            <span class="d-block">{{ $user->about->weakness_three }}</span>
                                            <span class="d-block">{{ $user->about->weakness_four }}</span>
                                            <span class="d-block">{{ $user->about->weakness_five }}</span>
                                        </div>
                                    </div>
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
                <form action="/jobseeker/profile/{{ $user->id }}/update" method="post">
                    @csrf
                    <div class="row ">
                        <h3 class="col-md-12 font-weight-bolder">Add Your About Data</h3>

                        <span class="col-md-12 font-weight-bolder">Hobby(s)</span>

                        <div class="form-group col-md-6 mt-2">
                            <label for="Inputhobby_one">Hobby 1</label>
                            <input name="hobby_one" type="text" class="form-control" id="Inputhobby_one" placeholder="What are your hobbies" value="{{ $user->hobby_one }}">
                        </div>
                        <div class="form-group col-md-6  mt-2">
                            <label for="Inputhobby_two">Hobby 2</label>
                            <input name="hobby_two" type="text" class="form-control" id="Inputhobby_two" placeholder="What are your hobbies" value="{{ $user->hobby_two }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputhobby_three">Hobby 3</label>
                            <input name="hobby_three" type="text" class="form-control" id="Inputhobby_three" placeholder="What are your hobbies" value="{{ $user->hobby_three }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputhobby_four">Hobby 4</label>
                            <input name="hobby_four" type="text" class="form-control" id="Inputhobby_four" placeholder="What are your hobbies" value="{{ $user->hobby_four }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputhobby_five">Hobby 5</label>
                            <input name="hobby_five" type="text" class="form-control" id="Inputhobby_five" placeholder="What are your hobbies" value="{{ $user->hobby_five }}">
                        </div>

                        <span class="col-md-12 font-weight-bolder mt-2">Strenghts</span>

                        <div class="form-group col-md-6 mt-2">
                            <label for="Inputstrenght_one">Strength 1</label>
                            <input name="strenght_one" type="text" class="form-control" id="Inputstrenght_one" placeholder="What is your strength" value="{{ $user->strenght_one }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputstrenght_two">Strength 2</label>
                            <input name="strenght_two" type="text" class="form-control" id="Inputstrenght_two" placeholder="What is your strength" value="{{ $user->strenght_two }}">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="Inputstrenght_three">Strength 3</label>
                            <input name="strenght_three" type="text" class="form-control" id="Inputstrenght_three" placeholder="What is your strength" value="{{ $user->strenght_three }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputstrenght_four">Strength 4</label>
                            <input name="strenght_four" type="text" class="form-control" id="Inputstrenght_four" placeholder="What is your strength" value="{{ $user->strenght_four }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputstrenght_five">Strength 5</label>
                            <input name="strenght_five" type="text" class="form-control" id="Inputstrenght_five" placeholder="What is your strength" value="{{ $user->strenght_five }}">
                        </div>

                        <span class="col-md-12 font-weight-bolder mt-2">Weaknesses</span>

                        <div class="form-group col-md-6 mt-2">
                            <label for="Inputweakness_one">Weakness 1</label>
                            <input name="weakness_one" type="text" class="form-control" id="Inputweakness_one" placeholder="What is your strength" value="{{ $user->weakness_one }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputweakness_two">Weakness 2</label>
                            <input name="weakness_two" type="text" class="form-control" id="Inputweakness_two" placeholder="What is your strength" value="{{ $user->weakness_two }}">
                        </div>
                        <div class="form-group col-md-6 mt-2">
                            <label for="Inputweakness_three">Weakness 3</label>
                            <input name="weakness_three" type="text" class="form-control" id="Inputweakness_three" placeholder="What is your strength" value="{{ $user->weakness_three }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputweakness_four">Weakness 4</label>
                            <input name="weakness_four" type="text" class="form-control" id="Inputweakness_four" placeholder="What is your strength" value="{{ $user->weakness_four }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Inputweakness_five">Weakness 5</label>
                            <input name="weakness_five" type="text" class="form-control" id="Inputweakness_five" placeholder="What is your strength" value="{{ $user->weakness_five }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

