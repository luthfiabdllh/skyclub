<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SparingController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\FieldScheduleController;
use App\Http\Controllers\auth\SetPasswordController;
use App\Http\Controllers\auth\ForgotPasswordController;


Route::get('/', function () {
    return view('profileUser');
});

//Route Register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Route Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login.index');
Route::post('/login', [LoginController::class, 'authentication'])->middleware('guest')->name('login.authentication');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')->name('forgotPassword.index');
Route::post('/forgot-password', [ForgotPasswordController::class, 'validateData'])->middleware('guest')->name('forgotPassword.validate');
Route::get('/set-password/{id}', [SetPasswordController::class, 'edit'])->middleware('password.forgot')->name('setPassword.edit');
Route::put('/set-password/{id}', [SetPasswordController::class, 'update'])->name('setPassword.update');

// Route Article Admin
Route::prefix('/admin')->middleware('admin')->group(function () {
    Route::resource('/article', ArticleController::class);
});

//Route Article Umum
Route::get('/article', [ArticleController::class, 'userIndex'])->name('article.userIndex');
Route::get('/article/{id}', [ArticleController::class, 'userShow'])->name('article.userShow');

// Field Schedule
Route::get('/field-schedule', [FieldScheduleController::class, 'index']);

//sparring
Route::get('sparing', [SparingController::class, 'index']);
