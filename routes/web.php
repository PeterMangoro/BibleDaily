<?php

use App\Http\Controllers\ReadingController;
use App\Http\Controllers\TeachingController;
use App\Http\Controllers\WelcomeTeachingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeTeachingController::class, 'index'])->name('welcome');
Route::resource('teachings', WelcomeTeachingController::class)
    ->only('index', 'show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('users')
        ->name('users.')
        ->group(function () {
            Route::resource('readings', ReadingController::class)
                ->except('delete', 'show')
                ->scoped(['reading' => 'uuid']);
            Route::resource('teachings', TeachingController::class)
                ->scoped(['teaching' => 'slug']);
        });
});
