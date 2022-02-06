<?php

namespace Ivann\MetroCoding\Offer;

interface OfferInterface
{
    public function sameVendor(int $vendorID): bool;

    public function price(): float;
}