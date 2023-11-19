<?php

use Haroldocurti\Comex\Model\Client;

require_once 'vendor/autoload.php';
require './src/config.php';
    global $clientsRepository;
    global $dao;

    if( $_SERVER['REQUEST_METHOD'] === 'POST'){
        $client = new Client('01', $_POST["cpf"],
        $_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address']);
        echo $client->getName();
        $clientsRepository->insertClient($client, $dao);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Client Form</title>
</head>
<body>

<div class="container">
    <h2>Client Information Form</h2>

    <form action="#" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" maxlength="14" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

<script src="app.js"></script>
</body>
</html>
