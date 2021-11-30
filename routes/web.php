<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\RessourceController;
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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Route du Controller trip
 */
Route::get('/trips', [TripController::class, 'create']);
Route::post('/trips', [TripController::class, 'store'])
    ->name('trips.store');
/**
 * Route du controller Ressource
 */
Route::resource('/blog', RessourceController::class);

