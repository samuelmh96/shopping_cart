<?php

namespace App\Services;
use App\Models\Product;


class Cart
{
    public array $products = [];

    public function __construct(
        private TaxCalculator $taxCalculator
        )
    {}


    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function showCart(): void
    {
        foreach ($this->products as $product) {
            $product->showInfo();
        }
    }

    public function removeProduct(Product $product): void
    {
        $index = array_search($product, $this->products, true);
        if ($index !== false) {
            unset($this->products[$index]);
            echo "Product removed from cart." . PHP_EOL;
        } else {
            echo "Product not found in cart." . PHP_EOL;
        }
    }

    public function subtotal(): float
    {
        $total = 0.0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }
        return $total;
    }



    public function total(): float
    {
        return $this->subtotal() + $this->taxCalculator->calculateTax($this->subtotal());
    }
}