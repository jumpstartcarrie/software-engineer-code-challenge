<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\FloorPlanProduct;
use PHPUnit\Framework\TestCase;

class FloorPlanProductTest extends TestCase
{
    private FloorPlanProduct $floorPlanProduct;

    protected function setUp(): void
    {
        $this->floorPlanProduct = new FloorPlanProduct('P002', 'Floorplan', 100);
    }

    public function testItGetsValidFloorPlanProductCode()
    {
        $this->assertEquals(ProductCodes::FloorPlan->value, $this->floorPlanProduct->getCode(), sprintf('Product code does not match expected value of %s', ProductCodes::FloorPlan->value));
    }

    public function testItGetsValidFloorPlanProductName()
    {
        $this->assertEquals(ProductNames::FloorPlan->value, $this->floorPlanProduct->getName(), sprintf('Product code does not match expected value of %s', ProductNames::FloorPlan->value));
    }

    public function testItGetsValidFloorPlanProductPrice()
    {
        $this->assertEquals(ProductPrices::P002->value, $this->floorPlanProduct->getPrice(), sprintf('Product code does not match expected value of %s', ProductPrices::P002->value));
    }
}
