<?php

namespace App\Services\Pricing;

interface PriceContract
{
    public static function getPrice(string $productCode, int $existingTotal): int|float;
}