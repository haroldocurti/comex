<?php

use Haroldocurti\Comex\Model\Stock;

include_once '../vendor/autoload.php';
include_once 'db/fakeDBS.php';

$extra = [190 => [
    'name' => 'Killer Instinct',
    'price' => 49.99,
]];

global $productList;
$stock = new Stock($productList);
$stock->addProduct
($extra, 15);
$stock->decreaseProduct(190, 3);
