<?php

namespace App\Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}