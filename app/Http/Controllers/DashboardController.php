<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Payment;
use App\Models\Support;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class DashboardController extends Controller
{
    function goToDashboard()
    {
        if(! session()->has('admin')){
            return view('admin.login');
        }
        $users = User::all();
        $courses = Course::all();
        $instructors = Instructor::all();
        $enrollments = Enroll::all();
        $admins = Admin::all();
        $supports = Support::all();
        $payments = Payment::all();

        $data = [
            'registertion_num' => count($users),
            'courses_num' => count($courses),
            'instructors_num' => count($instructors),
            'enrollment_num' => count($enrollments),
            'admin_num' => count($admins),
            'support_num' => count($supports),
            'registertion_num' => count($users),
            'payment_num' => count($payments),

        ];
        return view('admin.dashboard',$data);
    }
}
