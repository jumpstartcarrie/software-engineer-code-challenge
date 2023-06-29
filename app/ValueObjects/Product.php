<?php

namespace App\ValueObjects;

class Product
{
    public function __construct(public string $productCode)
    {

    }

    public static function fromString(string $productCode): self
    {
        return new self($productCode);
    }
}
