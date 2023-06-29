<?php

namespace App\Services\Checkout;


use App\Enums\ProductCodes;
use App\Services\Pricing\Price;
use App\ValueObjects\Product;

class Checkout implements CheckoutContract
{
    private array $basket;

    public function __construct(private readonly Price $priceService)
    {
    }

    public function add(Product $product): void
    {
        $this->updateBasket($product->productCode);
    }

    public function total(): int
    {
        return array_sum(array_column($this->basket, 'total'));
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
        $this->basket[$productCode]['total'] = $this->priceService->getPrice($productCode, $this->basket[$productCode]['quantity'], $this->basket[$productCode]['total']);
    }
}