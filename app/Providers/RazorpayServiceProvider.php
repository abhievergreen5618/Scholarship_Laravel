<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Razorpay\Api\Api;

class RazorpayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('razorpay', function () {
            return new Api(config('razorpay.RAZORPAY_KEY'), config('razorpay.RAZORPAY_SECRET'));
        });
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
