<?php

namespace Ivann\MetroCoding\Offer;

class Product
{
    private string $title;
    private int $vendorID;

    public function __construct(string $title, int $vendorID)
    {
        $this->title = $title;
        $this->vendorID = $vendorID;
    }

    public function vendorID(): int
    {
        return $this->vendorID;
    }
}