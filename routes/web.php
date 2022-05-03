<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\UserAuthController;

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

Route::get('/', function () {
    return view('register');
});

Route::post('/userregister',[UserAuthController::class, 'register'])->name('user.register');
Route::post('/studentregister',[StudentAuthController::class, 'register'])->name('student.register');

Route::get('/userlogin',[UserAuthController::class, 'login'])->name('user.login');
Route::post('/userlogin',[UserAuthController::class, 'HandleLogin'])->name('user.Handlelogin');
Route::get('/userlogout',[UserAuthController::class, 'logout'])->name('user.logout');

Route::get('/studentlogin',[StudentAuthController::class, 'login'])->name('student.login');
Route::post('/studentlogin',[StudentAuthController::class, 'Handlelogin'])->name('student.Handlelogin');
Route::get('/studentlogout',[StudentAuthController::class, 'logout'])->name('student.logout');

Route::get('/student-change-password',[StudentAuthController::class, 'ChangePassword'])->name('student.changepassword');
Route::get('/user-change-password',[UserAuthController::class, 'ChangePassword'])->name('user.changepassword');

Route::post('/student-change-password',[StudentAuthController::class, 'HandleChangePassword'])->name('student.handlechangepassword');
Route::post('/user-change-password',[UserAuthController::class, 'HandleChangePassword'])->name('user.handlechangepassword');
Route::post('/admin-change-password',[UserAuthController::class, 'HandleAdminChangePassword'])->name('user.handleadminchangepassword');
