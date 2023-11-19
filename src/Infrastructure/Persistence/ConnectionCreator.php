<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        $dbPath = __DIR__ . '/../../db/db.sqlite';
        return new PDO('sqlite:' . $dbPath);

    }
}