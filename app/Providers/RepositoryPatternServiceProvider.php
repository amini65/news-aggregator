<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepo;
use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\Preference\PreferenceRepo;
use App\Repositories\Preference\PreferenceRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryPatternServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class , ArticleRepo::class);

        $this->app->bind(PreferenceRepositoryInterface::class , PreferenceRepo::class);
    }
}
