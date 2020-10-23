<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institution;
use App\Pelamar;
use App\About;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index_profile() {
        // $pelamars = Pelamar::find($id);
        $user = Auth::user();

        return view('profile.profile', compact('user'));
    }

    // public function edit_profile($id)
    // {
    //     $userr = \App\User::find($id);

    //     return view('profile.profile', compact('userr'));
    // }

    public function about_update(Request $request, $id)
    {
        // dd($request->all());

        $user = \App\User::find($id);
        // $siswa = \App\Siswa::find($id);
        // $pelamar->update($request->all());
        // $pelamar = Pelamar::all();
        // $pendidikan = Pendidikan::findOrFail();
        $about = new \App\About;
        $about->update($request->all());
        // $pendidikan = new \App\Pendidikan;
        $about->user_id  = $user->id;

        $about->hobby_one   = $request->hobby_one;
        $about->hobby_two   = $request->hobby_two;
        $about->hobby_three = $request->hobby_three;
        $about->hobby_four  = $request->hobby_four;
        $about->hobby_five  = $request->hobby_five;

        $about->strenght_one  = $request->strenght_one;
        $about->strenght_two  = $request->strenght_two;
        $about->strenght_three = $request->strenght_three;
        $about->strenght_four = $request->strenght_four;
        $about->strenght_five = $request->strenght_five;

        $about->weakness_one   = $request->weakness_one;
        $about->weakness_two   = $request->weakness_two;
        $about->weakness_three = $request->weakness_three;
        $about->weakness_four  = $request->weakness_four;
        $about->weakness_five  = $request->weakness_five;

        $about->save();

        // $pekerjaan->update($request->all());
        return redirect()->back()->with('sukses','Data berhasil di update');
        // return redirect('/institutions/dashboard')->with('sukses','Data berhasil di update');
    }

    public function project() {
        $user = Auth::user();

        return view('profile.project', compact('user'));
    }

    public function project_update(Request $request, $id) {
        // dd($request->all());

        $user = \App\User::find($id);

        $project = new \App\Project;
        $project->update($request->all());
        // $pendidikan = new \App\Pendidikan;
        $project->user_id  = $user->id;
        $project->start    = $request->start;
        $project->to       = $request->to;
        $project->position = $request->position;
        $project->description    = $request->description;

        $project->save();

        return redirect()->back()->with('sukses','Data berhasil di update');
    }

    public function backedu() {
        $user = Auth::user();

        return view('profile.backgroundedu', compact('user'));
    }

    public function skills()
    {
        $user = Auth::user();

        return view('profile.professional', compact('user'));
    }

    public function skills_update(Request $request, $id) {
        // dd($request->all());
        $user = \App\User::find($id);

        $skill = new \App\Skill;
        $skill->update($request->all());
        // $pendidikan = new \App\Pendidikan;
        $skill->user_id           = $user->id;
        $skill->skill_one         = $request->skill_one;
        $skill->skill_level_one   = $request->skill_level_one;
        $skill->skill_two         = $request->skill_two;
        $skill->skill_level_two   = $request->skill_level_two;
        $skill->skill_three       = $request->skill_three;
        $skill->skill_level_three = $request->skill_level_three;
        $skill->skill_four        = $request->skill_four;
        $skill->skill_level_four  = $request->skill_level_four;
        $skill->skill_five        = $request->skill_five;
        $skill->skill_level_five  = $request->skill_level_five;

        $skill->save();

        return redirect()->back()->with('sukses','Data berhasil di update');
    }

    public function basic()
    {
        return view('profile.basic');
    }

    public function advance()
    {
        return view('profile.advan');
    }

    // employer
    public function index_talent(Pelamar $pelamar) {
        // $user = \App\User::find($id);
        // $pelamar = \App\pelamar::find($id);
        // $user = Auth::user();

        return view('employer.profile.profile', compact('pelamar'));
    }


    public function project_talent(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('employer.profile.project', compact('pelamar'));
    }

    public function background_talent(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('employer.profile.backgroundedu', compact('pelamar'));
    }

    public function pro_talent(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('employer.profile.professional', compact('pelamar'));
    }

    public function basic_talent(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('employer.profile.basic', compact('pelamar'));
    }

    public function advan_talent(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('employer.profile.advan', compact('pelamar'));
    }

    // institutions
    public function index_student(Pelamar $pelamar) {
        // $user = \App\User::find($id);
        // $pelamar = \App\pelamar::find($id);
        // $user = Auth::user();

        return view('institutions.profile.profile', compact('pelamar'));
    }


    public function project_student(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('institutions.profile.project', compact('pelamar'));
    }

    public function background_student(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('institutions.profile.backgroundedu', compact('pelamar'));
    }

    public function pro_student(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('institutions.profile.professional', compact('pelamar'));
    }

    public function basic_student(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('institutions.profile.basic', compact('pelamar'));
    }

    public function advan_student(Pelamar $pelamar) {
        // $user = User::find($id);
        // $user = Auth::user();

        return view('institutions.profile.advan', compact('pelamar'));
    }
}
