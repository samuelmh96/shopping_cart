<?php

namespace App\Services;

class OrderService
{
   public function __construct(private EmailService $email)
   {
   }

   public function createOrder(): void
   {
       echo "Creating order..." . PHP_EOL;
         $this->email->sendEmail();
   }
}