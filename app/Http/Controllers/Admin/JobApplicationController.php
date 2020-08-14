<?php

namespace App\Http\Controllers\Admin;

use App\Exports\JobApplicationExport;
use App\Http\Controllers\Controller;
use App\Model\AppliedJobs;
use App\Model\JobPosts;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;


class JobApplicationController extends Controller
{

    public function index($id)
    {
        $job = JobPosts::findOrFail($id);
        return view('admin.applications.index', compact('job'));
    }

    public function show($id)
    {
        $application = AppliedJobs::findOrFail($id);
        $user = $application->jobseeker->user;
//        $company=$application->company;
//        $jobs=$application->jobs;
        return view('admin.applications.quickview', compact('application', 'user'));

    }

    public function applicationJson($id)
    {
        $applied = AppliedJobs::where('job_id', $id)->get();
        foreach ($applied as $apply) {
            $applied->jobseeker = $apply->jobseeker->user;
            $applied->jobs = $apply->jobs;
            $applied->company = $apply->company;
        }

        return DataTables::of($applied)
            ->addColumn('action', function ($applied) {
                return '<button type="button" class="btn btn-xs btn-success btn-view-application" data-id="' . $applied->id . '"><i class="fa fa-eye"></i> View Detail</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete-application" data-id="' . $applied->id . '"><i class="fa fa-remove"></i> Delete </button>';
            })
            ->make();
    }

    public function destroy($id)
    {
        $application = AppliedJobs::findOrFail($id);
        $application->delete();
        return response()->json('Deleted');
    }

    public function jobApplications()
    {
        return view('admin.applications.job_application');
    }

    public function jobApplicationsJson()
    {
        $jobs = JobPosts::whereHas('applications')->orderBy('id', 'desc')->get();
        foreach ($jobs as $job) {
            $job->company_name = $job->company->title;
            $job->count = $job->applications->count();
        }

        return DataTables::of($jobs)
            ->addColumn('action', function ($jobs) {
                return '<a href="' . route('jobapplications.index', $jobs->id) . '" class="btn btn-xs btn-success btn-view-application" data-id="' . $jobs->id . '"><i class="fa fa-eye"></i> View</a>';
            })
            ->make();
    }

    public function exportToExcel($id)
    {
        $job = JobPosts::findOrFail($id);
        return Excel::download(new JobApplicationExport($job), 'applications.xlsx');
    }
}
