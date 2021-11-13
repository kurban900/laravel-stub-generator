<?php

namespace Kurban900\LaravelStubGenerator;

use Illuminate\Support\ServiceProvider;
use Kurban900\LaravelStubGenerator\Console\GenerateAdminStubs;

class LaravelStubGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateAdminStubs::class,
            ]);
        }
    }
}
