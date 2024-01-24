<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('auth.index');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard.index');
});

Route::middleware(['role:operator'])->prefix('operator')->group(function () {
    Route::get('/', [OperatorController::class, 'index'])->name('admin.operator.index');
});

Route::middleware(['role:user'])->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
});
