<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramBotController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LokasiController;

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
    return view('welcome');
});


Route::get('/messages', TelegramBotController::class, '__invoke');

Route::resource('/dashboard', DashboardController::class);
Route::resource('/lokasi', LokasiController::class);
