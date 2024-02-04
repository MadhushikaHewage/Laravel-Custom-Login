<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ForgetPasswordManager;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('welcome');
Route::match(['get', 'post'], '/login', [AuthManager::class, 'login'])->name('login');
Route::match(['get', 'post'], '/registration', [AuthManager::class, 'registration'])->name('registration');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::match(['get', 'post'], '/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forget-password');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'resetPassword'])->name('reset-password');
Route::match(['get', 'post'], '/new-password', [ForgetPasswordManager::class, 'newPassword'])->name('new-password');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', function () {
        return "Hello !";
    })->name('profile');
});
