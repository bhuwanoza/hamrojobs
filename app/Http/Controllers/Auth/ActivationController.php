<?php

namespace App\Http\Controllers\Auth;

use Activation;
use App\Mail\UserActivatedMail;
use Illuminate\Support\Facades\Mail;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ActivationController extends Controller
{
    public  function activate($email,$activationCode){
        $user= User::whereEmail($email)->first();
        if(!$user){
            return redirect('/')->with('error_message','Activation code already expired');
        }
        else if(Activation::complete($user,$activationCode)){
            return redirect('/login')->with('success_message'," Dear $user->first_name, Your account has been activated, Please login");
        }
        else{
            return redirect('/')->with('error_message','Activation code has already expired');
        }
    }
}
