<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\informations;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class vegetable_view extends Controller
{
    public function index(){
        // $data = carts::all();
        // $count = count($data);
        
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
    public function details($id){
        $product = Products::find($id);
        return view('products_details', ['product' => $product]);
    }

    public function information(){
        return view('information');
    }

    public function cart() {
        $cartItems = carts::join('products', 'carts.p_id', '=', 'products.id')
        ->where('carts.user_id', Auth::id())
        ->where('c_status', 'cart')
        ->get();
    
        return view('cart', [
            "cartItems" => $cartItems,
            "totalPrice" => carts::where('user_id', Auth::id())
            ->where('c_status', 'cart')
            ->sum('price')
        ]);
    }

    public function showProfile(){
        $profile = informations::with('addresses')->find(Auth::id());
        return view('profile', [
            "profile" => $profile
        ]);
    }

    public function orderlist()
    {
        $pendingOrders = carts::join('products', 'carts.p_id', '=', 'products.id')
            ->where('carts.user_id', Auth::id())
            ->where('c_status', 'Pending')
            ->get();
    
        $completedOrders = carts::join('products', 'carts.p_id', '=', 'products.id')
            ->join('ordernumbers', 'ordernumbers.id', '=', 'carts.c_id')
            ->where('carts.user_id', Auth::id())
            ->where('c_status', 'Complete')
            ->get();
            
        $pendingTotal = $pendingOrders->sum('price');
    
        return view('orderlist', compact('pendingOrders', 'completedOrders', 'pendingTotal'));
    }
}
