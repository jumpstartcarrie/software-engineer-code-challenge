<?php

namespace App\Enums;

enum ProductPrices: string
{
    case Photography = '200';
    case FloorPlan = '100';
    case GasCertificate = '83.50';
    case EicrCertificate = '51.00';


    public static function fromName(string $name)
    {
        return constant("self::$name")->value;
    }
}
