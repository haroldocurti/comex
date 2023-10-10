<?php
$productList = [
    100 => [
        'name' => 'Super Mario World',
        'price' => 59.99
    ],
    101 => [
        'name' => 'The Legend of Zelda: A Link to the Past',
        'price' => 49.99
    ],
    102 => [
        'name' => 'Super Metroid',
        'price' => 59.99
    ],
    103 => [
        'name' => 'Chrono Trigger',
        'price' => 74.99
    ],
    104 => [
        'name' => 'Donkey Kong Country',
        'price' => 49.99
    ],
    105 => [
        'name' => 'Street Fighter II Turbo',
        'price' => 59.99
    ],
    106 => [
        'name' => 'Mega Man X',
        'price' => 49.99
    ],
    107 => [
        'name' => 'Super Mario Kart',
        'price' => 49.99
    ],
    108 => [
        'name' => 'Final Fantasy VI',
        'price' => 59.99
    ],
    109 => [
        'name' => 'Super Castlevania IV',
        'price' => 59.99
    ],
    110 => [
        'name' => 'Super Mario RPG: Legend of the Seven Stars',
        'price' => 69.99
    ],
    111 => [
        'name' => 'Secret of Mana',
        'price' => 59.99
    ],
    112 => [
        'name' => 'Earthbound',
        'price' => 69.99
    ],
    113 => [
        'name' => 'Star Fox',
        'price' => 59.99
    ],
    114 => [
        'name' => 'F-Zero',
        'price' => 49.99
    ]
];

echo "=============== Product List ==================" . PHP_EOL;
foreach ($productList as $id => $item) {
    echo 'ID: ' . $id . ' Name: ' . $item['name'] . ' Price: ' . $item['price'] . PHP_EOL;
};