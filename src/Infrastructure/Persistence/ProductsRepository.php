<?php

namespace Haroldocurti\Comex\Infrastructure\Persistence;

interface ProductsRepository
{
    public function allProducts(): array;

    public function productsByCategory(string $category): array;



}