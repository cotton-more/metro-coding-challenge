<?php

namespace Ivann\MetroCoding\Offer;

interface FilteredCollectionInterface
{
    public function filter(OfferCollectionInterface $offerCollection): OfferCollectionInterface;
}