<?php

namespace Ivann\MetroCoding\Offer;

interface ReaderInterface
{
    public function read(string $input): OfferCollectionInterface;
}