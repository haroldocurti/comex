<?php
namespace Haroldocurti\Comex\Model;

class Client
{
    private array $orders = [];
    private string $totalSpent = '0';
    public function __construct(
        private string          $client_id,
        private  string         $cpf,
        private string          $name,
        private string          $email,
        private string          $phoneNumber,
        private string          $address)
    {
        $this->cpf = $this->formatCPF($cpf);
        $this->name = $this->setName($name);
        $this->phoneNumber = $this->setPhoneNumber($phoneNumber);

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

    public function setName(string $name): string
    {
        if ($this->hasAtLeastTwoNames($name)) {
            return $name;
        }
        return $name;
    }
    function hasAtLeastTwoNames(string $input): bool
    {
        $trimmedInput = trim($input);
        return strpos($trimmedInput, ' ') !== false;
    }

    public function getPhoneNumber(): string
    {
        return $this->formatPhoneNumber($this->phoneNumber);
    }

    public function setPhoneNumber(string $phoneNumber): string
    {
        return $this->formatPhoneNumber($this->phoneNumber);
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

    function formatCPF(string $input): string
    {
        $digits = preg_replace('/\D/', '', $input);
        if (strlen($digits) < 11) {
            return $input; // Not a valid CPF
        }
        $formattedCPF = vsprintf('%3s.%3s.%3s-%2s', str_split($digits, 3));
        return $formattedCPF;
    }

}