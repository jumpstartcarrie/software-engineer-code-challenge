<?php

namespace App\Product;

use App\ValueObjects\Product;

interface ProductContract
{
    public function getCode();

    public function getName();

    public function getPrice();
}
