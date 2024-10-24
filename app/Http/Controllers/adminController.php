<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\ordernumbers;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function dashboard(){
            $cartItems = carts::join('products', 'carts.p_id', '=', 'products.id')
            ->join('informations','informations.u_id','=','carts.user_id')
            ->where('c_status', 'Pending')
            ->get();

            $itemComplete = carts::join('products', 'carts.p_id', '=', 'products.id')
            ->join('informations','informations.u_id','=','carts.user_id')
            ->join('ordernumbers','ordernumbers.id','=','carts.c_id')
            ->where('c_status', 'Complete')
            ->get();

            return view('dashboard', compact('cartItems', 'itemComplete'));
        }

    public function login(){
        return view('admin.login');
}
public function admin_login(Request $request)
{
    $form = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:3',
    ]);

    $user = User::where('email', $form['email'])->first();

    // dd($request->all());
    if (Auth::attempt($form)) {
        if ($user && $user->status == "Complete") {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('login', "Login Successfully");
        }

        return redirect()->route('verify', ['email' => $request->email]);
    }
        return back()->with([
            'email','Email is not valid or password is incorrect']);
}

public function adminCheckout($id){
    $orderid = carts::selectRaw('MAX(c_id) as cart_id')
    ->first();

    $cartid = $orderid->cart_id + 1;
    // dd($cartid);

    $checkout = carts::where("c_id","0")
    ->where('p_id', $id)
    ->where("c_status","Pending")
    ->update([
        "c_status" => "Complete",
        "c_id" => $cartid
    ]);


    // dd($checkout);
    if ($checkout) {
        $cart_order = new ordernumbers();
        $TRD = "Express";
        $number = rand(100000, 999999);
        $cart_order->trade_number = $TRD . $number;
        $cart_order->save();
            
            if ($cart_order) {
                return redirect()->route("dashboard")->with("Buysuccess","Shipping Success");
            }
    }
}


}