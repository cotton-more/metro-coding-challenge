<?php

namespace Ivann\MetroCoding\Offer;

use PHPUnit\Framework\TestCase;

class FilteredCollectionByPriceRangeTest extends TestCase
{
    public function testFilterCollectionByPriceRange()
    {
        $filter = new FilteredCollectionByPriceRange(0.1, 1.5);

        $originalCollection = new OfferCollection(
            new Offer(1, new Product('title', 11), 0.1),
            new Offer(2, new Product('title', 11), 1.0),
            new Offer(3, new Product('title', 11), 2.0),
        );

        $filteredCollection = $filter->filter($originalCollection);

        self::assertCount(2, $filteredCollection->getIterator());
    }
}
