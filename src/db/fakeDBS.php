<?php
$orderList = [
    20231029 => [
        'client' => "456.789.123-99",
        'shipping' => 0,
        'products' => [
            100 => [
                'quantity' => 1
            ],
            102 => [
                'quantity' => 1
            ]

        ]
    ]
];
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
        'stock' => 1
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
$clientDB = [
    "123.234.567-77" => [
        'name' => 'Robert Garcia',
        'e-mail' => 'r.garcia@snk.com',
        'phone' => '(18)5555-9988',
        'address' => 'Art of Fighting Street, 123'
    ],
    "456.789.123-99" => [
        'name' => 'Terry Bogard',
        'e-mail' => 't.bogard@snk.com',
        'phone' => '(18)5555-8877',
        'address' => 'Fatal Fury Lane, 456'
    ],
    "987.654.321-11" => [
        'name' => 'Ryu Hoshi',
        'e-mail' => 'ryu@streetfighter.com',
        'phone' => '(18)4444-1122',
        'address' => 'Hadoken Avenue, 789'
    ],
    "111.222.333-44" => [
        'name' => 'Mai Shiranui',
        'e-mail' => 'mai@snk.com',
        'phone' => '(18)5555-3344',
        'address' => 'KOF Boulevard, 567'
    ],
    "555.666.777-88" => [
        'name' => 'Haohmaru',
        'e-mail' => 'haohmaru@samuraishodown.com',
        'phone' => '(18)7777-8888',
        'address' => 'Samurai Street, 555'
    ],
    "222.333.444-55" => [
        'name' => 'Chun-Li',
        'e-mail' => 'chunli@streetfighter.com',
        'phone' => '(18)3333-5555',
        'address' => 'Spinning Bird Kick Road, 222'
    ],
    "666.777.888-99" => [
        'name' => 'Iori Yagami',
        'e-mail' => 'iori@snk.com',
        'phone' => '(18)8888-9999',
        'address' => 'Yagami Clan Alley, 666'
    ],
    "333.444.555-66" => [
        'name' => 'Sakura Kasugano',
        'e-mail' => 'sakura@streetfighter.com',
        'phone' => '(18)4444-6666',
        'address' => "Sakura's Dojo Street, 333"
    ],
    "888.999.000-11" => [
        'name' => 'Kyo Kusanagi',
        'e-mail' => 'kyo@snk.com',
        'phone' => '(18)9999-0000',
        'address' => 'Kusanagi Shrine Road, 888'
    ],
    "444.555.666-22" => [
        'name' => 'Cammy White',
        'e-mail' => 'cammy@streetfighter.com',
        'phone' => '(18)5555-6622',
        'address' => 'Delta Red Base, 444'
    ],
    "111.222.333-77" => [
        'name' => 'Geese Howard',
        'e-mail' => 'geese@snk.com',
        'phone' => '(18)3333-7777',
        'address' => 'Howard Estate, 111'
    ],
    "555.666.777-33" => [
        'name' => 'Rugal Bernstein',
        'e-mail' => 'rugal@snk.com',
        'phone' => '(18)7777-3333',
        'address' => 'Bernstein Mansion, 555'
    ],
    "222.333.444-88" => [
        'name' => 'Rashid',
        'e-mail' => 'rashid@streetfighter.com',
        'phone' => '(18)3333-4488',
        'address' => 'Wind User Street, 222'
    ],
    "666.777.888-44" => [
        'name' => 'Kazuki Kazama',
        'e-mail' => 'kazuki@samuraishodown.com',
        'phone' => '(18)7777-8844',
        'address' => 'Kazama Clan Dojo, 666'
    ],
    "777.888.999-55" => [
        'name' => 'Andy Bogard',
        'e-mail' => 'andy@snk.com',
        'phone' => '(18)8888-9955',
        'address' => 'Bogard Dojo, 777'
    ],
];