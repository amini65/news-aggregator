<?php

namespace App\Services\Aggregator\Interfaces;

interface NewsAggregatorServiceInterface
{

    public function getSource(SourceInterface $source);

    public function runSource();

}
