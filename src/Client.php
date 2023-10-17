<?php
/*
Tarefa: Criar uma classe de Client
Para praticar objetos.
Crie uma classe chamada 'Client', ela deve conter os dados básicos do cliente (nome, e-mail, celular e
endereço) e também o total de compras realizadas pelo mesmo. Lembre-se de criar os métodos getters e
setters. Após criar a classe e atribuir seus valores, exiba os valores atribuídos à classe.
 */
namespace Haroldocurti\Comex;

class Client
{
    private string $cpf;
    private String $name;
    private String $email;
    private String $mobile;
    private String $address;
    private String $totalSpent;
    private array $orders = [];

    public function __construct(string $cpf, string $name, string $email, string $mobile, string $address)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->address = $address;
        $this->cpf = $cpf;
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

    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
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

    private function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }
    public function addOrder(int $orderID): void{
        $this->orders[] = $orderID;
    }

}