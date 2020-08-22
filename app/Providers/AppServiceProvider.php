<?php

namespace App\Providers;

use App\Customer;
use App\Item;
use App\Provider;
use App\User;
use Illuminate\Support\Facades\Route;
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
        Route::bind('user', function($value){
            return User::where((new User)->getRouteKeyName(), '=', $value)
                        ->where('state', '=', '1')
                        ->firstOrFail();
        });

        Route::bind('supervisor', function($value){
            return User::where((new User)->getRouteKeyName(), '=', $value)
                        ->where('state', '=', '1')
                        ->where('role_id', '=', 2)
                        ->firstOrFail();
        });

        Route::bind('seller', function($value){
            return User::where((new User)->getRouteKeyName(), '=', $value)
                        ->where('state', '=', '1')
                        ->where('role_id', '=', 3)
                        ->firstOrFail();
        });

        Route::bind('customer', function($value){
            return Customer::where((new Customer)->getRouteKeyName(), '=', $value)
                            ->where('state', '=', '1')
                            ->firstOrFail();
        });

        Route::bind('provider', function($value){
            return Provider::where((new Provider)->getRouteKeyName(), '=', $value)
                            ->where('state', '=', '1')
                            ->firstOrFail();
        });

        Route::bind('item', function($value){
            return Item::where((new Item)->getRouteKeyName(), '=', $value)
                        ->where('state', '=', '1')
                        ->firstOrFail();
        });

    }
}
