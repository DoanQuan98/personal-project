<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('auth.showFormLogin');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('register', [AuthController::class, 'showFormRegister'])->name('auth.showFormRegister');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');



Route::middleware(['auth', 'checkAdmin'])->prefix('admin')->group(function () {
    Route::get('user-list', [UserController::class, 'getAllUser'])->name('user.index');
    Route::get('{id}/delete', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::get('/search', [UserController::class, 'searchUser'])->name('user.search');
});
