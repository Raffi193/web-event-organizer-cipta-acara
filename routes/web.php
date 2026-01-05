<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DecorationController;
use App\Http\Controllers\MasterOfCeremonyController;
use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\PricelistController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::view('/landing', 'landing')->name('landing'); 

Route::get('/order', [BookingController::class, 'create'])->name('order.create');
Route::post('/order', [BookingController::class, 'store'])->name('order.store');

Route::get('/payment/success/{externalId}', [BookingController::class, 'paymentSuccess']);
Route::get('/payment/failure/{externalId}', [BookingController::class, 'paymentFailure']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('photographers', PhotographerController::class)->except(['show'])->middleware(['auth', 'verified']);
Route::resource('mc', MasterOfCeremonyController::class)->except(['show'])->middleware(['auth', 'verified']);
Route::resource('decorations', DecorationController::class)->except(['show'])->middleware(['auth', 'verified']);
Route::resource('pricelists', PricelistController::class)->except(['show'])->middleware(['auth', 'verified']);
Route::resource('bookings', BookingController::class)->except(['create', 'store', 'edit', 'destroy', 'update', 'show'])->middleware(['auth', 'verified']);

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
