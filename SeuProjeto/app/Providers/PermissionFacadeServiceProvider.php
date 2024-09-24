<?php

namespace App\Providers;

use App\Facade\Permissions;
use Illuminate\Support\ServiceProvider;

class PermissionFacadeServiceProvider extends ServiceProvider 
{
    public function register(): void
    {
        $this->app->bind('permissions', function(){
            return new Permissions();
        });
    }
}
