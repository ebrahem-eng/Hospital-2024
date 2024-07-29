<?php

use App\Http\Controllers\Reception\Auth\AuthController;
use App\Http\Controllers\Reception\MedicalRecord\MedicalRecordController;
use App\Http\Controllers\Reception\Patient\PatientController;
use App\Http\Controllers\Reception\ReceptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Reception Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Reception routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Reception" middleware group. Make something great!
|
*/

//=================== Auth Route ==============================

Route::get('reception/login', [AuthController::class, 'login_page'])->name('reception.login.page');
Route::post('reception/login/check', [AuthController::class, 'login_check'])->name('reception.login.check');



Route::middleware(['Reception'])->name('reception.')->prefix('reception')->group(function () {

    Route::get('/dashboard', [ReceptionController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //=============================== Patient Route ======================

    Route::get('/patient/index', [PatientController::class, 'index'])->name('patient.index');

    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');

    Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');

    Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');

    Route::put('/patient/update/{id}', [PatientController::class, 'update'])->name('patient.update');

    Route::delete('/patient/delete/{id}', [PatientController::class, 'delete'])->name('patient.delete');

    Route::get('/patient/archive', [PatientController::class, 'archive'])->name('patient.archive');

    Route::post('/patient/restore/{id}', [PatientController::class, 'restore'])->name('patient.restore');

    Route::delete('/patient/forceDelete/{id}', [PatientController::class, 'forceDelete'])->name('patient.force.delete');


        //=============================== Medical Record Route ======================

        Route::get('/medicalRecord/index', [MedicalRecordController::class, 'index'])->name('medicalRecord.index');

        Route::get('/medicalRecord/create', [MedicalRecordController::class, 'create'])->name('medicalRecord.create');
    
        Route::post('/medicalRecord/store', [MedicalRecordController::class, 'store'])->name('medicalRecord.store');
    
        Route::get('/medicalRecord/edit/{id}', [MedicalRecordController::class, 'edit'])->name('medicalRecord.edit');
    
        Route::put('/medicalRecord/update/{id}', [MedicalRecordController::class, 'update'])->name('medicalRecord.update');
    
        Route::delete('/medicalRecord/delete/{id}', [MedicalRecordController::class, 'delete'])->name('medicalRecord.delete');
});
