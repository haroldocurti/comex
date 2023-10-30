<?php
include_once '../vendor/autoload.php';
include_once 'db/fakeDBS.php';

use Haroldocurti\Comex\Model\Product;

global $productList; //fakeDB

//load products into mem.
$products = [];
foreach ($productList as $id => $item) {
    $products[] = new Product($id, $item['name'],$item['price'],$item['stock']);
}
echo "Name: " . $products[0]->getName() . PHP_EOL;
echo "Stock: " .  $products[0]->getStockQuantity() . PHP_EOL;
echo "Price: " .  $products[0]->getPrice() . PHP_EOL;
echo "Total Stock Value: " .  $products[0]->calculateStockValue() . PHP_EOL;