<?php

use Haroldocurti\Comex\Infrastructure\Persistence\ConnectionCreator;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOGamesRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOHardwareRepository;

include_once '../vendor/autoload.php';
$db = ConnectionCreator::createConnection();
$gameRepository = new PDOGamesRepository($db);
$hardwareRepository = new PDOHardwareRepository($db);
$games = $gameRepository->allProducts();
$hardware = $hardwareRepository->allProducts();
foreach ($games as $index => $game) {
    echo $game->getProductName() .
        ' Developed by '. $game->getDeveloper() .
        ' and Published by ' . $game->getPublisher() . PHP_EOL;
}
echo $games[6]->getProductName() .' by '. $games[6]->getDeveloper() . PHP_EOL;
echo $hardware[2]->getProductName();


