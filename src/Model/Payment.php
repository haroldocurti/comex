<?php

namespace Haroldocurti\Comex\Model;

interface Payment
{
    public function displayReceipt();
    public function processPayment(float $totalSpent);
}