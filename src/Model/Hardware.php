<?php

namespace Haroldocurti\Comex\Model;
class Hardware extends Product
{

    private int $productID;
    private string $productName;
    private float $productPrice;
    private string $category;
    private string $releaseDate;
    private string $manufacturer;
    private int $stockQuantity = 0;

    /**
     * @param int $productID
     * @param string $productName
     * @param float $productPrice
     * @param string $category
     * @param string $releaseDate
     * @param string $manufacturer
     * @param int $stockQuantity
     */
    public function __construct(int $productID, string $productName, float $productPrice, string $category, string $releaseDate, string $manufacturer, int $stockQuantity)
    {
        $this->productID = $productID;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->category = $category;
        $this->releaseDate = $releaseDate;
        $this->manufacturer = $manufacturer;
    }


    public function getProductID(): int
    {
        return $this->productID;
    }

    public function setProductID(int $productID): void
    {
        $this->productID = $productID;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getProductPrice(): float
    {
        return $this->productPrice;
    }

    public function setProductPrice(float $productPrice): void
    {
        $this->productPrice = $productPrice;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

        public function getStockQuantity(): int
    {
        return $this->stockQuantity;
    }

    public function setStockQuantity(int $stockQuantity): void
    {
        $this->stockQuantity = $stockQuantity;
    }

}