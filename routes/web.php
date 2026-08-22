<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin/dashboard', [AdminController::class, 'index']);

//user route
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
Route::get('/user/add', [UserController::class, 'add'])->name('user.add');