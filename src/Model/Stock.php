<?php

namespace Haroldocurti\Comex\Model;

use Haroldocurti\Comex\Service\OutOfStockException;
use InvalidArgumentException;

class Stock
{


    public function __construct(private array $products)
    {
    }

    /**
     * @return array
     */
    public function getProducts(int $productId): array
    {
        return $this->products[$productId];
    }
    public function getStock(int $productId): int{
        return $this->products[$productId]['stock'];
    }
    function isAvailable(int $productId):bool
    {
       return $this->products[$productId]['stock'] >0;
    }
    function addProduct(array $product, int $quantity=1): void {
        if ($quantity<=0) throw new InvalidArgumentException("Argument must be a positive value.");
        $productId = key($product);

        if (array_key_exists($productId, $this->products)) {
            $this->products[$productId]['stock'] += $quantity;
            echo "Updated stock for Item {$this->products[$productId]['name']}" .PHP_EOL;
            return;
        }
        $this->products[$productId] = [
            'name' => $product[$productId]['name'],
            'price' => $product[$productId]['price'],
            'stock' => $quantity,
        ];
        echo "Added {$this->products[$productId]['name']} to Stock." . PHP_EOL;

    }

    /**
     * @throws OutOfStockException
     */
    function decreaseProduct(int $productId, int $quantity=1): void {
        if (!$this->isAvailable($productId)|| $this->products[$productId]['stock']<$quantity){
            echo "Not enough stock." . PHP_EOL;
            throw new OutOfStockException("Not enough stock.");
        }
        $this->products[$productId]['stock'] = $this->products[$productId]['stock'] - $quantity;
        echo "Id: $productId => {$this->products[$productId]['name']}".PHP_EOL;
        echo "Removed $quantity items from stock. {$this->products[$productId]['stock']} remains." . PHP_EOL;

    }
}
