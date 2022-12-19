<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontpageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Logincontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login
Route::get('/', [LoginController::class, 'index'])->name('index');

// registration
Route::get('/registration', [FrontpageController::class, 'index'])->name('frontpage.index');
Route::get('/student', [StudentController::class, 'index'])->name('student.index');

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/topics', [DashboardController::class, 'topics'])->name('dashboard.topics');
Route::get('/dashboard/student', [DashboardController::class, 'student'])->name('dashboard.student');

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
