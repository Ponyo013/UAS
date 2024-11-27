<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/email/verify', function(){
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

require __DIR__.'/auth.php';

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
});

Route::get('/galeri', function () {
    return view('galeri');
})->name('show.galeri');

