<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use App\Institution;
use App\Mail\SendMail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified', 'institution']);
    // }


    public function register()
    {
        return view('institutions.register');
    }

    public function postregister(Request $request)
    {

        $this->validate($request, [
            'nama_sekolah'          => 'required',
            'logo_institusi'        => 'nullable|file|image|mimes:png,jpg,jpeg|max:5000',
            'nama_depan'            => 'required|min:2',
            'nama_belakang'         => 'nullable|string',
            'no_hp'                 => 'required|numeric|unique:institution',
            'alamat'                => 'nullable|string|max:225',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|string|min:8',
            'password_confirmation' => 'required_with:password|same:password|string|min:8' ,
        ]);

        // insert ke table user
        $user = new \App\User;

        // $user->institution_id = $institution->id;
        $user->nama_depan       = $request->nama_depan;
        $user->nama_belakang    = $request->nama_belakang;
        $user->email            = $request->email;
        $user->password         = bcrypt($request->password);
        $user->activation_code  = Str::random(60).$request->email;
        $user->remember_token   = Str::random(60);
        $user->created_by       = $request->nama_depan;
        $user->created_date     = date("Y-m-d H:i");
        $user->updated_by       = $request->nama_depan;
        $user->updated_date     = date("Y-m-d H:i");

        // $request->request->add(['created_by'      => $user->nama_depan]);
        // $request->request->add(['created_date'    => date("Y-m-d")]);
        // $request->request->add(['updated_by'      => $user->nama_depan]);
        // $request->request->add(['updated_date'    => date("Y-m-d")]);
        // $request->request->add(['password'        => bcrypt($user->password)]);
        // $request->request->add(['activation_code' => Str::random(60).$user->email]);
        // $request->request->add(['remember_token'  => Str::random(60)]);
        $user->save();


        // insert ke table Roles
        $roles = new \App\Roles;

        $roles->name        = $request->nama_depan;
        $roles->user_id     = $user->id;
        // $request->request->add(['user_id' => $user->id]);
        $roles->description = 'institution';
        // $request->request->add(['name'        => $user->nama_depan]);
        // $request->request->add(['user_id'     => $user->id]);
        // $request->request->add(['description' => 'institution']);
        $roles->save();


        // insert ke table institution
        $institution = new \App\Institution;
        $institution->user_id        = $user->id;
        $institution->nama_sekolah   = $request->nama_sekolah;
        $institution->no_hp          = $request->no_hp;
        $institution->email          = $request->email;
        $institution->remember_token = Str::random(60);
        $institution->save();


        $data = array(
            // 'email' => $user->email,
            'nama_institusi'  => $institution->nama_institusi,
            'code'            => $user->activation_code,
        );

        $this->sendEmail($data, $institution);

        // notifikasi dengan session
        // Session::flash('suksesregister');

        return redirect('/institutions/register')->with('suksesregister', 'You have successfully joined');
        // return redirect()->back();
    }

    public function sendEmail($data, $institution)
    {
        Mail::send('email.register', $data, function($message) use ($institution) {
            $message->to($institution['email'], $institution['nama_institusi'])
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

    public function login()
    {
        return view('institutions.login');
    }

    public function postlogin(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email'    => 'required|email',
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

    // public function postlogin(Request $request)
    // {
    //     // dd($request->all());
    //     $this->validate($request, [
    //         'email'    => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         if (Auth::user()->active == 0) {
    //             Auth::logout();
    //             return 'Please Activate Your Account';
    //         } else {
    //             // return 'You Have been log in';
    //             // return redirect('/institutions/dashboard');
    //             $data = User::where('email', $request->email)->firstOrFail();

    //             if ($data) {
    //                 if (Hash::check($request->password, $data->password)) {
    //                     session(['berhasil_login' => true]);
    //                     return redirect('/institutions/dashboard');
    //                 } else {
    //                     return redirect('/institutions/login')->with('pesan', 'Incorrect email or password');
    //                 }
    //              }
    //         }
    //     } else {
    //         return redirect('/institutions/dashboard');
    //     }

    // }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();

        return redirect('/institutions/login');
    }
}
