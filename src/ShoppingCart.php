<?php

namespace Haroldocurti\Comex;

class ShoppingCart
{
    public function __construct(private Client $client, private array $products = [])
    {

    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function addProductsToCart(array $product): void {
        $this->products[] = $product;
    }
    public function removeProductsFromCart(int $productID): void {
        foreach ($this->products as $id => &$product) {
            if ($product['id'] === $productID){
                if ($product['quantity'] <2 ){
                    unset($this->products[$id]);
                    return;
                }
                $product['quantity'] = $product['quantity'] - 1;
                ;
            }
        }
    }
    public function getCartSummary(): void{
        echo "Hello,  " . $this->getClient()->getName() . " this is your shopping cart: ".PHP_EOL;
        foreach ($this->products as $id=>$product){
            echo "Product: " . $product['name'] . PHP_EOL;
            echo "Quantity: " . $product['quantity'] . PHP_EOL;
        }
        $totals = $this->getCartTotals();
        $shippingPrice = 9.99;
        $campaignDiscount = 10;
        if ($this->isDiscountEligible($totals, 100)){
            $totals = $this->applyDiscount($totals, 10);
            echo "You are eligible for a " . $campaignDiscount . "% discount!" . PHP_EOL;
        }
        if (!$this->isFreeShipping($totals)){
            echo "Your shipping is $9.99" . PHP_EOL;
            echo "Your total purchase with shipping is: " . $totals + $shippingPrice . PHP_EOL;
            return;
        }
        echo "You've got free shipping! Enjoy!" . PHP_EOL;
        echo "Total Purchase: " . $totals . PHP_EOL;
    }
    public function getCartTotals(): float {
        $total = 0.0;
        foreach ($this->products as $id => $product) {
            $total = $total + $product['price']*$product['quantity'];
        }
        return $total;
    }
    public function isFreeShipping(float $cartTotal): bool {
        return $cartTotal > 100;
    }
    public function applyDiscount(float $value, int $discount): float {
        if ($discount < 0 || $discount > 100) {
            return $value;
        }
        return  $value - ($value * $discount / 100);
    }
    public function isDiscountEligible(float $purchaseValue, float $minValue ): bool{
        return $purchaseValue > $minValue;
    }
}