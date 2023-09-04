<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MyAccountController extends Controller
{
    public function index(){
        // if (!Session::has('firebaseUserId') || !Session::has('idToken')) {
        //     return view('welcome'); // Preusmeri korisnika na drugu stranicu
        // }
        return view('my-account');
    }
    public function myData(){
        return view('edit-account');
    }
    public function addNewAds(){
        return view('add-new-ads');
    }
}
