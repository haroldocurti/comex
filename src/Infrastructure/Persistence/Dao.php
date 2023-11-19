<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

use Haroldocurti\Comex\Model\Client;
use Haroldocurti\Comex\Model\Games;
use Haroldocurti\Comex\Model\Hardware;
use Haroldocurti\Comex\Model\Order;
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
                   game_stock,
                   developers.dev_name,
                   publishers.publi_name,
                   game_video
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

    public function fetchSingleClient(int $client_id) : Client
    {
        $statement = $this->DB->query('SELECT * FROM clients_db WHERE client_id == ' . $client_id);
        return $this->hydrateSingleClient($statement);
    }

    public function fetchAllOrders():array
    {
        $sql='
        SELECT
            order_id,
            order_date,
            clients_db.client_id,
            clients_db.client_name
        FROM
            orders_db
                JOIN
            clients_db ON clients_db.client_id = orders_db.client_id;
        ';
        $statement = $this->DB->query($sql);
        return $this->hydrateOrderObj($statement);
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
                stockQuantity: $gameData['game_stock'],
                gameVideo: $gameData['game_video']
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
                stockQuantity: $hardwareData['hardware_stock']
            );
        }
        return $allProducts;
    }
    public function  hydrateClientObj(PDOStatement $statement): array
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
    public function hydrateSingleClient(PDOStatement $statement): Client{
    $clientData = $statement->fetch(PDO::FETCH_ASSOC);
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
            return $client;
        }
    public function hydrateOrderObj(PDOStatement $statement): array
    {

        $allOrders = [];
        while ($orderData = $statement->fetch(PDO::FETCH_ASSOC)){
            $stmt = $this->DB->query(query: 'SELECT ordered_item_id, order_id, ordered_product_id, ordered_product_quantity, ordered_product_price, main.view_All_Products.game_name, main.view_All_Products.game_platform  FROM ordered_items_db JOIN view_All_Products ON ordered_product_id == main.view_All_Products.game_prod_id WHERE order_id == ' . $orderData['order_id'] .';');
            while($productsData = $stmt->fetchAll(PDO::FETCH_ASSOC)){
                $orderProducts = $productsData;
            }
            $allOrders[]= new Order(
                $orderData['order_id'],
                $this->fetchSingleClient($orderData['client_id']),
                $orderProducts
            );
        }
        return $allOrders;

    }

    public function insertClient(Client $client)
    {
        $sql = 'INSERT INTO clients_db (client_name, client_cpf, client_email, client_phone, client_address) VALUES (:client_name, :client_cpf, :client_email, :client_phone, :client_address)';
        $statement = $this->DB->prepare($sql);
        $statement->bindValue(':client_name',$client->getName() );
        $statement->bindValue(':client_cpf',$client->getCpf() );
        $statement->bindValue(':client_email',$client->getEmail() );
        $statement->bindValue(':client_phone',$client->getPhoneNumber() );
        $statement->bindValue(':client_address',$client->getAddress() );
        $statement->execute();
    }

    public function insertHardwareProduct(Hardware $hardware)
    {
        $sql = 'INSERT INTO hardware (
                      hardware_name, 
                      hardware_category, 
                      hardware_price, 
                      hardware_release_date, 
                      hardware_manufacturer,
                      hardware_stock) 
                    VALUES (
                            :hwName,
                            :hwCategory,
                            :hwPrice,
                            :hwReleaseDate,
                            :hwManufacturer,
                            :hwStock
                            );';
        $statement = $this->DB->prepare($sql);
        $statement->bindValue(':hwName', $hardware->getProductName() );
        $statement->bindValue(':hwCategory', $hardware->getCategory() );
        $statement->bindValue(':hwPrice', $hardware->getProductPrice() );
        $statement->bindValue(':hwReleaseDate', $hardware->getReleaseDate() );
        $statement->bindValue(':hwManufacturer', $hardware->getManufacturer() );
        $statement->bindValue(':hwStock', $hardware->getStockQuantity() );
        $statement->execute();
    }

    public function insertGameProduct(Games $game)
    {
        $sql = 'INSERT INTO games (
                   game_genre, 
                   game_name, 
                   game_platform, 
                   game_price, 
                   game_developer_id, 
                   game_publisher_id, 
                   game_release_date, 
                   game_stock
                   ) VALUES (:genre,
                                       :name,
                                       :platform,
                                       :price, 
                                       :developer, 
                                       :publisher, 
                                       :release, 
                                       :stock
                                       );';
        $statement = $this->DB->prepare($sql);
        $statement->bindValue(':genre',$game->getGenre() );
        $statement->bindValue(':name',$game->getProductName() );
        $statement->bindValue(':platform',$game->getPlatform() );
        $statement->bindValue(':price',$game->getProductPrice() );
        $statement->bindValue(':developer',$game->getDeveloper() );
        $statement->bindValue(':publisher',$game->getPublisher() );
        $statement->bindValue(':release',$game->getReleaseDate() );
        $statement->bindValue(':stock',$game->getStockQuantity() );
        $statement->execute();
    }
}
