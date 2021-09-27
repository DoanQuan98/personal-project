<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
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
Route::get('search', [HomeController::class, 'getSearch']);
Route::post('search/name', [HomeController::class, 'getSearchAjax'])->name('search');

Route::get('/', [AuthController::class, 'showFormLogin'])->name('auth.showFormLogin');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('register', [AuthController::class, 'showFormRegister'])->name('auth.showFormRegister');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('blog/{id}', [BlogController::class, 'showFormBlog'])->name('blog');

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [SocialController::class, 'callback']);

Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('post/delete/{id}', [HomeController::class, 'destroy'])->name('delete.post');

    Route::get('post', [PostController::class, 'showFormPost']);
    Route::post('post', [PostController::class, 'post'])->name('auth.post');

    Route::get('profile', [ProfileController::class, 'showFormProfile'])->name('auth.profile');
    Route::post('profile', [ProfileController::class, 'update']);
    Route::get('change-password', [ProfileController::class, 'showFormChangePassword'])->name('auth.change-password');
    Route::post('change-password', [ProfileController::class, 'changePassword']);

    Route::post('/comment', [CommentController::class, 'comment'])->name('status.comment');
    Route::get('/status/{id}', [CommentController::class, 'index'])->name('commentByPost');
    Route::get('/delete/{id}', [CommentController::class, 'delete'])->name('comment.destroy');
});

Route::middleware(['auth', 'checkAdmin'])->prefix('admin')->group(function () {
    Route::get('user-list', [UserController::class, 'getAllUser'])->name('user.index');
    Route::get('{id}/deleteUser', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::get('/search', [UserController::class, 'searchUser'])->name('user.search');

    Route::get('post-list', [UserController::class, 'getAll'])->name('post.index');
    Route::get('{id}/delete', [UserController::class, 'deletePost'])->name('post.delete');

    Route::get('/search-post', [UserController::class, 'searchPost'])->name('post.search');
});
