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

Route::resource('/dashboard', DashboardController::class);
Route::resource('/lokasi', LokasiController::class);
Route::resource('/dept', DepartemenController::class);
Route::resource('/users', UserController::class);
Route::resource('/telebot', TelegramController::class);
Route::resource('/tiket', TiketController::class);
Route::get('/send-email',function(){
    $data = [
        'name' => 'Abed',
        'body' => 'Testing Kirim Email di Santri Koding'
    ];
   
    Mail::to('alfeusputra@gmail.com')->send(new SendEmail($data));
   
    dd("Email Berhasil dikirim.");
});
