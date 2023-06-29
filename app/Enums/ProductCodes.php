<?php

namespace App\Enums;

enum ProductCodes: string
{
    case Photography = 'P001';
    case FloorPlan = 'P002';
    case GasCertificate = 'P003';
    case EicrCertificate = 'P004';


    public static function fromName(string $name)
    {
        return constant("self::$name")->value;
    }
}
