<?php

use Haroldocurti\Comex\Infrastructure\Persistence\PDOClientsRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOGamesRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOHardwareRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\Dao;


$dao = new Dao();

$hardwareRepository= new PDOHardwareRepository();
$gameRepository = new PDOGamesRepository();
$clientsRepository = new PDOClientsRepository();
global $hardwareRepository;
global $gameRepository;
global $clientsRepository;
global $dao;