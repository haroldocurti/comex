<?php
/*
Tarefa: Criar uma classe de Product
Para praticar objetos.
Crie uma classe chamada 'Product', ela deve conter os dados de nome, preço e quantidade em estoque.
Implemente métodos que adicionam ou removem produtos e implemente um método que exiba o valor total
em produtos no estoque (produtos * quantidade).
 */
namespace Haroldocurti\Comex\Model;

use Haroldocurti\Comex\Service\OutOfStockException;
use http\Exception\InvalidArgumentException;

class Product
{
    private int $productID;
    private String $name;
    private float $price;
    private int $stockQuantity;

    public function __construct(int $productID, string $name, float $price, int $stockQuantity)
    {
        $this->productID = $productID;
        $this->name = $name;
        $this->price = $price;
        $this->stockQuantity = $stockQuantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getProductID(): int
    {
        return $this->productID;
    }

    private function setName(string $name): void
    {
        if (is_null($name)) throw new InvalidArgumentException();
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    private function setPrice(float $price): void
    {
        if ($price<=0) throw new InvalidArgumentException();
        $this->price = $price;
    }

    public function getStockQuantity(): int
    {
        return $this->stockQuantity;
    }

    private function setStock(int $stock): void
    {
        if ($stock<=0) throw new InvalidArgumentException();
        $this->stockQuantity = $stock;
    }

    public function addToStock(int $quantity): void
    {
        if ($quantity<=0) throw new InvalidArgumentException();
        $this->setStock($this->getStockQuantity()+$quantity);
    }

    /**
     * @throws OutOfStockException
     */
    public function removeFromStock(int $quantity): void
    {
        if ($quantity<=0) throw new InvalidArgumentException();
        if ($this->getStockQuantity() > $quantity){
            $this->setStock($this->getStockQuantity()-$quantity);
            return ;
        }
        throw new OutOfStockException() ;
    }
    public function calculateStockValue() : float {
        return $this->getStockQuantity() * $this->getPrice();
    }
}