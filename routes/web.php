<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [LoginController::class, 'index']);
Route::get('/registration', [RegistrationController::class, 'index']);
Route::post('/registration', [RegistrationController::class, 'store']);

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');



Route::get('/dashboard/posts/check-slug', [PostController::class, 'checkSlug']);

Route::resource('/dashboard/posts', DashboardPostController::class);
