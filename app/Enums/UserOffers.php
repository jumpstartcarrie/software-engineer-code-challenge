<?php

namespace App\Enums;

enum UserOffers: int
{
    case AnnualContract = 10;


    public static function fromName(string $name)
    {
        return constant("self::$name")->value;
    }

}
