<?php

namespace Haroldocurti\Comex\Test\Test\Service;

use Haroldocurti\Comex\Service\Discounts;
use PHPUnit\Framework\TestCase;

class DiscountsTest extends TestCase
{
    public function testApplyDiscountWithValidDiscount()
    {
        $value = 100.0;
        $discount = 10; // 10% discount
        $expectedResult = 90.0; // After applying the discount, the result should be 90.0

        $result = Discounts::applyDiscount($value, $discount);

        $this->assertEquals($expectedResult, $result);
    }

    public function testApplyDiscountWithInvalidDiscount()
    {
        $value = 100.0;
        $discount = -10; // Negative discount, which should be considered invalid
        $expectedResult = 100.0; // The value remains unchanged

        $result = Discounts::applyDiscount($value, $discount);

        $this->assertEquals($expectedResult, $result);
    }

    public function testIsDiscountEligible()
    {
        $purchaseValue = 150.0;
        $minValue = 100.0; // The minimum value for the discount to be eligible
        $expectedResult = true;

        $result = Discounts::isDiscountEligible($purchaseValue, $minValue);

        $this->assertTrue($result);
    }

    public function testIsDiscountNotEligible()
    {
        $purchaseValue = 50.0;
        $minValue = 100.0; // The minimum value for the discount to be eligible
        $expectedResult = false;

        $result = Discounts::isDiscountEligible($purchaseValue, $minValue);

        $this->assertFalse($result);
    }
}