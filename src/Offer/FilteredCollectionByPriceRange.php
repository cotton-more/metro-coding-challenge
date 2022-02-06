<?php

namespace Ivann\MetroCoding\Offer;

class FilteredCollectionByPriceRange implements FilteredCollectionInterface
{
    private float $priceFrom;
    private float $priceTo;

    public function __construct(float $priceFrom, float $priceTo)
    {
        $this->priceFrom = $priceFrom;
        $this->priceTo = $priceTo;
    }

    public function filter(OfferCollectionInterface $offerCollection): OfferCollectionInterface
    {
        $filtered = [];

        /** @var OfferInterface $offer */
        foreach ($offerCollection->getIterator() as $offer) {
            $offerPrice = $offer->price();
            if ($offerPrice < $this->priceFrom) {
                continue;
            }

            if ($offerPrice > $this->priceTo) {
                continue;
            }

            $filtered[] = clone $offer;
        }

        return new OfferCollection(...$filtered);
    }
}