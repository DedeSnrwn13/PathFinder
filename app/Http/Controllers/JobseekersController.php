<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pelamar;

class JobseekersController extends Controller
{
    // public function index_profile()
    // {
    //     $pelamar = Auth::user();

    //     return view('layouts.navbar', compact('pelamar'));
    // }
    public function signin_jobs()
    {
        return view('jobseekers.sign_in');
    }

    public function post_sign_jobs(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/jobseeker/online');
        }
        return redirect('/jobseekers/signin');
    }

    public function logout_job(Request $request) {
        $request->session()->flush();
        Auth::logout();

        return redirect('jobseekers/signin');
    }
}
