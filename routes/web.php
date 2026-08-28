<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

//user route
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
Route::get('/user/add', [UserController::class, 'add'])->name('user.add');
Route::post('simpan-user', [UserController::class, 'simpan'])->name('simpan-user');

//Dept route
Route::get('/dept/dashboard', [DeptController::class, 'index'])->name('dept.dashboard');
Route::get('/dept/add', [DeptController::class, 'add'])->name('dept.add');
Route::post('simpan-dept', [DeptController::class, 'simpan'])->name('simpan-dept');
Route::get('edit-dept/{id}', [DeptController::class, 'edit'])->name('dept.edit');
Route::put('update-dept/{id}', [DeptController::class, 'update'])->name('dept.update');
Route::delete('hapus/dept/{id}', [DeptController::class, 'hapus'])->name('dept.delete');

//Role route
Route::get('/role/dashboard', [RoleController::class, 'index'])->name('role.dashboard');
Route::get('/role/add', [RoleController::class, 'add'])->name('role.add');
Route::post('simpan-role', [RoleController::class, 'simpan'])->name('simpan-role');
Route::get('edit-role/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::put('update-role/{id}', [RoleController::class, 'update'])->name('role.update');
Route::delete('hapus/role/{id}', [RoleController::class, 'hapus'])->name('role.delete');