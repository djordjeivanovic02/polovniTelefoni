<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDataNotification extends Controller
{
    public function index(){
        return view('user-data-notification');
    }
}
