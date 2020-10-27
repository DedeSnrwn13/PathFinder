<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;

use App\Pelamar;
use App\User;
use App\Pendidikan;
use App\Pekerjaan;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Services\DataTable;

class SiswaController extends Controller
{
    public function index(Request $request) {

        if($request->has('search')) {
            $data_siswa = \App\Pelamar::where('nama', 'LIKE', '%'.$request->search.'%')
                                    ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                                    ->orWhere('gender', 'LIKE', '%'.$request->search.'%')
                                    ->orWhere('agama', 'LIKE', '%'.$request->search.'%')
                                    ->orWhere('tempat_lahir', 'LIKE', '%'.$request->search.'%')
                                    ->orWhere('tanggal_lahir', 'LIKE', '%'.$request->search.'%')
                                    ->orWhere('pekerjaan_yang_akan_dilamar', 'LIKE', '%'.$request->search.'%')
                                    ->paginate(20);
        } else {
            $data_siswa = \App\Pelamar::paginate(20);
            $institution = \App\Institution::find(1);
        }


        return view('institutions.mystudents', compact('data_siswa'));
    }

    public function add()
    {
        return view('institutions.create');
    }

    public function postcreate(Request $request)
    {
        // buat validasi

        //insert ke table user
        $this->validate($request, [
            'user_id'                    => 'required|integer',
            'avatar'                     => 'file|image|mimes:png,jpg,jpeg|max:2048',
            'nama'                       => 'required|string|min:2|max:25',
            'tempat_lahir'               => 'required|string|max:25',
            'tanggal_lahir'              => 'required|date|max:25',
            'gender'                     => 'nullable|string|max:10',
            'agama'                      => 'nullable|string|max:20',
            'alamat'                     => 'required|string|max:100',
            'email'                      => 'required|email|unique:users|max:100',
            'agama'                      => 'nullable|string|max:20',
            'pekerjaan_id'               => 'required|integer',
            'pendidikan_id'              => 'required|integer',
            'mingaji'                    => 'required|string',
            'maxgaji'                    => 'required|string',
            'pekerjaan_yang_akan_dilamar' => 'required|string|max:50',
            'nama_depan'                 => 'required|string|min:2|max:25',
            'nama_belakang'              => 'nullable|tring|min:2|max:25',
            'email'                      => 'required|email|unique:users|max:100',
            'created_by'                 => 'required|string|max:25',
            'created_date'               => 'required',
            'updated_by'                 => 'required_with:created_by|same:created_by|string|max:25',
            'updated_date'               => 'required',
            'nama_perusahaan'            => 'nullable|string|max:50',
            'jabatan'                    => 'nullable|string|max:50',
            'mulai_kerja'                => 'nullable|date|max:25',
            'berakhir_kerja'             => 'nullable|date|max:25',
            'nama_sekolah'               => 'required|string|max:100',
            'jenjang_pendidikan'         => 'required|string|max:5',
            'jurusan'                    => 'required|string|max:50',
            'nilai'                      => 'required|numeric',
            'mulai_pendidikan'           => 'required|date|max:25',
            'selesai_pendidikan'         => 'required|date|max:25',
        ]);

        $data = $request->all();
        // dd($data);

        $user = new \App\User();
        $user->nama_depan       = $data['nama'];
        $user->email            = $data['email'];
        $user->password         = bcrypt('allsecrets');
        $user->activation_code  = Str::random(60).$data['email'];
        $user->remember_token   = Str::random(60);
        $user->created_by       = $data['created_by'];
        $user->created_date     = date("Y-m-d H:i");
        $user->updated_by       = $data['updated_by'];
        $user->updated_date     = date("Y-m-d H:i");
        $user->save();
        // $user = \App\User::create();


        // insert ke table roles
        $roles = new \App\Roles();
        $roles->user_id     = $user->id;
        $roles->name        = $data['nama'];
        $roles->description = 'pelamar';
        $roles->save();
        // $roles = \App\Roles::create();

         // insert ke tabel pekerjaan
         $pekerjaan = new \App\Pekerjaan();
         $pekerjaan->nama_perusahaan = $data['nama_perusahaan'];
         $pekerjaan->posisi          = $data['posisi'];
         $pekerjaan->mulai_kerja     = $data['mulai_kerja'];
         $pekerjaan->berakhir_kerja  = $data['berakhir_kerja'];
         $pekerjaan->save();
         // $pekerjaan = \App\Pekerjaan::create();


         // insert ke tabel pendidikan
         $pendidikan = new \App\Pendidikan();
         $pendidikan->nama_sekolah       = $data['nama_sekolah'];
         $pendidikan->jenjang_pendidikan = $data['jenjang_pendidikan'];
         $pendidikan->jurusan            = $data['jurusan'];
         $pendidikan->nilai              = $data['nilai'];
         $pendidikan->mulai_pendidikan   = $data['mulai_pendidikan'];
         $pendidikan->selesai_pendidikan = $data['selesai_pendidikan'];
         $pendidikan->save();
         // $pendidikan = \App\Pendidikan::create();

        // insert ke table Pelamar
        // $isntitution = Institution::findBy('id', 'institution_id');

        $pelamar = new \App\Pelamar();
        $pelamar->user_id                       = $user->id;
        $pelamar->nama                          = $data['nama'];
        $pelamar->email                         = $data['email'];
        $pelamar->gender                        = $data['gender'];
        $pelamar->tempat_lahir                  = $data['tempat_lahir'];
        $pelamar->tanggal_lahir                 = $data['tanggal_lahir'];
        $pelamar->agama                         = $data['agama'];
        $pelamar->pekerjaan_id                  = $pekerjaan->id;
        $pelamar->pendidikan_id                 = $pendidikan->id;
        $pelamar->mingaji                       = $data['mingaji'];
        $pelamar->maxgaji                       = $data['maxgaji'];
        $pelamar->pekerjaan_yang_akan_dilamar   = $data['pekerjaan_yang_akan_dilamar'];
        $pelamar->save();
        // $pelamar = \App\Pelamar::create();

        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $pelamar->avatar = $request->file('avatar')->getClientOriginalName();
            $pelamar->save();
        }

