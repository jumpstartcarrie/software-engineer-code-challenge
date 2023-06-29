<?php

namespace App\Services\Pricing;

interface PriceContract
{
    public function getPrice(string $productCode, int $quantity, int $existingTotal): int;
}