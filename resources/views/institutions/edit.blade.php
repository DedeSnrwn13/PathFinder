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
                            <h4 class="mb-0">Edit Applicant</h4>
                        </div>
                        <div class="card-body">
                            <form action="/institutions/dashboard/{{ $pelamar->id }}/update" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <span class="col-md-12">Note: Yang ada tanda " * " wajib di isi</span>

                                    <div class="form-group col-md-6 mt-4">
                                        <label for="InputAvatar">Avatar</label>
                                        <input name="avatar" type="file" class="form-control" id="InputAvatar" placeholder="Choose Avatar">
                                    </div>

                                    <div class="form-group col-md-6 mt-4">
                                        <label for="InputFirstname">Name</label>
                                        <input name="nama" type="text" class="form-control" id="InputFirstname" placeholder="Enter Name" value="{{ $pelamar->nama }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputGender">Gender</label>
                                        <select name="gender" class="custom-select">
                                            <option value="Male" @if($pelamar->gender == 'Male') selected @endif>Male</option>
                                            <option value="Female" @if($pelamar->gender == 'Female') selected @endif>Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputTempatLahir">Tempat Lahir</label>
                                        <input name="tempat_lahir" type="text" class="form-control" id="InputTempatLahir" placeholder="Enter Name" value="{{ $pelamar->tempat_lahir }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputTanggalLahir">Tanggal Lahir</label>
                                        <input name="tanggal_lahir" type="date" class="form-control" id="InputTanggalLahir" placeholder="Enter Name" value="{{ $pelamar->tanggal_lahir }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputAgama">Religion</label>
                                        <input name="agama" type="text" class="form-control" id="InputAgama" placeholder="Enter Name" value="{{ $pelamar->agama }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputMinGaji">Gaji Minimum</label>
                                        <input name="mingaji" type="text" class="form-control" id="InputMinGaji" placeholder="Enter Name" value="{{ $pelamar->mingaji }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputMaxGaji">Gaji Maximum</label>
                                        <input name="maxgaji" type="text" class="form-control" id="InputMaxGaji" placeholder="Enter Name" value="{{ $pelamar->maxgaji }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputPekerjaan">Pekerjaan Yang Ingin Dilamar</label>
                                        <input name="pekerjaan_yang_akan_dilamar" type="text" class="form-control" id="InputPekerjaan" placeholder="Enter Name" value="{{ $pelamar->pekerjaan_yang_akan_dilamar }}">
                                    </div>

                                    <span class="col-md-12 mb-4 mt-3" style="font-size: 30px; font-weight: bolder;">Pekerjaan</span>

                                    <div class="form-group col-md-6">
                                        <label for="InputPekerjaan">Nama Perusahaan</label>
                                        <input name="nama_perusahaan" type="text" class="form-control" id="InputPekerjaan" placeholder="Enter Name" value="{{ $pelamar->pekerjaan->nama_perusahaan }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputPosisi">Posisi</label>
                                        <input name="posisi" type="text" class="form-control" id="InputPosisi" placeholder="Enter Name" value="{{ $pelamar->pekerjaan->posisi }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputMulaiKerja">Mulai Kerja</label>
                                        <input name="mulai_kerja" type="date" class="form-control" id="InputMulaiKerja" placeholder="Enter Name" value="{{ $pelamar->pekerjaan->mulai_kerja }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputBerakhirKerja">Berakhir Kerja</label>
                                        <input name="berakhir_kerja" type="date" class="form-control" id="InputBerakhirKerja" placeholder="Enter Name" value="{{ $pelamar->pekerjaan->berakhir_kerja }}">
                                    </div>

                                    <span class="col-md-12 mb-4 mt-3" style="font-size: 30px; font-weight: bolder;">Pendidikan</span>

                                    <div class="form-group col-md-6">
                                        <label for="InputSekolah">Nama Sekolah</label>
                                        <input name="nama_sekolah" type="text" class="form-control" id="InputSekolah" placeholder="Enter Name" value="{{ $pelamar->pendidikan->nama_sekolah }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputJenjang">Jenjang Pendidikan</label>
                                        <input name="jenjang_pendidikan" type="text" class="form-control" id="InputJenjang" placeholder="Enter Name" value="{{ $pelamar->pendidikan->jenjang_pendidikan }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputJurusan">Jurusan</label>
                                        <input name="jurusan" type="text" class="form-control" id="InputJurusan" placeholder="Enter Name" value="{{ $pelamar->pendidikan->jurusan }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputNilai">Nilai/IPK</label>
                                        <input name="nilai" type="text" class="form-control" id="InputNilai" placeholder="Enter Name" value="{{ $pelamar->pendidikan->nilai }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputMulaiPendidikan">Mulai Pendidikan</label>
                                        <input name="mulai_pendidikan" type="date" class="form-control" id="InputMulaiPendidikan" placeholder="Enter Name" value="{{ $pelamar->pendidikan->mulai_pendidikan }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="InputSelesaiPendidikan">Selesai Pendidikan</label>
                                        <input name="selesai_pendidikan" type="date" class="form-control" id="InputSelesaiPendidikan" placeholder="Enter Name" value="{{ $pelamar->pendidikan->selesai_pendidikan }}">
                                    </div>
                                </div>

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
