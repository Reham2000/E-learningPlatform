<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Enroll;
use App\Models\Payment;
use App\Models\User;

use Illuminate\Support\Str;

class PayPalController extends Controller
{

    

    
    public function payment($user_id,$course_id,$amount)
    {
       
        

        $data = [];
        $data['items'] = [
            [
                'name' => 'course',
                'price' => $amount,
                'desc'  => 'course payment',
                'qty' => 1
            ]
        ];
        $data['invoice_id'] =$user_id;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        
        // $data['return_url'] = route('payment.success',compact('user_id','course_id','amount'));
        $data['return_url'] = route('payment.success',[
            'user_id' =>$user_id,
            'course_id' => $course_id,
            'amount' => $amount
        ]);
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $amount;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    public function cancel()
    {
        return response()->json([
            'message' => 'Your payment is canceled.'
        ],402);
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            
            $code = Str::random(20);
            $payment = Payment::create([
                'payment_id' => $code ,
                'payer_id' =>  $_GET['user_id'],
                'amount' =>  $_GET['user_id'],
                'currency' =>  env('PAYPAL_CURRENCY'),
                'payment_status'=> 'SUCCESS'  ,
            ]);
            $enrolls = Enroll::where('user_id','=',$_GET['user_id'])->where('course_id',$_GET['course_id'])->get();
            if(count($enrolls) == 1 ){
                return response()->json([
                    'message' => "You Already Enrolled to this course ",
                ],200); 
            }

            
            $enroll =Enroll::create([
                'user_id' =>  $_GET['user_id'],
                'course_id' =>  $_GET['course_id'],
            ]);
            return response()->json([
                'message' => "Your payment was successfully.",
                'enrolls' => $enrolls
            ],200);
        }

        dd('Please try again later.');
    }
    function getPayments()
    {
        $payments = Payment::all();
        return view('admin.payments',compact('payments'));
    }
}
