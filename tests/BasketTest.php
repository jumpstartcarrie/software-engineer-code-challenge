<?php

namespace Tests;

use App\Enums\ProductPrices;
use App\Enums\UserOffers;
use App\Product\AbstractProduct;
use App\Services\Basket\Basket;
use App\User\User;
use App\ValueObjects\Offer;
use PHPUnit\Framework\TestCase;
use Tests\Helpers\ProductData;

class BasketTest extends TestCase
{
    private Basket $basket;
    private AbstractProduct $photographyProduct;
    private AbstractProduct $floorPlanProduct;
    private AbstractProduct $gasCertificateProduct;
    private AbstractProduct $eicrCertificateProduct;

    protected function setUp(): void
    {
        $this->basket = new Basket([]);

        $this->photographyProduct = ProductData::getProductInstance('PhotographyProduct');
        $this->floorPlanProduct = ProductData::getProductInstance('FloorPlanProduct');
        $this->gasCertificateProduct = ProductData::getProductInstance('GasCertificateProduct');
        $this->eicrCertificateProduct = ProductData::getProductInstance('EicrCertificateProduct');
    }

    public function testItThrowsExceptionIfSameProductIsAddedMultipleTimes()
    {
        $this->expectException(\Exception::class);

        $this->basket->add($this->photographyProduct);
        $this->basket->add($this->photographyProduct);
    }

    public function testItGetsCorrectTotalForSingleProductWithoutOffer()
    {
        $this->basket->add($this->gasCertificateProduct);
        $this->assertEquals($this->gasCertificateProduct->getPrice(), $this->basket->total(), sprintf('Checkout total does not equal expected value of %s', $this->gasCertificateProduct->getPrice()));
    }

    public function testItGetsCorrectTotalForSingleProductWithOffer()
    {
        $user = new User();
        $user->addOffer(Offer::fromString('AnnualContract'));

        $basket = new Basket($user->getOffers());
        $expectedTotal = $this->photographyProduct->getPrice() - ($this->photographyProduct->getPrice() * UserOffers::AnnualContract->value / 100);

        $basket->add($this->photographyProduct);
        $this->assertEquals($expectedTotal, $basket->total(), sprintf('Checkout total does not equal expected value of %s', $expectedTotal));
    }

    public function testItGetsCorrectTotalForMultipleProductsWithoutOffer()
    {
        $expectedTotal = $this->photographyProduct->getPrice() + $this->floorPlanProduct->getPrice() + $this->gasCertificateProduct->getPrice() + $this->eicrCertificateProduct->getPrice();

        $this->basket->add($this->photographyProduct);
        $this->basket->add($this->floorPlanProduct);
        $this->basket->add($this->gasCertificateProduct);
        $this->basket->add($this->eicrCertificateProduct);

        $this->assertEquals($expectedTotal, $this->basket->total(), sprintf('Checkout total does not equal expected value of %s', $expectedTotal));
    }

    public function testItGetsCorrectTotalForMultipleProductsWithOffer()
    {
        $user = new User();
        $user->addOffer(Offer::fromString('AnnualContract'));
        $basket = new Basket($user->getOffers());

        $productTotal = $this->photographyProduct->getPrice() + $this->floorPlanProduct->getPrice() + $this->gasCertificateProduct->getPrice() + $this->eicrCertificateProduct->getPrice();
        $expectedTotal = $productTotal - ($productTotal * UserOffers::AnnualContract->value / 100);

        $basket->add($this->photographyProduct);
        $basket->add($this->floorPlanProduct);
        $basket->add($this->gasCertificateProduct);
        $basket->add($this->eicrCertificateProduct);

        $this->assertEquals($expectedTotal, $basket->total(), sprintf('Checkout total does not equal expected value of %s', $expectedTotal));
    }
}
