<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\ProductInterface',
            'App\Repositories\ProductRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\RepositoryInterface',
            'App\Repositories\Repository'
        );
    }
}

