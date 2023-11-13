<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

interface ProductsRepository
{
    public function allProducts(array $games): array;

    public function productsByCategory(string $category): array;



}