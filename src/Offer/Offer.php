<?php

namespace Ivann\MetroCoding\Offer;

class Offer implements OfferInterface
{
    private int $id;
    private Product $product;
    private float $price;

    public function __construct(int $id, Product $product, float $price)
    {

        $this->id = $id;
        $this->product = $product;
        $this->price = $price;
    }

    public function sameVendor(int $vendorID): bool
    {
        return $this->product->vendorID() === $vendorID;
    }

    public function price(): float
    {
        return $this->price;
    }
}