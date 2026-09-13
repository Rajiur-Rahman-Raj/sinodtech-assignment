<?php

namespace App\Providers;

use App\Events\ProductCreated;
use App\Listeners\ProductCreatedLog;
use App\Models\Product;
use App\Observers\ProductObserver;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);

        Event::listen(
            ProductCreated::class,
            ProductCreatedLog::class
        );

    }
}
