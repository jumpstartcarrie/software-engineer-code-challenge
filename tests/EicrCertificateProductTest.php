<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\EicrCertificateProduct;
use PHPUnit\Framework\TestCase;

class EicrCertificateProductTest extends TestCase
{
    private EicrCertificateProduct $eicrCertificateProduct;

    protected function setUp(): void
    {
        $this->eicrCertificateProduct = new EicrCertificateProduct('P004', 'EICR Certificate', 51.00);
    }

    public function testItGetsValidEicrCertificateProductCode()
    {
        $this->assertEquals(ProductCodes::EicrCertificate->value, $this->eicrCertificateProduct->getCode(), sprintf('Product code does not match expected value of %s', ProductCodes::EicrCertificate->value));
    }

    public function testItGetsValidEicrCertificateProductName()
    {
        $this->assertEquals(ProductNames::EicrCertificate->value, $this->eicrCertificateProduct->getName(), sprintf('Product code does not match expected value of %s', ProductNames::EicrCertificate->value));
    }

    public function testItGetsValidEicrCertificateProductPrice()
    {
        $this->assertEquals(ProductPrices::P004->value, $this->eicrCertificateProduct->getPrice(), sprintf('Product code does not match expected value of %s', ProductPrices::P004->value));
    }
}
