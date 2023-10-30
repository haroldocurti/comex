<?php

namespace Haroldocurti\Comex\Service;

class Discounts
{

    public static function applyDiscount(float $value, int $discount): float {
        if ($discount < 0 || $discount > 100) {
            return $value;
        }
        return  $value - ($value * $discount / 100);
    }
    public static function isDiscountEligible(float $purchaseValue, float $minValue ): bool{
        return $purchaseValue > $minValue;
    }
}