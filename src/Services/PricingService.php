<?php

namespace YourVendor\DropshippingAddon\Services;

class PricingService
{
    public function applyMarkup(float $basePrice): float
    {
        return $basePrice * config('dropshipping.default_markup');
    }
}
