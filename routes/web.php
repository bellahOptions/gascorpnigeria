<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'showHome'])->name('home');
Route::get('about', [PagesController::class, 'showAbout'])->name('about');
Route::get('services', [PagesController::class, 'showServices'])->name('services');
Route::get('our-assets', [PagesController::class, 'showAssets'])->name('assets');
Route::get('team', [PagesController::class, 'showteam'])->name('team');

// Contact
Route::get('contact', [PagesController::class, 'showContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
