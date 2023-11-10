<?php
namespace Haroldocurti\Comex\Model;

use Haroldocurti\Comex\Service\OutOfStockException;
use http\Exception\InvalidArgumentException;

class Product
{
    private int $productID;
    private String $productName;
    private float $productPrice;
    private int $stockQuantity;

    public function __construct(int $productID, string $name, float $price, int $stockQuantity = 0)
    {
        $this->productID = $productID;
        $this->productName = $name;
        $this->productPrice = $price;
        $this->stockQuantity = $stockQuantity;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getProductID(): int
    {
        return $this->productID;
    }

    private function setName(string $name): void
    {
        if (is_null($name)) throw new InvalidArgumentException();
        $this->productName = $name;
    }

    public function getProductPrice(): float
    {
        return $this->productPrice;
    }

    private function setPrice(float $price): void
    {
        if ($price<=0) throw new InvalidArgumentException();
        $this->productPrice = $price;
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
        return $this->getStockQuantity() * $this->getProductPrice();
    }
}