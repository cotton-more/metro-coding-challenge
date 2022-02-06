<?php

namespace Ivann\MetroCoding\Offer;

use PHPUnit\Framework\TestCase;

class FilteredCollectionByVendorIDTest extends TestCase
{
    public function testFilterCollectionByVendorID()
    {
        $filter = new FilteredCollectionByVendorID(11);

        $originalCollection = new OfferCollection(
            new Offer(1, new Product('title', 11), 1.0),
            new Offer(2, new Product('title', 12), 1.0),
        );

        $filteredCollection = $filter->filter($originalCollection);

        self::assertCount(1, $filteredCollection->getIterator());
    }
}
