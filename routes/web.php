<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\WelcomeController;

// Route::get('/', function () {
//     // return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'index']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('hero-sections', HeroSectionController::class);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
