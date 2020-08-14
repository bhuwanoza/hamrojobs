<?php

namespace App\Http\Controllers\Auth;

use App\Mail\ForgotPasswordMail;
use Reminder;
use Sentinel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(){
        return  view('auth.forgot-password');
    }

    public function  postForgotPassword(Request $request){
        $this->validate($request,[
            'email' => 'email|required'
        ]);
        $user= User::whereEmail($request->email)->first();
        if(!$user){
            return response()->json(['message'=>'Sorry ! We could\'nt find your email, Please enter valid email.'],500);
        }
        $reminder= Reminder::exists($user)?: Reminder::create($user);

        $data = [
            'user' => $user,
            'code' => $reminder->code,
        ];

        Mail::to($user->email)->send(new ForgotPasswordMail($data));
//        $this->sendEmail($user,$reminder->code);

        return response()->json(['message'=>'Reset code has been sent, Please check you email'],200);
    }

    public function resetPassword($email, $resetCode){
        $user= User::byEmail($email);
        if(!$user){
            abort(404);
        }
        if($reminder = Reminder::exists($user)){
            if($resetCode == $reminder->code){
                return view('auth.reset-password');
            }else{
                return redirect('/')->with(['error_message'=>'The link has been expired']);
            }
        }

        else{
            return redirect('/')->with(['error_message'=>'The link has been expired']);
        }
    }

    public function postResetPassword(Request $request,$email,$resetCode){
        $this->validate($request,[
            'password'=>'confirmed|required| min:5 |max:30',
            'password_confirmation'=>'required| min:5 |max:30'
        ]);
        $user= User::byEmail($email);
        if(!$user){
            abort(404);
        }
        if($reminder = Reminder::exists($user)){
            if($resetCode == $reminder->code){
               Reminder::complete($user,$resetCode, $request->password);
                $request->session()->flash('success_message',"Dear $user->first_name , Your password is Successfully changed. Please Login with your new password" );
                return response()->json([ 'message'=>'Success','route'=>'/login'],200);

            }else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    private function sendEmail($user, $code){
        Mail::send('emails.forgot-password',[
            'user' =>$user,
            'code' => $code
        ], function($message) use ($user){
            $message->from(getConfiguration('site_primary_email')?getConfiguration('site_primary_email'):getConfiguration('site_secondary_email'), getConfiguration('site_title'));
            $message->to($user->email);
            $message->subject("Hello $user->first_name, Reset Your Password");
        });
    }
}
