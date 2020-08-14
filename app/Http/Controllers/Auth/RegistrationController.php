<?php

namespace App\Http\Controllers\Auth;

use App\Mail\ActivationMail;
use App\Model\Employers;
use App\Model\JobSeekers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Sentinel;
use Activation;
use Mail;


class RegistrationController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:2| max:18',
            'last_name' => 'required|min:2| max:18',
            'email' => 'email|required|unique:users,email',
            'password' => 'confirmed|required| min:5 |max:30',
            'password_confirmation' => 'required| min:5 |max:30',
//            'mobile' => 'required|numeric|unique:users,mobile|min:9',
            'mobile' => 'required|numeric|min:9',
            'address' => 'required',
            'user_type' => 'required'
        ]);
        $subscription = trim($request->user_type);

        try {
            $user = Sentinel::register($request->all());
            $activation = Activation::create($user);
            $role = Sentinel::findRoleBySlug($subscription);



            $role->users()->attach($user);

            if ($subscription == 'jobseeker') {

                $user->jobseeker()->updateOrCreate([
                    'image' => '',
                    'status' => 'Active',
                    'about_me' => 'About Yourself',
                    'marital_status' => 'Not Specified'
                ]);
            }
            if ($subscription == 'employer') {
                $user->employer()->updateOrcreate([
                    'top_employer' => 'No',
                    'status' => 'Active',
                    'image' => '',
                ]);
            }
            $data = [
                'user' => $user,
                'code' => $activation->code,
            ];
            Mail::to($user->email)->send(new ActivationMail($data));
            $request->session()->flash('success_message', "Dear $request->first_name, Your account has been created, Please check yor email to activate");
            return response()->json('success', 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}