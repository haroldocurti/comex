<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

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
}