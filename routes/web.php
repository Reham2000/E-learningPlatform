<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;

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
    return view('admin.login');
});

// payments for user
Route::get('payment/{userId}/{courseId}/{amount}',[PayPalController::class, 'payment'])->name('payment');
Route::get('cancel',[PapyalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');



Route::post('/',[AdminController::class,'login'])->name('admin.login');
Route::get('/login',[AdminController::class,'isLogin']);
Route::get('/',[AdminController::class,'isLogin']);
Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout');


Route::get('/dashboard',[DashboardController::class,'goToDashboard'])->name('admin.dashboard');

// adminsRoutes
Route::controller(AdminController::class)->group(function(){
    Route::get('admin/admins','getAdmins')->name('admin.admins');
    Route::get('instructor/instructors','getInstruct')->name('instructor.instructors');

    Route::get('admin/add','addAdmin')->name('admin.add');
    Route::post('admin/create','create')->name('admin.create');

    Route::get('admin/edite/{id}','edite')->name('admin.edite');
    Route::post('admin/update/{id}','update')->name('admin.update');
    Route::get('admin/block/{id}','block')->name('admin.block');

});
Route::controller(UserController::class)->group(function(){
    Route::get('admin/users','getUsers')->name('admin.users');
    Route::get('user/block/{id}','block')->name('user.block');
});

Route::controller(InstructorController::class)->group(function(){
    Route::get('instructor/edite/{id}','edite')->name('instructor.edite');
    Route::post('instructor/update/{id}','update')->name('instructor.update');
    Route::get('instructors/myCourses','getMyCourses')->name('instructor.courses');
    Route::get('instructors/courseData/{id}','myCourseData')->name('instructor.courseData');

});
Route::controller(LessonController::class)->group(function(){
    Route::get('lesson/add/{id}','add')->name('lesson.add');
    Route::post('lesson/create/{id}','create')->name('lesson.ceate');

    Route::get('lesson/lesson/{id}','shoawLesson')->name('lesson.lesson');
    Route::post('lesson/create/{id}','create')->name('lesson.create');
    Route::get('lesson/back/{id}','back')->name('lesson.back');

});
Route::controller(ChapterController::class)->group(function(){
    Route::get('chapter/add/{id}','add')->name('chapter.add');
    Route::post('chapter/create/{id}','create')->name('chapter.create');

});
Route::controller(CourseController::class)->group(function(){
    Route::get('course/add/{id}','add')->name('course.add');
    Route::post('course/create/{id}','create')->name('course.create');
    Route::get('courses/courses','getCourses')->name('course.courses');
    Route::get('courses/block/{id}','block')->name('courses.block');

});
Route::controller(CategoryController::class)->group(function(){
    Route::get('category/add/{id}','add')->name('category.add');
    Route::post('category/create/{id}','create')->name('category.create');
    Route::get('category/categories','getCategories')->name('category.categories');
    Route::get('category/edite/{id}','edite')->name('category.edite');
    Route::post('category/update/{id}','update')->name('category.update');
    Route::get('category/delete/{id}','delete')->name('category.delete');


});
Route::controller(PayPalController::class)->group(function(){
    Route::get('admin/payments','getPayments')->name('admin.payments');
    Route::get('user/block/{id}','block')->name('user.block');
});
Route::controller(SupportController::class)->group(function(){
    Route::get('support/supports','getSupports')->name('support.supports');
    Route::get('support/add/{id}','add')->name('support.add');
    Route::post('support/answer/{id}','answer')->name('support.answer');

});

    // Route::get('instructors',[DashboardController::class,'goToDashboard'])->name('admin.instructors');
    // Route::get('courses',[DashboardController::class,'goToDashboard'])->name('admin.courses');
    Route::get('enrollment',[DashboardController::class,'goToDashboard'])->name('admin.enrollment');
    // Route::get('support',[DashboardController::class,'goToDashboard'])->name('admin.support');
    // Route::get('payments',[DashboardController::class,'goToDashboard'])->name('admin.payments');




