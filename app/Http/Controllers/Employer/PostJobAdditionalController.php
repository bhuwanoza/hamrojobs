<?php

namespace App\Http\Controllers\Employer;

use App\Mail\JobCreatedMail;
use App\Model\JobPosts;
use App\Model\Qualifications;
use App\Model\Skills;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PostJobAdditionalController extends Controller{

    public function store(Request $request)    {
//        return $request->all();

        $this->validate($request, [
            'job_id' => 'required',
        ]);

        $user = User::authUser();
        $company = $user->employer->company;
        $jobpost = JobPosts::where('company_id', $company->id)->where('id', $request->job_id)->first();
        if ($jobpost) {
             if($jobpost->jobAdditional){
                  return response()->json('redirect it to edit');
             }
             else{
                 $jobpost->jobAdditional()->updateOrCreate(['job_id'=>$request->job_id],[
                     'education_level' => $request->education_level,
                     'required_education' => $request->required_education,
                     'experience' => $request->required_experience,
                     'experience_boundary' => $request->required_experience_limit,
                     'experience_measure' => $request->experience_measure,
                     'description' => $request->specification,
                     'specification' => $request->description,
                     'gender' => $request->gender,
                     'age' => $request->age,
                     'age_boundary' => $request->age_limit,
                 ]);

                $jobpost->skills()->sync($request->skills);

                 $jobpost->update([
                     'status'=>'Pending'
                 ]);

                 Mail::to($user->employer->company->email)->send(new JobCreatedMail($jobpost));
                 Mail::to(getConfiguration('site_primary_email'))->send(new JobCreatedMail($jobpost));

                 $request->session()->flash('success_message', "Your job, '$jobpost->title', has been posted Successfully");
                 return response()->json('success',200);
             }
        }
        else {
            return response()->json(['error_message'=>'404'],500);
        }
    }


    public function show($slug)
    {
        $user = User::authUser();
        $company = $user->employer->company;
        $jobpost = JobPosts::where('company_id', $company->id)->where('slug', $slug)->first();
        $skills = Skills::all();

        if (!$jobpost) {
            return 'Wrong or not your job';
        } else {
            if ($jobpost->jobAdditional) {
                return redirect('/')->with(['error_message' => 'You already have Post Additional You are not permitted to this page']);
            }
            if (!$jobpost->jobAdditional) {
                $qualifications = Qualifications::all();
                return view('employer.job_specification', compact('jobpost', 'qualifications','skills'));
            }
        }

    }


}
