<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechRequestController;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [TechRequestController::class, 'index']);

Route::get('requests', [TechRequestController::class, 'fetchRequests'] );
Route::get('requestList', [TechRequestController::class, 'requestList'] );
Route::get('showRequests', [TechRequestController::class, 'showRequests'] )->name('showRequests');

// Route::resource('techRequest', App\Http\Controllers\TechRequestController);

// Route::post('techRequest', [App\Http\Controllers\TechRequestController::class, 'store']);

Route::resource('techRequest', 'TechRequestController');
Route::resource('editRequest', 'TechRequestController');
