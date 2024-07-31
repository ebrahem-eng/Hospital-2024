<?php

use App\Http\Controllers\DepartmentEmploye\Auth\AuthController;
use App\Http\Controllers\DepartmentEmploye\DepartmentEmployeController;
use App\Http\Controllers\DepartmentEmploye\DepartmentRoom\DepartmentRoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DepartmentEmploye Routes
|--------------------------------------------------------------------------
|
| Here is where you can register DepartmentEmploye routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "DepartmentEmploye" middleware group. Make something great!
|
*/


//=================== Auth Route ==============

Route::get('departmentEmploye/login', [AuthController::class, 'login_page'])->name('departmentEmploye.login.page');
Route::post('departmentEmploye/login/check', [AuthController::class, 'login_check'])->name('departmentEmploye.login.check');



Route::middleware(['DepartmentEmploye'])->name('departmentEmploye.')->prefix('departmentEmploye')->group(function () {

  Route::get('/dashboard', [DepartmentEmployeController::class, 'index'])->name('dashboard');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


  //=================== Department Room Route ==============

  Route::get('/departmentRoom/index', [DepartmentRoomController::class, 'index'])->name('departmentRoom.reservation.index');

  Route::get('/departmentRoom/reservation/create', [DepartmentRoomController::class, 'createReservation'])->name('departmentRoom.reservation.create');

  Route::post('/departmentRoom/reservation/store', [DepartmentRoomController::class, 'storeReservation'])->name('departmentRoom.reservation.store');

  Route::put('/departmentRoom/reservation/leave/{id}', [DepartmentRoomController::class, 'leaveRoom'])->name('departmentRoom.reservation.leave');
  
});