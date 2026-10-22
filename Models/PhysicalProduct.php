<?php

namespace App\Models;

use App\Models\Product;

class PhysicalProduct extends Product
{

    public function __construct(
        private string $name,
        private float $price,
        private int $stock,
        private string $weight
    ) {
        parent::__construct($name, $price);
    }

    public function decrementStock(int $quantity): void
    {
        if ($this->hasStock($quantity)) {
            $this->stock -= $quantity;
        } else {
            echo "Not enough stock for " . $this->getName() . PHP_EOL;
        }
    }

    public function hasStock(int $quantity = 1): bool
    {
        return $this->stock >= $quantity;
    }

    public function showInfo(): void
    {
        echo "Physical Product: " . $this->getName() . " - Price: $" . $this->getPrice() . " - Stock: " . $this->stock . PHP_EOL;
    }
}
