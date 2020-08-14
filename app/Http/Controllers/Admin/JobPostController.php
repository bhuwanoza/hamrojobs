<?php

namespace App\Http\Controllers\Admin;

use App\Mail\JobCreatedMail;
use App\Mail\JobUpdatedMail;
use App\Model\Companies;
use App\Model\Industries;
use App\Model\JobPosts;
use App\Model\Qualifications;
use App\Model\Skills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use Image;
use Yajra\DataTables\Exceptions\Exception;

class JobPostController extends Controller
{
    public function index()
    {
        return view('admin.jobs.index');
    }

    public function create()
    {
        $industries = Industries::where('status', 'Active')->get();
        $companies = Companies::where('status', 'Active')->get();
        $qualifications = Qualifications::where('status', 'Active')->get();
        $skills=Skills::all();
        return view('admin.jobs.add', compact('industries', 'qualifications', 'companies','skills'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'job_title' => 'required|min:2| max:100',
            'job_service' => 'required',
            'no_of_vacancies' => 'required|numeric',
            'job_level' => 'required',
            'job_type' => 'required',
            'job_deadline' => 'required',
            'salary_type' => 'required',
            'min_salary' => 'nullable',
            'max_salary' => 'nullable',
            'job_industry' => 'required|numeric',
            'job_location' => 'required',
            'required_education' => 'required',
            'job_company' => 'required',
            'job_banner' => 'sometimes|dimensions:min_width=150,min_height=150|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
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

        $company = Companies::findOrFail($request->job_company);
        $employer_id = $company->employers_id;

        $jobpost = JobPosts::create([
            'title' => trim($request->job_title),
            'service_type' => trim($request->job_service),
            'number_of_vacancies' => trim($request->no_of_vacancies),
            'job_level' => trim($request->job_level),
            'job_type' => trim($request->job_type),
            'salary_type' => trim($request->salary_type),
            'min_salary' => $minsalary,
            'max_salary' => $maxsalary,
            'job_deadline' => trim($request->job_deadline),
            'status' => trim($request->job_status),
            'location' => trim($request->job_location),
            'count' => '0',
            'ip_address' => \Request::ip(),
            'employer_id' => $employer_id,
            'company_id' => $request->job_company,
            'industry_id' => $request->job_industry,
        ]);

        if ($request->hasFile('job_banner')) {

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
                'job_banner'=>$banner
            ]);
        }

        $jobadditional=$jobpost->jobadditional()->create([
            'education_level' => $request->education_level,
            'required_education' => $request->required_education,
            'experience' => $request->required_experience,
            'experience_boundary' => $request->required_experience_limit,
            'experience_measure' => $request->experience_measure,
            'description' => $request->description,
            'specification' => $request->specification ,
            'gender' => $request->gender,
            'age' => $request->age,
            'age_boundary' => $request->age_limit,
        ]);

        if(!isset($jobadditional)){
            $jobpost->delete();
            return response()->json('Error Occurred Try Again!',500);
        }
        $jobpost->skills()->sync($request->skills);

        if($jobpost->status=='Approved'){
            Mail::to($company->email)->send(new JobCreatedMail($jobpost));
        }

        return response()->json($jobpost->title, 200);
    }

