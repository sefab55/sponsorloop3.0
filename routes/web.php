<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SponsorloopController;
use App\Http\Controllers\ResultaatController;
use App\Http\Controllers\DashboardController;


// Route voor de welkomstpagina
Route::get('/', function () {
    return view('welcome');
})->name('welcome');



// Route voor het dashboard, alleen toegankelijk voor geverifieerde gebruikers
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Routes voor profielbeheer, alleen toegankelijk voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route voor het inschrijven voor een sponsorloop
Route::get('/sponsorloop/inschrijven', [SponsorloopController::class, 'showInschrijvenForm'])->name('sponsorloop.inschrijven');
Route::post('/sponsorloop/inschrijven', [SponsorloopController::class, 'storeInschrijven'])->name('sponsorloop.storeInschrijven');

// Route voor het creëren van een betaalverzoek (optioneel, als je het direct wilt testen)
Route::get('/sponsorloop/payment/{userId}/{sponsorloopId}', [SponsorloopController::class, 'createPaymentRequest'])->name('sponsorloop.createPaymentRequest');


//betaalpagina.
Route::get('/payment/success', function () {
    return view('payment.success');
})->name('payment.success');


// Routes voor het aanmaken van een sponsorloop, alleen toegankelijk voor admins
Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/sponsorloop/creeren', [SponsorloopController::class, 'createSponsorloop'])->name('sponsorloop.createSponsorloop');
    Route::post('/sponsorloop/creeren', [SponsorloopController::class, 'storeSponsorloop'])->name('sponsorloop.storeSponsorloop');
});


//dit zijn de routes voor de resultaat/hoeveelrondjes je gelopen hebt
Route::get('/resultaat/register', [ResultaatController::class, 'showRegisterDeviceForm'])->name('resultaat.register');
Route::post('/resultaat/register', [ResultaatController::class, 'registerDevice'])->name('resultaat.registerDevice');
Route::get('/resultaat/overzicht', [ResultaatController::class, 'showResultaatOverzicht'])->name('resultaat.overzicht');



Route::get('/sponsorloop/{id}/details', [SponsorloopController::class, 'getSponsorloopDetails']);


// Auth routes
require __DIR__ . '/auth.php';
