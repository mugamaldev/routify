<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('register', [AuthController::class, 'showRegist']);
Route::post('register', [AuthController::class, 'register'])->name('users.regist');
Route::get('courses', function() {
    return view('new');
})->name('newhome');