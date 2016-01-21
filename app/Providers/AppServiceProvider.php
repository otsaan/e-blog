<?php

namespace App\Providers;

use Carbon\Carbon;
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
        Carbon::setLocale('fr');
    }


    public function register()
    {
        //
    }
}
