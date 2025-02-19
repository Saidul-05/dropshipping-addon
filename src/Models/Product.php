<?php

namespace YourVendor\DropshippingAddon\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'supplier',
        'supplier_id',
    ];
}
