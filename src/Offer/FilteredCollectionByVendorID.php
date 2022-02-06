<?php

namespace Ivann\MetroCoding\Offer;

class FilteredCollectionByVendorID implements FilteredCollectionInterface
{
    private $vendorID;

    public function __construct(int $vendorID)
    {
        $this->vendorID = $vendorID;
    }

    public function filter(OfferCollectionInterface $offerCollection): OfferCollectionInterface
    {
        $filtered = [];
        /** @var OfferInterface $item */
        foreach ($offerCollection->getIterator() as $item) {
            if ($item->sameVendor($this->vendorID) === true) {
                continue;
            }

            $filtered[] = clone $item;
        }

        return new OfferCollection(...$filtered);
    }
}