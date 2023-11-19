<?php
include_once './vendor/autoload.php';
require_once './src/config.php';
session_start();
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
    <h1>Welcome!</h1>
    <h2>This is our Hardware Catalogue!!</h2>
    <?PHP var_dump($_SESSION); ?>
</div>

<script src="app.js"></script>
</body>
</html>


