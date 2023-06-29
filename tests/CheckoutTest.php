<?php

namespace Tests;

use App\Enums\ProductPrices;
use App\Services\Checkout\Checkout;
use App\Services\Pricing\Price;
use App\User\User;
use App\ValueObjects\Product;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    protected function setUp(): void
    {
        $this->checkout = new Checkout(new User(), new Price());
    }

    public function testItThrowsInvalidProductException()
    {
        $this->expectException(\Exception::class);
        $this->checkout->add(Product::fromString('P005'));
    }

    public function testItThrowsMultipleProductException()
    {
        $this->expectException(\Exception::class);
        $this->checkout->add(Product::fromString('P001'));
        $this->checkout->add(Product::fromString('P001'));
    }

    public function testItAddsValidProduct()
    {
        $this->checkout->add(Product::fromString('P001'));
        $this->assertEquals(ProductPrices::P001->value, $this->checkout->total(), 'Checkout total does not equal expected value');
    }

//    public function testItGetsUserOffers()
//    {
//
//    }
//
//
}
