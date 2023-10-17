<?php
/*
Tarefa: Criar uma classe de Pedido. Para praticar objetos Crie uma classe base chamada ‘Pedido',
ela deve conter os dados básicos de um pedido, como: id, cliente e produtos.
 */
namespace Haroldocurti\Comex;

class Order
{
    private int $orderID;
    private Client $client;
    private array $products;

}