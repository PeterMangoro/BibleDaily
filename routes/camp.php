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
    return Inertia::render('Camp/Register/Register', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('registerCamp');

Route::get('/', function () {
    return Inertia::render('Camp/Register/Register', [
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
Route::get('confirm-camp-dashboard', [ConfirmRegistrationController::class, 'show'])->name('confirm-campDashboard');
Route::get('confirm-registered-users', [ConfirmRegistrationController::class, 'all'])->name('confirm-all');
Route::get('confirm-sunday-school', [ConfirmRegistrationController::class, 'sundaySchool'])->name('confirm-sundaySchool');
Route::get('confirm-youth', [ConfirmRegistrationController::class, 'youth'])->name('confirm-youth');
Route::get('confirm-over-comers', [ConfirmRegistrationController::class, 'overComers'])->name('confirm-overComers');
Route::get('confirm-male', [ConfirmRegistrationController::class, 'male'])->name('confirm-male');
Route::get('confirm-female', [ConfirmRegistrationController::class, 'female'])->name('confirm-female');
Route::get('confirm-needing-accommodation', [ConfirmRegistrationController::class, 'needAccommodation'])->name('confirm-needAccommodation');


Route::get('fcc/cleaning-department', [DepartmentController::class, 'cleaning'])->name('cleaning-department');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('camp-dashboard', [DashboardController::class, 'show'])->name('campDashboard');
    Route::post('attend/{user}', [DashboardController::class, 'attend'])->name('attend');
    Route::get('registered-users', [DashboardController::class, 'all'])->name('all');
    Route::get('present-users', [DashboardController::class, 'present'])->name('present');
    Route::get('new-believers', [DashboardController::class, 'new'])->name('new');
    Route::get('church-members', [DashboardController::class, 'members'])->name('members');
    Route::get('sunday-school', [DashboardController::class, 'sundaySchool'])->name('sundaySchool');
    Route::get('youth', [DashboardController::class, 'youth'])->name('youth');
    Route::get('over-comers', [DashboardController::class, 'overComers'])->name('overComers');
    Route::get('male', [DashboardController::class, 'male'])->name('male');
    Route::get('female', [DashboardController::class, 'female'])->name('female');
    Route::get('needing-accommodation', [DashboardController::class, 'needAccommodation'])->name('needAccommodation');

    //Provinces
    Route::get('provinces', [ProvinceController::class, 'show'])->name('provinces');
    Route::get('bulawayo', [ProvinceController::class, 'bulawayo'])->name('bulawayo');
    Route::get('chiredzi', [ProvinceController::class, 'chiredzi'])->name('chiredzi');    
    Route::get('chitungwiza', [ProvinceController::class, 'chitungwiza'])->name('chitungwiza');
    Route::get('gweru', [ProvinceController::class, 'gweru'])->name('gweru');
    Route::get('harare', [ProvinceController::class, 'harare'])->name('harare');
    Route::get('manicaland', [ProvinceController::class, 'show'])->name('manicaland');
    Route::get('mashonaland-central', [ProvinceController::class, 'mashonalandCentral'])->name('mashonalandCentral');
    Route::get('mashonaland-east', [ProvinceController::class, 'mashonalandEast'])->name('mashonalandEast');
    Route::get('mashonaland-west', [ProvinceController::class, 'mashonalandWest'])->name('mashonalandWest');
    Route::get('masvingo', [ProvinceController::class, 'masvingo'])->name('masvingo');
    Route::get('matebeleland-north', [ProvinceController::class, 'matebelelandNorth'])->name('matebelelandNorth');
    Route::get('matebeleland-south', [ProvinceController::class, 'matebelelandSouth'])->name('matebelelandSouth');
});
