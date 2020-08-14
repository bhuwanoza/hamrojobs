<?php

namespace App\Http\Controllers\Employer;

use App\Model\AppliedJobs;
use App\Model\Companies;
use App\Model\Industries;
use App\Model\JobPosts;
use App\Model\Qualifications;
use App\Model\Skills;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class PostJobController extends Controller
{

    public function index()
    {
        $job_industries = Industries::where('status', 'Active')->get();
        return view('employer.post_job', compact('job_industries'));
    }

    public function manageJobs(){
        $user           =User::authUser();
        $employer       =$user->employer;
        $company        =$employer->company;
        $title          =$company->title;

        $activeJobs = $company->jobposts()->where('status', 'Active')->where('job_deadline', '>=', Carbon::now())->where('company_id', $company->id)->count();
        $pendingJobs = $company->jobposts()->where('status', 'Pending')->where('job_deadline', '>=', Carbon::now())->where('company_id', $company->id)->count();
        $inactiveJobs = $company->jobposts()->where('status', 'Inactive')->where('job_deadline', '>=', Carbon::now())->where('company_id', $company->id)->count();
        $expiredJobs = $company->jobposts()->where('status', 'Active')->where('job_deadline', '<=', Carbon::now())->where('company_id', $company->id)->count();
        $draftJobs = $company->jobposts()->where('status', 'Draft')->where('job_deadline', '>=', Carbon::now())->where('company_id', $company->id)->count();

        $applications = AppliedJobs::where('company_id', $company->id)->get();
        return view('employer.manage_jobs',compact('title',
            'user','employer','company',
            'draftJobs','inactiveJobs',
            'pendingJobs','activeJobs',
            'expiredJobs','inactiveJobs','applications'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'job_title' => 'required|min:2| max:100',
            'job_service' => 'required',
            'no_of_vacancies' => 'required|numeric',
            'job_level' => 'required',
            'job_type' => 'required',
            'job_deadline' => 'required',
            'salary_type' => 'required',
            'job_industry' => 'required|numeric',
        ]);

        if ($request->salary_type == 'Negotiable') {
            $minsalary = null;
            $maxsalary = null;
        } elseif ($request->salary_type == 'Fixed') {
            $minsalary = $request->min_salary;
            $maxsalary = null;
        } elseif ($request->salary_type == 'Range') {
            $minsalary = $request->min_salary;
            $maxsalary = $request->max_salary;
        }

        $user = User::authUser();
        $employer_id = $user->employer->id;
        $company_id = $user->employer->company->id;

        if ($request->hasFile('job_banner')) {
            $this->validate($request, [
                'job_banner' => 'dimensions:min_width=200,min_height=200|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);
            $uploaded_image = $request->file('job_banner');
            $banner = str_slug($request->job_title) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/jobposts/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);
            $destinationPath = public_path('/uploads/jobposts/');
            $uploaded_image->move($destinationPath, $banner);
        }

        $jobPost = new JobPosts();
        $jobPost->title = trim($request->job_title);
        $jobPost->service_type = trim($request->job_service);
        $jobPost->number_of_vacancies = trim($request->no_of_vacancies);
        $jobPost->job_level = trim($request->job_level);
        $jobPost->job_type = trim($request->job_type);
        $jobPost->salary_type = trim($request->salary_type);
        $jobPost->min_salary = $minsalary;
        $jobPost->max_salary = $maxsalary;
        $jobPost->job_deadline = trim($request->job_deadline);
        $jobPost->status = 'Draft';
        $jobPost->location = trim($request->job_location);
        $jobPost->count = '0';
        $jobPost->ip_address = \Request::ip();
        $jobPost->job_banner = isset($banner) ? $banner : null;

        $jobPost->employer_id = $employer_id;
        $jobPost->company_id = $company_id;
        $jobPost->industry_id = $request->job_industry;
        $jobPost->save();


        $request->session()->flash('success_message', "Please Enter job Specifications");
        return response()->json($jobPost->slug, 200);

    }

    public function editPostedJob($id)
    {
        $user = User::authUser();
        $company = $user->employer->company;
        $jobpost = JobPosts::findOrFail($id);
        if ($jobpost->company == $company) {

            $industries = Industries::where('status', 'Active')->get();
            $companies = Companies::where('status', 'Active')->get();
            $qualifications = Qualifications::where('status', 'Active')->get();
            $skills = Skills::all();
            return view('employer.common.edit_job', compact('industries', 'qualifications', 'skills', 'companies', 'jobpost'));
        }

    }

    public function updatePostedJob(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'job_title' => 'required|min:2| max:100',
            'no_of_vacancies' => 'required|numeric',
            'job_level' => 'required',
            'job_type' => 'required',
            'job_deadline' => 'required',
            'salary_type' => 'required',
            'job_industry' => 'required|numeric',
            'job_location' => 'required',
            'job_banner' => 'dimensions:min_width=200,min_height=200|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $user = User::authUser();
        $company = $user->employer->company;
        $jobpost = JobPosts::findOrFail(trim($request->id));
        if ($jobpost->company == $company) {

            if ($request->salary_type == 'Negotiable') {
                $minsalary = null;
                $maxsalary = null;
            } elseif ($request->salary_type == 'Fixed') {
                $minsalary = $request->min_salary;
                $maxsalary = null;
            } elseif ($request->salary_type == 'Range') {
                $minsalary = $request->min_salary;
                $maxsalary = $request->max_salary;
            }

            $jobpost->update([
                'title' => trim($request->job_title),
                'number_of_vacancies' => trim($request->no_of_vacancies),
                'job_level' => trim($request->job_level),
                'job_type' => trim($request->job_type),
                'salary_type' => trim($request->salary_type),
                'min_salary' => $minsalary,
                'max_salary' => $maxsalary,
                'job_deadline' => trim($request->job_deadline),
                'location' => trim($request->job_location),
                'ip_address' => \Request::ip(),
                'industry_id' => $request->job_industry,
            ]);

            if ($request->hasFile('job_banner')) {
                if (file_exists(public_path('uploads/jobposts/thumbnails/' . $jobpost->job_banner))) {
                    unlink(public_path('uploads/jobposts/thumbnails/' . $jobpost->job_banner));
                }
                if (file_exists(public_path('uploads/jobposts/' . $jobpost->job_banner))) {
                    unlink(public_path('uploads/jobposts/' . $jobpost->job_banner));
                }

                $uploaded_image = $request->file('job_banner');
                $banner = str_slug($request->job_title) . time() . '.' . $uploaded_image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/jobposts/thumbnails/');
                $img = \Image::make($uploaded_image->getRealPath());
                $img->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $banner);
                $destinationPath = public_path('/uploads/jobposts/');
                $uploaded_image->move($destinationPath, $banner);
                $jobpost->update([
                    'job_banner' => $banner
                ]);
            }

            $jobpost->jobadditional()->updateOrCreate(['job_id' => $jobpost->id], [
                'education_level' => isset($request->education_level) ? trim($request->education_level) : null,
                'required_education' => isset($request->required_education) ? trim($request->required_education) : null,
                'experience_boundary' => isset($request->required_experience_limit) ? trim($request->required_experience_limit) : null,
                'experience_measure' => isset($request->experience_measure) ? trim($request->experience_measure) : null,
                'experience' => isset($request->required_experience) ? $request->required_experience : null,
                'gender' => isset($request->gender) ? $request->gender : null,
                'age_boundary' => $request->age_limit,
                'age' => $request->age,
                'specification' => isset($request->other_specification) ? trim($request->other_specification) : null,
                'description' => isset($request->description) ? trim($request->description) : null,
            ]);
            if ($jobpost->status == 'Draft') {
                $jobpost->update([
                    'status' => 'Pending'
                ]);
            }

            $jobpost->skills()->sync($request->skills);

            return response()->json('updated', 200);
        }
    }

    public function destroy($id)
    {
        $jobpost = JobPosts::findOrFail($id);
        $jobpost->jobadditional->delete();
        $jobpost->delete();
        if (file_exists(public_path('uploads/jobposts/thumbnails/' . $jobpost->job_banner))) {
            unlink(public_path('uploads/jobposts/thumbnails/' . $jobpost->job_banner));
        }
        if (file_exists(public_path('uploads/jobposts/' . $jobpost->job_banner))) {
            unlink(public_path('uploads/jobposts/' . $jobpost->job_banner));
        }
        return response()->json("$jobpost->title, Deleted", 200);

    }

    /* Api*/

    public function activeJobs()
    {
        $user = User::authUser();
        $company = $user->employer->company;

        $jobpost = JobPosts::where('status', 'Active')->where('job_deadline', '>=', Carbon::now())
            ->where('company_id', $company->id)->get();
        return DataTables::of($jobpost)
            ->addColumn('action', function ($jobpost) {
                return '<a class="badge badge-warning  mr-2 btn-edit" data-id="' . $jobpost->id . '" style="margin: 5px">
                            <i class="far fa-edit"></i>Edit 
                        </a>
                       <a class=" badge badge-danger font-sm btn-delete" data-id="' . $jobpost->id . '">
                            <span class="icon-trash mr-1">Delete</span>
                        </a>';
            })
            ->make();
    }

    public function pendingJobs()
    {
        $user = User::authUser();
        $company = $user->employer->company;

        $jobpost = JobPosts::where('status', 'Pending')->where('job_deadline', '>=', Carbon::now())
            ->where('company_id', $company->id)
            ->get();
        return DataTables::of($jobpost)
            ->addColumn('action', function ($jobpost) {
                return '<a class="badge badge-warning  mr-2 btn-edit" data-id="' . $jobpost->id . '" style="margin: 5px">
                            <i class="far fa-edit"></i>Edit 
                        </a>
                       <a class=" badge badge-danger font-sm btn-delete" data-id="' . $jobpost->id . '">
                            <span class="icon-trash mr-1">Delete</span>
                        </a>';
            })
            ->make();
    }

    public function inactiveJobs()
    {
        $user = User::authUser();
        $company = $user->employer->company;

        $jobpost = JobPosts::where('status', 'Inactive')->where('job_deadline', '>=', Carbon::now())
            ->where('company_id', $company->id)
            ->get();
        return DataTables::of($jobpost)
            ->addColumn('action', function ($jobpost) {
                return '<a class="badge badge-warning  mr-2 btn-edit" data-id="' . $jobpost->id . '" style="margin: 5px">
                            <i class="far fa-edit"></i>Edit 
                        </a>
                       <a class=" badge badge-danger font-sm btn-delete" data-id="' . $jobpost->id . '">
                            <span class="icon-trash mr-1">Delete</span>
                        </a>';
            })
            ->make();
    }

    public function draftJobs()
    {
        $user = User::authUser();
        $company = $user->employer->company;

        $jobpost = JobPosts::where('status', 'Draft')->where('job_deadline', '>=', Carbon::now())
            ->where('company_id', $company->id)
            ->get();
        return DataTables::of($jobpost)
            ->addColumn('action', function ($jobpost) {
                return '<a class="badge badge-warning  mr-2 btn-edit" data-id="' . $jobpost->id . '" style="margin: 5px">
                            <i class="far fa-edit"></i>Edit 
                        </a>
                       <a class=" badge badge-danger font-sm btn-delete" data-id="' . $jobpost->id . '">
                            <span class="icon-trash mr-1">Delete</span>
                        </a>';
            })
            ->make();


    }

    public function expiredJobs()
    {
        $user = User::authUser();
        $company = $user->employer->company;

        $jobpost = JobPosts::where('job_deadline', '<=', Carbon::now())
            ->where('company_id', $company->id)
            ->get();
        return DataTables::of($jobpost)
            ->addColumn('action', function ($jobpost) {
                return '<a class="badge badge-warning  mr-2 btn-edit" data-id="' . $jobpost->id . '" style="margin: 5px">
                            <i class="far fa-edit"></i>Edit 
                        </a>
                       <a class=" badge badge-danger font-sm btn-delete" data-id="' . $jobpost->id . '">
                            <span class="icon-trash mr-1">Delete</span>
                        </a>';
            })
            ->make();

    }

}
