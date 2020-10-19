<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    // public function login_admin()
    // {
    //     return view('auth.login');
    // }

    // public function postlogin_admin(Request $request)
    // {
    //     // dd($request->all());
    //     $this->validate($request, [
    //         'email'    => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     $data = User::where('email', $request->email)->firstOrFail();

    //     if ($data) {
    //         if (Hash::check($request->password, $data->password)) {
    //             session(['berhasil_login' => true]);
    //             return redirect('/admin/dashboard');
    //         } else {
    //             return redirect('/admin')->with('pesan', 'Incorrect email or password');
    //         }
    //     } else {
    //         return redirect('/admin/dashboard')->with('pesan', 'Incorrect email or password');
    //     }
    // }

    // public function postlogin_admin(Request $request)
    // {
    //     // dd($request->all());
    //     $this->validate($request, [
    //         'email'    => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if(Auth::attempt($request->only('email', 'password'))){
    //         return redirect('/admin/dashboard');
    //     }
    //     return redirect('/admin')->with('pesan', 'Admin Login Failed or You Are Not Admin');
    // }

    // public function index_admin()
    // {
    //     return view('admin.index');
    // }
}
