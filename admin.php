<?php
include_once './vendor/autoload.php';
require_once './src/config.php';
$games = $gameRepository->allProducts($dao->fetchAllGames());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Comex Mock Site ADMIN</title>
</head>
<body>

<div class="top-bar">
    <nav>
        <ul>
            <li><a href="product_form.php">Product Form</a></li>
            <li><a href="client_form.php">Client Form</a></li>
            <li><a href="orders.php">Orders</a></li>
        </ul>
    </nav>
</div>

<div class="content-container">
    <h1>Welcome to admin!</h1>
    <h2>Here you can manage our store.!</h2>
    <div class="product-cards">
        <?php
        foreach ($games as $id => $game) {
            if ($id > count($games) - 4) {
                echo '<div class="product-card">';
                echo '<h3>' . $game->getProductName() . '</h3>(by ' . $game->getPublisher() . ')';
                echo '<p><button> Buy it now</button> for just U$' . $game->getProductPrice() . '<br></p>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<script src="app.js"></script>
</body>
</html>
