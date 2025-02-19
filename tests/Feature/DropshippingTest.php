<?php

namespace YourVendor\DropshippingAddon\Tests\Feature;

use Tests\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;

class DropshippingTest extends TestCase
{
    public function test_product_import()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([[
                'title' => 'Test Product',
                'base_price' => 100
            ]]))
        ]);

        $this->app->instance('guzzle', new \GuzzleHttp\Client([
            'handler' => HandlerStack::create($mock)
        ]));

        $response = $this->postJson('/api/dropshipping/import', [
            'supplier' => 'aliexpress',
            'api_key' => 'test_key'
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['data' => [[
                'name', 'price'
            ]]]);
    }
}
