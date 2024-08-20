<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function details($id){
        $product = Products::find($id);
        return view('products_details', ['product' => $product]);
    }

    // public function addcart(Request $request,$id){
    //     $product = Products::find($id);
    //     $insert = $request->validate([
    //         ""
    //     ]);
    // }
}
