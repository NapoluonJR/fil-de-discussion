<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\MessageController;

// Routes d'authentification
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {
    // Accueil
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Canaux
    Route::get('/channels', [ChannelController::class, 'index'])->name('channels.index');
    Route::get('/channels/create', [ChannelController::class, 'create'])->name('channels.create');
    Route::post('/channels', [ChannelController::class, 'store'])->name('channels.store');
    
    // Affichage d'un canal
    Route::get('/channels/{channel}', [ChannelController::class, 'show'])->name('channels.show');

    Route::delete('/channels/{channel}', [ChannelController::class, 'destroy'])->name('channels.destroy');

    // Messages
    Route::post('/channels/{channel}/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/channels/{channel}/messages', [MessageController::class, 'fetch'])->name('messages.fetch');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Mentions légales / Politique de confidentialité
    Route::view('/mentions-legales', 'mentions-legales')->name('mentions');
    Route::view('/politique-confidentialite', 'politique-confidentialite')->name('confidentialite');

    Route::get('/contact', [HomeController::class, 'showContactForm'])->name('contact.form');
    Route::post('/contact', [HomeController::class, 'submitContactForm'])->name('contact.submit');

});
