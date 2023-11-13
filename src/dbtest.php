<?php

use Haroldocurti\Comex\Infrastructure\Persistence\ConnectionCreator;
use Haroldocurti\Comex\Infrastructure\Persistence\HardwareDao;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOClientsRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOGamesRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOHardwareRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\Dao;

include_once '../vendor/autoload.php';
$dao = new Dao();
$hardwareRepository = new PDOHardwareRepository();
$gameRepository = new PDOGamesRepository();
$clientRepository = new PDOClientsRepository();
//$games = $gameRepository->allProducts($dao->fetchAllGames());
//$hardware = $hardwareRepository->allProducts($dao->fetchAllHardware());
$clients = $clientRepository->allClients($dao->fetchAllClients());