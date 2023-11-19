<?php
include_once './vendor/autoload.php';
require_once './src/config.php';
$games = $_SESSION['games'];
echo $_GET['method'];
if ($_GET['method'] == "del") {
    foreach ($games as $game) {
        if ($game->getProductId() == $_GET['id']) {
            $game->setStockQuantity($game->getStockQuantity() - 1);
        }
    }
}
if ($_GET['method'] == "add"){
    foreach ($games as $game) {
        if ($game->getProductId() == $_GET['id']) {
            $game->setStockQuantity($game->getStockQuantity() + 1);
        }
    }
}
header("Location: products.php");<?php
