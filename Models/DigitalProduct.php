<?php

namespace App\Models;

use App\Models\Product;

class DigitalProduct extends Product
{


    public function __construct(
        private string $name,
        private float $price,
        private string $downloadLink
    ) {
        parent::__construct($name, $price);
    }

    public function showProduct(){
        echo "Digital Product: " . $this->name . " - Price: $" . $this->price . " - Download Link: " . $this->downloadLink . PHP_EOL;
    }
}
