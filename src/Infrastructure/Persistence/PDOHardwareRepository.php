<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

use Haroldocurti\Comex\Infrastructure\Persistence\ProductsRepository;
use Haroldocurti\Comex\Model\Games;
use Haroldocurti\Comex\Model\Hardware;
use PDO;
use PDOStatement;

class PDOHardwareRepository implements ProductsRepository
{
    private PDO $DB;
    public function __construct(PDO $connection)
    {
        $this->DB = $connection;
    }

    public function allProducts(): array
    {

        $statement = $this->DB->query('SELECT * FROM hardware');
        return $this->hydrateHardwareObj($statement);

    }

    public function productsByCategory(string $category): array
    {
        $statement = $this->DB->prepare("SELECT * FROM hardware WHERE hardware_category = :category");
        $statement->bindParam(':category', $category, PDO::PARAM_STR);
        $statement->execute();

        return $this->hydrateHardwareObj($statement);
    }

    public function hydrateHardwareObj(PDOStatement $statement): array
    {
        $allProducts = [];
        while ($hardwareData = $statement->fetch(PDO::FETCH_ASSOC)){
            $allProducts[]= new Hardware(
                productID: $hardwareData['hardware_ID'],
                productName: $hardwareData['hardware_name'],
                productPrice: $hardwareData['hardware_price'],
                category: $hardwareData['hardware_category'],
                releaseDate: $hardwareData['hardware_release_date'],
                manufacturer: $hardwareData['hardware_manufacturer'],
                stockQuantity: 0
            );
        }
        return $allProducts;
    }
}