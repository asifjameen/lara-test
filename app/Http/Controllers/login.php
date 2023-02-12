<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{

    public function __construct(){
        $this->middleware('login');
    }
    public function login(Request $r){
        $username=$r->input('username');
        $pass=$r->input('password');
        if($username=='test' and $pass=='tester'){
            return"<h1>login Success</h1>";
        }

    }

}
