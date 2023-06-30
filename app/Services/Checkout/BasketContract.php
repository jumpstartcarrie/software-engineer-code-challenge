<?php

namespace App\Services\Checkout;

use App\ValueObjects\Product;

interface BasketContract
{
    public function add(Product $product): void;

    public function total(): int|float;
}
