<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistration extends Controller
{
    public function postRegister(Request $request){
        $name = $request->input('name');
        echo 'Name: '.$name;
        echo '<br>';
    }
}
