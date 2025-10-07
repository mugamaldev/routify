<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Dashboard\DashboardController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomepageController::class, 'index'])->name('myhome');
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('users.login');
Route::get('register', [AuthController::class, 'showRegist'])->name('regist');
Route::post('register', [AuthController::class, 'register'])->name('users.regist');
Route::get('courses', function() {
    return view('new');
})->name('newhome');


Route::get('/dashboard', [DashboardController::class, 'index']);/*->middleware('role:admin, instructor');*/
Route::middleware(['auth'])->group(function() {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('/dashboard', [DashboardController::class, 'updateProfile'])->name('profiles.update');
  Route::post('logout', [AuthController::class, 'destroy'])->name('users.logout');
});

Route::get('/courses', [CourseController::class, 'allCourses'])->name('courses.all');