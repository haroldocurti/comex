<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

use Haroldocurti\Comex\Infrastructure\Persistence\ProductsRepository;
use Haroldocurti\Comex\Model\Games;
use Haroldocurti\Comex\Model\Hardware;
use PDO;
use PDOStatement;

class PDOHardwareRepository implements ProductsRepository
{

    public function allProducts($hardware): array
    {
        foreach ($hardware as $index => $item) {
            echo $item->getProductName() .
                ' Produced by '. $item->getManufacturer() .
                ' Under the category of ' . $item->getCategory() . PHP_EOL;
        }
        return $hardware;

    }

    public function productsByCategory(string $category): array
    {
        $statement = $this->DB->prepare("SELECT * FROM hardware WHERE hardware_category = :category");
        $statement->bindParam(':category', $category, PDO::PARAM_STR);
        $statement->execute();

        return $this->hydrateHardwareObj($statement);
    }


}