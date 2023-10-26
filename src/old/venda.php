<?php
function applyThresholdBasedDiscount($totalSpent, $discThreshold, $discPercentage): float{
    if($totalSpent >= $discThreshold) {
        $finalAmount = $totalSpent - ($totalSpent * ($discPercentage / 100));
        echo ' ========================================================' . PHP_EOL;
        echo '| Congratulations! Your purchase was eligible            |' . PHP_EOL;
        echo "| to receive a discount based on your total spent amount |" . PHP_EOL;
        echo "| Check below your invoice totals.                       |" . PHP_EOL;
        echo ' ========================================================' . PHP_EOL;
        echo "Total Spent: $$totalSpent" . PHP_EOL;
        echo "Threshold/discount offered: $$discThreshold // $discPercentage%" . PHP_EOL;
        echo "Calculated Total: $$finalAmount" . PHP_EOL;
        echo '-------------------------------------------------------' . PHP_EOL;

        return $finalAmount;

    }
    echo ' ======================================================' . PHP_EOL;
    echo "| Sorry! Your purchase wasn't eligible to receive a    |" . PHP_EOL;
    echo "| discount of based on your total spent amount.        |" . PHP_EOL;
    echo "| Check below your invoice totals.                     |" . PHP_EOL;
    echo ' ======================================================' . PHP_EOL;
    echo "Total Spent: $$totalSpent" . PHP_EOL;
    echo "Threshold/discount offered: $$discThreshold // $discPercentage%" . PHP_EOL;
    echo "Calculated Total: $$totalSpent" . PHP_EOL;
    echo '-------------------------------------------------------' . PHP_EOL;
    return $totalSpent;

}
$amountSpent = 80.9;
$discountThreshold = 100.00;
$discPercentage = 10;

$test = applyThresholdBasedDiscount($amountSpent,$discountThreshold,$discPercentage);
echo "(Received return from function = " . $test . ')';