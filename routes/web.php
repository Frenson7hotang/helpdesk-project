<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin/dashboard', [AdminController::class, 'index']);

//user route
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
Route::get('/user/add', [UserController::class, 'add'])->name('user.add');

//Dept route
Route::get('/dept/dashboard', [DeptController::class, 'index'])->name('dept.dashboard');
Route::get('/dept/add', [DeptController::class, 'add'])->name('dept.add');

//Role route
Route::get('/role/dashboard', [RoleController::class, 'index'])->name('role.dashboard');
Route::get('/role/add', [RoleController::class, 'add'])->name('role.add');
Route::post('simpan-role', [RoleController::class, 'simpan'])->name('simpan-role');