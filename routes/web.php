<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\StudentController;
use App\Http\Controllers\Auth\AttendenceController;
use App\Http\Controllers\AdminController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('auth.login');
    return view('home');
});

//Auth::routes();
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('register', [RegisterController::class,'create'])->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.store');

Route::resource('department', 'App\Http\Controllers\DepartmentController');
Route::resource('Students','App\Http\Controllers\StudentController');

Route::resource('attendence','App\Http\Controllers\AttendenceController');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/departments', function () {
    return view('department.index');
});

use App\Http\Controllers\StudentRegistrationController;

Route::get('/student/attendance', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('student.dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/student/attendance', [App\Http\Controllers\StudentController::class, 'attendance'])->name('student.attendance');
});