<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\InventoryRepositoryInterface;
use App\Repositories\InventoryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InventoryRepositoryInterface::class,InventoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
