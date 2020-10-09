@extends('layouts.app-two')
@section('css')
    <link href="{{ asset('css/institutions-mystudents-edit.css') }}" rel="stylesheet">
@endsection
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

            <div class="row mx-auto justify-content-center mt-5">

                <div class="col-md-9">
                    <h4 class=""><a href="/institutions/dashboard">Back</a></h4>
                </div>

            </div>

            <div class="row mx-auto justify-content-center">
                <div class="col-md-9">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h4 class="mb-0">Add Applicant</h4>
                        </div>
                        <div class="card-body">
                            <form action="/institutions/dashboard/postcreate" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- <div class="row"> --}}
                                    {{-- <span class="col-md-12">Note: Yang ada tanda " * " wajib di isi</span> --}}

                                    <div class="form-group col-md-6 mt-3 float-left">
                                        <label for="InputAvatar">Avatar</label>
                                        <input name="avatar" type="file" class="form-control" id="InputAvatar" placeholder="Choose Avatar">
                                    </div>

                                    <div class="form-group col-md-6 mt-3 float-right">
                                        <label for="InputFirstname">Name</label>
                                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="InputFirstname" value="{{ old('nama') }}" placeholder="Enter Applicant Name">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label for="InputEmail">Email</label>
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail" value="{{ old('email') }}" placeholder="Enter Applicant Mail">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-right">
                                        <label for="InputGender">Gender</label>
                                        <select name="gender" class="custom-select  @error('gender') is-invalid @enderror">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label for="InputTempatLahir">Tempat Lahir</label>
                                        <input name="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="InputTempatLahir" value="{{ old('tempat_lahir') }}" placeholder="Enter Tempat Lahir">
                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-right">
                                        <label for="InputTanggalLahir">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="InputTanggalLahir" value="{{ old('tanggal_lahir') }}" placeholder="Enter Tanggal Lahir">
                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label for="InputAgama">Religion</label>
                                        <input name="agama" type="text" class="form-control @error('agama') is-invalid @enderror" id="InputAgama" value="{{ old('agama') }}" placeholder="Enter Applicant Religion">
                                        @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('agama') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-right">
                                        <label for="InputMinGaji">Gaji Minimum</label>
                                        <input name="mingaji" type="text" class="form-control @error('mingaji') is-invalid @enderror" id="InputMinGaji" value="{{ old('mingaji') }}" placeholder="Enter Gaji Minimum">
                                        @error('mingaji')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mingaji') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label for="InputMaxGaji">Gaji Maximum</label>
                                        <input name="maxgaji" type="text" class="form-control @error('maxgaji') is-invalid @enderror" id="InputMaxGaji" value="{{ old('maxgaji') }}" placeholder="Enter Gaji Maksimum">
                                        @error('maxgaji')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('maxgaji') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-right">
                                        <label for="InputPekerjaan">Pekerjaan Yang Ingin Dilamar</label>
                                        <input name="pekerjaan_yang_akan_dilamar" type="text" class="form-control @error('pekerjaan_yang_akan_dilamar') is-invalid @enderror" id="InputPekerjaan" value="{{ old('pekerjaan_yang_akan_dilamar') }}" placeholder="Enter Pekerjaan Yang Ingin Dilamar" >
                                        @error('pekerjaan_yang_akan_dilamar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pekerjaan_yang_akan_dilamar') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label for="InputCreated_by">Created_By</label>
                                        <input name="created_by" type="text" class="form-control @error('created_by') is-invalid @enderror" id="InputCreated_by" value="{{ old('created_by') }}" placeholder="Enter Your Name">
                                        @error('created_by')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('created_by') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-right">
                                        <label for="InputUpdated_by">Updated_By</label>
                                        <input name="updated_by" type="text" class="form-control @error('updated_by') is-invalid @enderror" id="InputUpdated_by" value="{{ old('updated_by') }}" placeholder="Enter Your Name">
                                        @error('updated_by')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('updated_by') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <span class="col-md-12 mb-4 mt-3 float-left" style="font-size: 30px; font-weight: bolder;">Pekerjaan</span>

                                    <div class="form-group col-md-6 mt-2 float-left">
                                        <label for="InputPekerjaan">Nama Perusahaan</label>
                                        <input name="nama_perusahaan" type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" id="InputPekerjaan" value="{{ old('nama_perusahaan') }}" placeholder="Enter Nama Perusahaan Dulu">
                                        @error('nama_perusahaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama_perusahaan') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mt-2 float-right">
                                        <label for="InputPosisi">Posisi</label>
                                        <input name="posisi" type="text" class="form-control @error('posisi') is-invalid @enderror" id="InputPosisi" value="{{ old('posisi') }}" placeholder="Enter Posisi Dulu">
                                        @error('posisi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('posisi') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label for="InputMulaiKerja">Mulai Kerja</label>
                                        <input name="mulai_kerja" type="date" class="form-control @error('mulai_kerja') is-invalid @enderror" id="InputMulaiKerja" value="{{ old('mulai_kerja') }}" placeholder="Enter Kapan Mulai Kerja">
                                        @error('mulai_kerja')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mulai_kerja') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-right">
                                        <label for="InputBerakhirKerja">Berakhir Kerja</label>
                                        <input name="berakhir_kerja" type="date" class="form-control @error('berakhir_kerja') is-invalid @enderror" id="InputBerakhirKerja" value="{{ old('berakhir_kerja') }}" placeholder="Enter Kapan Berakhir Kerja">
                                        @error('berakhir_kerja')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('berakhir_kerja') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <span class="col-md-12 mb-4 mt-3 float-left" style="font-size: 30px; font-weight: bolder;">Pendidikan</span>

                                    <div class="form-group col-md-6 mt-2 float-left">
                                        <label for="InputSekolah">Nama Sekolah</label>
                                        <input name="nama_sekolah" type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="InputSekolah" value="{{ old('nama_sekolah') }}" placeholder="Enter Nama Sekolah">
                                        @error('nama_sekolah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama_sekolah') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 mt-2 float-right">
                                        <label for="InputJenjang">Jenjang Pendidikan</label>
                                        <input name="jenjang_pendidikan" type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="InputJenjang" value="{{ old('jenjang_pendidikan') }}" placeholder="Enter Jenjang Pendidikan">
                                        @error('nama_sekolah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nama_sekolah') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label for="InputJurusan">Jurusan</label>
                                        <input name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" id="InputJurusan" value="{{ old('jurusan') }}"  placeholder="Enter Jurusan">
                                        @error('jurusan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('jurusan') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-right">
                                        <label for="InputNilai">Nilai</label>
                                        <input name="nilai" type="text" class="form-control @error('nilai') is-invalid @enderror" id="InputNilai" value="{{ old('nilai') }}" placeholder="Enter Nilai/IPK">
                                        @error('nilai')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nilai') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-left">
                                        <label for="InputMulaiPendidikan">Mulai Pendidikan</label>
                                        <input name="mulai_pendidikan" type="date" class="form-control @error('mulai_pendidikan') is-invalid @enderror" id="InputMulaiPendidikan" value="{{ old('mulai_pendidikan') }}" placeholder="Enter Kapan Mulai Sekolah Terakhir" >
                                        @error('mulai_pendidikan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mulai_pendidikan') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6 float-right">
                                        <label for="InputSelesaiPendidikan">Selesai Pendidikan</label>
                                        <input name="selesai_pendidikan" type="date" class="form-control @error('selesai_pendidikan') is-invalid @enderror" id="InputSelesaiPendidikan" value="{{ old('selesai_pendidikan') }}" placeholder="Enter Kapan Selesai Sekolah Terakhir">
                                        @error('selesai_pendidikan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('selesai_pendidikan') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                {{-- </div> --}}

                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
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
