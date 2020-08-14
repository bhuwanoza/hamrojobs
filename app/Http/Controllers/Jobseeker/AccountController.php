<?php

namespace App\Http\Controllers\Jobseeker;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('jobseeker.account');
    }

    public function changePassword(Request $request){
        if($request->ajax()){
            $this->validate($request, [
                'current_password' => 'required| min:5 |max:30',
                'password' => 'confirmed|required| min:5 |max:30',
                'password_confirmation' => 'required| min:5 |max:30',

            ]);
            $user =User::authUser();

            if ( Hash::check( $request->input( 'current_password' ), $user->password ) ) {
                $user->update( [ 'password' => bcrypt( $request->password) ] );
                return response()->json('Password Changed Successfully !',200);
            } else {
                return response()->json('YOU HAVE ENTERED WRONG PASSWORD !',500);
            }
        }

    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
