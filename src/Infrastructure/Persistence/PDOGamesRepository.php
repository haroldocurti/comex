<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;


use PDO;

class PDOGamesRepository implements ProductsRepository
{


    public function allProducts($games): array
    {

        foreach ($games as $index => $game) {
            echo $game->getProductName() .
                ' Developed by '. $game->getDeveloper() .
                ' and Published by ' . $game->getPublisher() . PHP_EOL;
        }
        return $games;


    }

    public function productsByCategory(string $category): array
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
                   JOIN publishers ON games.game_publisher_id = publishers.publi_id ';
        $statement = $this->DB->prepare($sql . 'WHERE game_genre = :category');
        $statement->bindParam(':category', $category, PDO::PARAM_STR);
        $statement->execute();

        return $this->hydrateGameObj($statement);
    }


}