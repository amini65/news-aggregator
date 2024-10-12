<?php

namespace App\Services\Aggregator\Guardian;

use App\Exceptions\SourceResponseFaildException;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\Aggregator\Interfaces\AdapterInterface;
use App\Services\Aggregator\Interfaces\SourceInterface;
use App\Services\Aggregator\Traits\RequestSourceTrait;
use App\Services\Aggregator\Traits\SaveTrait;
use Illuminate\Support\Facades\Http;

class GuardianSource implements SourceInterface
{

    use RequestSourceTrait ,SaveTrait;
    public $sourceName = 'guardian';
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

        $this->url = config('sources.Guardian.url');

        $this->apiToken = config('sources.Guardian.token');

        $this->queryParams=[
            'q'=>'debate',
            'from-date'=>now()->subDay()->format('Y-m-d'),
            'api-key'=>$this->apiToken,
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
