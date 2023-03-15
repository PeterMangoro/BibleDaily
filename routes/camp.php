<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Camp\ProvinceController;
use App\Http\Controllers\Camp\ChristianController;
use App\Http\Controllers\Camp\DashboardController;
use App\Http\Controllers\Camp\DepartmentController;
use App\Http\Controllers\Camp\ConfirmRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('camp-registration', function () {
    return Inertia::render('Camp/Register/Register', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('registerCamp');

Route::get('fcc-camp-registration', function () {
    return Inertia::render('Camp/Welcome', [
        
    ]);
})->name('camp-welcome');

Route::get('/', function () {
    return Inertia::render('Camp/Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('registerForCamp');

Route::get('thank-you', function () {
    return Inertia::render('Camp/Register/Redirect', );
})->name('campRedirect');




Route::post('camp/register/', [ChristianController::class, 'create'])->name('campRegister');
Route::controller(ConfirmRegistrationController::class)->group(function() {
    Route::get('confirm-camp-dashboard', 'show')->name('confirm-campDashboard');
    Route::get('confirm-registered-users', 'all')->name('confirm-all');
    Route::get('confirm-sunday-school', 'sundaySchool')->name('confirm-sundaySchool');
    Route::get('confirm-youth', 'youth')->name('confirm-youth');
    Route::get('confirm-over-comers', 'overComers')->name('confirm-overComers');
    Route::get('confirm-male', 'male')->name('confirm-male');
    Route::get('confirm-female', 'female')->name('confirm-female');
    Route::get('confirm-needing-accommodation', 'needAccommodation')->name('confirm-needAccommodation');
    
    
});

Route::controller(DepartmentController::class)->group(function(){
    Route::get('fcc/cleaning-department', 'cleaning')->name('cleaning-department');
    Route::get('fcc/youth-department', 'youth')->name('youth-department');

});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::controller(DashboardController::class)->group( function(){
        Route::get('camp-dashboard', 'show')->name('campDashboard');
        Route::post('attend/{user}',  'attend')->name('attend');
        Route::get('registered-users',  'all')->name('all');
        Route::get('present-users',  'present')->name('present');
        Route::get('new-believers',  'new')->name('new');
        Route::get('church-members',  'members')->name('members');
        Route::get('sunday-school',  'sundaySchool')->name('sundaySchool');
        Route::get('youth',  'youth')->name('youth');
        Route::get('over-comers',  'overComers')->name('overComers');
        Route::get('male',  'male')->name('male');
        Route::get('female',  'female')->name('female');
        Route::get('needing-accommodation',  'needAccommodation')->name('needAccommodation');
    });
    

    //Provinces
    Route::controller(ProvinceController::class)->group(function() {
        Route::get('provinces',  'show')->name('provinces');
        Route::get('bulawayo',  'bulawayo')->name('bulawayo');
        Route::get('chiredzi',  'chiredzi')->name('chiredzi');    
        Route::get('chitungwiza',  'chitungwiza')->name('chitungwiza');
        Route::get('gweru',  'gweru')->name('gweru');
        Route::get('harare',  'harare')->name('harare');
        Route::get('manicaland',  'show')->name('manicaland');
        Route::get('mashonaland-central',  'mashonalandCentral')->name('mashonalandCentral');
        Route::get('mashonaland-east',  'mashonalandEast')->name('mashonalandEast');
        Route::get('mashonaland-west',  'mashonalandWest')->name('mashonalandWest');
        Route::get('masvingo',  'masvingo')->name('masvingo');
        Route::get('matebeleland-north',  'matebelelandNorth')->name('matebelelandNorth');
        Route::get('matebeleland-south',  'matebelelandSouth')->name('matebelelandSouth');    
    });
    });
