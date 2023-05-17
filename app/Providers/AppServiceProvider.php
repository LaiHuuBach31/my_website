<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer("*", function ($view) {

            if (Auth::guard('cus')->user()) {
                $totalCart = Cart::where('cus_id', Auth::guard('cus')->user()->id)->count();

                $carts = Cart::where('cus_id', Auth::guard('cus')->user()->id)->get();
  
                $check = Cart::where('cus_id', Auth::guard('cus')->user()->id)->count();

                $subTotal = $carts->sum('total_price');

                $view->with(compact('totalCart', 'carts', 'check', 'subTotal'));
            } else {
                $carts = [];
                $check = 0;
                $view->with(compact('carts', 'check'));
            }
        });
    }
}
