<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\EicrCertificateProduct;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class EicrCertificateProductTest extends TestCase
{
    private EicrCertificateProduct $eicrCertificateProduct;

    protected function setUp(): void
    {
        $this->eicrCertificateProduct = new EicrCertificateProduct(
            ProductData::getProductValue('eicrCertificateProduct')['code'],
            ProductData::getProductValue('eicrCertificateProduct')['name'],
            ProductData::getProductValue('eicrCertificateProduct')['price']
        );
    }

    public function testItGetsValidEicrCertificateProductCode()
    {
        $this->assertEquals(
            ProductData::getProductValue('eicrCertificateProduct')['code'],
            $this->eicrCertificateProduct->getCode(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('eicrCertificateProduct')['code'])
        );
    }

    public function testItGetsValidEicrCertificateProductName()
    {
        $this->assertEquals(
            ProductData::getProductValue('eicrCertificateProduct')['name'],
            $this->eicrCertificateProduct->getName(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('eicrCertificateProduct')['name'])
        );
    }

    public function testItGetsValidEicrCertificateProductPrice()
    {
        $this->assertEquals(
            ProductData::getProductValue('eicrCertificateProduct')['price'],
            $this->eicrCertificateProduct->getPrice(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('eicrCertificateProduct')['price'])
        );
    }
}
