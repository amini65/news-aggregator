<?php

namespace App\Providers;


use App\Services\Article\ArticleService;
use App\Services\Article\ArticleServiceInterface;
use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
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
        $this->app->bind(ArticleServiceInterface::class,ArticleService::class);
    }
}
