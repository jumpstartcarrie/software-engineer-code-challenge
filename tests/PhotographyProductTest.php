<?php

namespace Tests;

use App\Product\PhotographyProduct;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class PhotographyProductTest extends TestCase
{
    private PhotographyProduct $photographyProduct;

    protected function setUp(): void
    {
        $this->photographyProduct = new PhotographyProduct(
            ProductData::getProductValue('photographyProduct')['code'],
            ProductData::getProductValue('photographyProduct')['name'],
            ProductData::getProductValue('photographyProduct')['price']
        );
    }

    public function testItGetsValidPhotographyProductCode()
    {
        $this->assertEquals(
            ProductData::getProductValue('photographyProduct')['code'],
            $this->photographyProduct->getCode(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('photographyProduct')['code'])
        );
    }

    public function testItGetsValidPhotographyProductName()
    {
        $this->assertEquals(
            ProductData::getProductValue('photographyProduct')['name'],
            $this->photographyProduct->getName(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('photographyProduct')['name'])
        );
    }

    public function testItGetsValidPhotographyProductPrice()
    {
        $this->assertEquals(
            ProductData::getProductValue('photographyProduct')['price'],
            $this->photographyProduct->getPrice(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('photographyProduct')['price'])
        );
    }
}
