<?php

namespace App\Providers;

use App\Services\Sms\FakeSmsPanel;
use App\Services\Sms\UseMeliPayamak;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\Sms\SmsInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SmsInterface::class,UseMeliPayamak::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(190);
    }
}
