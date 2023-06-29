<?php

namespace App\Enums;

enum ProductPrices: string
{
    case P001 = '200';
    case P002 = '100';
    case P003 = '83.50';
    case P004 = '51.00';


    public static function fromName(string $name)
    {
        return constant("self::$name")->value;
    }
}
