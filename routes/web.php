<?php

use App\Http\Controllers\StructureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\UserAuthController;
use Nette\Schema\Elements\Structure;

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


Route::middleware('auth.admin')->group(function (){

    Route::post('/userregister',[UserAuthController::class, 'register'])->name('user.register');
    Route::post('/studentregister',[StudentAuthController::class, 'register'])->name('student.register');
    Route::post('/admin-change-password',[UserAuthController::class, 'HandleAdminChangePassword'])->name('user.handleadminchangepassword');
    Route::get('/structure',[StructureController::class, 'main'])->name('structure.main');
    Route::get('/structure/classes',[StructureController::class,'SClass'])->name('structure.classes');
    Route::post('/structure/classes',[StructureController::class,'storeclass'])->name('structure.storeclass');
    Route::get('/structure/sections',[StructureController::class,'section'])->name('structure.sections');
    Route::post('/structure/sections',[StructureController::class,'storesection'])->name('structure.storesection');
    Route::get('/structure/deleteclass/{id}',[StructureController::class, 'deleteclass'])->name('structure.deleteclass');
    Route::get('/structure/deletesection/{id}',[StructureController::class, 'deletesection'])->name('structure.deletesection');
    Route::get('/structure/subjects',[StructureController::class,'subject'])->name('structure.subjects');
    Route::post('/structure/subjects',[StructureController::class,'storesubject'])->name('structure.storesubject');
    Route::get('/structure/deletesubject/{id}',[StructureController::class,'deletesubject'])->name('structure.deletesubject');
});

Route::middleware('auth.student')->group(function (){

    Route::get('/studentlogout',[StudentAuthController::class, 'logout'])->name('student.logout');
    Route::get('/student-change-password',[StudentAuthController::class, 'ChangePassword'])->name('student.changepassword');
    Route::post('/student-change-password',[StudentAuthController::class, 'HandleChangePassword'])->name('student.handlechangepassword');
});

Route::middleware('auth.staff')->group(function (){
    Route::get('/userlogout',[UserAuthController::class, 'logout'])->name('user.logout');
    Route::get('/user-change-password',[UserAuthController::class, 'ChangePassword'])->name('user.changepassword');
    Route::post('/user-change-password',[UserAuthController::class, 'HandleChangePassword'])->name('user.handlechangepassword');
});

Route::get('/userlogin',[UserAuthController::class, 'login'])->name('user.login');
Route::post('/userlogin',[UserAuthController::class, 'HandleLogin'])->name('user.Handlelogin');

Route::get('/studentlogin',[StudentAuthController::class, 'login'])->name('student.login');
Route::post('/studentlogin',[StudentAuthController::class, 'Handlelogin'])->name('student.Handlelogin');



