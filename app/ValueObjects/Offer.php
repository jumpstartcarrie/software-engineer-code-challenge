<?php

namespace App\ValueObjects;

class Offer
{

    public function __construct(public string $offerType) {

    }

    public static function fromString(string $offerType): self
    {
        return new self($offerType);
    }
}