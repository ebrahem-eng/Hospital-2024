<?php

use App\Http\Controllers\Admin\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Complaints\ComplaintsController;
use App\Http\Controllers\Admin\Department\DepartmentController;
use App\Http\Controllers\Admin\DepartmentEmploye\DepartmentEmployeController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Floor\FloorController;
use App\Http\Controllers\Admin\Nurse\NurseController;
use App\Http\Controllers\Admin\Reception\ReceptionController;
use App\Http\Controllers\Admin\Room\RoomController;
use App\Http\Controllers\Admin\Specialization\SpecializationController;
use App\Http\Controllers\Admin\StoreKeeper\StoreKeeperController;
use App\Http\Controllers\ProfileController;
use App\Models\StoreKeeper;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/


//=================== Auth Route ==============
Route::get('admin/login', [AuthController::class, 'login_page'])->name('admin.login.page');
Route::post('admin/login/check', [AuthController::class, 'login_check'])->name('admin.login.check');



Route::middleware(['Admin'])->name('admin.')->prefix('admin')->group(function () {

  Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


  //================================ Doctor Route ========================

  Route::get('/doctor/index', [DoctorController::class, 'index'])->name('doctor.index');

  Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');

  Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');

  Route::get('/doctor/edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');

  Route::put('/doctor/update/{id}', [DoctorController::class, 'update'])->name('doctor.update');

  Route::get('/doctor/archive', [DoctorController::class, 'archive'])->name('doctor.archive');

  Route::delete('/doctor/softDelete/{id}', [DoctorController::class, 'softDelete'])->name('doctor.soft.delete');

  Route::delete('/doctor/forceDelete/{id}', [DoctorController::class, 'forceDelete'])->name('doctor.force.delete');

  Route::post('/doctor/restore/{id}', [DoctorController::class, 'restore'])->name('doctor.restore');


  //================================ Specialization Route ========================

  Route::get('/specialization/index', [SpecializationController::class, 'index'])->name('specialization.index');

  Route::get('/specialization/create', [SpecializationController::class, 'create'])->name('specialization.create');

  Route::post('/specialization/store', [SpecializationController::class, 'store'])->name('specialization.store');

  Route::get('/specialization/edit/{id}', [SpecializationController::class, 'edit'])->name('specialization.edit');

  Route::put('/specialization/update/{id}', [SpecializationController::class, 'update'])->name('specialization.update');

  Route::get('/specialization/archive', [SpecializationController::class, 'archive'])->name('specialization.archive');

  Route::delete('/specialization/softDelete/{id}', [SpecializationController::class, 'softDelete'])->name('specialization.soft.delete');

  Route::delete('/specialization/forceDelete/{id}', [SpecializationController::class, 'forceDelete'])->name('specialization.force.delete');

  Route::post('/specialization/restore/{id}', [SpecializationController::class, 'restore'])->name('specialization.restore');


  //================================ Reception Route ========================

  Route::get('/reception/index', [ReceptionController::class, 'index'])->name('reception.index');

  Route::get('/reception/create', [ReceptionController::class, 'create'])->name('reception.create');

  Route::post('/reception/store', [ReceptionController::class, 'store'])->name('reception.store');

  Route::get('/reception/edit/{id}', [ReceptionController::class, 'edit'])->name('reception.edit');

  Route::put('/reception/update/{id}', [ReceptionController::class, 'update'])->name('reception.update');

  Route::get('/reception/archive', [ReceptionController::class, 'archive'])->name('reception.archive');

  Route::delete('/reception/softDelete/{id}', [ReceptionController::class, 'softDelete'])->name('reception.soft.delete');

  Route::delete('/reception/forceDelete/{id}', [ReceptionController::class, 'forceDelete'])->name('reception.force.delete');

  Route::post('/reception/restore/{id}', [ReceptionController::class, 'restore'])->name('reception.restore');


  //================================ Store Keeper Route ========================

  Route::get('/storeKeeper/index', [StoreKeeperController::class, 'index'])->name('storeKeeper.index');

  Route::get('/storeKeeper/create', [StoreKeeperController::class, 'create'])->name('storeKeeper.create');

  Route::post('/storeKeeper/store', [StoreKeeperController::class, 'store'])->name('storeKeeper.store');

  Route::get('/storeKeeper/edit/{id}', [StoreKeeperController::class, 'edit'])->name('storeKeeper.edit');

  Route::put('/storeKeeper/update/{id}', [StoreKeeperController::class, 'update'])->name('storeKeeper.update');

  Route::get('/storeKeeper/archive', [StoreKeeperController::class, 'archive'])->name('storeKeeper.archive');

  Route::delete('/storeKeeper/softDelete/{id}', [StoreKeeperController::class, 'softDelete'])->name('storeKeeper.soft.delete');

  Route::delete('/storeKeeper/forceDelete/{id}', [StoreKeeperController::class, 'forceDelete'])->name('storeKeeper.force.delete');

  Route::post('/storeKeeper/restore/{id}', [StoreKeeperController::class, 'restore'])->name('storeKeeper.restore');


  //================================ Department Employe Route ========================

  Route::get('/departmentEmploye/index', [DepartmentEmployeController::class, 'index'])->name('departmentEmploye.index');

  Route::get('/departmentEmploye/create', [DepartmentEmployeController::class, 'create'])->name('departmentEmploye.create');

  Route::post('/departmentEmploye/store', [DepartmentEmployeController::class, 'store'])->name('departmentEmploye.store');

  Route::get('/departmentEmploye/edit/{id}', [DepartmentEmployeController::class, 'edit'])->name('departmentEmploye.edit');

  Route::put('/departmentEmploye/update/{id}', [DepartmentEmployeController::class, 'update'])->name('departmentEmploye.update');

  Route::get('/departmentEmploye/archive', [DepartmentEmployeController::class, 'archive'])->name('departmentEmploye.archive');

  Route::delete('/departmentEmploye/softDelete/{id}', [DepartmentEmployeController::class, 'softDelete'])->name('departmentEmploye.soft.delete');

  Route::delete('/departmentEmploye/forceDelete/{id}', [DepartmentEmployeController::class, 'forceDelete'])->name('departmentEmploye.force.delete');

  Route::post('/departmentEmploye/restore/{id}', [DepartmentEmployeController::class, 'restore'])->name('departmentEmploye.restore');


  //================================ Nurse Route ========================

  Route::get('/nurse/index', [NurseController::class, 'index'])->name('nurse.index');

  Route::get('/nurse/create', [NurseController::class, 'create'])->name('nurse.create');

  Route::post('/nurse/store', [NurseController::class, 'store'])->name('nurse.store');

  Route::get('/nurse/edit/{id}', [NurseController::class, 'edit'])->name('nurse.edit');

  Route::put('/nurse/update/{id}', [NurseController::class, 'update'])->name('nurse.update');

  Route::get('/nurse/archive', [NurseController::class, 'archive'])->name('nurse.archive');

  Route::delete('/nurse/softDelete/{id}', [NurseController::class, 'softDelete'])->name('nurse.soft.delete');

  Route::delete('/nurse/forceDelete/{id}', [NurseController::class, 'forceDelete'])->name('nurse.force.delete');

  Route::post('/nurse/restore/{id}', [NurseController::class, 'restore'])->name('nurse.restore');

  //================================ Department Route ========================

  Route::get('/department/index', [DepartmentController::class, 'index'])->name('department.index');

  Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');

  Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');

  Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');

  Route::put('/department/update/{id}', [DepartmentController::class, 'update'])->name('department.update');

  Route::get('/department/archive', [DepartmentController::class, 'archive'])->name('department.archive');

  Route::delete('/department/softDelete/{id}', [DepartmentController::class, 'softDelete'])->name('department.soft.delete');

  Route::delete('/department/forceDelete/{id}', [DepartmentController::class, 'forceDelete'])->name('department.force.delete');

  Route::post('/department/restore/{id}', [DepartmentController::class, 'restore'])->name('department.restore');

  //================================ Room Route ========================

  Route::get('/room/index', [RoomController::class, 'index'])->name('room.index');

  Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');

  Route::post('/room/store', [RoomController::class, 'store'])->name('room.store');

  Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');

  Route::put('/room/update/{id}', [RoomController::class, 'update'])->name('room.update');

  Route::get('/room/archive', [RoomController::class, 'archive'])->name('room.archive');

  Route::delete('/room/softDelete/{id}', [RoomController::class, 'softDelete'])->name('room.soft.delete');

  Route::delete('/room/forceDelete/{id}', [RoomController::class, 'forceDelete'])->name('room.force.delete');

  Route::post('/room/restore/{id}', [RoomController::class, 'restore'])->name('room.restore');


  //================================ Admin Route ========================

  Route::get('/admin/index', [AdminAdminController::class, 'index'])->name('admin.index');

  Route::get('/admin/create', [AdminAdminController::class, 'create'])->name('admin.create');

  Route::post('/admin/store', [AdminAdminController::class, 'store'])->name('admin.store');

  Route::get('/admin/edit/{id}', [AdminAdminController::class, 'edit'])->name('admin.edit');

  Route::put('/admin/update/{id}', [AdminAdminController::class, 'update'])->name('admin.update');

  Route::get('/admin/archive', [AdminAdminController::class, 'archive'])->name('admin.archive');

  Route::delete('/admin/softDelete/{id}', [AdminAdminController::class, 'softDelete'])->name('admin.soft.delete');

  Route::delete('/admin/forceDelete/{id}', [AdminAdminController::class, 'forceDelete'])->name('admin.force.delete');

  Route::post('/admin/restore/{id}', [AdminAdminController::class, 'restore'])->name('admin.restore');

  //================================ Complaints Route ========================

  Route::get('/complaint/index', [ComplaintsController::class, 'index'])->name('complaint.index');

  Route::get('/complaint/archive', [ComplaintsController::class, 'archive'])->name('complaint.archive');

  Route::delete('/complaint/softDelete/{id}', [ComplaintsController::class, 'softDelete'])->name('complaint.soft.delete');

  Route::delete('/complaint/forceDelete/{id}', [ComplaintsController::class, 'forceDelete'])->name('complaint.force.delete');

  Route::post('/complaint/restore/{id}', [ComplaintsController::class, 'restore'])->name('complaint.restore');

  //================================ Floor Route ========================

  Route::get('/floor/index', [FloorController::class, 'index'])->name('floor.index');

  Route::get('/floor/create', [FloorController::class, 'create'])->name('floor.create');

  Route::post('/floor/store', [FloorController::class, 'store'])->name('floor.store');

  Route::get('/floor/edit/{id}', [FloorController::class, 'edit'])->name('floor.edit');

  Route::put('/floor/update/{id}', [FloorController::class, 'update'])->name('floor.update');

  Route::get('/floor/archive', [FloorController::class, 'archive'])->name('floor.archive');

  Route::delete('/floor/softDelete/{id}', [FloorController::class, 'softDelete'])->name('floor.soft.delete');

  Route::delete('/floor/forceDelete/{id}', [FloorController::class, 'forceDelete'])->name('floor.force.delete');

  Route::post('/floor/restore/{id}', [FloorController::class, 'restore'])->name('floor.restore');
});
