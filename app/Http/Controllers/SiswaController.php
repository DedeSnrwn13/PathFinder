<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Imports\SiswaImport;
use Illuminate\Auth\EloquentUserProvider;
use imporexcel;
use App\Siswa;
use App\User;
use League\CommonMark\Extension\Table\Table;
use App\Institution;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Importer;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Yajra\Datatables\Services\DataTable;
class SiswaController extends Controller
{
    public function index(Request $request) {

        if($request->has('cari')) {
            $data_siswa = \App\Siswa::orderBy('id', 'DESC')
                                    ::where('firstname', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('lastname', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('email', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('gender', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('religion', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('address', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('institution', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('major', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('major_average', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('age', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('expertise', 'LIKE', '%'.$request->cari.'%')
                                    ->orWhere('experience', 'LIKE', '%'.$request->cari.'%')
                                    ->paginate(20);
        } else {
            $data_siswa = \App\Siswa::paginate(20);
            $institution = \App\Institution::all();
        }


        return view('institutions.mystudents', compact('data_siswa', 'institution'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
        // buat validasi
        $this->validate($request, [
            'avatar'        => 'file|image|mimes:png,jpg,jpeg|max:2048',
            'firstname'     => 'required|min:2|',
            'email'         => 'required|email|unique:users',
            'gender'        => 'required',
            'religion'      => 'required',
            'address'       => 'required|string|max:225',
            'major'         => 'required',
            'major_average' => 'required|numeric',
            'age'           => 'required|numeric',
            'expertise'     => 'required|string|max:100',
            'experience'    => 'required|numeric',
            'institution_id' => 'required',
        ]);

        // $user = User::create($request->all());
        // $siswa = Siswa::create($request->all());

        //insert ke table user
        $user = new \App\User;
        $user->institution_name = $user->institution_id; //$request->add(['institution_id' => [$user->id, $user => 'admin']]);
        $user->role             = 'siswa';
        $user->email            = $request->email;
        $user->password         = bcrypt('secret');
        $user->remember_token   = Str::random(60);
        $user->save();

        // insert ke table siswa
        // $isntitution = Institution::findBy('id', 'institution_id');
        // $request->request->add(['institution_id' => $institution->id]);
        $request->request->add(['user_id' => $user->id]);

        $siswa = \App\Siswa::create($request->all());

        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/institutions/dashboard')->with('sukses','Data berhasil di input');
    }

    public function edit(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);

        return view('institutions.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        // dd($request->all());
        // $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());

        if($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('/institutions/dashboard')->with('sukses','Data berhasil di update');
    }

    public function delete(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);
        $siswa->delete();

        return redirect('/institutions/dashboard')->with('sukses','Data berhasil di delete');
    }

    public function importexcel(Request $request)
    {
        $this->validate($request, [
            'import_excel' => 'required|mimes:csv,xls,xlsx',
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
        Session::flash('suksesupload','You have successfully added the studens data');


        // alihkan halaman kembali
        return redirect('/institutions/dashboard')->with('sukses', 'You have successfully added the studens data');
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
