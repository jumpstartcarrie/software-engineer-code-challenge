<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\AbstractProduct;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class FloorPlanProductTest extends TestCase
{
    private AbstractProduct $floorPlanProduct;

    protected function setUp(): void
    {
        $this->floorPlanProduct = ProductData::getProductInstance('FloorPlanProduct');
    }

    public function testItGetsValidFloorPlanProductCode()
    {
        $this->assertEquals(
            ProductData::getProductValue('FloorPlanProduct')['code'],
            $this->floorPlanProduct->getCode(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('FloorPlanProduct')['code'])
        );
    }

    public function testItGetsValidFloorPlanProductName()
    {
        $this->assertEquals(
            ProductData::getProductValue('FloorPlanProduct')['name'],
            $this->floorPlanProduct->getName(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('FloorPlanProduct')['name'])
        );
    }

    public function testItGetsValidFloorPlanProductPrice()
    {
        $this->assertEquals(
            ProductData::getProductValue('FloorPlanProduct')['price'],
            $this->floorPlanProduct->getPrice(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('FloorPlanProduct')['price'])
        );
    }
}
