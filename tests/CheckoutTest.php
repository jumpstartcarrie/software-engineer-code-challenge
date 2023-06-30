<?php

namespace Tests;

use App\Enums\ProductPrices;
use App\Enums\UserOffers;
use App\Services\Checkout\Checkout;
use App\Services\Pricing\Price;
use App\User\User;
use App\ValueObjects\Offer;
use App\ValueObjects\Product;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User();
        $this->checkout = new Checkout($this->user, new Price());
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

    public function testItGetsCorrectTotalForSingleProductWithoutOffer()
    {
        $this->checkout->add(Product::fromString('P003'));
        $this->assertEquals(ProductPrices::P003->value, $this->checkout->total(), 'Checkout total does not equal expected value');
    }

    public function testItGetsCorrectTotalForSingleProductWithOffer()
    {
        $expectedPrice = ProductPrices::P001->value - (ProductPrices::P001->value * UserOffers::AnnualContract->value / 100);
        $offerType = 'AnnualContract';
        $this->user->addOffer(Offer::fromString($offerType));
        $this->checkout->add(Product::fromString('P001'));
        $this->assertEquals($expectedPrice, $this->checkout->total(), 'Checkout total does not equal expected value');
    }

    public function testItGetsCorrectTotalForMultipleProductsWithoutOffer()
    {
        $expectedTotal = ProductPrices::P001->value + ProductPrices::P002->value + ProductPrices::P003->value + ProductPrices::P004->value;

        $this->checkout->add(Product::fromString('P001'));
        $this->checkout->add(Product::fromString('P002'));
        $this->checkout->add(Product::fromString('P003'));
        $this->checkout->add(Product::fromString('P004'));

        $this->assertEquals($expectedTotal, $this->checkout->total(), 'Checkout total does not equal expected value');
    }

//
//
}
