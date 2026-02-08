<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ActivityLogService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register ActivityLogService as singleton
        $this->app->singleton('activity-log', function ($app) {
            return new ActivityLogService();
        });

        // Also allow dependency injection
        $this->app->bind(ActivityLogService::class, function ($app) {
            return $app->make('activity-log');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
