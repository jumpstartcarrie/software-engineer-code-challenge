<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\AbstractProduct;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class EicrCertificateProductTest extends TestCase
{
    private AbstractProduct $eicrCertificateProduct;

    protected function setUp(): void
    {
        $this->eicrCertificateProduct = ProductData::getProductInstance('EicrCertificateProduct');
    }

    public function testItGetsValidEicrCertificateProductCode()
    {
        $this->assertSame(
            ProductData::getProductValue('EicrCertificateProduct')['code'],
            $this->eicrCertificateProduct->getCode(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('EicrCertificateProduct')['code'])
        );
    }

    public function testItGetsValidEicrCertificateProductName()
    {
        $this->assertSame(
            ProductData::getProductValue('EicrCertificateProduct')['name'],
            $this->eicrCertificateProduct->getName(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('EicrCertificateProduct')['name'])
        );
    }

    public function testItGetsValidEicrCertificateProductPrice()
    {
        $this->assertSame(
            ProductData::getProductValue('EicrCertificateProduct')['price'],
            $this->eicrCertificateProduct->getPrice(),
            sprintf('Product code does not match expected value of %s', ProductData::getProductValue('EicrCertificateProduct')['price'])
        );
    }
}
