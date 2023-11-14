<?php
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

        <label for="productPrice">Price:</label><br>
        <input type="number" id="productPrice" name="productPrice" required><br>

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
