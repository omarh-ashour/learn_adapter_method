<?php

namespace App\Http\Controllers;

use App\Payment\PaymentProcessor;
use App\Payment\StripePayment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use StripeAdapter;

class PaymentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $gateways = [
      ['id' => 'paypal', 'name' => 'Pay With Paypal', 'color' => 'blue'],
      ['id' => 'stripe', 'name' => 'Pay With Stripe', 'color' => 'orange']
    ];

    return Inertia::render('payment/index', ['gateways' => $gateways]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create($gateway)
  {
    return Inertia::render('payment/create', [
      'selectedGateway' => $gateway
    ]);
  }

  public function processPaypal(Request $request)
  {
    // You should instantiate a concrete class (e.g., PaypalPayment) here, not the interface itself.
    $paypal = new \App\Payment\PaypalPayment();
    $paypal->makeProcess($request['amount']);

    return back()->with('status', 'paypal');
  }

  public function processStripe(Request $request)
  {
    // This is a great example of the object Adapter Pattern!
    $stripe = new StripePayment();
    $stripeAdapter = new StripeAdapter($stripe);
    $stripeAdapter->makeProcess($request['amount']);

    return back()->with('status', 'stripe');
  }
}
