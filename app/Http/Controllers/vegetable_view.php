<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class vegetable_view extends Controller
{
    public function index(){
        return view('index');
    }
    public function register(){
        return view('register');
    }
    
    public function login(){
        return view('login');
    }

    public function verify(){
        return view('verify');
    }
}
