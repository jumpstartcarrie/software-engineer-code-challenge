<?php

namespace Tests;

use App\User\User;
use App\ValueObjects\Offer;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User();
    }

    public function testItSetsUserOffer()
    {
        $offerType = 'AnnualContract';
        $this->user->addOffer(Offer::fromString($offerType));

        $this->assertContains($offerType, $this->user->getOffers());
    }
}
