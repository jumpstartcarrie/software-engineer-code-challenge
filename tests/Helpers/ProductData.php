<?php

namespace Tests\Helpers;

use App\Product\AbstractProduct;

class ProductData
{
    private const PRODUCT_VALUES = [
        'PhotographyProduct' => [
            'code' => 'P001',
            'name' => 'Photography',
            'price' => 200
        ],
        'FloorPlanProduct' => [
            'code' => 'P002',
            'name' => 'Floorplan',
            'price' => 100
        ],
        'GasCertificateProduct' => [
            'code' => 'P003',
            'name' => 'Gas Certificate',
            'price' => 83.50
        ],
        'EicrCertificateProduct' => [
            'code' => 'P004',
            'name' => 'EICR Certificate',
            'price' => 51.00
        ],
    ];

    public static function getProductInstance(string $productType): AbstractProduct
    {
        $class = 'App\Product\\' . $productType;

        return new $class(
            self::getProductValue($productType)['code'],
            self::getProductValue($productType)['name'],
            self::getProductValue($productType)['price']
        );
    }

    public static function getAllProductValues(): array
    {
        return self::PRODUCT_VALUES;
    }

    public static function getProductValue(string $productType): array
    {
        return self::PRODUCT_VALUES[$productType];
    }

}