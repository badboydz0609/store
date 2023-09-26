<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('home.header', function ($view) {
            if (Auth::user() && Auth::user()->role == 'client') {
                $carts = Cart::where('user_id',Auth::user()->id)->get();
                $cart_item = $carts->count();
                $view->with('cart_item', $cart_item);
            } else {
                $view->with('cart_item', 0);
            }
        });
    }


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


}
