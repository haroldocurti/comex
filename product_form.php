<?php

use Haroldocurti\Comex\Model\Games;
use Haroldocurti\Comex\Model\Hardware;
require_once 'vendor/autoload.php';
require './src/config.php';
global $hardwareRepository;
global $gameRepository;
global $dao;
if( $_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($_POST["productType"] == "hardware"){
        $hw = new Hardware(
                01,
            $_POST['productName'],
            $_POST['productPrice'],
            $_POST['category'],
            $_POST['releaseDate'],
            $_POST['manufacturer'],
            $_POST['stock']);
        $hardwareRepository->insertHardware($hw, $dao);
    }
    if ($_POST["productType"] == "games"){
        $game = new Games(
            01,
            $_POST['productName'],
            $_POST['productPrice'],
            $_POST['genre'],
            $_POST['releaseDate'],
            $_POST['platform'],
            $_POST['developer'],
            $_POST['publisher'],
            $_POST['stock']);
        $gameRepository->insertGame($game, $dao);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Product Information Form</title>
</head>
<body>

<div class="container">
    <h2>Product Information Form</h2>

    <form action="#" method="post">
        <label for="productType">Type of Product:</label><br>
        <input type="radio" id="hardware" name="productType" value="hardware" required>
        <label for="hardware">Hardware</label><br>
        <input type="radio" id="games" name="productType" value="games" required>
        <label for="games">Games</label><br><br>

        <!-- Common Fields -->
        <label for="productName">Name:</label><br>
        <input type="text" id="productName" name="productName" required><br>

        <label for="stock">Quantity in Stock:</label><br>
        <input type="text" id="stock" name="stock" required><br>


        <label for="productPrice">Price:</label><br>
        <input type="number" step="0.01" id="productPrice" name="productPrice" required><br>

        <label for="releaseDate">Release Date:</label><br>
        <input type="date" id="releaseDate" name="releaseDate" required><br>

        <!-- Hardware-specific Fields -->
        <div id="hardwareFields" style="display: none;">
            <label for="category">Category:</label><br>
            <select id="category" name="category">
                <option value="console">Console</option>
                <option value="peripheral">Peripheral</option>
            </select><br>

            <label for="manufacturer">Hardware Manufacturer:</label><br>
            <input type="text" id="manufacturer" name="manufacturer"><br>
        </div>

        <!-- Games-specific Fields -->
        <div id="gamesFields" style="display: none;">
            <label for="genre">Genre:</label><br>
            <select id="genre" name="genre">
                <option value="action-adventure">Action-Adventure</option>
                <option value="action-platformer">Action-Platformer</option>
                <option value="adventure">Adventure</option>
                <option value="beat-em-up">Beat 'em Up</option>
                <option value="fighting">Fighting</option>
                <option value="platformer">Platformer</option>
                <option value="puzzle">Puzzle</option>
                <option value="rpg">RPG</option>
            </select><br>
            <label for="platform">Platform:</label><br>
            <input type="text" id="platform" name="platform"><br>
            <label for="developer">Developer:</label><br>
            <input type="text" id="developer" name="developer"><br>

            <label for="publisher">Publisher:</label><br>
            <input type="text" id="publisher" name="publisher"><br>
        </div>

        <br>
        <input type="submit" value="Submit">
    </form>
</div>

<script src="app.js"></script>
</body>
</html>
