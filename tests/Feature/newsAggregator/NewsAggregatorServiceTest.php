<?php

namespace Tests\Feature\newsAggregator;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class NewsAggregatorServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $artisanResponse=Artisan::call("news:aggregate");

        $this->assertEquals($artisanResponse,0);

    }
}
