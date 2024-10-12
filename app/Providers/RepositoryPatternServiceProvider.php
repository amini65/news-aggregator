<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepo;
use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\Author\AuthorRepo;
use App\Repositories\Author\AuthorRepoInterface;
use App\Repositories\Category\CategoryRepo;
use App\Repositories\Category\CategoryRepoInterface;
use App\Repositories\Preference\PreferenceRepo;
use App\Repositories\Preference\PreferenceRepositoryInterface;
use App\Repositories\Source\SourceRepo;
use App\Repositories\Source\SourceRepoInterface;
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

        $this->app->bind(CategoryRepoInterface::class , CategoryRepo::class);

        $this->app->bind(AuthorRepoInterface::class , AuthorRepo::class);

        $this->app->bind(SourceRepoInterface::class , SourceRepo::class);
    }
}
