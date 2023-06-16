<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('*', function($view){
            $view->with('cart', Cart::with('product')->orderBy('id', 'desc')->where('ip_address', request()->ip())->get());
            $view->with('categories', Category::orderBy('created_at', 'desc')->get());
            $view->with('brands', Brand::orderBy('created_at', 'desc')->get());


        });
    }
}
