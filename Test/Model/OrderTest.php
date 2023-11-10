<?php

namespace Haroldocurti\Comex\Test\Model;

use Haroldocurti\Comex\Model\Client;
use Haroldocurti\Comex\Model\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testAddProductsToOrder()
    {
        $client = $this->createMock(Client::class);
        $order = new Order($client, []);

        $productToAdd = [
            'id' => 1,
            'name' => 'Product',
            'price' => 19.99,
            'quantity' => 2,
        ];
        $order->addProductsToOrder($productToAdd);
        $products = $order->getProducts();
        $this->assertCount(1, $products);
        $this->assertContains($productToAdd, $products);
        $productToAdd2 = [
            'id' => 2,
            'name' => 'Another Product',
            'price' => 29.99,
            'quantity' => 3,
        ];
        $order->addProductsToOrder($productToAdd2);
        $products = $order->getProducts();
        $this->assertCount(2, $products);
        $this->assertContains($productToAdd, $products);
        $this->assertContains($productToAdd2, $products);
    }
}