<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvidor extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('check_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::user()->password);
        });

        Validator::extend('alpha_check', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z]+$/', $value);
        });

        Validator::extend('alpha_dash_check', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z\d_-]+$/', $value);
        });

        Validator::extend('alpha_num_check', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[A-Za-z\d]+$/', $value);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
