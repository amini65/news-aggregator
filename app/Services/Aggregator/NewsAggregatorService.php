<?php

namespace App\Services\Aggregator;

use App\Services\Aggregator\Interfaces\SourceInterface;

class NewsAggregatorService
{
    private $sources = [];

    public function getSource(SourceInterface $source)
    {
        $this->sources[] = $source;

        return $this;
    }

    public function runSource()
    {

        foreach ($this->sources as $source) {
            $source->requestToSource()
                ->runResultAdapter()
                ->save();
        }

    }

}
