<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\TeachingController;
use App\Http\Controllers\WelcomeTeachingController;

Route::get('/welcome', [WelcomeTeachingController::class, 'index'])->name('welcome');
// Route::get('/', [WelcomeTeachingController::class, 'index'])->name('welcome');
Route::get('/users', [WelcomeTeachingController::class, 'users'])->name('welcome');

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

// //this one didn't work
// Route::get('/symlink/a', function () {    
//     Artisan::call('storage:link');
// });


// Route::get('/symlink/a', function () {    
//     $target = '/home3/cvzxnudf/public_html/storage/app/public';
//     $shortcut = '/home3/cvzxnudf/public_html/public/storage';
//     symlink($target, $shortcut);
//  });
