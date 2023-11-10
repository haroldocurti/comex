<?php

namespace Haroldocurti\Comex\Test\Test\Model;

use Haroldocurti\Comex\Model\Product;
use Haroldocurti\Comex\Service\OutOfStockException;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testAddToStock()
    {
        $product = new Product(1, 'Test Product', 10.0, 20);
        $product->addToStock(5);
        $this->assertEquals(25, $product->getStockQuantity());
    }
    public function testRemoveFromStock()
    {
        $product = new Product(1, 'Test Product', 10.0, 20);
        $product->removeFromStock(10);
        $this->assertEquals(10, $product->getStockQuantity());
    }
    public function testRemoveFromStockOutOfStock()
    {
        $product = new Product(1, 'Test Product', 10.0, 5);
        $this->expectException(OutOfStockException::class);
        $product->removeFromStock(10);
    }

}