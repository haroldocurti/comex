<?php

use Haroldocurti\Comex\Infrastructure\Persistence\ConnectionCreator;
use Haroldocurti\Comex\Infrastructure\Persistence\HardwareDao;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOClientsRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOGamesRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOHardwareRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\Dao;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOOrderRepository;

include_once '../vendor/autoload.php';
$dao = new Dao();
$hardwareRepository = new PDOHardwareRepository();
$gameRepository = new PDOGamesRepository();
$clientRepository = new PDOClientsRepository();
$orderRepository = new PDOOrderRepository();
//$games = $gameRepository->allProducts($dao->fetchAllGames());
//$hardware = $hardwareRepository->allProducts($dao->fetchAllHardware());
//$clients = $clientRepository->allClients($dao->fetchAllClients());
//$singleClient = $clientRepository->clientById($dao,2);
//echo $singleClient->getName() . PHP_EOL;
//echo $singleClient->getCpf() . PHP_EOL;
$orders = $orderRepository->listAllOrders($dao->fetchAllOrders());
echo $orders[0]->getClient()->getName();
foreach ($orders[0]->getProducts() as $product){
    var_dump($product) . PHP_EOL;

}