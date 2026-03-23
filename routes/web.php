<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return view('welcome');
});

Route ::get('/', [PagesController::class, 'showHome']);
Route ::get('about', [PagesController::class, 'showAbout']);
Route ::get('services', [PagesController::class, 'showServices']);
Route ::get('our-assets', [PagesController::class, 'showAssets']);
Route ::get('team', [PagesController::class, 'showteam']);
Route ::get('contact', [PagesController::class, 'showContact']);