        return redirect('/institutions/dashboard');
    }

    public function edit(Pelamar $pelamar)
    {
        // $pelamar = \App\pelamar::find($id);

        return view('institutions.edit', compact('pelamar'));
    }

    public function update(Request $request, Pelamar $pelamar)
    {
        // dd($request->all());
        // $siswa = \App\Siswa::find($id);
         //insert ke table user
         $this->validate($request, [
            'avatar'                     => 'file|image|mimes:png,jpg,jpeg|max:2048',
            'nama'                       => 'required|string|min:2|max:25',
            'tempat_lahir'               => 'required|string|max:25',
            'tanggal_lahir'              => 'required|date|max:25',
            'gender'                     => 'nullable|string|max:10',
            'agama'                      => 'nullable|string|max:20',
            'alamat'                     => 'required|string|max:100',
            'email'                      => 'required|email|unique:users|max:100',
            'agama'                      => 'nullable|string|max:20',
            'pekerjaan_id'               => 'required|integer',
            'pendidikan_id'              => 'required|integer',
            'mingaji'                    => 'required|string',
            'maxgaji'                    => 'required|string',
            'pekerjaan_yang_akan_dilamar' => 'required|string|max:50',
            'nama_depan'                 => 'required|string|min:2|max:25',
            'nama_belakang'              => 'nullable|tring|min:2|max:25',
            'email'                      => 'required|email|unique:users|max:100',
            'created_by'                 => 'required|string|max:25',
            'updated_by'                 => 'required_with:created_by|same:created_by|string|max:25',
            'nama_perusahaan'            => 'nullable|string|max:50',
            'jabatan'                    => 'nullable|string|max:50',
            'mulai_kerja'                => 'nullable|date|max:25',
            'berakhir_kerja'             => 'nullable|date|max:25',
            'nama_sekolah'               => 'required|string|max:100',
            'jenjang_pendidikan'         => 'required|string|max:5',
            'jurusan'                    => 'required|string|max:50',
            'nilai'                      => 'required|numeric',
            'mulai_pendidikan'           => 'required|date|max:25',
            'selesai_pendidikan'         => 'required|date|max:25',
        ]);

        // $pelamar->update($request->all());

        DB::table('users')->where('id', $pelamar->users->id)->update([
            'nama_depan'       => $request->nama,
            'created_by'       => $request->created_by,
            'created_date'     => date("Y-m-d H:i:s"),
            'updated_by'       => $request->updated_by,
            'updated_date'     => date("Y-m-d H:i:s"),
        ]);

        DB::table('pendidikan')->where('id', $pelamar->pendidikan->id)->update([
            'nama_sekolah'       => $request->nama_sekolah,
            'jenjang_pendidikan' => $request->jenjang_pendidikan,
            'jurusan'            => $request->jurusan,
            'nilai'              => $request->nilai,
            'mulai_pendidikan'   => $request->mulai_pendidikan,
            'selesai_pendidikan' => $request->selesai_pendidikan,
        ]);

        DB::table('pekerjaan')->where('id', $pelamar->pekerjaan->id)->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi'          => $request->posisi,
            'mulai_kerja'     => $request->mulai_kerja,
            'berakhir_kerja'  => $request->berakhir_kerja,
        ]);

        DB::table('pelamar')->where('id', $pelamar->id)->update([
            'nama'                        => $request->nama,
            'gender'                      => $request->gender,
            'tempat_lahir'                => $request->tempat_lahir,
            'tanggal_lahir'               => $request->tanggal_lahir,
            'agama'                       => $request->agama,
            'mingaji'                     => $request->mingaji,
            'maxgaji'                     => $request->maxgaji,
            'pekerjaan_yang_akan_dilamar' => $request->pekerjaan_yang_akan_dilamar,
        ]);


        // $pendidikan = Pendidikan::findOrFail();
        // $pendidikan = new Pendidikan;
        // // $pendidikan = new \App\Pendidikan;
        // $pendidikan->nama_sekolah       = $request->nama_sekolah;
        // $pendidikan->jenjang_pendidikan = $request->jenjang_pendidikan;
        // $pendidikan->jurusan            = $request->jurusan;
        // $pendidikan->nilai              = $request->nilai;
        // $pendidikan->mulai_pendidikan   = $request->mulai_pendidikan;
        // $pendidikan->selesai_pendidikan = $request->selesai_pendidikan;
        // $pendidikan->save();


        // $pekerjaan = new Pekerjaan;
        // $pekerjaan->nama_perusahaan = $request->nama_perusahaan;
        // $pekerjaan->posisi          = $request->posisi;
        // $pekerjaan->mulai_kerja     = $request->mulai_kerja;
        // $pekerjaan->berakhir_kerja  = $request->berakhir_kerja;
        // $pekerjaan->save();

        // $pelamar->nama                        = $request->nama;
        // $pelamar->gender                      = $request->gender;
        // $pelamar->tempat_lahir                = $request->tempat_lahir;
        // $pelamar->tanggal_lahir               = $request->tanggal_lahir;
        // $pelamar->agama                       = $request->agama;
        // $pelamar->mingaji                     = $request->mingaji;
        // $pelamar->maxgaji                     = $request->maxgaji;
        // $pelamar->pekerjaan_yang_akan_dilamar = $request->pekerjaan_yang_akan_dilamar;

        // $pekerjaan->update($request->all());

        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $pelamar->avatar = $request->file('avatar')->getClientOriginalName();
            $pelamar->save();
        }


        return redirect()->route('/institutions/dashboard');
    }

    public function delete(Pelamar $pelamar)
    {
        // $siswa = \App\Siswa::find($id);
        $pelamar->delete();

        return redirect('/institutions/dashboard')->with('sukses','Data berhasil di delete');
    }

    // public function downloadexcel() {
    //     $downloads = DB::table('downloadexcel')->get();
    //     dd($downloads);
    //     return view('institutions.mystudents', compact('downloads'));
    // }

    // public function downloadExcel()
    // {
    //     $path = storage_path('public\DataSiswa.xlsx');

    //     return response()->download($path);
    // }

    public function importexcel(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'import_excel' => 'required|mimes:csv,xls,xlsx|max:5000',
        ]);

        // Excel::import(new SiswaImport, $request->file());
        // return Excel::import(new \App\Imports\SiswaImport, request()->file('data_siswa'));
        // (new SiswaImport)->import('users.xlsx', null, \Maatwebsite\Excel\Excel::XLSX);

        // menangkap file excel
        $file = $request->file('import_excel');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa',$nama_file);

        // import data
        Excel::import(new SiswaImport, public_path('file_siswa/'.$nama_file));

        // notifikasi dengan session
        // Session::flash('suksesupload','You have successfully added the studens data');


        // alihkan halaman kembali
        return redirect('/institutions/dashboard')->with('suksesupload', 'You have successfully added the studens data');
    }

    // public function getdatasiswa()
    // {
    //     $siswa = Siswa::select(['institution_id','avatar', 'firstname', 'lastname', 'email', 'gender', 'religion', 'address', 'major', 'major_average', 'age', 'expertise', 'experience']);

    //     // return Datatables::eloquent($siswa)->toJson();
    //     return datatables()->eloquent($siswa)
    //     ->addColumn('action', function($s) {
    //         return '<a href="#" class="btn btn-warning btn-sm">Edit</a>';
    //     })
    //     ->toJson();
    // }
}
