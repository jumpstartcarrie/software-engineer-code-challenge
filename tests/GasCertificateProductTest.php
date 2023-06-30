<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\GasCertificateProduct;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class GasCertificateProductTest extends TestCase
{
    private GasCertificateProduct $gasCertificateProduct;

    protected function setUp(): void
    {
        $this->gasCertificateProduct = new GasCertificateProduct(
            ProductData::getProductValue('gasCertificateProduct')['code'],
            ProductData::getProductValue('gasCertificateProduct')['name'],
            ProductData::getProductValue('gasCertificateProduct')['price']
        );
    }

    public function testItGetsValidGasCertificateProductCode()
    {
        $this->assertEquals(
            ProductData::getProductValue('gasCertificateProduct')['code'],
            $this->gasCertificateProduct->getCode(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('gasCertificateProduct')['code'])
        );
    }

    public function testItGetsValidGasCertificateProductName()
    {
        $this->assertEquals(
            ProductData::getProductValue('gasCertificateProduct')['name'],
            $this->gasCertificateProduct->getName(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('gasCertificateProduct')['name'])
        );
    }

    public function testItGetsValidGasCertificateProductPrice()
    {
        $this->assertEquals(
            ProductData::getProductValue('gasCertificateProduct')['price'],
            $this->gasCertificateProduct->getPrice(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('gasCertificateProduct')['price'])
        );
    }
}
