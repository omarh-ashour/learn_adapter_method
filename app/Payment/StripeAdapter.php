<?php

use App\Payment\PaymentProcessor;
use App\Payment\StripePayment;

class StripeAdapter implements PaymentProcessor
{
  private $stripepayment;

  public function __construct(StripePayment $stripepayment)
  {
    $this->stripepayment = $stripepayment;
  }
  public function makeProcess(int $amount)
  {
    $valueInCents = $amount * 100;
    $this->stripepayment->makeCharge($valueInCents);
  }
}
