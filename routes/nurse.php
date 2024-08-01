<?php

use App\Http\Controllers\Nurse\Auth\AuthController;
use App\Http\Controllers\Nurse\MedicineMedicalSupplieseNursePatient\MedicineMedicalSupplieseNursePatientController;
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


  //====================== Medicine And Medical Supplies Nurse Patient Route =======================

  Route::get('/medicine/medicalSupplies/new', [MedicineMedicalSupplieseNursePatientController::class, 'newMedicineAndMedicalSuppliesPatient'])->name('new.medicine.medicalSupplies.patient');

  Route::get('/medicine/medicalSupplies/history', [MedicineMedicalSupplieseNursePatientController::class, 'historyMedicineAndMedicalSuppliesPatient'])->name('history.medicine.medicalSupplies.patient');

  Route::get('/medicine/medicalSupplies/patient/inspection/{id}', [MedicineMedicalSupplieseNursePatientController::class, 'medicineAndMedicalSuppliesPatientInspection'])->name('medicine.medicalSupplies.patient.inspection');

  Route::get('/medicine/medicalSupplies/patient/medicine/given/history/{id}', [MedicineMedicalSupplieseNursePatientController::class, 'medicineGivenHistory'])->name('medicine.medicalSupplies.patient.medicine.given.history');

  Route::get('/medicine/medicalSupplies/patient/medicalSupplies/given/history/{id}', [MedicineMedicalSupplieseNursePatientController::class, 'medicalSuppliesGivenHistory'])->name('medicine.medicalSupplies.patient.medicalSupplies.given.history');

  Route::get('/medicine/medicalSupplies/patient/create/medicalSupplies/given/history', [MedicineMedicalSupplieseNursePatientController::class, 'createMedicineAndMedicalSuppliesGiven'])->name('medicine.medicalSupplies.patient.medicine.medicalSupplies.create.given');

  Route::post('/medicine/medicalSupplies/patient/store/medicalSupplies/given/history', [MedicineMedicalSupplieseNursePatientController::class, 'storeMedicineAndMedicalSuppliesGiven'])->name('medicine.medicalSupplies.patient.medicine.medicalSupplies.store.given');

});