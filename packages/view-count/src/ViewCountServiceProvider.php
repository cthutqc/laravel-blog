<?php

namespace Cthutqc\ViewCount;

use Illuminate\Support\ServiceProvider;

class ViewCountServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}
