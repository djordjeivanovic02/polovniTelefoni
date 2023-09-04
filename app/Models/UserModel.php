<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $email = '';
    protected $username = '';
    protected $firstName = '';
    protected $secondName = '';


    public function __construct($email, $username, $firstName, $secondName){
        $this->email = $email;
        $this->username = $username;
        $this->firstName = $firstName;
        $this->secondName = $secondName;
    }
    public function getEmail(){ return $this->email; }
    public function getUsername(){ return $this->username; }
    public function getFirstName(){ return $this->firstName; }
    public function getSecondName(){ return $this->secondName; }

    public function showUser(){
        echo $this->firstName. ' ' . $this->secondName. ' ' . $this->username;
    }
}
