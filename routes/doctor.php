<?php

use App\Http\Controllers\Doctor\Auth\AuthController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\Inspection\InspectionController;
use App\Http\Controllers\Doctor\MedicalRecord\MedicalRecordController;
use App\Http\Controllers\ProfileController;
use App\Models\PatientMedicalRecord;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register doctor routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "doctor" middleware group. Make something great!
|
*/


//=================== Auth Route ==============================
Route::get('doctor/login', [AuthController::class, 'login_page'])->name('doctor.login.page');
Route::post('doctor/login/check', [AuthController::class, 'login_check'])->name('doctor.login.check');



Route::middleware(['Doctor'])->name('doctor.')->prefix('doctor')->group(function () {

    Route::get('/dashboard', [DoctorController::class, 'index'])->name('dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //========================== Medical Record Route ===================

    Route::get('/medicalRecord/index', [MedicalRecordController::class, 'index'])->name('medicalRecord.index');

    Route::get('/medicalRecord/create', [MedicalRecordController::class, 'create'])->name('medicalRecord.create');

    Route::post('/medicalRecord/store', [MedicalRecordController::class, 'store'])->name('medicalRecord.store');

    Route::get('/medicalRecord/edit/{id}', [MedicalRecordController::class, 'edit'])->name('medicalRecord.edit');

    Route::put('/medicalRecord/update/{id}', [MedicalRecordController::class, 'update'])->name('medicalRecord.update');

    Route::get('/medicalRecord/archive', [MedicalRecordController::class, 'archive'])->name('medicalRecord.archive');

    Route::delete('/medicalRecord/softDelete/{id}', [MedicalRecordController::class, 'softDelete'])->name('medicalRecord.soft.delete');

    Route::delete('/medicalRecord/forceDelete/{id}', [MedicalRecordController::class, 'forceDelete'])->name('medicalRecord.force.delete');

    Route::post('/medicalRecord/restore/{id}', [MedicalRecordController::class, 'restore'])->name('medicalRecord.restore');


     //========================== Inspection Medical Record Route ===================

     Route::get('inspection/medicalRecord/index/{id}', [InspectionController::class, 'index'])->name('inspection.medicalRecord.index');

     Route::get('inspection/medicalRecord/create/{id}', [InspectionController::class, 'create'])->name('inspection.medicalRecord.create');
 
     Route::get('inspection/medicalRecord/store/inspection', [InspectionController::class, 'storeInspection'])->name('inspection.medicalRecord.store.inspection');

     Route::get('inspection/medicalSupplies/store/inspection', [InspectionController::class, 'storeMedicalSuppliesInspection'])->name('inspection.medicalSupplies.store.inspection');

     Route::get('inspection/medicalRecord/choose/medicine/{id}', [InspectionController::class, 'chooseMedicine'])->name('inspection.medicalRecord.choose.medicine');

     Route::get('inspection/medicalRecord/store/choose/medicine', [InspectionController::class, 'storeMedicineInspection'])->name('inspection.medicalRecord.store.medicine');

     Route::get('inspection/medicalRecord/surgeries/create', [InspectionController::class, 'surgeriesInspectionCreate'])->name('inspection.medicalRecord.create.surgeries');

     Route::post('inspection/medicalRecord/surgeries/store', [InspectionController::class, 'surgeriesInspectionStore'])->name('inspection.medicalRecord.store.surgeries');


 
     Route::get('inspection/medicalRecord/edit/{id}', [InspectionController::class, 'edit'])->name('inspection.medicalRecord.edit');
 
     Route::put('inspection/medicalRecord/update/{id}', [InspectionController::class, 'update'])->name('inspection.medicalRecord.update');
 
     Route::get('inspection/medicalRecord/archive', [InspectionController::class, 'archive'])->name('inspection.medicalRecord.archive');
 
     Route::delete('inspection/medicalRecord/softDelete/{id}', [InspectionController::class, 'softDelete'])->name('inspection.medicalRecord.soft.delete');
 
     Route::delete('inspection/medicalRecord/forceDelete/{id}', [InspectionController::class, 'forceDelete'])->name('inspection.medicalRecord.force.delete');
 
     Route::post('inspection/medicalRecord/restore/{id}', [InspectionController::class, 'restore'])->name('inspection.medicalRecord.restore');
});
