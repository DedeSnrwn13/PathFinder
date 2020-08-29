<?php

namespace App\Http\Controllers\Auth;

use App\Institution;
use App\Mail\SendMail;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function index()
    {
        $nama = "Dede Sunarwan";
        $email = "snrwn123@gmail.com";
        $kirim = Mail::to($email)->send(new SendMail($nama));

        if($kirim){
            echo "Email telah dikirim";
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'institutions', 'required',
            'password', 'required|string|min:6|confirmed',
            'password_confirmation', 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $this->validate($request, [
            // 'firstname' => 'required',
            // 'lastname' => 'required',
            // 'email' => 'required|unique:users',
            // 'phone' => 'required',
            // 'institutions', 'required',
            // 'password', 'required|min:6',
            // 'password_confirmation', 'required|min:6'
        // ]);


        // \App\Institution::create($request->all());

        // return redirect()->route('institutions.mystudents');

        return Institution::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'institutions' => $data['institutions'],
            'password' => Hash::make($data['password']),
            'password_confirmation' => Hash::make($data['password_confirmation']),
            'register_token' => Str::random(40)
        ]);
    }
}
