<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
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

    public function checkout()
    {
        $carts = Cart::with('product')->where('ip_address', request()->ip())->get();
        return view('frontend.home.checkout', compact('carts'));
    }

    public function completeCheckout(Request $request)
    {
       $order = Order::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country' => $request->country,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'phone' => $request->phone,
            'total_price' => $request->total_price,
            'total_qty' => $request->total_qty,
            'note' => $request->note,
        ]);

        //order details
        foreach ($request->product_id as $key => $value){
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id[$key],
                'price' => $request->price[$key],
                'qty' => $request->qty[$key],
            ]);
        }

        //cart product remove
        $cartProducts = Cart::where('ip_address', request()->ip())->get();
        foreach ($cartProducts as $cartProduct){
            $cartProduct->delete();
        }

        session()->flash('success', 'Your order has been submitted');
        return redirect('/');
    }
}
