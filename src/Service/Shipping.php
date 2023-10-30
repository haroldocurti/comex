<?php

namespace Haroldocurti\Comex\Service;

class Shipping
{
    public static function isFreeShipping(float $cartTotal): bool {
        return $cartTotal > 100;
    }
}