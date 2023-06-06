<?php

namespace App\providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;
use Services\api\FakeServiceClient;
use Services\domain\WTradeApiToOpencart2Service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WTradeApiToOpencart2Service::class, function () {
            return new WTradeApiToOpencart2Service(new FakeServiceClient());
        });
    }
}
