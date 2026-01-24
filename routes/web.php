<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Front Pages
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/services', [ServicesController::class, 'services'])->name('services');

/*
|--------------------------------------------------------------------------
| Service Detail Page (USED IN INDEX)
|--------------------------------------------------------------------------
*/
Route::get('/service/{slug}', [ServicesController::class, 'detail'])
    ->name('service.detail');

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Quote Request (USED IN INDEX FORM)
|--------------------------------------------------------------------------
*/
Route::post('/request-quote', [HomeController::class, 'requestQuote'])
    ->name('quote.request');

/*

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'registerForm'])->name('user.register');
Route::post('/user/register', [AuthController::class, 'register'])->name('user.register.post');

Route::get('/login', [AuthController::class, 'loginForm'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'login'])->name('user.login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->name('user.dashboard')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Email Verification
|--------------------------------------------------------------------------
*/
Route::get('/verify-user/{email}', [AuthController::class, 'verifyUser'])->name('verify.user');


/*
|--------------------------------------------------------------------------
| Newsletter
|--------------------------------------------------------------------------
*/
Route::post('/newsletter/subscribe', [HomeController::class, 'subscribeNewsletter'])
    ->name('newsletter.subscribe');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
