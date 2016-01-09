<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('authenticatedUser', Auth::user());
        });
    }


    public function register()
    {
        //
    }
}
