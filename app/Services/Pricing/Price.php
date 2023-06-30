<?php

namespace App\Services\Pricing;

use App\Enums\ProductPrices;

class Price implements PriceContract
{
    public function getPrice(string $productCode, int $existingTotal): int|float
    {
        $itemPrice = ProductPrices::fromName($productCode);
        return $existingTotal + $itemPrice;
    }
}