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

class VerifyEmailController extends Controller
{
    public function SendVerificationEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $email= $request->email;
        $user = User::where('email',$email)->first();
        // if is verified or not
        if(! is_null($user->email_verified_at)){
            return response()->json([
                'message' => "Account Already Verified!",
            ],200);
        }
        // Generate Token
        $code = rand(111111,999999);

        // Saving data to password_reset table
        $user->verification_code = $code;
        $user->save();

        Mail::send('verification-email',['code' => $code],function(Message $message) use ($email){
            $message->subject('Verify Your Account');
            $message->to($email);

        });

        return response()->json([
            'message' => "Verification Email Was Sent.... Check Your Email ",
        ],200);
    }
    public function verify($code)
    {
        $user = User::find(auth()->user()->id);
        if(! is_null($user->email_verified_at)){
            return response()->json([
                'message' => "Account Already Verified!",
            ],200);
        }

        if($code == $user->verification_code){
            $user->email_verified_at = Carbon::now();
            $user->verification_code = NULL;
            $user->save();
            return response()->json([
                'message' => "Account has been verified!",
            ],200);
        }
        return response()->json([
            'message' => "Wrong Verification code!",
        ],200);
    }
}
