<?php

use App\Http\Controllers\AnnouncementsController;
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

    //Structure Routes
    //Structure Main Route
    Route::get('/structure',[StructureController::class, 'main'])->name('structure.main');

    //Structure Class Routes
    Route::get('/structure/classes',[StructureController::class,'SClass'])->name('structure.classes');
    Route::post('/structure/classes',[StructureController::class,'storeclass'])->name('structure.storeclass');
    Route::get('/structure/deleteclass/{id}',[StructureController::class, 'deleteclass'])->name('structure.deleteclass');

    //Structure Section Routes
    Route::get('/structure/sections',[StructureController::class,'section'])->name('structure.sections');
    Route::post('/structure/sections',[StructureController::class,'storesection'])->name('structure.storesection');
    Route::get('/structure/deletesection/{id}',[StructureController::class, 'deletesection'])->name('structure.deletesection');

    //Structure Subjects Routes
    Route::get('/structure/subjects',[StructureController::class,'subject'])->name('structure.subjects');
    Route::post('/structure/subjects',[StructureController::class,'storesubject'])->name('structure.storesubject');
    Route::get('/structure/deletesubject/{id}',[StructureController::class,'deletesubject'])->name('structure.deletesubject');

    //Structure Subject Teachers Routs
    Route::get('/structure/teachers',[StructureController::class,'teachers'])->name('structure.teachers');
    Route::get('/structure/teachers/{id}/subjects',[StructureController::class,'subject_teacher'])->name('structure.teachers.subjects');
    Route::get('/structure/teachers/{id}/subjects/{section}/{subject}',[StructureController::class,'storesubject_teacher'])->name('structure.teachers.storesubjectteacher');
    Route::get('/structure/teachers/{id}/subjects/{section}/{subject}/delete',[StructureController::class,'deletesubject_teacher'])->name('structure.teachers.deletesubjectteacher');

    //Structure Section Guide Routes
    Route::get('/structure/guides',[StructureController::class,'guides'])->name('structure.guides');
    Route::get('/structure/guides/{id}/sections',[StructureController::class,'section_guide'])->name('structure.guide.sections');
    Route::get('/structure/guides/{id}/sections/{section}',[StructureController::class,'storesection_guide'])->name('structure.guide.storesectionguide');
    Route::get('/structure/guides/{id}/sections/{section}/delete',[StructureController::class,'deletesection_guide'])->name('structure.guide.deletesectionguide');

    //Structure Students Sort Routes
    Route::get('/structure/students',[StructureController::class,'showsort'])->name('structure.students');
    Route::post('/structure/students/sort',[StructureController::class,'sortstudents'])->name('students.sort');

    Route::get('/announcements/add-school-announcement',[AnnouncementsController::class,'addschoolannoun'])->name('announcements.addschool');
    Route::post('/announcements/add-school-announcement',[AnnouncementsController::class,'storeschoolannouncement'])->name('announcements.storeschool');

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
Route::get('/students/download',[StructureController::class,'studentsexport']);
Route::get('/announcements/school',[AnnouncementsController::class,'schoolannouncements'])->name('announcements.school');



