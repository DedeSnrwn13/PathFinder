<?php

namespace App\Http\Controllers;

use App\User;
use App\Institution;
use App\Mail\SendMail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }


    public function register()
    {
        return view('institutions.register');
    }

    public function postregister(Request $request)
    {

        $this->validate($request, [
            'name'                  => 'required',
            'avatar'                => 'file|image|mimes:png,jpg,jpeg|max:2048',
            'firstname'             => 'required|min:2',
            'contact'               => 'required|numeric',
            'address'               => 'string|max:225',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
        ]);

        // insert ke table user
        $user = new \App\User;
        // $user->institution_id = $institution->id;
        $user->role            = 'admin';
        $user->email           = $request->email;
        $user->password        = bcrypt($request->password);
        $user->activation_code = Str::random(60).$request->email;
        $user->remember_token  = Str::random(60);
        $user->save();

        // insert ke table institution
        // $request->request->add(['user_id' => $user->id]);
        $institution             = $request->all();
        $institution['password'] = bcrypt($request->password);
        // $institution['password'] = $password;
        $institution = Institution::create($institution);
        // $institution['activation_code'] = Str::random(60).$request->input('email');
        // $institution = \App\Institution::create($request->all());

        $data = array(
            // 'email' => $user->email,
            'name'  => $institution->name,
            'code'  => $user->activation_code,
        );

        $this->sendEmail($data, $institution);

        // dd($request->all());

        return redirect('/institutions/login');
    }

    public function sendEmail($data, $institution)
    {
        Mail::send('email.register', $data, function($message) use ($institution) {
            $message->to($institution['email'], $institution['name'])
            ->subject('Please verify your acount registration!');
        });
    }

    public function activate($code, User $user)
    {
        if ($user->activateAccount($code)) {
            return 'activate!, You can close tab.';
        }

        return 'Fail';
    }

    public function index()
    {
        return view('institutions.login');
    }

    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->active == 0) {
                Auth::logout();
                return 'Please Activate Your Account';
            } else {
                // return 'You Have been log in';
                return redirect('/institutions/dashboard');
            }
        } else {
            return redirect('/institutions/dashboard');
        }

    }

    public function logout() {
        Auth::logout();

        return redirect('/institutions/login');
    }
}
