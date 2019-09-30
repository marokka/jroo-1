<?php

namespace App\Providers;

use App\Models\Order\Order;
use App\Observers\OrderObserver;
use Idma\Robokassa\Payment;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        Order::observe(OrderObserver::class);

        $this->app->singleton('Payment', function () {
            return new Payment(env('DEMO_MRH_LOGIN'), env('DEMO_MRH_PASSWORD'), env('DEMO_MRH_PASSWORD2'),
                env('APP_DEBUG'));
        });

    }
}
