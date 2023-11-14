<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

use Haroldocurti\Comex\Model\Client;

class PDOClientsRepository
{
    public function allClients($clients): array
    {
        foreach ($clients as $index => $client) {
            echo $client->getName() . PHP_EOL .
                ' Phone '. $client->getPhoneNumber() .
                ' and Email ' . $client->getEmail() . PHP_EOL;
        }
        return $clients;
    }

    public function clientById(Dao $dao, int $client_id): Client
    {
        return $dao->fetchSingleClient($client_id);
    }

    public function insertClient(Client $client, Dao $dao): void
    {
        $dao->insertClient($client);
    }
}