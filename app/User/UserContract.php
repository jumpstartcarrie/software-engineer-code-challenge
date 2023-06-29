<?php

namespace App\User;

use App\ValueObjects\Offer;

interface UserContract
{
    public function addOffer(Offer $offer): void;
    public function getOffers(): array;
}