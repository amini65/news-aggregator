<?php

namespace App\Services\Aggregator\NewsAPI;

use App\Exceptions\SourceResponseFaildException;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\Aggregator\Interfaces\AdapterInterface;
use App\Services\Aggregator\Interfaces\SourceInterface;
use App\Services\Aggregator\Traits\RequestSourceTrait;
use App\Services\Aggregator\Traits\SaveTrait;
use Illuminate\Support\Facades\Http;

class NewsApiSource implements SourceInterface
{

    use RequestSourceTrait ,SaveTrait;
    public $sourceName = 'newsApi';
    private $url;
    private $apiToken;
    public $result;

    public $queryParams;
    public $headers;

    /**
     * @var $newsApiAdapter GuardianResultAdapter
     */
    private $newsApiAdapter;

    public function __construct(AdapterInterface $newsApiAdapter)
    {

        $this->newsApiAdapter=$newsApiAdapter;

        $this->url = config('sources.NewsApi.url');

        $this->apiToken = config('sources.NewsApi.token');

        $this->queryParams=[
            'q'=>'sports',
            'from'=>now()->subDay()->format('Y-m-d')
        ];

        $this->headers=[
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->apiToken}"
        ];

    }

    public function runResultAdapter()
    {

        $this->result= $this->newsApiAdapter->prepareResult($this->result);

        return $this;
    }




}
