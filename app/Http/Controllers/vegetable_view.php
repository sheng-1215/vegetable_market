<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;


class vegetable_view extends Controller
{
    public function index(){
        return view('index',[
            "products" => Products::all()
        ]);
    }
    public function register(){
        return view('register');
    }
    
    public function login(){
        return view('login');
    }

    public function verify($email){
        $user = User::where('email', $email)->first();
        return view('verify',[
            "user" => $user
        ]);
    }


}
