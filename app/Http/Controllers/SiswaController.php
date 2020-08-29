<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\User;
use App\Institution;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

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
                                    ->paginate(5);
        } else {
            $data_siswa = \App\Siswa::paginate(5);
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
        // $user->institution_id = $user->institution_id; //$request->add(['institution_id' => [$user->id, $user => 'admin']]);
        $user->role           = 'siswa';
        $user->email          = $request->email;
        $user->password       = bcrypt('secret');
        $user->remember_token = Str::random(60);
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

    public function imporexel(Request $request)
    {
        $this->validate($request, [
            'import_exel' => 'required|file',
        ]);

        dd($request->all());
    }
}
