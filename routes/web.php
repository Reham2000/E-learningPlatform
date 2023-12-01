<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;

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



Route::post('/',[AdminController::class,'adminLogin'])->name('admin.login');
Route::get('/login',[AdminController::class,'isLogin']);
Route::get('/',[AdminController::class,'isLogin']);
Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout');


Route::get('/dashboard',[DashboardController::class,'goToDashboard'])->name('admin.dashboard');

// adminsRoutes
Route::controller(AdminController::class)->group(function(){
    Route::get('admin/admins','getAdmins')->name('admin.admins');
    Route::get('instructor/instructors','getInstruct')->name('instructor.instructors');
    // Route::get('admin/add-admin','add_admin')->name('admin.addAdmin');
    // Route::post('admin/add-admin','create')->name('admin.add');
    Route::get('admin/delete-admin','deleteAdmin')->name('admin.delete');


    Route::get('admin/add','addAdmin')->name('admin.add');
    Route::post('admin/create','create')->name('admin.create');

    Route::get('admin/edite/{id}','edite')->name('admin.edite');
    Route::post('admin/update/{id}','update')->name('admin.update');

});
    Route::get('users',[DashboardController::class,'goToDashboard'])->name('admin.users');
    Route::get('instructors',[DashboardController::class,'goToDashboard'])->name('admin.instructors');
    Route::get('courses',[DashboardController::class,'goToDashboard'])->name('admin.courses');
    Route::get('enrollment',[DashboardController::class,'goToDashboard'])->name('admin.enrollment');
    Route::get('support',[DashboardController::class,'goToDashboard'])->name('admin.support');
    Route::get('payments',[DashboardController::class,'goToDashboard'])->name('admin.payments');




