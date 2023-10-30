<?php

use Haroldocurti\Comex\Model\Client;
use Haroldocurti\Comex\Model\CreditCard;
use Haroldocurti\Comex\Model\ShoppingCart;
use Haroldocurti\Comex\Model\Stock;
use Haroldocurti\Comex\Service\OutOfStockException;

include_once '../vendor/autoload.php';
include_once 'db/fakeDBS.php';
global $clientDB;
global $productList;
$extra = [
    190 => [
    'name' => 'Killer Instinct',
    'price' => 49.99,
]];
$stock = new Stock($productList);
echo "Stock loaded in Mem." . PHP_EOL;
$client = new Client('310.492.398-14', "Haroldo", "Haroldo@alura.com", "16987459999", "Rua A, 10");
echo "Client logged and started shopping." .PHP_EOL;
$cart = new ShoppingCart($client, $stock);
echo "Cart created.".PHP_EOL;
echo "+++++++++++++++++".PHP_EOL;
try {
    $cart->addProductsToCart(101, 2);

} catch (OutOfStockException $e) {
}
echo "+++++++++++++++++".PHP_EOL;
$cart->getCartSummary();
echo "+++++++++++++++++".PHP_EOL;
try {
    $cart->addProductsToCart(101, 2);

} catch (OutOfStockException $e) {
}
echo "+++++++++++++++++".PHP_EOL;
$cart->getCartSummary();
echo "-----------------".PHP_EOL;
$cart->removeProductsFromCart(101);
echo "-----------------".PHP_EOL;
$cart->getCartSummary();
echo "Placing order: ".PHP_EOL;
$order = $cart->placeOrder();
echo $order->getOrderSummary();
echo "======= Payment ===========".PHP_EOL;
$creditCard1 = new CreditCard( "4532015112830366","0205","123");
if($creditCard1->processPayment($cart->getCartTotals())){
    echo "Payment Ok!";
}else{
    echo "Payment failed!";
}
