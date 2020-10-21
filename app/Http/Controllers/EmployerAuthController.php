<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Roles;
use Illuminate\Support\Facades\Mail;

class EmployerAuthController extends Controller
{

    public function getLogin()
    {
        return view('employer/signin_signup/sign_in');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/employer/talentsearch');
        }
        return redirect('/employer/signin');
    }


    public function getRegister()
    {
        return view('employer/signin_signup/sign_up');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'firstname'             => 'required|string|max:50|min:2',
            'lastname'              => 'nullable|string|min:2|max:50',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|string|min:8',
            'password_confirmation' => 'required_with:password|same:password|string|min:8' ,
        ]);

        $user = new \App\User;
        $user->nama_depan    = $request->firstname;
        $user->nama_belakang = $request->lastname;
        $user->email         = $request->email;
        $user->created_by    = $request->firstname;
        $user->created_date  = date("Y-m-d H:i");
        $user->updated_by    = $request->firstname;
        $user->updated_date  = date("Y-m-d H:i");
        $user->password      = bcrypt($request->password);
        $user->save();


        // insert ke table Roles
        $roles = new \App\Roles;
        $roles->name        = $request->firstname;
        $roles->user_id     = $user->id;
        $roles->description = 'employer';
        $roles->save();

        $employer = new \App\Employer;
        $employer->user_id       = $user->id;
        $employer->nama_depan    = $request->firstname;
        $employer->nama_belakang = $request->lastname;
        $employer->email         = $request->email;
        $employer->save();

        return view('employer.signin_signup.sign_in');
    }

    public function logout(){
        Auth::logout();
        return redirect('employer/signin');
    }

    public function send(Request $request)
    {
        $data = [
            'file' => $request->file('file')
        ];

        //  $to = [
            // 'nama' => $request->nama,
        // ];
        $to = 'danyfadhilah8c@gmail.com';
        Mail::to($to)->send(new \App\Mail\TesMail($data));
        echo 'Sent Email Success';
    }
}
