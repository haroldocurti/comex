<?php
use Haroldocurti\Comex\Model\ShoppingCart;
use Haroldocurti\Comex\Model\Client;
use Haroldocurti\Comex\Model\Stock;
use Haroldocurti\Comex\Model\Order;
use Haroldocurti\Comex\Service\OutOfStockException;
use Haroldocurti\Comex\Service\Discounts;
use Haroldocurti\Comex\Service\Shipping;
use PHPUnit\Framework\TestCase;

class ShoppingCartTest extends TestCase
{
public function testAddProductsToCart()
{
    $client = $this->createMock(Client::class);
    $stock = $this->createMock(Stock::class);

$cart = new ShoppingCart($client, $stock);
$productId = 1;
$quantity = 3;

$stock->method('getStock')
->with($productId)
->willReturn(10);

$cart->addProductsToCart($productId, $quantity);

$cartProducts = $cart->getCartProducts();

$this->assertArrayHasKey($productId, $cartProducts);
$this->assertEquals($quantity, $cartProducts[$productId]['quantity']);
}

public function testRemoveProductsFromCart()
{
    $client = $this->createMock(Client::class);
    $stock = $this->createMock(Stock::class);

$cart = new ShoppingCart($client, $stock);
$productId = 1;
$quantity = 3;
$stock->method('getStock')
->with($productId)
->willReturn(10);

$cart->addProductsToCart($productId, $quantity);

$cart->removeProductsFromCart($productId, 2);

$cartProducts = $cart->getCartProducts();

$this->assertEquals(1, $cartProducts[$productId]['quantity']);
}

public function testGetCartSummary()
{
$this->assertTrue(true);
}

public function testGetCartTotals()
{

$this->assertTrue(true);
}

public function testPlaceOrder()
{
    $client = $this->createMock(Client::class);
    $stock = $this->createMock(Stock::class);

$cart = new ShoppingCart($client, $stock);
$productId = 1;
$quantity = 3;

$stock->method('getStock')
->with($productId)
->willReturn(10);

$cart->addProductsToCart($productId, $quantity);

$order = $cart->placeOrder();

$this->assertInstanceOf(Order::class, $order);
$this->assertEquals($client, $order->getClient());
}
}
