<?php

namespace Haroldocurti\Comex\Service;
use Exception;

class OutOfStockException extends Exception
{
    public function __construct($message = "Product is out of stock", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}