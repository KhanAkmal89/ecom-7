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
        $data = [
            'newArrivalProducts' => Product::where('type', 'new')->orderBy('created_at', 'desc')->get(),
            'topProducts' => Product::where('type', 'top')->orderBy('created_at', 'desc')->get(),
            'discountProducts' => Product::where('type', 'discount')->orderBy('created_at', 'desc')->get(),
            'allProducts' => Product::orderBy('id', 'desc')->get()
        ];
        return view('frontend.home.index', compact('data'));
    }
}
