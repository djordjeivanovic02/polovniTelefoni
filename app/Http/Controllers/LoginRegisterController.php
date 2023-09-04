<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginRegisterController extends Controller
{
    public function index(){
        return view('login-register');
    }
}
