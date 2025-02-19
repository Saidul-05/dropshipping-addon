<?php

use Illuminate\Support\Facades\Route;
use YourVendor\DropshippingAddon\Http\Controllers\DropshippingController;

Route::prefix('api/dropshipping')->group(function () {
    Route::post('/import', [DropshippingController::class, 'import']);
});
