<?php
/*
Tarefa: Criar uma classe de Product
Para praticar objetos.
Crie uma classe chamada 'Product', ela deve conter os dados de nome, preço e quantidade em estoque.
Implemente métodos que adicionam ou removem produtos e implemente um método que exiba o valor total
em produtos no estoque (produtos * quantidade).
 */
namespace Haroldocurti\Comex;

class Product
{
    private int $productID;
    private String $name;
    private float $price;
    private int $stock;

    public function __construct(int $productID, string $name, float $price, int $stock)
    {
        $this->productID = $productID;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
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
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    private function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    private function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function addToStock(int $quantity): void
    {
        $this->setStock($this->getStock()+$quantity);
    }
    public function removeFromStock(int $quantity): bool
    {
        if ($this->getStock() > $quantity){
            $this->setStock($this->getStock()+$quantity);
            return true;
        }
        return false;
    }
    public function calculateStockValue() : float {
        return $this->getStock() * $this->getPrice();
    }
}