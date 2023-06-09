<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ListingController::class, 'index_view']);

Route::get('/show/{id}', [FormController::class, 'index_view']);
Route::post('/show/{id}', [FormController::class, 'index']);
Route::get('/create', [FormController::class, 'create_view']);
Route::post('/create', [FormController::class, 'create']);
Route::get('/edit/{id}', [FormController::class, 'edit_view']);
Route::post('/edit/{id}', [FormController::class, 'edit']);
Route::get('/remove/{id}', [FormController::class, 'remove']);
