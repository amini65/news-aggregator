<?php

namespace App\Services\Aggregator\Traits;

use App\Exceptions\SourceResponseFaildException;
use Illuminate\Support\Facades\Http;

trait RequestSourceTrait
{
    public function requestToSource()
    {

        $response = Http::withHeaders($this->headers)
            ->withQueryParameters($this->queryParams)
            ->get($this->url);

        if ($response->failed()) {
            throw(new SourceResponseFaildException('something went wrong'));
        }

        $this->result = $response->getBody()->getContents();

        return $this;
    }
}
