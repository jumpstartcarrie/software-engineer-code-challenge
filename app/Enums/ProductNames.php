<?php

namespace App\Enums;

enum ProductNames: string
{
    case Photography = 'Photography';
    case FloorPlan = 'Floorplan';
    case GasCertificate = 'Gas Certificate';
    case EicrCertificate = 'EICR Certificate';


//    public static function fromName(string $name)
//    {
//        return constant("self::$name")->value;
//    }
}
