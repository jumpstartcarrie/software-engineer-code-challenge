<?php

namespace App\Product;

abstract class AbstractProduct implements ProductContract
{
    public function __construct(
        protected readonly string $code,
        protected readonly string $name,
        protected readonly float $price,
    ) {
    }
    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}