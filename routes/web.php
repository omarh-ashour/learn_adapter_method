<?php

use App\Payment\Payment;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');
Route::get('payments', [Payment::class, 'viewPayments']);

Route::get('payments/pay/{type}', [Payment::class, 'pay']);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});


require __DIR__ . '/settings.php';