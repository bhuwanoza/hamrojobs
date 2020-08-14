<?php

namespace App\Http\Controllers\Employer;

use App\Model\AppliedJobs;
use App\Model\Industries;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::authUser();
        $employer = $user->employer;
        $company = $employer->company;

        $applications = AppliedJobs::where('company_id', $company->id)->get();
        $parent_industry = Industries::where('id', $company->industry_id)->first();

        if ($company->jobposts->isNotEmpty()) {
            $similar_jobs = $parent_industry->jobs()->where('status', 'Active')
                ->whereNotIn('id', [$company->jobposts])->orderBy('created_at', 'desc')->take(5)->get();
        } else {
            $similar_jobs = $parent_industry->jobs()->where('status', 'Active')
                ->orderBy('created_at', 'desc')->take(5)->get();
        }

        return view('employer.applications',compact('user', 'employer', 'company', 'applications', 'similar_jobs'));

    }

    public function create()
    {

    }


    public function store(Request $request)
    {
    }

    public function show($id)    {
        $application= AppliedJobs::findOrFail($id);
        $user=$application->jobseeker->user;
        return view('employer.common.applicant',compact('application','user'));

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id) {
        $application=AppliedJobs::findOrFail($id);
        $user=User::authUser();
        if(isset($user->employer->jobposts)){
            if($user->employer->company == $application->company){
                $application->delete();
                return response()->json('Deleted');
            }
            else{
                return response()->json('Error Occurred',500);
            }
        }



    }


    public function applications()
    {
        $user = User::authUser();
        $company = $user->employer->company;

        $applications = AppliedJobs::where('company_id', $company->id)->get();

        foreach ($applications as $application) {
            $application->jobseeker->user;
            $application->jobs;
        }
        return DataTables::of($applications)
            ->addColumn('action', function ($applications) {
                return '<a class="badge badge-success  mr-2 btn-view-application" data-id="' . $applications->id . '" style="margin: 5px">
                            <i class="far fa-eye"></i>View 
                        </a>
                       <a class=" badge badge-danger font-sm btn-delete-application" data-id="' . $applications->id . '">
                            <span class="icon-trash mr-1">Delete</span>
                        </a>';
            })
            ->make();
    }
}
