<?php

namespace App\Http\Controllers\Jobseeker;

use App\Model\AppliedJobs;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{

    public function index()    {
        $user=User::authUser();
        $applications = AppliedJobs::where('seeker_id', $user->jobseeker->id)->get();
        return view('jobseeker.application',compact('applications'));
    }

    public function destroy($id)    {

        $application=AppliedJobs::findOrFail($id);
        $user=User::authUser();
        if(isset($user->jobseeker)){
            if($user->jobseeker== $application->jobseeker){
                $application->delete();
                return response()->json('Application Deleted Successfully');
            }
            else{
                return response()->json('Error Occurred',500);
            }
        }
    }
}
