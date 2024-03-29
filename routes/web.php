<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramBotController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\DepartemenController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TelegramController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

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

Route::get('/', HomeController::class);


Route::get('/messages', TelegramBotController::class, '__invoke');

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/lokasi', LokasiController::class);
    Route::resource('/dept', DepartemenController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/telebot', TelegramController::class);
    Route::resource('/tiket', TiketController::class);
    Route::post("/lokasi/{id}/active", [LokasiController::class, "active"])->name("lokasi.active");
    Route::post("/tiket/{id}/approve", [TiketController::class, "approve"])->name("tiket.approve");
});
