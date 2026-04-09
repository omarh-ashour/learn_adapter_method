<?php
namespace App\Payment;

interface PaymentProcessor{
  public function makeProcess(int $amount);
}