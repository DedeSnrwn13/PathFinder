@extends('layouts.app-two')
@section('css')
    <link href="{{ asset('css/institutions-mystudents.css') }}" rel="stylesheet">
@endsection
@section('title', 'Institutions | My Students')

@section('content')
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade dashboard" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab">
        <div class="container">
            @if (session('sukses'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
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
                                        <input name="search" class="form-control" type="search" placeholder="Search student" aria-label="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <!-- Button trigger modal -->
                        <a href="/institutions/dashboard/add">
                            <button type="button" class="btn btn-primary float-right tambah">
                                Tambah Data
                            </button>
                        </a>
                </div>
            </div>
            <br>
            <table class="table table-striped table-bordered table-hover tabel" id="datatable" style="width: 100%;">
                <thead class="thead-dark">
                <tr>
                    <th scope="col-md">No</th>
                    <th scope="col-md">Institution Name </th>
                    <th scope="col-md">Avatar</th>
                    <th scope="col-md">Name</th>
                    <th scope="col-md">Email</th>
                    <th scope="col-md">Gender</th>
                    <th scope="col-md">Place Of Birth</th>
                    <th scope="col-md">Date Of Birth</th>
                    <th scope="col-md">Born</th>
                    <th scope="col-md">Religion</th>
                    <th scope="col-md">Min Salary</th>
                    <th scope="col-md">Max Salary</th>
                    <th scope="col-md">Want to apply</th>
                    <th scope="col-md">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data_siswa as $dasis)
                    <tr>
                        <th>{{ $no }}</th>
                        <td>{{ $dasis->pendidikan->nama_sekolah }}</td>
                        <td><img src="{{ $dasis->getAvatar() }}" alt="Avatar" width="50px" height="50px"></td>
                        <td>{{ $dasis->nama }}</td>
                        <td>{{ $dasis->email }}</td>
                        <td>{{ $dasis->gender }}</td>
                        <td>{{ $dasis->tempat_lahir }}</td>
                        <td>{{ $dasis->tanggal_lahir }}</td>
                        <td>{{ \Carbon\Carbon::parse($dasis->tanggal_lahir)->diffForHumans(null, true) }}</td>
                        <td>{{ $dasis->agama }}</td>
                        <td>{{ $dasis->mingaji }}</td>
                        <td>{{ $dasis->maxgaji }}</td>
                        <td>{{ $dasis->pekerjaan_yang_akan_dilamar }}</td>
                        <td>
                            <a href="/institutions/dashboard/{{ $dasis->id }}/edit" class="btn btn-warning btn-sm edit float-left">Edit</a>
                            <a rel="{{ $dasis->id }}" rel1="delete" href="javascript:" class="btn btn-danger btn-sm del float-right" pelamar-id="{{ $dasis->id }}" id="deletePelamar">Delete</a>
                        </td>
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
                </tbody>
            </table>

            {{ $data_siswa->links() }}


        </div>
    </div>
    <div class="tab-pane fade show active mystudents" id="pills-mystudents" role="tabpanel" aria-labelledby="pills-mystudents-tab">
        <div class="container-md">
            <!-- notifikasi sukses -->
            <div class="row">
                @if(Session('suksesupload'))
                    <div class="popup-wrapper" id="popup">
                        <div class="popup-container">
                            <form action="" method="GET" class="popup-form">
                                @csrf
                                <span>{{ Session('suksesupload') }}</span>
                                <div class="suksesupload">
                                    <a class="popup-close" href="/institutions/dashboard">OK</a>

                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            <div class="search">
                <div class="row">
                    <div class="col-md-9">
                        <form action="">
                            <div class="form-bg">
                                <input name="search" class="form-control" type="search" placeholder="Search by Name, or Grades " aria-label="Search">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 offset"></div>
                </div>
            </div>
            <div class="list-students">
                <div class="row ">
                    {{-- {{ $data_siswa = App\Pelamar::find(1)->data_siswa }} --}}
                    @foreach ($data_siswa as $daftar)
                        <div class="col-md-6 pb-4">
                            <div class="box">
                                    <div class="kiri text-center">
                                        <h5 class="name">{{ $daftar->nama }}</h5>
                                        <p class="age">{{ $daftar->gender }} <span class="text-bold">.</span> {{ \Carbon\Carbon::parse($daftar->tanggal_lahir)->diffForHumans(null, true) }}</p>
                                        <a href="/institutions/mystudent/{{ $daftar->id }}/profile"><img class="profil" src="{{ $daftar->getAvatar() }}" alt=""></a>
                                        <p class="created_at align-items-end">Regitered on {{ \Carbon\Carbon::parse($daftar->created_at)->diffForHumans(null, true) }}</p>
                                    </div>
                                    <div class="tengah">
                                        <div class="grades">
                                            <div class="icon">
                                                <img src="{{ asset('uploads/img/edu.png') }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <span>Grades</span>
                                                </div>
                                                <div class="key">
                                                    <div class="major">
                                                        <span>Major</span><br>
                                                        <span>MajorAverage</span>
                                                    </div>
                                                    <div class="value">
                                                        <span> {{ $daftar->pendidikan->jurusan }} </span><br>
                                                        <span>{{ $daftar->pendidikan->nilai }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="projects">
                                            <div class="icon">
                                                <img src="{{ asset('uploads/img/suitcase.png') }}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="title">
                                                    <span>Projects</span>
                                                </div>
                                                <div class="value">
                                                    <span>{{ $daftar->pekerjaan->posisi }}</span><br>
                                                    <span>{{ $daftar->berakhir_kerja-$daftar->mulai_kerja }} yrs of experience</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kanan">
                                        <a  href="/institutions/dashboard/{{ $daftar->id }}/edit"><img src="{{ asset('uploads/img/edit3.png') }}" alt=""></a>
                                    </div>
                            </div>
                        </div>
                    @endforeach
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
                            {{-- @foreach ($downloads as $down)
                                <span>{{ $down->file_title }}</span>
                                <a href="download/{{ $down->file_name }}" download="{{ $down->file_name }}" alt="">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        <i class="glyphicon glyphicon-download"></i> Download Excel xlsx
                                    </button>
                                </a>
                            @endforeach --}}

                            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('POST') --}}

                                <div class="form-group">
                                    <label for="InputExcel">Import Students Data</label>
                                    <input type="file" class="form-control" name="import_excel" id="InputExcel" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-sm">Import</button>
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
    // $(document).ready(function() {
    //     $('.popup-close').click(function(){
    //         $('.popup-area').removeClass('popup-actived');
    //     });
    //     // $('#datatable').DataTable({
    //     //     processing: true,
    //     //     serverside: true,
    //     //     responsive: true,
    //     //     ajax: "{{ route('ajax.get.data.siswa') }}",
    //     //     columns: [
    //     //         {data: 'institution_id', name:'institution_id'},
    //     //         {data: 'avatar', name:'avatar'},
    //     //         {data: 'firstname', name:'firstname'},
    //     //         {data: 'firstname', name:'firstname'},
    //     //         {data: 'email', name:'email'},
    //     //         {data: 'gender', name:'gender'},
    //     //         {data: 'religion', name:'religion'},
    //     //         {data: 'address', name:'address'},
    //     //         {data: 'major', name:'major'},
    //     //         {data: 'major_average', name:'major_average'},
    //     //         {data: 'age', name:'age'},
    //     //         {data: 'expertise', name:'expertise'},
    //     //         {data: 'experience', name:'experience'},
    //     //         {data: 'action', name:'action'},
    //     //     ]
    //     // });


    //     $('.del').click(function() {
    //         var pelamar_id = $(this).attr('pelamar-id');

    //         swal({
    //             title: "Are you sure?",
    //             text: "Want to delete student data with id "+ pelamar_id +" ?",
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 window.location = "/institutions/dashboard/"+pelamar_id+"/delete";
    //             }
    //         });
    //     });
    // });
        $(document).ready(function(){
            $('#deletePelamar').click(function(){
                var id = $(this).attr('rel');
                var deleteFunction = $(this).attr('rel1');
            });
        });

</script>
@endsection
