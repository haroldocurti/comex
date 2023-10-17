<?php
include_once 'Client.php';
include_once 'fakeDBS.php';
use Haroldocurti\Comex\Client;
global $clientDB; //fakeDB

//load clients int mem
$clients = [];
foreach ($clientDB as $id => $item) {
    $clients[] = new Client($id, $item['name'],$item['e-mail'],$item['phone'],$item['address'] );
}
//display a client's name
echo $clients[0]->getName() . PHP_EOL;
echo $clients[3]->getName() . PHP_EOL;