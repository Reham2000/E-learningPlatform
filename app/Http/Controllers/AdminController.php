<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email',$request->email)->first();

        if($admin && Hash::check($request->password,$admin->password))
        {
            $token = $admin->createToken($request->email)->plainTextToken;
            $data = [
                'message' => "login Done Successfully!",
                'token' => $token,
                'admin' => $admin
            ];

            session_start();
            $_SESSION['admin'] = $admin;
            $_SESSION['token'] = $token;

            return view('admin.dashboard',$data);
        }

        return $data = [
            'message' => "Wrong Email Or Password!",
        ];
    }


    public function adminLogin (Request $request)
    {
        $data = $request->input();
        $request->session()->put('admin',$data['email']);
        return redirect('dashboard');
    }
    function isLogin()
    {
        if(session()->has('admin')){
            return redirect('dashboard');
        }
        return view('admin.login');
    }
    public function adminLogout()
    {
        $this->adminAuth();
        if(session()->has('admin')){
            session()->pull('admin');
        }
        return redirect('/');
    }
    function add_admin ()
    {
        return view('admin.add-admin');
    }
    function addAdmin()
    {
        return view('admin.add');
    }
    function create(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:2|max:60',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|max:30|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required',
        ]);

        $admin = Admin::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' =>$request->role,
        ]);
        $admins = Admin::all();
        if ($request->role == 1) {
            return view('admin.admins',compact('admins'));
        }else{
            return view('instructor.instructors',compact('admins'));
        }
    }

    function edite($id)
    {
        $admin = Admin::find($id);
        return view('admin.edite',compact('admin'));
    }
    function update(Request $request,$id)
    {
        $request->validate([
            'fullname' => 'required|min:2|max:60',
            'password' => 'required|min:6|max:30|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required',
        ]);

        $admin = Admin::find($id);
        $admin->fullname = $request->fullname;
        $admin->password = Hash::make($request->password) ;
        $admin->role = $request->role;
        $admin->save();


        $admins = Admin::all();
        if ($request->role == 1) {
            return view('admin.admins',compact('admins'));
        }else{
            return view('instructor.instructors',compact('admins'));
        }
    }
    function deleteAdmin(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:2|max:60',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|max:30|confirmed',
            'password_confirmation' => 'required'
        ]);
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        return view('admin.admins');
    }
    function getAdmins()
    {
        $admins = Admin::all();
        return view('admin.admins',compact('admins'));
    }
    function getInstruct()
    {
        $admins = Admin::all();
        return view('instructor.instructors',compact('admins'));
    }


}
