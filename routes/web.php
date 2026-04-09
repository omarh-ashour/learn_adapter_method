<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::get('payments', [PaymentController::class, 'index']);
Route::get('payments/create/{gateway}', [PaymentController::class, 'create']);
Route::post('payments/pay/paypal', [PaymentController::class, 'processPaypal']);
Route::post('payments/pay/stripe', [PaymentController::class, 'processStripe']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});


require __DIR__ . '/settings.php';
