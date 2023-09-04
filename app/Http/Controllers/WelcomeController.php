<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function getModels($brand){
        return view('mobile-phones/'.$brand.'-models');
    }
}
