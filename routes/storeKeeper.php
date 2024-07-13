<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreKeeper\Auth\AuthController;
use App\Http\Controllers\StoreKeeper\MedicalMachine\MedicalMachineController;
use App\Http\Controllers\StoreKeeper\MedicalSupplies\MedicalSuppliesController;
use App\Http\Controllers\StoreKeeper\Medicine\MedicineController;
use App\Http\Controllers\StoreKeeper\StoreKeeperController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| StoreKeeper Routes
|--------------------------------------------------------------------------
|
| Here is where you can register StoreKeeper routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "StoreKeeper" middleware group. Make something great!
|
*/

//=================== Auth Route ==============================
Route::get('storeKeeper/login', [AuthController::class, 'login_page'])->name('storeKeeper.login.page');
Route::post('storeKeeper/login/check', [AuthController::class, 'login_check'])->name('storeKeeper.login.check');



Route::middleware(['StoreKeeper'])->name('storeKeeper.')->prefix('storeKeeper')->group(function () {

    Route::get('/dashboard', [StoreKeeperController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //========================== Medicine Route ===================

    Route::get('/medicine/index', [MedicineController::class, 'index'])->name('medicine.index');

    Route::get('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');

    Route::post('/medicine/store', [MedicineController::class, 'store'])->name('medicine.store');

    Route::get('/medicine/edit/{id}', [MedicineController::class, 'edit'])->name('medicine.edit');

    Route::put('/medicine/update/{id}', [MedicineController::class, 'update'])->name('medicine.update');

    Route::put('/medicine/delete/custom/quantity/{id}', [MedicineController::class, 'deleteCustomQuantity'])->name('medicine.delete.custom.quantity');

    Route::delete('/medicine/softDelete/{id}', [MedicineController::class, 'softDelete'])->name('medicine.soft.delete');


    //========================== Medical Machine Route ===================

    Route::get('/medicalMachine/index', [MedicalMachineController::class, 'index'])->name('medicalMachine.index');

    Route::get('/medicalMachine/create', [MedicalMachineController::class, 'create'])->name('medicalMachine.create');

    Route::post('/medicalMachine/store', [MedicalMachineController::class, 'store'])->name('medicalMachine.store');

    Route::get('/medicalMachine/edit/{id}', [MedicalMachineController::class, 'edit'])->name('medicalMachine.edit');

    Route::put('/medicalMachine/update/{id}', [MedicalMachineController::class, 'update'])->name('medicalMachine.update');

    Route::delete('/medicalMachine/softDelete/{id}', [MedicalMachineController::class, 'softDelete'])->name('medicalMachine.soft.delete');

     //========================== Medical Supplies Route ===================

     Route::get('/medicalSupplies/index', [MedicalSuppliesController::class, 'index'])->name('medicalSupplies.index');

     Route::get('/medicalSupplies/create', [MedicalSuppliesController::class, 'create'])->name('medicalSupplies.create');
 
     Route::post('/medicalSupplies/store', [MedicalSuppliesController::class, 'store'])->name('medicalSupplies.store');
 
     Route::get('/medicalSupplies/edit/{id}', [MedicalSuppliesController::class, 'edit'])->name('medicalSupplies.edit');
 
     Route::put('/medicalSupplies/update/{id}', [MedicalSuppliesController::class, 'update'])->name('medicalSupplies.update');

     Route::put('/medicalSupplies/delete/custom/quantity/{id}', [MedicalSuppliesController::class, 'deleteCustomQuantity'])->name('medicalSupplies.delete.custom.quantity');
 
     Route::delete('/medicalSupplies/softDelete/{id}', [MedicalSuppliesController::class, 'softDelete'])->name('medicalSupplies.soft.delete');
});
