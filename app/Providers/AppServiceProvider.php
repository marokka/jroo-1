<?php

namespace App\Providers;

use App\Models\Ingridient\Ingridient;
use App\Models\Ingridient\IngridientFoods;
use App\Models\Order\Order;
use App\Observers\IngridientFoodsObserver;
use App\Observers\IngridientObserver;
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
        IngridientFoods::observe(IngridientFoodsObserver::class);
        Ingridient::observe(IngridientObserver::class);

        $this->app->singleton('Payment', function () {
            return new Payment(env('DEMO_MRH_LOGIN'), env('DEMO_MRH_PASSWORD'), env('DEMO_MRH_PASSWORD2'),
                env('TEST_ROBOKASSA', false));
        });

    }
}
