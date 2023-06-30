<?php

namespace App\Services\Checkout;


use App\Enums\ProductCodes;
use App\Enums\UserOffers;
use App\Services\Pricing\Price;
use App\ValueObjects\Product;

class Basket implements BasketContract
{
    private array $basket;
    private float $basketTotal = 0;

    public function __construct(
        private readonly array $userOffers
    ) {
    }

    public function add(Product $product): void
    {
        $this->updateBasket($product->productCode);
    }

    public function total(): int|float
    {
        $this->basketTotal = array_sum(array_column($this->basket, 'total'));
        return count($this->userOffers) > 0 ? $this->getOfferPrice($this->userOffers) : $this->basketTotal;
    }

    private function updateBasket(string $productCode): void
    {
        if (!in_array($productCode, ProductCodes::values(), true)) {
            throw new \Exception(sprintf('Attempt to add invalid product of %s to basket.', $productCode));
        }

        if (isset($this->basket[$productCode]['quantity']) && $this->basket[$productCode]['quantity'] > 0) {
            throw new \Exception('Attempt to add more than one of the same product to basket.');
        }

        $this->basket[$productCode]['quantity'] ??= 0;
        $this->basket[$productCode]['total'] ??= 0;

        $this->basket[$productCode]['quantity']++;
        $this->basket[$productCode]['total'] = Price::getPrice($productCode, $this->basket[$productCode]['total']);
    }

    private function getOfferPrice(array $offers): int|float
    {
        foreach($offers as $offer) {
            if (in_array($offer, UserOffers::discountOfferTypes(), true)) {
                $this->basketTotal = $this->getDiscountedPrice(UserOffers::fromName($offer));
            }
        }

        return $this->basketTotal;
    }

    private function getDiscountedPrice(float $discountValue)
    {
        return $this->basketTotal - ($this->basketTotal * $discountValue / 100);
    }
}