<?php

namespace Tests\Feature\api;

use Illuminate\Container\Attributes\Auth;
use Tests\TestCase;

class ArticleResponseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        \Illuminate\Support\Facades\Auth::loginUsingId(1);
        $response = $this->get('/api/v1/articles?category=sports')
        ->withHeaders([
            "Accept" => "application/json",
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
