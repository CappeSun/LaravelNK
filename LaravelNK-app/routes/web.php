<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PunishmentController;
use App\Models\Site;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('loginpage');
})->middleware('guest');
Route::get('/dashboard', function () {
    return view('dashboard')->with('name', Auth::user()['name']);
})->middleware('auth');

Route::view('/', 'loginpage')->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/sites/add', [SiteController::class, 'add'])->middleware('auth');
Route::patch('/sites/update/{id}', [SiteController::class, 'update'])->middleware('auth');
Route::post('/sites/delete/{id}', [SiteController::class, 'delete'])->middleware('auth');

Route::post('/punishments/add', [PunishmentController::class, 'add'])->middleware('auth');
Route::post('/punishments/delete/{id}', [PunishmentController::class, 'delete'])->middleware('auth');