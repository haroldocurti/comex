<?php
include_once './vendor/autoload.php';
require_once './src/config.php';
global $gameRepository, $dao, $shoppingCart;

$games = $gameRepository->allProducts($dao->fetchAllGames());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Comex Retro Games Store</title>
</head>
<body>

<div class="top-bar">
    <div class="site-name"><a href="index.php">🎮Comex Retro Games</a></div>
    <nav>
        <ul>
            <li><a href="game_catalogue.php">Games Catalogue</a></li>
            <li><a href="hardware_catalogue.php">Consoles and Hardware</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="shoppingCart.php"><?= $shoppingCart->getCartProductsQuantityTopBar()?></a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </nav>
</div>

<div class="content-container">
    <h1>Welcome!</h1>
    <h2>Our latest products!</h2>
    <div class="product-cards">
        <?php
        foreach ($games as $id => $game) {
            if ($id > count($games) - 4) {
                echo '<div class="product-card">';
                echo '<h3>' . $game->getProductName() . '</h3>(by ' . $game->getPublisher() . ')';
                echo '<p><a href="">Buy it now</a> for just U$' . $game->getProductPrice() . '<br>';
                echo '⬇Watch a Video Preview!⬇</p>';
                echo $game->getGameVideo();
                echo '</div>';
            }
        }
        ?>
    </div>
    <h2>Our Full Catalogue!!</h2>
    <?php
    foreach ($games as $id => $game) {
            echo  '🎮' . $game->getProductName() . '<small> (by ' . $game->getPublisher() . ') </small>';
            echo '<button> Buy it now</button> for just U$' . $game->getProductPrice() . '<br>';
    }
    ?>
    <p></p>

</div>

<script src="app.js"></script>
</body>
</html>
