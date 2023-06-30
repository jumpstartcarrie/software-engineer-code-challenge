<?php

namespace App\Services\Basket;

use App\Product\AbstractProduct;

interface BasketContract
{
    public function add(AbstractProduct $product): void;

    public function total(): int|float;
}
