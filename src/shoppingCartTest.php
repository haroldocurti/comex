<?php
include_once '../vendor/autoload.php';
include_once 'db/fakeDBS.php';

use Haroldocurti\Comex\Model\Client;
use Haroldocurti\Comex\Model\ShoppingCart;

global $productList; //fakeDB
global $clientDB; //fakeDB

$client = new Client('987.654.321-11', $clientDB['987.654.321-11']['name'], $clientDB['987.654.321-11']["e-mail"], $clientDB['987.654.321-11']['phone'], $clientDB['987.654.321-11']['address']);
$products = [
    [
        'id' => 101,
        'name' => $productList[101]['name'],
        'price' => $productList[101]['price'],
        'quantity'=>1
    ],
    [
        'id' => 110,
        'name'=> $productList[110]['name'],
        'price'=>$productList[110]['price'],
        'quantity'=>3
    ],
    [
        'id' => 103,
        'name'=> $productList[103]['name'],
        'price'=>$productList[103]['price'],
        'quantity'=>2
    ]
];
$products2 = $products = [
    [
        'id' => 101,
        'name' => $productList[101]['name'],
        'price' => $productList[101]['price'],
        'quantity'=>1
    ]];

$cart2 = new ShoppingCart($client, $products2);
$cart = new ShoppingCart($client,$products);
echo "===General Test ===" . PHP_EOL;
$cart->getCartSummary();
echo " ====" . PHP_EOL;
echo "=== Remove Products ===" . PHP_EOL;
$cart->removeProductsFromCart(110);
$cart->getCartSummary();
echo " ====" . PHP_EOL;
echo "===General Test 2 ===" . PHP_EOL;
$cart2->getCartSummary();
echo " ====" . PHP_EOL;
echo "=== ADD Products ===" . PHP_EOL;
$cart->addProductsToCart([
    'id' => 103,
    'name'=> $productList[103]['name'],
    'price'=>$productList[103]['price'],
    'quantity'=>2
]);
$cart->getCartSummary();
echo " ====" . PHP_EOL;