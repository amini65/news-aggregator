<?php

namespace App\Providers;

use App\Services\Preference\PreferenceService;
use App\Services\Preference\PreferenceServiceInterface;
use Illuminate\Support\ServiceProvider;

class PreferenceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(PreferenceServiceInterface::class,PreferenceService::class);
    }
}
