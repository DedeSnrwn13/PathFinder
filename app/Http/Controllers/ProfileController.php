<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.profile');
    }

    public function project() {
        return view('profile.project');
    }

    public function backedu() {
        return view('profile.backgroundedu');
    }

    public function skills()
    {
        return view('profile.professional');
    }

    public function basic()
    {
        return view('profile.basic');
    }

    public function advance()
    {
        return view('profile.advan');
    }
}
