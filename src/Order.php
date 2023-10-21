<?php
/*
Tarefa: Criar uma classe de Pedido. Para praticar objetos Crie uma classe base chamada ‘Pedido',
ela deve conter os dados básicos de um pedido, como: id, cliente e produtos.
 */
namespace Haroldocurti\Comex;

class Order
{
    public function __construct(
        private int $orderID,
        private Client $client,
        private array $products)

    {

    }
    public function getOrderID(): int
    {
        return $this->orderID;
    }

    public function setOrderID(int $orderID): void
    {
        $this->orderID = $orderID;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): void
    {
        $this->products = $products;
    }
    public function addProductsToOrder(array $product): void {
        $this->products[] = $product;
    }
    public function removeProductsFromOrder(int $productID): void {
        foreach ($this->products as $id => &$product) {
            if ($product['id'] === $productID){
                if ($product['quantity'] <2 ){
                    unset($this->products[$id]);
                    return;
                }
                $product['quantity'] = $product['quantity'] - 1;
                ;
            }
        }
    }
    public function getOrderSummary(): string
    {
        $totalSpent = 0;
        $summary = "Order ID: {$this->orderID}" . PHP_EOL;
        $summary .= "Client: {$this->client->getName()}" . PHP_EOL;
        $summary .= "Products:" .PHP_EOL;
        foreach ($this->products as $id => $product) {
            $perItemSpent = 0;
            if($product['quantity']>1){
                $perItemSpent = "|| Total per Item: " . $product['price']*$product['quantity'] . PHP_EOL;
            }else{
                $perItemSpent = " ".PHP_EOL;
            }
            $totalSpent += $product['price'];

            $summary .= "- {$product['name']} || Quantity: {$product['quantity'] } || Unit Price: {$product['price']}" . $perItemSpent;
        }
        $summary .= "Total: $$totalSpent" .PHP_EOL;
        return $summary;
    }


}
