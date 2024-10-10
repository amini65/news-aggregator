<?php

namespace App\Services\Aggregator;

use App\Services\Aggregator\Interfaces\NewsAggregatorServiceInterface;
use App\Services\Aggregator\Interfaces\SourceInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static NewsAggregatorService getSource(SourceInterface $source)
 * @method static NewsAggregatorService runSource()
 */
class NewsAggregator extends Facade
{

    public static function getFacadeAccessor(){

        return NewsAggregatorServiceInterface::class;

    }

}
