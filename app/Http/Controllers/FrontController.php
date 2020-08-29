<?php

namespace App\Http\Controllers;

use App\Institution;
use App\User;
use App\Mail\SendMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function home()
    {
        return view('institutions.index');
    }

    public function signup()
    {
        return view('institutions.register');
    }

    public function register(Request $request, Array $data)
    {
        return validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'institutions' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6|confirmed'
        ]);

        // Input Pendaftar sebagai user dulu
        $institusi = new \App\Institution();

        $institusi->firstname             = $request->firstname;
        $institusi->lastname              = $request->lastname;
        $institusi->email                 = $request->email;
        $institusi->phone                 = $request->phone;
        $institusi->institutions          = $request->institutions;
        $institusi->password              = Hash::make(bcrypt($request->password));
        $institusi->password_confirmation = Hash::make(bcrypt($request->password_confirmation));
        $institusi->remember_token	      = Str::random(60);
        $institusi->save();

        // Insert ke table users
        $request->request->add(['user_id' => $institusi->id]);
        $institusi = \App\User::create($request->all());
        return redirect('/institutions/login')->with('Sukses', 'Data Pendaftaran Berhasil di Kirim');

    }

    // protected function validator(Array $data)
    // {
    //     return validator::make($data, [
    //         'firstname' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:users',
    //         'phone' => 'required',
    //         'institutions', 'required',
    //         'password', 'required|string|min:6|confirmed',
    //         'password_confirmation', 'required|string|min:6|confirmed'
    //     ]);
    // }

    // public function create(Array $data, Request $request)
    // {
    //     // $login = route('login');

    //     // // $this->validate($request, [
    //     //     // 'firstname' => 'required',
    //     //     // 'lastname' => 'required',
    //     //     // 'email' => 'required|unique:users',
    //     //     // 'phone' => 'required',
    //     //     // 'institutions', 'required',
    //     //     // 'password', 'required|min:6',
    //     //     // 'password_confirmation', 'required|min:6'
    //     // // ]);


    //     // // \App\Institution::create($request->all());

    //     // // return redirect()->route('institutions.mystudents');

    //     // return Institution::create([
    //     //     'firstname' => $data['firstname'],
    //     //     'lastname' => $data['lastname'],
    //     //     'email' => $data['email'],
    //     //     'phone' => $data['phone'],
    //     //     'institutions' => $data['institutions'],
    //     //     'password' => Hash::make($data['password']),
    //     //     'password_confirmation' => Hash::make($data['password_confirmation']),
    //     //     'register_token' => Str::random(40)
    //     // ]);
    // }

    public function mystudents()
    {
        return view('institutions.mystudents');
    }
}
