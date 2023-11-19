<?php
use Haroldocurti\Comex\Infrastructure\Persistence\PDOClientsRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOGamesRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\PDOHardwareRepository;
use Haroldocurti\Comex\Infrastructure\Persistence\Dao;
use Haroldocurti\Comex\Model\ShoppingCart;

session_start();
$_SESSION['clients'] = null;
$_SESSION['user']=false;
$_SESSION['cartProducts'] = [
            "cart" => new ShoppingCart()];
$shoppingCart = $_SESSION['cartProducts']['cart'];
global $shoppingCart;



$dao = new Dao();

$hardwareRepository= new PDOHardwareRepository();
$gameRepository = new PDOGamesRepository();
$clientsRepository = new PDOClientsRepository();
