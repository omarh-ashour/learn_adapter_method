<?php

namespace App\Payment;

use App\Payment\PaymentProcessor;
use Inertia\Inertia;

class PaypalPayment implements PaymentProcessor
{

  public function makeProcess(int $amount)
  {

    return Inertia::render(
      'Payment',
      [
        'amount' => $amount,
        'gateway' => 'Paypal'
      ]
    );
  }
}
