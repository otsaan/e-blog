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

        Validator::extend('doesntcontaindot', function($attribute, $value, $parameters, $validator) {
            return !str_contains($value, '.');
        });
    }


    public function register()
    {
        //
    }
}