    public function updateJob(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'job_title' => 'required|min:2| max:100',
            'job_service' => 'required',
            'no_of_vacancies' => 'required|numeric',
            'job_level' => 'required',
            'job_type' => 'required',
            'job_deadline' => 'required',
            'salary_type' => 'required',
            'job_industry' => 'required|numeric',
            'job_location' => 'required',
            'min_salary' => 'nullable',
            'max_salary' => 'nullable',
            'job_company' => 'required',
            'job_banner' => 'sometimes|dimensions:min_width=150,min_height=150|image|mimes:jpeg,png,jpg,gif,svg|max:10240',

        ]);

        $id = trim($request->id);
        $jobpost = JobPosts::findOrFail($id);

        $company = Companies::findOrFail($request->job_company);
        $employer_id = $company->employers_id;

        if ($request->salary_type == 'Negotiable') {
            $minsalary = null;
            $maxsalary = null;
        }
        elseif ($request->salary_type == 'Fixed') {
            $minsalary = $request->min_salary;
            $maxsalary = null;
        }
        elseif ($request->salary_type == 'Range') {
            $minsalary = $request->min_salary;
            $maxsalary = $request->max_salary;
        }

        $jobpost->update([
            'title' => trim($request->job_title),
            'service_type' => trim($request->job_service),
            'number_of_vacancies' => trim($request->no_of_vacancies),
            'job_level' => trim($request->job_level),
            'job_type' => trim($request->job_type),
            'salary_type' => trim($request->salary_type),
            'min_salary' => $minsalary,
            'max_salary' => $maxsalary,
            'job_deadline' => trim($request->job_deadline),
            'status' => trim($request->job_status),
            'location' => trim($request->job_location),
            'ip_address' => \Request::ip(),

            'employer_id' => $employer_id,
            'company_id' => $request->job_company,
            'industry_id' => $request->job_industry,
        ]);

        if ($request->hasFile('job_banner')) {
            if (is_file(public_path('uploads/jobposts/thumbnails/'.$jobpost->job_banner))) {
                unlink(public_path('uploads/jobposts/thumbnails/'.$jobpost->job_banner));
            }
            if (is_file(public_path('uploads/jobposts/'.$jobpost->job_banner))) {
                unlink(public_path('uploads/jobposts/'.$jobpost->job_banner));
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
                'job_banner'=>$banner
            ]);
        }

        $jobpost->jobadditional()->updateOrCreate(['job_id'=>$jobpost->id],[
            'education_level' => $request->education_level,
            'required_education' => $request->required_education,
            'experience' => $request->required_experience,
            'experience_boundary' => $request->required_experience_limit,
            'experience_measure' => $request->experience_measure,
            'description' => $request->description,
            'specification' => $request->specification ,
            'gender' => $request->gender,
            'age' => $request->age,
            'age_boundary' => $request->age_limit,
        ]);

        $jobpost->skills()->sync($request->skills);

//        Mail::to($company->email)->send(new JobUpdatedMail($jobpost));
        return response()->json($jobpost->title, 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $jobpost = JobPosts::findOrFail($id);
        $industries = Industries::where('status', 'Active')->get();
        $companies = Companies::where('status', 'Active')->get();
        $qualifications = Qualifications::where('status', 'Active')->get();
        $skills= Skills::all();

        return view('admin.jobs.edit', compact('industries', 'qualifications', 'companies','skills', 'jobpost'));


    }

    public function destroy($id)    {

        $jobpost= JobPosts::findOrFail($id);

        if(isset($jobpost->job_banner)){
            if (is_file(public_path('uploads/jobposts/thumbnails/'.$jobpost->job_banner))) {
                unlink(public_path('uploads/jobposts/thumbnails/'.$jobpost->job_banner));
            }
            if (is_file(public_path('uploads/jobposts/'.$jobpost->job_banner))) {
                unlink(public_path('uploads/jobposts/'.$jobpost->job_banner));
            }
        }

        if($jobpost->skills()->exists()){
            $jobpost->skills()->detach();
        }
        if($jobpost->savedjob()->exists()){
            $jobpost->savedjob()->delete();
        }
        if($jobpost->applications()->exists()){
            $jobpost->applications()->delete();
        }
        $jobpost->jobadditional()->delete();
        $jobpost->delete();
        return response()->json('Deleted',200);

    }

    public function jobsJson()
    {
        $jobpost = JobPosts::all();
        foreach ($jobpost as $job) {
            $jobpost->job_company = $job->company;
            $jobpost->job_industry = $job->industry;
        }
        return DataTables::of($jobpost)
            ->addColumn('action', function ($jobpost) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $jobpost->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $jobpost->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })
            ->make();
    }

}
