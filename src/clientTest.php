<?php
include_once '../vendor/autoload.php';
include_once 'db/fakeDBS.php';
use Haroldocurti\Comex\Model\Client;

global $clientDB; //fakeDB

//load clients int mem
$clients = [];
foreach ($clientDB as $id => $item) {
    $clients[] = new Client($id, $item['name'],$item['e-mail'],$item['phone'],$item['address'] );
}
//display a client's name
echo $clients[0]->getName() . PHP_EOL;
echo $clients[3]->getName() . PHP_EOL;
// Set and display client's address
$clients[0]->setAddress("New Address 1");
echo "Client 1 Address: " . $clients[0]->getAddress() . PHP_EOL;

// Add an order to a client
$clients[0]->addOrder(1001);
$clients[0]->addOrder(1002);
echo "Client 1 Orders: " . implode(', ', $clients[0]->getOrders()) . PHP_EOL;

// Format a phone number for a client
$phone = "55123456750";
$formattedPhone = $clients[1]->formatPhoneNumber($phone);
echo "Formatted Phone: " . $formattedPhone . PHP_EOL;

// Get and set total spent for a client
echo "Client 2 Total Spent: $" . $clients[1]->getTotalSpent() . PHP_EOL;
$clients[1]->setTotalSpent(1500.0);
echo "Updated Total Spent: $" . $clients[1]->getTotalSpent() . PHP_EOL;