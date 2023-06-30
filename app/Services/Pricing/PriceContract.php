<?php

namespace App\Services\Pricing;

interface PriceContract
{
    public function getPrice(string $productCode, int $existingTotal): int|float;
}