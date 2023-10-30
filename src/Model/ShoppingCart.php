<?php

namespace Haroldocurti\Comex\Model;

use Haroldocurti\Comex\Service\Discounts;
use Haroldocurti\Comex\Service\OutOfStockException;
use Haroldocurti\Comex\Service\Shipping;


class ShoppingCart
{
    public function __construct(private readonly Client $client, private Stock $stock, private array $cartProducts = [])
    {

    }

    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @throws OutOfStockException
     */
    public function addProductsToCart(int $productId, int $quantity=1): void {
        if ($this->stock->getStock($productId)<$quantity) {
            throw new OutOfStockException("Item out of stock." .PHP_EOL);
        };
        if (!key_exists($productId, $this->cartProducts)){
            $this->cartProducts[$productId] = $this->stock->getProducts($productId);
            $this->cartProducts[$productId]['quantity'] = $quantity;
            echo "Item {{$productId}} {{$this->cartProducts[$productId]['name']}} added to Cart .".PHP_EOL;
            return;
        }
        $this->cartProducts[$productId]['quantity'] = $this->cartProducts[$productId]['quantity'] + $quantity;
        echo "Item {{$productId}} {{$this->cartProducts[$productId]['name']}} added to Cart .".PHP_EOL;
    }
    public function removeProductsFromCart(int $productID, int $quantity =1): void {
                if ($this->cartProducts[$productID]['quantity'] < $quantity) {
                    unset($this->cartProducts[$productID]);
                    return;
                }
        $this->cartProducts[$productID]['quantity'] = $this->cartProducts[$productID]['quantity'] - 1;
    }
    public function getCartSummary(): float{
        echo "Hello, " . $this->getClient()->getName() . " this is your updated shopping cart: ".PHP_EOL;
        foreach ($this->cartProducts as $product){
            echo "Product: " . $product['name'] . PHP_EOL;
            echo "Quantity: " . $product['quantity'] . PHP_EOL;
        }
        $totals = $this->getCartTotals();
        $shippingPrice = 9.99;
        $campaignDiscount = 10;

        if (Discounts::isDiscountEligible($totals, 100)){
            $totals = Discounts::applyDiscount($totals, 10);
            echo "You are eligible for a " . $campaignDiscount . "% discount!" . PHP_EOL;
        }
        if (!Shipping::isFreeShipping($totals)){
            echo "Your shipping is $9.99" . PHP_EOL;
            echo "Your total purchase with shipping is: " . $totals + $shippingPrice . PHP_EOL;
            return $totals + $shippingPrice;
        }
        echo "You've got free shipping! Enjoy!" . PHP_EOL;
        echo "Total Purchase: " . $totals . PHP_EOL;
        return $totals;
    }
    public function getCartTotals(): float {
        $total = 0.0;
        foreach ($this->cartProducts as $product) {
            $total = $total + $product['price']*$product['quantity'];
        }
        return $total;
    }

    public function placeOrder():Order{

        return new Order($this->client, $this->cartProducts);
}
}