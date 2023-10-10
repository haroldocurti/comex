<?php
function listAllProducts()
{
    global $productList;
    echo "=============== Product List ==================" . PHP_EOL;
    foreach ($productList as $id => $item) {
        echo 'ID: ' . $id . ' Name: ' . $item['name'] . ' Price: ' . $item['price'] . PHP_EOL;
    };
}
function listItem($id){
    global $productList;
    echo "=============================================" . PHP_EOL;
    echo 'Name: ' . $productList[$id]['name'] . PHP_EOL;
    echo 'Price: ' . $productList[$id]['price'] . PHP_EOL;
    echo 'Stock: ' . $productList[$id]['stock'] . PHP_EOL;
    echo "=============================================" . PHP_EOL;
}
function checkItemStock($id): int
{
    global $productList;
    if ($productList[$id]['stock'] <= 0 )  return 0;
    return $productList[$id]['stock'];
}
function incrementStock($id, $quantity){
    global $productList;
    $productList[$id]['stock'] += $quantity;
    echo 'Items Added to stock.'. PHP_EOL;
}
function decrementStock($id, $quantity)
{
    global $productList;
    if (checkItemStock($id) - $quantity <= 0 ) {
        echo "[Decrement Stock] There's not enough inventory for this action." . PHP_EOL;
        return;
    }else {
        $productList[$id]['stock'] -= $quantity;
        echo 'Items Removed from stock.' . PHP_EOL;
    }
}

$productList = [
    100 => [
        'name' => 'Super Mario World',
        'price' => 59.99,
        'stock' => 15
    ],
    101 => [
        'name' => 'The Legend of Zelda: A Link to the Past',
        'price' => 49.99,
        'stock' => 10
    ],
    102 => [
        'name' => 'Super Metroid',
        'price' => 59.99,
        'stock' => 12
    ],
    103 => [
        'name' => 'Chrono Trigger',
        'price' => 74.99,
        'stock' => 8
    ],
    104 => [
        'name' => 'Donkey Kong Country',
        'price' => 49.99,
        'stock' => 14
    ],
    105 => [
        'name' => 'Street Fighter II Turbo',
        'price' => 59.99,
        'stock' => 10
    ],
    106 => [
        'name' => 'Mega Man X',
        'price' => 49.99,
        'stock' => 9
    ],
    107 => [
        'name' => 'Super Mario Kart',
        'price' => 49.99,
        'stock' => 11
    ],
    108 => [
        'name' => 'Final Fantasy VI',
        'price' => 59.99,
        'stock' => 7
    ],
    109 => [
        'name' => 'Super Castlevania IV',
        'price' => 59.99,
        'stock' => 6
    ],
    110 => [
        'name' => 'Super Mario RPG: Legend of the Seven Stars',
        'price' => 69.99,
        'stock' => 8
    ],
    111 => [
        'name' => 'Secret of Mana',
        'price' => 59.99,
        'stock' => 7
    ],
    112 => [
        'name' => 'Earthbound',
        'price' => 69.99,
        'stock' => 5
    ],
    113 => [
        'name' => 'Star Fox',
        'price' => 59.99,
        'stock' => 9
    ],
    114 => [
        'name' => 'F-Zero',
        'price' => 49.99,
        'stock' => 10
    ]
];

listAllProducts();
listItem(101);
incrementStock(101,12);
listItem(101);
decrementStock(101,20);
listItem(101);
