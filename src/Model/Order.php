<?php
/*
Tarefa: Criar uma classe de Pedido. Para praticar objetos Crie uma classe base chamada ‘Pedido',
ela deve conter os dados básicos de um pedido, como: id, cliente e produtos.
 */
namespace Haroldocurti\Comex\Model;

use Haroldocurti\Comex\Service\Discounts;
use Haroldocurti\Comex\Service\OutOfStockException;
use Haroldocurti\Comex\Service\Shipping;

class Order
{
    private readonly int $orderId;
    public function __construct(
        private readonly Client $client,
        private array          $products)

    {
        $this->orderId =  $this->generateOrderId();
    }
    private function generateOrderId(): int{
        return date('Ymd') . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
    }
    public function addProductsToOrder(array $product, Stock $stock): void {

        }
    public function removeProductsFromOrder(int $productID): void {
        foreach ($this->products as $id => &$product) {
            if ($product['id'] === $productID){
                if ($product['quantity'] <2 ){
                    unset($this->products[$id]);
                    return;
                }
                $product['quantity'] = $product['quantity'] - 1;

            }
        }
    }
    public function getOrderSummary(): string {
        $totalSpent = 0;
        $summary = "Order ID: $this->orderId" . PHP_EOL;
        $summary .= "Client: {$this->client->getName()}" . PHP_EOL;
        $summary .= "Products:" . PHP_EOL;

        foreach ($this->products as $product) {
            $itemTotal = $product['price'] * $product['quantity'];
            $totalSpent += $itemTotal;
            $summary .= "- {$product['name']} || Quantity: {$product['quantity']} || Unit Price: {$product['price']} || Total: $$itemTotal" . PHP_EOL;
        }

        if (Discounts::isDiscountEligible($totalSpent,100)) {
            $totalSpent = Discounts::applyDiscount($totalSpent, 10);
             if (!Shipping::isFreeShipping($totalSpent)){
                 $totalSpent += 9.9;
                 $summary .= "Total + Shipping($9.90): $$totalSpent" . PHP_EOL;
                 return $summary;
             }
            $summary .= "Total: $$totalSpent FREE SHIPPING APPLIED" . PHP_EOL;
            return $summary;
                }
        $summary .= "Total: $$totalSpent" . PHP_EOL;
        return $summary;
    }
}
