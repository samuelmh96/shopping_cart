<?php

require_once './vendor/autoload.php';

use App\Services\Cart;
use App\Models\Product;
use App\Helpers\Money;
use App\Services\EmailService;
use App\Services\OrderService;
use App\Services\TaxCalculator;

// echo "Hola mundo" . PHP_EOL;



$phone = new Product("iPhone 14", 999.99, 50);
$laptop = new Product("MacBook Pro", 1999.99, 30);
$audifonos = new Product("Audífonos Sony", 199.99, 100);

// $phone->decrementStock(5);
// $laptop->decrementStock(2);

// $phone->showInfo();
// $laptop->showInfo();
// $phone->hasStock() ? print("Phone has stock") . PHP_EOL : print("Phone is out of stock") . PHP_EOL;
// $laptop->hasStock() ? print("Laptop has stock") . PHP_EOL : print("Laptop is out of stock") . PHP_EOL;



$cart = new Cart(new TaxCalculator());
$cart->addProduct($phone);
$cart->addProduct($laptop);
$cart->addProduct($audifonos);
$cart->showCart();

// $cart->removeProduct($phone);
// $cart->showCart();

$subtotal = $cart->subtotal();
$total = $cart->total();

// echo "Subtotal: " . Money::format($subtotal) . PHP_EOL;
// echo "Total: " . Money::format($total) . PHP_EOL;

$order = new OrderService(new EmailService());
$order->createOrder();
