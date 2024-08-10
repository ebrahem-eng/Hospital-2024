<?php

use App\Http\Controllers\Patient\Appointment\AppointmentController;
use App\Http\Controllers\Patient\Auth\AuthController;
use App\Http\Controllers\Patient\Complaints\ComplaintsController;
use App\Http\Controllers\Patient\MedicalRecord\MedicalRecordController;
use App\Http\Controllers\Patient\Medicine\MedicineController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Patient\Surgeries\SurgeriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Patient Routes
|--------------------------------------------------------------------------
|
| Here is where you can register patient routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Patient" middleware group. Make something great!
|
*/


//=================== Auth Route ==============

Route::get('patient/login', [AuthController::class, 'login_page'])->name('patient.login.page');
Route::post('patient/login/check', [AuthController::class, 'login_check'])->name('patient.login.check');
Route::get('patient/signUp', [AuthController::class, 'signup_page'])->name('patient.signUp.page');
Route::post('patient/signUp/store', [AuthController::class, 'signup'])->name('patient.signUp.store');




Route::middleware(['Patient'])->name('patient.')->prefix('patient')->group(function () {
  Route::get('/dashboard', [PatientController::class, 'index'])->name('dashboard');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


  //=================================== Appointment Route ====================


  Route::get('/appointment/index', [AppointmentController::class, 'index'])->name('appointment.index');

  Route::get('/appointment/create1', [AppointmentController::class, 'create1'])->name('appointment.create1');

  Route::get('/appointment/create2', [AppointmentController::class, 'create2'])->name('appointment.create2');

  Route::get('/appointment/create3', [AppointmentController::class, 'create3'])->name('appointment.create3');

  Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');

  Route::put('/appointment/cancele/{id}', [AppointmentController::class, 'cancele'])->name('appointment.cancele');

  Route::get('/appointment/history', [AppointmentController::class, 'history'])->name('appointment.history');

  //=================================== Appointment Route ====================

  Route::get('/medicine/index', [MedicineController::class, 'index'])->name('medicine.index');

  Route::get('/medicine/history', [MedicineController::class, 'history'])->name('medicine.history');

  //=================================== Appointment Route ====================

  Route::get('/medicalRecord/index', [MedicalRecordController::class, 'index'])->name('medicalRecord.index');

  Route::get('/medicalRecord/inspections/{id}', [MedicalRecordController::class, 'inspections'])->name('medicalRecord.inspections');


  //=================================== Surgeries Route ====================

  Route::get('/surgeries/index', [SurgeriesController::class, 'index'])->name('surgeries.index');

  Route::get('/surgeries/history', [SurgeriesController::class, 'history'])->name('surgeries.history');

  Route::put('/surgeries/cancel/{id}', [SurgeriesController::class, 'cancel'])->name('surgeries.cancel');


  //=================================== Complaints Route ====================

  Route::get('/complaints/create', [ComplaintsController::class, 'create'])->name('complaints.create');

  Route::post('/complaints/store', [ComplaintsController::class, 'store'])->name('complaints.store');

});
