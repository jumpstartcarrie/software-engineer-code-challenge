<?php

namespace Tests;

use App\Product\AbstractProduct;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class PhotographyProductTest extends TestCase
{
    private AbstractProduct $photographyProduct;

    protected function setUp(): void
    {
        $this->photographyProduct = ProductData::getProductInstance('PhotographyProduct');
    }

    public function testItGetsValidPhotographyProductCode()
    {
        $this->assertEquals(
            ProductData::getProductValue('PhotographyProduct')['code'],
            $this->photographyProduct->getCode(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('PhotographyProduct')['code'])
        );
    }

    public function testItGetsValidPhotographyProductName()
    {
        $this->assertEquals(
            ProductData::getProductValue('PhotographyProduct')['name'],
            $this->photographyProduct->getName(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('PhotographyProduct')['name'])
        );
    }

    public function testItGetsValidPhotographyProductPrice()
    {
        $this->assertEquals(
            ProductData::getProductValue('PhotographyProduct')['price'],
            $this->photographyProduct->getPrice(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('PhotographyProduct')['price'])
        );
    }
}
