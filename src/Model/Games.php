<?php

namespace Haroldocurti\Comex\Model;

use Haroldocurti\Comex\Model\Product;
use PhpParser\Node\Scalar\String_;

class Games extends Product
{

    private int $productID;
    private string $productName;
    private float $productPrice;
    private string $genre;
    private string $releaseDate;
    private string $platform;
    private string $developer;
    private string $publisher;
    private int $stockQuantity;

    /**
     * @param int $productID
     * @param string $productName
     * @param float $productPrice
     * @param string $genre
     * @param string $releaseDate
     * @param string $platform
     * @param string $developer
     * @param string $publisher
     * @param int $stockQuantity
     */
    public function __construct(int $productID, string $productName, float $productPrice, string $genre, string $releaseDate, string $platform, string $developer, string $publisher, int $stockQuantity)
    {
        $this->productID = $productID;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->genre = $genre;
        $this->releaseDate = $releaseDate;
        $this->platform = $platform;
        $this->developer = $developer;
        $this->publisher = $publisher;
        $this->stockQuantity = $stockQuantity;
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

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getPlatform(): string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): void
    {
        $this->platform = $platform;
    }

    public function getDeveloper(): string
    {
        return $this->developer;
    }

    public function setDeveloper(string $developer): void
    {
        $this->developer = $developer;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): void
    {
        $this->publisher = $publisher;
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