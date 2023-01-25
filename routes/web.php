<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TeachingController;
use App\Http\Controllers\WelcomeTeachingController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::resource('teachings', WelcomeTeachingController::class)->only('index', 'show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('users')
        ->name('users.')
        ->group(function () {
            Route::resource('readings', ReadingController::class)->except('delete', 'show');
            Route::resource('teachings', TeachingController::class)->scoped(['teaching'=>'slug']);
        });
});
