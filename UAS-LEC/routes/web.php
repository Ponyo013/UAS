<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\kalenderController;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome');



Route::get('/donasi', [DonasiController::class, 'donasiGuest'])->name('donasi');
Route::get('/newsletter', [NewsletterController::class, 'newsGuest'])->name('newsletter');
Route::get('/kalender', [kalenderController::class, 'kalenderGuest'])->name('kalender');
Route::get('/aktivitas', [ActivityController::class, 'aktivitasGuest'])->name('aktivitas');
Route::view('/aboutus', 'aboutus')->name('aboutus');


Route::get('/newsletter/{id}', [NewsletterController::class, 'show'])->name('newsletter.showEach');
Route::get('/aktivitas/{id}', [ActivityController::class, 'show'])->name('aktivitas.showEach');

Route::middleware('auth', 'CheckUserRole')->group(function () {
    Route::get('/profile/admin', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/guest', [ProfileController::class, 'editGuest'])->name('profile.editGuest');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::post('/donasi/store', [DonasiController::class, 'store'])->name('donasi.store');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__ . '/auth.php';

// Admin Side
Route::middleware('auth', 'CheckUserRole', 'verified')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    // Manage user
    Route::get('/dashboard/ManageUSer', [UserController::class, 'show'])->name('ManageUser');
    Route::put('/dashboard/ManageUser/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/dashboard/ManageUser/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Newsletter
    Route::get('/dashboard/newsletter', [NewsletterController::class, 'index'])->name('show.newsletter');
    Route::post('/dashboard/newsletters/store', [NewsletterController::class, 'store'])->name('newsletters.store');
    Route::put('/dashboard/newsletters/update/{id}', [NewsletterController::class, 'update'])->name('newsletters.update');
    Route::delete('/dashboard/newsletters/delete/{id}', [NewsletterController::class, 'destroy'])->name('newsletters.destroy');

    // Aktivitas Terakhir
    Route::get('/dashboard/aktivitas', [ActivityController::class, 'index'])->name('show.aktivitas');
    Route::post('/dashboard/aktivitas/store', [ActivityController::class, 'store'])->name('aktivitas.store');
    Route::delete('/dashboard/aktivitas/delete/{id}', [ActivityController::class, 'destroy'])->name('aktivitas.destroy');
    Route::put('/dashboard/aktivitas/update/{id}', [ActivityController::class, 'update'])->name('aktivitas.update');

    // Galeri
    Route::get('/dashboard/galeri', [GaleriController::class, 'index'])->name('show.galeri');
    Route::post('/dashboard/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::delete('/dashboard/galeri/delete/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    // Kalender
    Route::get('/dashboard/kalender', [kalenderController::class, 'index'])->name('show.kalender');
    Route::post('/dashboard/kalender/store', [kalenderController::class, 'store'])->name('kalender.store');
    Route::patch('/dashboard/kalender/update/{id}', [kalenderController::class, 'update'])->name('kalender.update');
    Route::delete('/dashboard/kalender/destroy/{id}', [kalenderController::class, 'destroy'])->name('kalender.destroy');
    // List Donasi
    Route::get('/dashboard/donasi', [DonasiController::class, 'index'])->name('show.donasi');
    Route::post('/dashboard/donasi/create', [DonasiController::class, 'create'])->name('donasi.create');
    Route::delete('/dashboard/donasi/delete/{id}', [DonasiController::class, 'destroy'])->name('donasi.destroy');
    Route::put('/dashboard/donasi/update/{id}', [DonasiController::class, 'update'])->name('donasi.update');
});

Route::get('/galeriGuess', [GaleriController::class, 'indexGuess'])->name('show.galeriGuess');
