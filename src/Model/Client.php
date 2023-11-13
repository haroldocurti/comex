<?php
namespace Haroldocurti\Comex\Model;

class Client
{
    private array $orders = [];
    private string $totalSpent = '0';
    public function __construct(
        private string          $client_id,
        private readonly string $cpf,
        private string          $name,
        private string          $email,
        private string          $phoneNumber,
        private string          $address)
    {

    }

    public function getClientId(): string
    {
        return $this->client_id;
    }

    public function setClientId(string $client_id): void
    {
        $this->client_id = $client_id;
    }


    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPhoneNumber(): string
    {
        return $this->formatPhoneNumber($this->phoneNumber);
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $this->formatPhoneNumber($this->phoneNumber);
    }

    public function getTotalSpent(): string
    {
        return $this->totalSpent;
    }

    public function setTotalSpent(String $totalSpent): void
    {
        $this->totalSpent = $totalSpent;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }
    public function addOrder(int $orderID): void{
        $this->orders[] = $orderID;
    }

    function formatPhoneNumber($phoneNumber) {
        $cleanedNumber = preg_replace('/\D/', '', $phoneNumber);
        if (preg_match('/^(\d{2})(\d{4})(\d{4})$/', $cleanedNumber, $matches)) {
            return "({$matches[1]}) {$matches[2]}-{$matches[3]}";
        }
        return $phoneNumber;
    }
}