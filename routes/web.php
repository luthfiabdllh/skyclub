<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SparingController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\FieldScheduleController;
use App\Http\Controllers\auth\SetPasswordController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileUserController;
use App\Models\Booking;

Route::get('/', function () {
    return view('index');
});

//Route Register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Route Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
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

// Field Schedule (halaman pilih jadwal untuk dipesan)
Route::get('/field-schedule', [FieldScheduleController::class, 'index'])->name('schedule.index');
Route::post('field-schedule', [FieldScheduleController::class, 'scheduleValidate'])->middleware('auth')->name('schedule.scheduleValidate');

// Booking & Pembayaran
Route::get('/payment', [BookingController::class, 'payment'])->name('booking.payment');
Route::post('/payment', [BookingController::class, 'store'])->name('booking.store');
Route::get('/payment/uploud', [BookingController::class, 'paymentUploud'])->name('booking.paymentUploud');
Route::put('/payment/uploud', [BookingController::class, 'paymentUploudValidate'])->name('booking.paymentUploudValidate');
Route::get('/payment/success', [BookingController::class, 'paymentSuccess'])->name('booking.paymentSuccess');

//sparring
Route::get('/sparing', [SparingController::class, 'index'])->name('sparing.index');
// Route::get('/profile', [ProfileUserController::class, 'show'])->name('sparing.index');

// profile
Route::get('/profile-user/{id}', [ProfileUserController::class, 'show'])->name('profile.show');


////////////////////////////////////////////////////////////
Route::get('/notification', function () {
    return view('profiles.notifikasi');
});
Route::get('/profile-user', function () {
    return view('profiles.profile');
});
Route::get('/profile', function () {
    return view('profiles.profile');
});
// Route::get('/detail-bayar', function () {
//     return view('detailPembayaran');
// });
// Route::get('/bukti-bayar', function () {
//     return view('buktiPembayaran');
// });
// Route::get('/sparing', function () {
//     return view('sparing');
// });
// Route::get('/bayar-berhasil', function () {
//     return view('pembayaranBerhasil');
// });
///////////////////////////////////////////////////////////
