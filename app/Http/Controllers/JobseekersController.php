<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobseekersController extends Controller
{
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
}
