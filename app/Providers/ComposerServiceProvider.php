<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('userID', function () {
            $userID = 0;
            if (Auth::check()) {
                $userID = Auth::user()->id;
            }
            return $userID;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {   
        view()->composer('*', function ($view) {
            $userID = null;
            if (Auth::check()) {
                $userID = Auth::user()->id;
            }            
            $view->with('userID', $userID);
        });
        View::composer('*', function ($view) {
            $numcart=0;
            if (Auth::check()) {
                $userID = Auth::user()->id;
                $numcart = Cart::where('UserID', $userID)->count();
            }
            $view->with('numcart', $numcart);
        });
    }
}
