<?php

namespace App\Services\Checkout;

use App\ValueObjects\Product;

interface CheckoutContract
{
    public function add(Product $product): void;

    public function total(): int;
}
