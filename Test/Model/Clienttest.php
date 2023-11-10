<?php

namespace Haroldocurti\Comex\Test\Model;

use Haroldocurti\Comex\Model\Client;
use PHPUnit\Framework\TestCase;

class Clienttest extends TestCase

{
    public function testSettersAndGetters()
    {
        $client = new Client('1234567890', 'Ryu Hoshi', 'ryu@test.com', '123-456-7890', '123 Main St');

        // Testing getters
        $this->assertEquals('1234567890', $client->getCpf());
        $this->assertEquals('Ryu Hoshi', $client->getName());
        $this->assertEquals('ryu@test.com', $client->getEmail());
        $this->assertEquals('(12) 3456-7890', $client->getPhoneNumber());
        $this->assertEquals('123 Main St', $client->getAddress());
    }

    public function testAddOrder()
    {
        $client = new Client('12345678901', 'Ryu Hoshi', 'ryu@test.com', '123-456-7890', '123 Main St');

        // Adding orders and checking if they are properly stored
        $client->addOrder(1001);
        $client->addOrder(1002);

        $this->assertCount(2, $client->getOrders());
        $this->assertContains(1001, $client->getOrders());
        $this->assertContains(1002, $client->getOrders());
    }

    public function testSetTotalSpent()
    {
        $client = new Client('12345678901', 'Ryu Hoshi', 'ryu@test.com', '123-456-7890', '123 Main St');

        $client->setTotalSpent('100.00');

        $this->assertEquals('100.00', $client->getTotalSpent());
    }

    public function testFormatPhoneNumber()
    {
        $client = new Client('12345678901', 'Ryu Hoshi', 'ryu@test.com', '123-456-7890', '123 Main St');

        $formattedNumber = $client->formatPhoneNumber('123-456-7890');

        $this->assertEquals('(12) 3456-7890', $formattedNumber);
    }
}

