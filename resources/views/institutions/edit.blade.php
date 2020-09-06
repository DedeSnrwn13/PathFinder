@extends('layouts.app-two')
<link href="{{ asset('css/institutions-mystudents-edit.css') }}" rel="stylesheet">
@section('title', 'Institutions | My Students')

@section('content')
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active dashboard" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
        <div class="container">
            @if (session('sukses'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('sukses') }}
            </div>
            @endif

            <div class="row mt-5">
                <div class="col-md-3 offset"></div>
                <div class="col-md-6">
                    <h4 class=""><a href="/institutions/dashboard">Back</a></h4>
                </div>
                <div class="col-md-3 offset"></div>
            </div>

            <div class="row">
                <div class="col-md-3 offset"></div>
                <div class="col-md-6">
                    <h1 class="mt-2">Edit Data Siswa</h1>
                </div>
                <div class="col-md-3 offset"></div>
            </div>

            <div class="row mt-4 mb-3">
                <div class="col-md-3 offset"></div>
                <div class="col-md-6 justify-content-center">
                    <form action="/institutions/dashboard/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('POST') --}}
                        <div class="form-group">
                            <label for="InputAvatar">Avatar</label>
                            <input name="avatar" type="file" class="form-control" id="InputAvatar" placeholder="Choose Avatar">
                        </div>

                        <div class="form-group">
                            <label for="InputFirstname">Firstname</label>
                            <input name="firstname" type="text" class="form-control" id="InputFirstname" placeholder="Enter Firstname" value="{{ $siswa->firstname }}">
                        </div>

                        <div class="form-group">
                            <label for="InputLastname">Lastname</label>
                            <input name="lastname" type="text" class="form-control" id="InputLastname" placeholder="Enter Lastname" value="{{ $siswa->lastname }}">
                        </div>

                        <div class="form-group">
                            <label for="InputEmail">Email</label>
                            <input name="email" type="email" class="form-control" id="InputEmail" placeholder="Enter Email" value="{{ $siswa->email }}">
                        </div>

                        <div class="form-group">
                            <label for="InputGender">Gender</label>
                            <select name="gender" class="custom-select">
                                <option value="L" @if($siswa->gender == 'L') selected @endif>Male</option>
                                <option value="P" @if($siswa->gender == 'P') selected @endif>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="InputReligion">Religion</label>
                            <input name="religion" type="text" class="form-control" id="InputReligion" placeholder="Enter Religion" value="{{ $siswa->religion }}">
                        </div>

                        <div class="form-group">
                            <label for="InputAddress">Address</label>
                            <textarea name="address" class="form-control" id="InputAddress" rows="3">{{ $siswa->address }}</textarea>
                        </div>

                        <div class="form-group ">
                            <label for="InputInstitution">Institution</label>
                            <select name="institution_id" class="custom-select">
                                <option value="{{ $siswa->institution_id }}" @if($siswa->institution_id == '{{ $siswa->institution->id }}') selected @endif>{{ $siswa->institution->name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputMajor">Major</label>
                            <input name="major" type="text" class="form-control" id="inputMajor" placeholder="Enter Major" value="{{ $siswa->major }}">
                        </div>

                        <div class="form-group">
                            <label for="inputMajorAverage">Major Average</label>
                            <input name="major_average" type="text" class="form-control" id="inputMajorAverage" placeholder="Enter Major Average" value="{{ $siswa->major_average }}">
                        </div>

                        <div class="form-group">
                            <label for="inputAge">Age</label>
                            <input name="age" type="text" class="form-control" id="inputAge" placeholder="Enter Age" value="{{ $siswa->age }}">
                        </div>

                        <div class="form-group">
                            <label for="inputExpertise">Expertise</label>
                            <input name="expertise" type="text" class="form-control" id="Expertise" placeholder="Enter Expertise" value="{{ $siswa->expertise }}">
                        </div>

                        <div class="form-group">
                            <label for="inputExperience">Experience</label>
                            <input name="experience" type="text" class="form-control" id="inputExperience" placeholder="how many years of your experience" value="{{ $siswa->experience }}">
                        </div>

                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
                <div class="col-md-3 offset"></div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade mystudents" id="pills-mystudents" role="tabpanel" aria-labelledby="pills-mystudents-tab">
        <div class="container">
            <div class="search">
                <div class="row">
                    <div class="col-md-10">
                        <form action="">
                            <div class="form-bg">
                                <input class="form-control" type="search" placeholder="Search by Name, or Grades " aria-label="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card my-5 p-3 w-50 mx-md-auto">
                <div class="card-body text-center">
                    <p class="text-md">You haven't uploaded the students data</p>
                    <p class="text-md">Click the button below to upload data</p>
                    <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label mx-auto" for="inputGroupFile01"></label>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade profil" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
</div>
@endsection
