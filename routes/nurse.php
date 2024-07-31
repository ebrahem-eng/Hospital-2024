<?php

use App\Http\Controllers\Nurse\Auth\AuthController;
use App\Http\Controllers\Nurse\NurseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Nurse Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Nurse routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Nurse" middleware group. Make something great!
|
*/


//=================== Auth Route ==============

Route::get('nurse/login', [AuthController::class, 'login_page'])->name('nurse.login.page');
Route::post('nurse/login/check', [AuthController::class, 'login_check'])->name('nurse.login.check');



Route::middleware(['Nurse'])->name('nurse.')->prefix('nurse')->group(function () {

  Route::get('/dashboard', [NurseController::class, 'index'])->name('dashboard');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});