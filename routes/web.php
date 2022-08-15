<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedbackResponseController;
use App\Http\Controllers\GradesAndSchedulesController;
use App\Http\Controllers\StructureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\UserAuthController;
use App\Models\SchoolAnnouncement;
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
    $announs = SchoolAnnouncement::all()->sortByDesc('created_at')->take(5);
    return view('index/index',['announs'=>$announs]);
})->name('home');


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

    //School Announcements Routes
    Route::get('/announcements/add-school-announcement',[AnnouncementsController::class,'addschoolannoun'])->name('announcements.addschool');
    Route::post('/announcements/add-school-announcement',[AnnouncementsController::class,'storeschoolannouncement'])->name('announcements.storeschool');

    Route::get('/main/admin',[StructureController::class,'admin_main'])->name('adminmain');

    Route::get('add/staff',[UserAuthController::class,'page'])->name('addstaff');
    Route::get('add/student',[StudentAuthController::class,'page'])->name('addstudent');

});

Route::middleware('auth.student')->group(function (){

    Route::get('/studentlogout',[StudentAuthController::class, 'logout'])->name('student.logout');
    Route::get('/student-change-password',[StudentAuthController::class, 'ChangePassword'])->name('student.changepassword');
    Route::post('/student-change-password',[StudentAuthController::class, 'HandleChangePassword'])->name('student.handlechangepassword');
    Route::get('/announcements/sections/{id}',[AnnouncementsController::class,'sectionannouncements'])->name('announcements.sections');
    Route::get('/feedback/school',[FeedbackController::class,'sendparentfeedback'])->name('feedback.parentfeedback');
    Route::post('/feedback/school',[FeedbackController::class,'storeparentfeedback'])->name('feedback.storeparentsfeedback');
    Route::get('/feedback/viewschool',[FeedbackController::class,'viewschoolfeedback'])->name('feedback.viewschool');
    Route::post('/feedback/respondtoschool/{id}',[FeedbackResponseController::class,'respondToSchool'])->name('feedback.respondtoschool');
    Route::get('/feedback/myfeedback/student',[FeedbackResponseController::class,'myfeedbackparents'])->name('feedback.myfeedbackparent');
    Route::get('/schedule/view',[GradesAndSchedulesController::class,'ViewSchedule'])->name('schedules.view');
    Route::get('/schedule/{file}/download',[GradesAndSchedulesController::class,'DownloadSchedule'])->name('schedules.download');
    Route::get('/grades',[GradesAndSchedulesController::class,'showgrades'])->name('grades.view');
    Route::get('/staff',[UserAuthController::class,'staffinfo'])->name('viewsatff');
    Route::get('/main/student',[StructureController::class,'student_main'])->name('studentmain');
});

Route::middleware('auth.staff')->group(function (){
    Route::get('/userlogout',[UserAuthController::class, 'logout'])->name('user.logout');
    Route::get('/user-change-password',[UserAuthController::class, 'ChangePassword'])->name('user.changepassword');
    Route::post('/user-change-password',[UserAuthController::class, 'HandleChangePassword'])->name('user.handlechangepassword');
    Route::get('/sections',[AnnouncementsController::class,'viewsections'])->name('sections.view');
    Route::get('/section/{id}/announcement',[AnnouncementsController::class,'addsectionannoun'])->name('sections.announcement');
    Route::post('/section/{id}/announcement',[AnnouncementsController::class,'storesectionannouncements'])->name('sections.storeannouncement');
    Route::get('/students/download',[StructureController::class,'studentsexport']);
    Route::get('/feedback/students',[FeedbackController::class,'viewstudents'])->name('feedback.students');
    Route::get('/feedback/students/{id}',[FeedbackController::class,'sendstafffeedback'])->name('feedback.schoolfeedback');
    Route::post('/feedback/students/{id}',[FeedbackController::class,'storestafffeedback'])->name('feedback.storeschoolfeedback');
    Route::get('/feedback/viewparents',[FeedbackController::class,'viewparentsfeedback'])->name('feedback.viewparents');
    Route::post('/feedback/respondtoparent/{id}',[FeedbackResponseController::class,'respondToParent'])->name('feedback.respondtoparent');
    Route::get('/feedback/myfeedback',[FeedbackResponseController::class,'myfeedbackstaff'])->name('feedback.myfeedbackstaff');
    Route::get('/schedule',[GradesAndSchedulesController::class,'addschedule'])->name('schedules.add');
    Route::post('/schedule/{section}',[GradesAndSchedulesController::class,'StoreSchedule'])->name('schedules.store');
    Route::get('/grades/sections',[GradesAndSchedulesController::class,'showsections'])->name('grades.sections');
    Route::post('/grades/{subject}',[GradesAndSchedulesController::class,'setgrades'])->name('grades.store');
    Route::get('/main/guide',[StructureController::class,'guide_main'])->name('guidemain');
    Route::get('/main/teacher',[StructureController::class,'teacher_main'])->name('teachermain');
});

Route::get('/userlogin',[UserAuthController::class, 'login'])->name('user.login');
Route::post('/userlogin',[UserAuthController::class, 'HandleLogin'])->name('user.Handlelogin');

Route::get('/studentlogin',[StudentAuthController::class, 'login'])->name('student.login');
Route::post('/studentlogin',[StudentAuthController::class, 'Handlelogin'])->name('student.Handlelogin');
Route::get('/announcements/school',[AnnouncementsController::class,'schoolannouncements'])->name('announcements.school');



