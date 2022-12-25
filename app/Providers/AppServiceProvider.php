<?php

namespace App\Providers;

use App\Services\Sms\FakeSmsPanel;
use App\Services\Sms\IppanelSms;
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
        $this->app->bind(SmsInterface::class,FakeSmsPanel::class);
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
