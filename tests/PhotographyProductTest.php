<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\PhotographyProduct;
use PHPUnit\Framework\TestCase;

class PhotographyProductTest extends TestCase
{
    private PhotographyProduct $photographyProduct;

    protected function setUp(): void
    {
        $this->photographyProduct = new PhotographyProduct('P001', 'Photography', 200);
    }

    public function testItGetsValidPhotographyProductCode()
    {
        $this->assertEquals(ProductCodes::Photography->value, $this->photographyProduct->getCode(), sprintf('Product code does not match expected value of %s', ProductCodes::Photography->value));
    }

    public function testItGetsValidPhotographyProductName()
    {
        $this->assertEquals(ProductNames::Photography->value, $this->photographyProduct->getName(), sprintf('Product code does not match expected value of %s', ProductNames::Photography->value));
    }

    public function testItGetsValidPhotographyProductPrice()
    {
        $this->assertEquals(ProductPrices::Photography->value, $this->photographyProduct->getPrice(), sprintf('Product code does not match expected value of %s', ProductPrices::Photography->value));
    }
}
