<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function register(Request $request){

        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|max:30',
            'password_confirmation' => 'required',
            'tc' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tc' => json_decode($request->tc),

        ]);

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'message' => "Registeration Done Successfully!",
            'token' => $token,
        ],201);
    }
    public function login(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::where('email',$request->email)->first();

        if($user && Hash::check($request->password,$user->password))
        {
            $token = $user->createToken($request->email)->plainTextToken;
            return response()->json([
                'message' => "login Done Successfully!",
                'token' => $token,
                'user' => $user
            ],201);
        }

        return response()->json([
            'message' => "Wrong Email Or Password!",
        ],201);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => "Logout Done Successfully!",
        ],200);

    }
    public function loggedUser()
    {
        $loggedUser = auth()->user();
        return response()->json([
            'message' => "Logged User Data!",
            'user' => $loggedUser
        ],200);

    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6|max:30',
            'password_confirmation' => 'required',
        ]);
        $loggedUser = auth()->user();
        $loggedUser->password = Hash::make($request->password);
        $loggedUser->save();
        return response()->json([
            'message' => "Password Has Changed Successfully!",
        ],200);

    }
    public function isVerified($id)
    {
        $user = User::find($id);
        if(is_null($user->email_verified_at))
        {
            return false;
        }else{
            return true;
        }
    }
}
