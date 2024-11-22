<?php

use App\Http\Controllers\admin\AdminController;
use App\Models\Booking;
use App\Http\Controllers\admin\fieldConfiguration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SparingController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\FieldScheduleController;
use App\Http\Controllers\auth\SetPasswordController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\ListBookingController;
use App\Http\Controllers\NotificationController;
use App\Models\ListBooking;
use Illuminate\Notifications\Notification;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/try', function () {
    return view('articles.articledetail');
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
Route::post('/field-schedule', [FieldScheduleController::class, 'scheduleValidate'])->middleware('auth')->name('schedule.scheduleValidate');
Route::get('/field-schedule/reschedule/{list_booking}', [FieldScheduleController::class, 'reschedule'])->name('schedule.reschedule');
Route::post('/field-schedule/reschedule/{list_booking}', [FieldScheduleController::class, 'rescheduleValidate'])->name('schedule.rescheduleValidate');
Route::post('/field-schedule/cancel/{list_booking}', [ListBookingController::class, 'cancel'])->name('schedule.cancel');

// Booking & Pembayaran
Route::get('/payment', [BookingController::class, 'payment'])->name('booking.payment');
Route::post('/payment', [BookingController::class, 'store'])->name('booking.store');
Route::get('/payment/uploud', [BookingController::class, 'paymentUploud'])->name('booking.paymentUploud');
Route::put('/payment/uploud', [BookingController::class, 'paymentUploudValidate'])->name('booking.paymentUploudValidate');
Route::get('/payment/success', [BookingController::class, 'paymentSuccess'])->name('booking.paymentSuccess');
Route::get('/payment/image/{filename}', [FileController::class, 'getPaymentUploud'])->name('booking.paymentImage');

//sparring
Route::get('/sparing', [SparingController::class, 'index'])->name('sparing.index');
Route::post('/sparing', [SparingController::class, 'store'])->name('sparing.store');
Route::post('/sparing/request/{sparing}', [SparingController::class, 'addRequest'])->name('sparing.request');
Route::put('/sparing/accept/{sparing_req}', [SparingController::class, 'acceptRequest'])->name('sparing.accept');
Route::put('/sparing/reject/{sparing_req}', [SparingController::class, 'rejectRequest'])->name('sparing.reject');

// rating
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

// profile
Route::get('/profile-user', [ProfileUserController::class, 'index'])->name('profile.show');

// Notification
Route::get('/notification', [NotificationController::class, 'index'])->name('notication.index');

// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// field photo
Route::get('/admin-field-photo', [fieldConfiguration::class, 'fieldPhoto'])->name('field.photo');
Route::get('/admin-field-description', [fieldConfiguration::class, 'fieldDescription'])->name('field.description');
Route::get('/admin-field-fasility', [fieldConfiguration::class, 'fieldFasility'])->name('field.fasility');

Route::post('/upload-image-slider', [fieldConfiguration::class, 'uploadSlider'])->name('upload.slider');
Route::post('/upload-image-banner', [fieldConfiguration::class, 'uploadBanner'])->name('upload.banner');
Route::post('/upload-image-image', [fieldConfiguration::class, 'uploadImage'])->name('upload.image');
Route::delete('/delete-image/{id}', [fieldConfiguration::class, 'deleteImage'])->name('delete.image');
Route::post('/update-description', [fieldConfiguration::class, 'updateDescription']);
Route::post('/update-facilities',[FieldConfiguration::class, 'updateFasility'])->name('facilities.update');
