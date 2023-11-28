<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DataCourseController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\VideoController;
use App\Models\Data_course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PaypalController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public Routes
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/send-reset-password-email',[PasswordResetController::class,'sendResetPasswordEmail']);
Route::post('/reset-password/{token}',[PasswordResetController::class,'reset']);
Route::get('data-course/{id}',[DataCourseController::class,'getCourseData']);
Route::controller(CourseController::class)->group(function(){
    Route::get('courses/{id?}','getCourse');
});

// Protected Routes

Route::middleware('auth:sanctum')->group(function(){
    // User Routes
    Route::controller(UserController::class)->group(function(){
        Route::post('logout','logout');
        Route::get('logged-user','loggedUser');
        Route::post('change-password','changePassword');

    });
    Route::controller(VerifyEmailController::class)->group(function(){
        Route::post('verification-email','SendVerificationEmail');
        Route::post('verify-account/{code}','verify');

    });


    // Categories Routes
    Route::controller(CategoryController::class)->group(function(){
        Route::get('categories/{id?}','getAllCategories');

    });

    // Instructor Routes
    Route::controller(InstructorController::class)->group(function(){
        Route::get('instructors/{id?}','getInstructor');
    });
    // Data Course Routes
    Route::controller(DataCourseController::class)->group(function(){
        Route::get('get-courses-data/{id?}','getData_course');
    });
    // Course Routes
    Route::controller(CourseController::class)->group(function(){
        Route::get('courses/{id?}','getCourse');
    });
    // Chapter Routes
    Route::controller(ChapterController::class)->group(function(){
        Route::get('chapter/{id?}','getChapter');

    });

    // Lesson Routes
    Route::controller(LessonController::class)->group(function(){
        Route::get('lessons/{id?}','gteLesson');
        Route::get('get-lessons/{chapter_id}','getLessonByChapterId');

    });

    // File Routes
    Route::controller(FileController::class)->group(function(){
        Route::get('fileDownload/{id}','downloadFile');
    });

    // Video Routes
    Route::controller(VideoController::class)->group(function(){

    });

    // Payment Routes


    Route::get('payment/{userId}/{courseId}/{amount}',[PayPalController::class, 'payment'])->name('payment');
    Route::get('cancel',[PapyalController::class, 'cancel'])->name('payment.cancel');
    Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');



    // Course Routes


    // Course Routes

});
