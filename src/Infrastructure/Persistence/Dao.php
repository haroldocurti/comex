<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

use Haroldocurti\Comex\Model\Client;
use Haroldocurti\Comex\Model\Games;
use Haroldocurti\Comex\Model\Hardware;
use PDO;
use PDOStatement;

class Dao
{
    private PDO $DB;
    public function __construct()
    {
        $this->DB = ConnectionCreator::createConnection();
    }
    public function fetchAllGames(): array
    {
        $sql = 'SELECT game_prod_id,
                   game_name,
                   game_price,
                   game_genre,
                   game_release_date,
                   game_platform,
                   developers.dev_name,
                   publishers.publi_name
                   FROM games
                   JOIN developers ON games.game_developer_id = developers.dev_id
                   JOIN publishers ON games.game_publisher_id = publishers.publi_id;';
        $statement = $this->DB->query($sql);
        return $this->hydrateGameObj($statement);
    }
    public function fetchAllHardware(): array
    {
        $sql = 'SELECT hardware_ID,
                        hardware_name,
                        hardware_category, 
                        hardware_price, 
                        hardware_release_date, 
                        hardware_manufacturer
                FROM hardware';
        $statement = $this->DB->query($sql);
        return $this->hydrateHardwareObj($statement);
    }

    public function fetchAllClients():array
    {
        $sql = 'SELECT * FROM clients_db';
        $statement = $this->DB->query($sql);
        return $this->hydrateClientObj($statement);
    }
    public function hydrateGameObj(PDOStatement $statement): array
    {
        $allProducts = [];
        while ($gameData = $statement->fetch(PDO::FETCH_ASSOC)){
            $allProducts[]= new Games(
                productID: $gameData['game_prod_id'],
                productName: $gameData['game_name'],
                productPrice: $gameData['game_price'],
                genre: $gameData['game_genre'],
                releaseDate: $gameData['game_release_date'],
                platform: $gameData['game_platform'],
                developer: $gameData['dev_name'],
                publisher: $gameData['publi_name'],
                stockQuantity: 0
            );
        }
        return $allProducts;
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
    public function hydrateClientObj(PDOStatement $statement): array
    {
        $allClients = [];
        while ($clientData = $statement->fetch(PDO::FETCH_ASSOC)){
            $client = new Client(
                $clientData['client_id'],
                $clientData['client_cpf'],
                $clientData['client_name'],
                $clientData['client_email'],
                $clientData['client_phone'],
                $clientData['client_address']
            );
            if ($clientData['client_orders'] != '') {
                $client->setOrders($clientData['client_orders']);
            }
            $allClients[] = $client;
        }
        return $allClients;
    }
}