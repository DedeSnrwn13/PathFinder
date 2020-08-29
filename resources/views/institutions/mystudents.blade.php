@extends('layouts.app-two')
<link href="{{ asset('css/institutions-mystudents.css') }}" rel="stylesheet">
@section('title', 'Institutions | My Students')

@section('content')
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade dashboard" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
        <div class="container">
            {{-- @if (session('sukses'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif --}}
            <div class="row mt-5">
                <div class="col-md-12">
                    <h1 class=""><a href="/institutions/dashboard">Dashboard</a></h1>
                </div>
            </div>
            {{-- <div class="row mt-3">
                <div class="col-md-2">
                    <div class="matric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p style="margin-top: 10px; margin-bottom: 0 !important;">
                            <span class="number">{{ totalSiswa() }}</span>
                            <span class="title">Total Siswa</span>
                        </p>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-10">
                    <div class="search">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="GET" action="/institutions/dashboard">
                                    <div class="form-bg">
                                        <input name="cari" class="form-control" type="search" placeholder="Search student" aria-label="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right tambah" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                    </button>
                </div>
            </div>
            <br>
            <table class="table table-bordered table-hover mb-5 tabel">
                <thead class="thead-dark">
                <tr>
                    <th scope="col-md">No</th>
                    <th scope="col-md">Avatar</th>
                    <th scope="col-md">Firstname</th>
                    <th scope="col-md">Lastname</th>
                    <th scope="col-md">Email</th>
                    <th scope="col-md">Gender</th>
                    <th scope="col-md">Religion</th>
                    <th scope="col-md">Address</th>
                    <th scope="col-md">Institution Id</th>
                    <th scope="col-md">Major</th>
                    <th scope="col-md">Major Average</th>
                    <th scope="col-md">Age</th>
                    <th scope="col-md">Expertise</th>
                    <th scope="col-md">Experience</th>
                    <th scope="col-md">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                @foreach ($data_siswa as $dasis)
                    <tr>
                        <th>{{ $no }}</th>
                        <td><img src="{{ $dasis->getAvatar() }}" alt="Avatar" width="50px" height="50px"></td>
                        <td>{{ $dasis->firstname }}</td>
                        <td>{{ $dasis->lastname }}</td>
                        <td>{{ $dasis->email }}</td>
                        <td>{{ $dasis->gender }}</td>
                        <td>{{ $dasis->religion }}</td>
                        <td>{{ $dasis->address }}</td>
                        <td>{{ $dasis->institution_id }}</td>
                        <td>{{ $dasis->major }}</td>
                        <td>{{ $dasis->major_average }}</td>
                        <td>{{ $dasis->age }} years</td>
                        <td>{{ $dasis->expertise }}</td>
                        <td>{{ $dasis->experience }} years</td>
                        <td>
                            <a href="/institutions/dashboard/{{ $dasis->id }}/edit" class="btn btn-warning btn-sm float-md-left edit">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm float-md-right del" siswa-id="{{ $dasis->id }}">Delete</a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                @endforeach
                </tbody>
            </table>

            {{ $data_siswa->links() }}

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="/institutions/dashboard/create" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('POST') --}}
                                <div class="form-group">
                                    <label for="InputAvatar">Avatar</label>
                                    <input name="avatar" type="file" class="form-control" id="InputAvatar" placeholder="Choose Avatar">
                                    @if ($errors->has('avatar'))
                                        <span class="help-block text-danger">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                                    <label for="InputFirstname">Firstname</label>
                                    <input name="firstname" type="text" class="form-control" id="InputFirstname" placeholder="Enter Firstname" value="{{ old('firstname') }}">
                                    @if ($errors->has('firstname'))
                                        <span class="help-block text-danger">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="InputLastname">Lastname</label>
                                    <input name="lastname" type="text" class="form-control" id="InputLastname" placeholder="Enter Lastname" value="{{ old('lastname') }}">
                                </div>

                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="InputEmail">Email</label>
                                    <input name="email" type="text" class="form-control" id="InputEmail" placeholder="Enter Email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                    <label for="InputGender">Gender</label>
                                    <select name="gender" class="custom-select">
                                        <option value="Male" {{ (old('gender') == 'L') ? ' selected' : '' }}>Male</option>
                                        <option value="Female" {{ (old('gender') == 'P') ? ' selected' : '' }}>Female</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block text-danger">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('religion') ? 'has-error' : '' }}">
                                    <label for="InputReligion">Religion</label>
                                    <input name="religion" type="text" class="form-control" id="InputReligion" placeholder="Enter Religion" value="{{ old('religion') }}">
                                    @if ($errors->has('religion'))
                                        <span class="help-block text-danger">{{ $errors->first('religion') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <label for="InputAddress">Address</label>
                                    <textarea name="address" class="form-control" id="InputAddress" rows="3" >{{ old('address') }}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="help-block text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>

                                <div class="form-group ">
                                    <label for="InputInstitution">Institution</label>
                                    <select name="institution_id" class="custom-select">
                                        @foreach ($institution as $institusi)
                                        <option value="{{ $institusi->id }}">{{ $institusi->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group {{ $errors->has('major') ? 'has-error' : '' }}">
                                    <label for="inputMajor">Major</label>
                                    <input name="major" type="text" class="form-control" id="inputMajor" placeholder="Enter Major" value="{{ old('major') }}">
                                    @if ($errors->has('major'))
                                        <span class="help-block text-danger">{{ $errors->first('major') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('major_average') ? 'has-error' : '' }}">
                                    <label for="inputMajorAverage">Major Average</label>
                                    <input name="major_average" type="text" class="form-control" id="inputMajorAverage" placeholder="Enter Major Average" value="{{ old('major_average') }}">
                                    @if ($errors->has('major_average'))
                                        <span class="help-block text-danger">{{ $errors->first('major_average') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
                                    <label for="inputAge">Age</label>
                                    <input name="age" type="text" class="form-control" id="inputAge" placeholder="Enter Age" value="{{ old('age') }}">
                                    @if ($errors->has('age'))
                                        <span class="help-block text-danger">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('expertise') ? 'has-error' : '' }}">
                                    <label for="inputExpertise">Expertise</label>
                                    <input name="expertise" type="text" class="form-control" id="Expertise" placeholder="Enter Expertise" value="{{ old('expertise') }}">
                                    @if ($errors->has('expertise'))
                                        <span class="help-block text-danger">{{ $errors->first('expertise') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('experience') ? 'has-error' : '' }}">
                                    <label for="inputExperience">Experience</label>
                                    <input name="experience" type="text" class="form-control" id="inputExperience" placeholder="how many years of your experience" value="{{ old('experience') }}">
                                    @if ($errors->has('experience'))
                                        <span class="help-block text-danger">{{ $errors->first('experience') }}</span>
                                    @endif
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade show active mystudents" id="pills-mystudents" role="tabpanel" aria-labelledby="pills-mystudents-tab">
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

                    <button type="submit" class="upload mx-auto" data-toggle="modal" data-target="#importexel">
                        UPLOAD
                    </button>
                </div>
            </div>

            <div class="modal fade" id="importexel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="/institutions/dashboard/importxlsx" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('POST') --}}

                                <div class="form-group">
                                    <label for="InputExel">Import Students Data</label>
                                    <input type="file" class="form-control" name="import_exel" id="InputExel">
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade profil" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
</div>

@endsection

@section('footer')
<script>
    $('.del').click(function() {
        var siswa_id = $(this).attr('siswa-id');

        swal({
            title: "Are you sure?",
            text: "Want to delete student data with id "+ siswa_id +" ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/institutions/dashboard/"+siswa_id+"/delete";
            }
        });
    });


</script>
@endsection
