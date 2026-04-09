<?php
namespace App\Payment;

use Inertia\Inertia;

class Payment
{


  public function pay(string $type)
  {
    
    return Inertia::render('Payment', ['status' => $type]);
  }
  
  public function viewPayments()
  {

    $name = "Omar";
    return Inertia::render('Payment', ['name' => $name]);


  }


}
?>