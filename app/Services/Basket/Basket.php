<?php

namespace App\Services\Basket;


use App\Enums\UserOffers;
use App\Product\AbstractProduct;
use App\Services\Pricing\Price;
use Exception;

class Basket implements BasketContract
{
    private array $basketItems;
    private float $basketTotal = 0;

    public function __construct(
        private readonly array $userOffers
    )
    {
    }

    /**
     * @throws Exception
     */
    public function add(AbstractProduct $product): void
    {
        $productCode = $product->getCode();

        if (isset($this->basketItems[$productCode]['quantity']) && $this->basketItems[$productCode]['quantity'] > 0) {
            throw new Exception('Attempt to add more than one of the same product to basket.');
        }

        $this->basketItems[$productCode]['quantity'] ??= 0;
        $this->basketItems[$productCode]['total'] ??= 0;

        $this->basketItems[$productCode]['quantity']++;
        $this->basketItems[$productCode]['total'] += $product->getPrice();
    }

    public function total(): int|float
    {
        $this->basketTotal = array_sum(array_column($this->basketItems, 'total'));
        return count($this->userOffers) > 0 ? $this->getOfferPrice($this->userOffers) : $this->basketTotal;
    }

    private function getOfferPrice(array $offers): int|float
    {
        foreach ($offers as $offer) {
            if (in_array($offer, UserOffers::discountOfferTypes(), true)) {
                $this->basketTotal = $this->getDiscountedPrice(UserOffers::fromName($offer));
            }
        }

        return $this->basketTotal;
    }

    private function getDiscountedPrice(float $discountValue): int|float
    {
        return $this->basketTotal - ($this->basketTotal * $discountValue / 100);
    }
}