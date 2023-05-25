<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $cart = Cart::with('product')->orderBy('id', 'desc')->where('ip_address', request()->ip())->get();
        $data = [
            'newArrivalProducts' => Product::where('type', 'new')->orderBy('created_at', 'desc')->get(),
            'topProducts' => Product::where('type', 'top')->orderBy('created_at', 'desc')->get(),
            'discountProducts' => Product::where('type', 'discount')->orderBy('created_at', 'desc')->get()
        ];
        return view('frontend.home.index', compact('categories', 'data', 'cart'));
    }
}
