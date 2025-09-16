<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomepageController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomepageController::class, 'index']);
Route::get('register', [AuthController::class, 'showRegist']);
Route::post('register', [AuthController::class, 'register'])->name('users.regist');
Route::get('courses', function() {
    return view('new');
})->name('newhome');