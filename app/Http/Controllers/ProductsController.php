<?php

namespace App\Http\Controllers;

use App\Models\addresses;
use App\Models\carts;
use App\Models\informations;
use App\Models\orderlists;
use App\Models\ordernumbers;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProductsController extends Controller
{
    public function addcart(Request $request, $id){

        $product = Products::find($id);
            if (!$product) {
                return response("Product not found", 404);
            }

        $insert = $request->validate([
            'mass' => 'required|min:3|max:1000000',
            'price' => 'required',
        ]);

        $cart = new carts();
        $cart->user_id = Auth::id();
        $cart->p_id = $product->id;
        $cart->mass = $insert['mass'];
        $cart->price = $insert['price'];
        $cart->c_status = "cart";
        $cart->c_id = 0;
        $cart->save();

        return redirect()->route('index')->with('status', 'Item added to cart Successfully');
    }

    public function information(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'contact_number' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
        ]);

        $address = addresses::create([
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
        ]);

        informations::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
            'address_id' => $address->id,
            'u_id' => Auth::id(),
        ]);

        return redirect()->route('index')->with('information', 'Information saved successfully');
    }

    public function remove($id)
    {
        $cartItem = carts::where('p_id', $id)
        ->where('user_id', Auth::id())
        ->where('c_status', 'cart') 
        ->first();

        // dd($id);
        if (!$cartItem) {
            return redirect()->route('cart')->with('error', 'Item not found in cart');
        }

        $cartItem->delete();

        return redirect()->route('cart')->with('status', 'Item removed from cart');
    }

    public function checkout(Request $request){

        $orderid = carts::selectRaw('MAX(c_id) as c_id')
        ->where('user_id', Auth::id())
        ->where('c_status', 'cart')
        ->update(['c_status' => 'Pending']);

        if($orderid) {
            return redirect()->route('index')->with('order', 'Check out successfully');
        }
    }

    public function cancel($id)
    {
        $cartItem = carts::where('p_id', $id)
        ->where('user_id', Auth::id())
        ->where('c_status', 'Pending')
        ->first();

        if (!$cartItem) {
            return redirect()->route('orderlist')->with('error', 'Item not found in cart');
        }

        $cartItem->delete();

        return redirect()->route('orderlist')->with('order', 'Vegetables cancel from order list');
    }


}
