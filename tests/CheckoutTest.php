<?php

namespace Tests;

use App\Enums\ProductPrices;
use App\Enums\UserOffers;
use App\Services\Checkout\Basket;
use App\User\User;
use App\ValueObjects\Offer;
use App\ValueObjects\Product;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    public function testItThrowsInvalidProductException()
    {
        $checkout = new Basket([]);
        $this->expectException(\Exception::class);
        $checkout->add(Product::fromString('P005'));
    }

    public function testItThrowsMultipleProductException()
    {
        $checkout = new Basket([]);
        $this->expectException(\Exception::class);
        $checkout->add(Product::fromString('P001'));
        $checkout->add(Product::fromString('P001'));
    }

    public function testItGetsCorrectTotalForSingleProductWithoutOffer()
    {
        $checkout = new Basket([]);
        $checkout->add(Product::fromString('P003'));
        $this->assertEquals(ProductPrices::P003->value, $checkout->total(), 'Checkout total does not equal expected value');
    }

    public function testItGetsCorrectTotalForSingleProductWithOffer()
    {
        $offerType = 'AnnualContract';
        $user = new User();
        $user->addOffer(Offer::fromString($offerType));

        $checkout = new Basket($user->getOffers());
        $expectedPrice = ProductPrices::P001->value - (ProductPrices::P001->value * UserOffers::AnnualContract->value / 100);

        $checkout->add(Product::fromString('P001'));
        $this->assertEquals($expectedPrice, $checkout->total(), 'Checkout total does not equal expected value');
    }

    public function testItGetsCorrectTotalForMultipleProductsWithoutOffer()
    {
        $checkout = new Basket([]);
        $expectedTotal = ProductPrices::P001->value + ProductPrices::P002->value + ProductPrices::P003->value + ProductPrices::P004->value;

        $checkout->add(Product::fromString('P001'));
        $checkout->add(Product::fromString('P002'));
        $checkout->add(Product::fromString('P003'));
        $checkout->add(Product::fromString('P004'));

        $this->assertEquals($expectedTotal, $checkout->total(), 'Checkout total does not equal expected value');
    }

//
//
}
