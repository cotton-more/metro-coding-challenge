<?php

namespace Ivann\MetroCoding\Offer;

use Iterator;

class OfferCollection implements OfferCollectionInterface
{
    /** @var OfferInterface[] */
    private array $offers;

    /**
     * @param OfferInterface ...$offers
     */
    public function __construct(OfferInterface ...$offers)
    {
        $this->offers = $offers;
    }

    public function get(int $index): OfferInterface
    {
        return $this->offers[$index];
    }

    public function getIterator(): Iterator
    {
        return new \ArrayIterator($this->offers);
    }
}