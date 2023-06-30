<?php

namespace Tests\Helpers;

class ProductData
{
    private const PRODUCT_VALUES = [
        'photographyProduct' => [
            'code' => 'P001',
            'name' => 'Photography',
            'price' => 200
        ],
        'floorPlanProduct' => [
            'code' => 'P002',
            'name' => 'Floorplan',
            'price' => 100
        ],
        'gasCertificateProduct' => [
            'code' => 'P003',
            'name' => 'Gas Certificate',
            'price' => 83.50
        ],
        'eicrCertificateProduct' => [
            'code' => 'P004',
            'name' => 'EICR Certificate',
            'price' => 51.00
        ],
    ];

    public static function getAllProductValues(): array
    {
        return self::PRODUCT_VALUES;
    }

    public static function getProductValue(string $productType): array
    {
        return self::PRODUCT_VALUES[$productType];
    }

}