<?php

namespace Ivann\MetroCoding\Offer;

class ReaderJsonFile implements ReaderInterface
{

    public function read(string $input): OfferCollectionInterface
    {
        $offers = array_map(
            static fn(array $data): OfferInterface => new Offer(
                (int) $data['offerId'],
                new Product((string) $data['productTitle'], (int) $data['vendorId']),
                (float) $data['price'],
            ),
            json_decode(file_get_contents($input), true)
    );

        return new OfferCollection(...$offers);
    }
}