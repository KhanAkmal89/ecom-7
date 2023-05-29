<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $addNewProduct = new Cart();
        if($request->user_id){
            $addNewProduct->user_id = $request->user_id;
        }
        $addNewProduct->ip_address = $request->ip();
        $addNewProduct->product_id = $id;
        $addNewProduct->price = $request->price;
        $addNewProduct->qty = $request->qty ? $request->qty : 1;
        $addNewProduct->save();
        session()->flash('success', 'Product added to cart');
        return redirect()->back();

    }

    public function removeCartProduct($id)
    {
        $cartProduct = Cart::find($id);
        $cartProduct->delete();
        session()->flash('success', 'Cart Product has been removed');
        return redirect()->back();
    }

    public function CartProducts()
    {
        return view('frontend.home.carts');
    }

    public function CartProductUpdate(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->qty = $request->qty;
        $cart->save();
        session()->flash('success', 'Cart Product has been Updated');
        return redirect()->back();
    }
}
