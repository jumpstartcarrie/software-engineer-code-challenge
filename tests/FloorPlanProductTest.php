<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\FloorPlanProduct;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class FloorPlanProductTest extends TestCase
{
    private FloorPlanProduct $floorPlanProduct;

    protected function setUp(): void
    {
        $this->floorPlanProduct = new FloorPlanProduct(
            ProductData::getProductValue('floorPlanProduct')['code'],
            ProductData::getProductValue('floorPlanProduct')['name'],
            ProductData::getProductValue('floorPlanProduct')['price']
        );
    }

    public function testItGetsValidFloorPlanProductCode()
    {
        $this->assertEquals(
            ProductData::getProductValue('floorPlanProduct')['code'],
            $this->floorPlanProduct->getCode(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('floorPlanProduct')['code'])
        );
    }

    public function testItGetsValidFloorPlanProductName()
    {
        $this->assertEquals(
            ProductData::getProductValue('floorPlanProduct')['name'],
            $this->floorPlanProduct->getName(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('floorPlanProduct')['name'])
        );
    }

    public function testItGetsValidFloorPlanProductPrice()
    {
        $this->assertEquals(
            ProductData::getProductValue('floorPlanProduct')['price'],
            $this->floorPlanProduct->getPrice(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('floorPlanProduct')['price'])
        );
    }
}
