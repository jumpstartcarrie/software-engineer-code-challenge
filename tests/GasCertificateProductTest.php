<?php

namespace Tests;

use App\Enums\ProductCodes;
use App\Enums\ProductNames;
use App\Enums\ProductPrices;
use App\Product\GasCertificateProduct;
use PHPUnit\Framework\TestCase;

class GasCertificateProductTest extends TestCase
{
    private GasCertificateProduct $gasCertificateProduct;

    protected function setUp(): void
    {
        $this->gasCertificateProduct = new GasCertificateProduct('P003', 'Gas Certificate', 83.50);
    }

    public function testItGetsValidGasCertificateProductCode()
    {
        $this->assertEquals(ProductCodes::GasCertificate->value, $this->gasCertificateProduct->getCode(), sprintf('Product code does not match expected value of %s', ProductCodes::GasCertificate->value));
    }

    public function testItGetsValidGasCertificateProductName()
    {
        $this->assertEquals(ProductNames::GasCertificate->value, $this->gasCertificateProduct->getName(), sprintf('Product code does not match expected value of %s', ProductNames::GasCertificate->value));
    }

    public function testItGetsValidGasCertificateProductPrice()
    {
        $this->assertEquals(ProductPrices::GasCertificate->value, $this->gasCertificateProduct->getPrice(), sprintf('Product code does not match expected value of %s', ProductPrices::GasCertificate->value));
    }
}
