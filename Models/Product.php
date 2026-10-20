<?php

namespace App\Models;


class Product
{

    public function __construct(
        private string $name = "",
        private float $price = 0.0,
        private int $stock = 0
    ) {}

    public function showInfo(): void
    {
        echo "Product: {$this->name}, Price: {$this->price}, Stock: {$this->stock}" . PHP_EOL;
    }

    public function decrementStock(int $amount): void
    {
        if ($amount > 0 && $this->stock >= $amount) {
            $this->stock -= $amount;
            echo "Stock decremented by {$amount}. New stock: {$this->stock}" . PHP_EOL;
        } else {
            echo "Cannot decrement stock by {$amount}. Current stock: {$this->stock}" . PHP_EOL;
        }
    }

    public function hasStock()
    {
        return $this->stock > 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
