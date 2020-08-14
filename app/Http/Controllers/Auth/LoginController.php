<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Sentinel;
use Socialite;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request){

        $this->validate($request,[
            'email' => 'email|required',
            'password'=>'required| min:5 |max:30',
        ]);

        try{
            $rememberMe='false';
            if(isset($request->remember_me))
                $rememberMe='true';
            if(Sentinel::authenticate($request->all(),$rememberMe)){
                $slug=Sentinel::getUser()->roles()->first()->slug;
                $user=Sentinel::getUser();
                if($slug=='admin'){
                    $request->session()->flash('success_message',"Welcome $user->first_name");
                    return response()->json([ 'message'=>'Success','route'=>'/admin/dashboard'],200);
                }
                elseif ($slug=='employer'){
                    $request->session()->flash('success_message',"Welcome $user->first_name");
                    return response()->json([ 'message'=>'Success','route'=>'/employer/company-profile'],200);
                }
                elseif($slug=='jobseeker'){
                    $request->session()->flash('success_message',"Welcome $user->first_name");
                    return response()->json([ 'message'=>'Success','route'=>'/jobseeker/profile'],200);
                }
            }
            else{
                return response()->json(['message'=>'Wrong Credentials'],500);
            }
        }
        catch(ThrottlingException $e){
            $delay=$e->getDelay();
            return response()->json(['message'=>"You have entered wrong credentials many times. You have been blocked for '".gmdate("i:s", $delay)."' seconds"],'500');
        }
        catch(NotActivatedException $e){
            return response()->json(['message'=>'Your Account has not been activate yet, Please check you email to activate !'],500);
        }
        return true;
    }

    public function logout(){
        Sentinel::logout();
        return redirect('/');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }//dd(Socialite::driver($provider)->redirect());


    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->user();
        return $user->getEmail();

//        $user = Socialite::driver($provider)->user();
//        return $user->getEmail();

//        $authUser = $this->findOrCreateUser($user, $provider);
//        Auth::login($authUser, true);
//        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
