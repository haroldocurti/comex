<?php
include_once './vendor/autoload.php';
require_once './src/config.php';
global $shoppingCart;
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
            </ul>
        </nav>
    </div>

    <div class="content-container">
        <h1>Your Shopping Cart!</h1>

    <?php
    $products = $shoppingCart->getCartProducts();
    foreach ($products as $product) {
        var_dump( $product[]);
    }
           ?>
    </div>

    <script src="app.js"></script>
    </body>
    </html>

<?php
