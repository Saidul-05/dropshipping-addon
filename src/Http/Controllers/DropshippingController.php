<?php

namespace YourVendor\DropshippingAddon\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use GuzzleHttp\Client;

class DropshippingController
{
    public function import(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'supplier' => 'required|in:aliexpress,cj',
            'api_key' => 'required|string'
        ]);

        $client = new Client();
        $response = $client->get(config('dropshipping.endpoints.' . $validated['supplier']), [
            'headers' => ['Authorization' => $validated['api_key']]
        ]);

        $products = json_decode($response->getBody(), true);

        $processed = array_map(function ($product) {
            return [
                'name' => $product['title'],
                'price' => $product['base_price'] * config('dropshipping.default_markup'),
            ];
        }, $products);

        return response()->json(['data' => $processed], 201);
    }
}
