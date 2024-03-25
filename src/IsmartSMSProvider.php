<?php

namespace S4D\Laravel\IsmartSMS;

use Illuminate\Support\ServiceProvider;
use S4D\Laravel\IsmartSMS\Services\IsmartSMSService;

class IsmartSMSProvider extends ServiceProvider {
    public function boot(){
        $this->mergeConfigFrom(__DIR__.'/config/ismartsms.php', 'ismartsms');
        $this->publishes([
            __DIR__.'/config/ismartsms.php' => config_path('ismartsms.php')
        ]);
    }

    public function register(){
        $this->app->bind('IsmartSMS', fn() => new IsmartSMSService());
    }
}
