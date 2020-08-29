<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MystudentsController extends Controller
{
    public function index()
    {
        return view('institutions.mystudents');
    }
}
