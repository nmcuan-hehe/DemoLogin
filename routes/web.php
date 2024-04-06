<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;



Route::get('login', [CustomAuthController::class, 'toLogin'])->name('login');
Route::get('register', [CustomAuthController::class, 'toRegister'])->name('register');
Route::post('register', [CustomAuthController::class, 'createUser'])->name('user.createUser');
Route::post('login', [CustomAuthController::class, 'checkUser'])->name('user.checkUser');
Route::get('home', [CustomAuthController::class, 'listUser']);
Route::get('/', function () {
    return view('auth.login');
});