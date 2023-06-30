<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\AbstractProduct;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class GasCertificateProductTest extends TestCase
{
    private AbstractProduct $gasCertificateProduct;

    protected function setUp(): void
    {
        $this->gasCertificateProduct = ProductData::getProductInstance('GasCertificateProduct');
    }

    public function testItGetsValidGasCertificateProductCode()
    {
        $this->assertEquals(
            ProductData::getProductValue('GasCertificateProduct')['code'],
            $this->gasCertificateProduct->getCode(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('GasCertificateProduct')['code'])
        );
    }

    public function testItGetsValidGasCertificateProductName()
    {
        $this->assertEquals(
            ProductData::getProductValue('GasCertificateProduct')['name'],
            $this->gasCertificateProduct->getName(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('GasCertificateProduct')['name'])
        );
    }

    public function testItGetsValidGasCertificateProductPrice()
    {
        $this->assertEquals(
            ProductData::getProductValue('GasCertificateProduct')['price'],
            $this->gasCertificateProduct->getPrice(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('GasCertificateProduct')['price'])
        );
    }
}
