<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // hashing password

class AuthenticationController extends Controller
{
    public function ShowLogin(){
        return view('authentication-form\login');
    }

    public function ShowRegister(){
        return view('authentication-form\register');
    }
}
