<?php

namespace CloudPROLaravel;

use CloudPROLaravel\Drivers\CloudPRO;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class CloudPROServiceProvider extends ServiceProvider
{

    public function register()
    {
        Storage::extend("cloudpro", function ($app, $config) {
            return new CloudPRO($config);
        });
    }

}
