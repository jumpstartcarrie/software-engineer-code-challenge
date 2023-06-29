<?php

namespace App\User;

use App\ValueObjects\Offer;

class User
{

    private array $specialOffers;

    public function addOffer(Offer $offer): void
    {
        $this->specialOffers[] = $offer->offerType;
    }

    public function getOffers(): array
    {
        return $this->specialOffers ?? [];
    }
}