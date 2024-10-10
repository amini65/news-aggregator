<?php

namespace App\Providers;

use App\Services\Aggregator\Guardian\GuardianResultAdapter;
use App\Services\Aggregator\GuardianFake\GuardianFakeResultAdapter;
use App\Services\Aggregator\GuardianFake\GuardianFakeSource;
use App\Services\Aggregator\Interfaces\AdapterInterface;
use App\Services\Aggregator\Interfaces\NewsAggregatorServiceInterface;
use App\Services\Aggregator\Interfaces\SourceInterface;
use App\Services\Aggregator\Guardian\GuardianSource;
use App\Services\Aggregator\NewsAggregatorService;
use App\Services\Aggregator\NewsAPI\NewsApiResultAdapter;
use App\Services\Aggregator\NewsAPI\NewsApiSource;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class NewsAggregatorProvider extends ServiceProvider
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

        $this->app->bind(SourceInterface::class, function ($app) {

            if(app()->environment('testing')) {
                return [$app->make(GuardianFakeSource::class)];
            }

            return [
                $app->make(NewsApiSource::class),
                $app->make(GuardianSource::class)

            ];

        });

        $this->app->when(NewsApiSource::class)
            ->needs(AdapterInterface::class)
            ->give(function () {
                return App::make(NewsApiResultAdapter::class);
            });

        $this->app->when(GuardianSource::class)
            ->needs(AdapterInterface::class)
            ->give(function () {
                return App::make(GuardianResultAdapter::class);
            });


        $this->app->when(GuardianFakeSource::class)
            ->needs(AdapterInterface::class)
            ->give(function () {
                return App::make(GuardianFakeResultAdapter::class);
            });

        $this->app->singleton(NewsAggregatorServiceInterface::class, function ($app) {
            return  App::make(NewsAggregatorService::class);
        });

    }
}
