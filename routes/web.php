<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route ::get('/', [PagesController::class, 'showHome']);
Route ::get('about', [PagesController::class, 'showAbout'])->name('about');
Route ::get('services', [PagesController::class, 'showServices'])->name('services');
Route ::get('our-assets', [PagesController::class, 'showAssets']);
Route ::get('team', [PagesController::class, 'showteam']);

//COntact
Route ::get('contact', [PagesController::class, 'showContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');