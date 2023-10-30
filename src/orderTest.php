<?php
include_once '../vendor/autoload.php';
include_once 'db/fakeDBS.php';

use Haroldocurti\Comex\Model\Client;
use Haroldocurti\Comex\Model\Order;
use Haroldocurti\Comex\Model\Stock;

global $productList; //fakeDB
global $clientDB;

$stock = new Stock($productList);
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
$newOrder = new Order(001,$client,$products);
//display order summary
echo $newOrder->getOrderSummary();
//add products to the order
$newOrder->addProductsToOrder([
        'id' => 104,
        'name'=> $productList[104]['name'],
        'price'=>$productList[104]['price'],
        'quantity'=>1
        ]);
echo "================== remove Chrono Trigger ==============" .PHP_EOL;
$newOrder->removeProductsFromOrder(103);
echo "============= get second summary ============" .PHP_EOL;
echo $newOrder->getOrderSummary();
echo "======== remove zelda ========". PHP_EOL;
$newOrder->removeProductsFromOrder(101);
echo "=================== third summary ===========" .PHP_EOL;
echo $newOrder->getOrderSummary();