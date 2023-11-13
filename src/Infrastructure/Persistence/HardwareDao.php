<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

use Haroldocurti\Comex\Model\Games;
use PDO;
use PDOStatement;

class GamesDao
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
}