<?php
include_once 'Product.php';
include_once 'fakeDBS.php';
use Haroldocurti\Comex\Product;
global $productList; //fakeDB

//load products into mem.
$products = [];
foreach ($productList as $id => $item) {
    $products[] = new Product($id, $item['name'],$item['price'],$item['stock']);
}
echo "Name: " . $products[0]->getName() . PHP_EOL;
echo "Stock: " .  $products[0]->getStock() . PHP_EOL;
echo "Price: " .  $products[0]->getPrice() . PHP_EOL;
echo "Total Stock Value: " .  $products[0]->calculateStockValue() . PHP_EOL;