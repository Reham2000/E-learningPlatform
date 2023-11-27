<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\PasswordReset;
use App\Models\User;

class PasswordResetController extends Controller
{
    public function sendResetPasswordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $email= $request->email;
        // Generate Token
        $token = Str::random(60);

        // Saving data to password_reset table
        PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('reset',['token' => $token],function(Message $message) use ($email){
            $message->subject('Reset Your Password');
            $message->to($email);

        });

        return response()->json([
            'message' => "Password Reset Email Was Sent.... Check Your Email ",
        ],200);
    }

    public function reset(Request $request,$token)
    {
        // delete token after 10 minutes

        $formatted = Carbon::now()->subMinutes(10)->toDateTimeString();
        PasswordReset::where('created_at','<=',$formatted)->delete();

        $request->validate([
            'password' => 'required|confirmed|min:6|max:30',
            'password_confirmation' => 'required'
        ]);

        $passwordReset = PasswordReset::where('token',$token)->first();
        if(! $passwordReset)
        {
            return response()->json([
                'message' => "Token is Invalid or Expired",
            ],404);
        }
        // set new password
        $user = User::where('email',$passwordReset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        // Delete token after resetpassword
        PasswordReset::where('email',$user->email)->delete();
        return response()->json([
            'message' => "Password Reset Successfully",
        ],200);
    }
}
