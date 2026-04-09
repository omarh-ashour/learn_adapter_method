<?

namespace App\Payment;

use Inertia\Inertia;

class StripePayment
{
  public function makeCharge(int $valueInCents)
  {

    return Inertia::render('Payment', [
      'amount' => $valueInCents
    ]);
  }
}
