<?php

namespace App\Services\Aggregator\GuardianFake;

use App\Exceptions\SourceResponseFaildException;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\Aggregator\Interfaces\AdapterInterface;
use App\Services\Aggregator\Interfaces\SourceInterface;
use App\Services\Aggregator\Traits\RequestSourceTrait;
use App\Services\Aggregator\Traits\SaveTrait;
use Illuminate\Support\Facades\Http;

class GuardianFakeSource implements SourceInterface
{

    public $sourceName = 'guardianFake';
    public $result;
    public $headers;

    /**
     * @var $newsApiAdapter GuardianFakeResultAdapter
     */
    private $newsApiAdapter;

    public function __construct(AdapterInterface $newsApiAdapter)
    {

        $this->newsApiAdapter=$newsApiAdapter;

    }
    public function requestToSource()
    {

        $response = Http::fake(function () {
                return [
                    'source'=>'GauardianFake',
                    'category'=>'education',
                    'author'=>'Amir',
                    'title'=>"Plans to add VAT to private school fees won’t be delayed, says minister",
                    'description'=>"The Guardian view on the Conservative leadership contest: normality is not on the ballot | Editorial",
                    'image'=>"imageFake",
                    'content'=>"contentFake",
                    'published_at'=>"2024-10-09T17:53:24Z",
                ];
            })->get('google.com');

        if ($response->failed()) {
            throw(new SourceResponseFaildException('something went wrong'));
        }

        $this->result = $response->getBody()->getContents();

        return $this;
    }
    public function runResultAdapter()
    {

        $this->result= $this->newsApiAdapter->prepareResult($this->result);

        return $this;
    }

    public function save()
    {
        return true;
    }



}
