<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    //
    public function register_form()
    {
        return view('register');
    }
}
