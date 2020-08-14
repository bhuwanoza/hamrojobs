<?php

namespace App\Http\Controllers\Employer;

use App\Model\AppliedJobs;
use App\Model\Industries;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EMPProfileController extends Controller
{

    public function index()
    {
        $user = User::authUser();
        $employer = $user->employer;
        $company = $employer->company;

        $allJobs = $company->jobposts()->where('job_deadline', '>=', Carbon::now())->where('company_id', $company->id)->get();
        $draftJobs = $company->jobposts()->where('status', 'Draft')->where('job_deadline', '>=', Carbon::now())->where('company_id', $company->id)->get();
        $pendingJobs = $company->jobposts()->where('status', 'Pending')->where('job_deadline', '>=', Carbon::now())->where('company_id', $company->id)->get();
        $activeJobs = $company->jobposts()->where('status', 'Active')->where('job_deadline', '>=', Carbon::now())->where('company_id', $company->id)->get();
        $expiredJobs = $company->jobposts()->where('status', 'Active')->where('job_deadline', '<=', Carbon::now())->where('company_id', $company->id)->get();

        $applications = AppliedJobs::where('company_id', $company->id)->get();
        $parent_industry = Industries::where('id', $company->industry_id)->first();

        if ($company->jobposts->isNotEmpty()) {
            $similar_jobs = $parent_industry->jobs()->where('status', 'Active')
                ->whereNotIn('id', [$company->jobposts])->orderBy('created_at', 'desc')->take(5)->get();
        } else {
            $similar_jobs = $parent_industry->jobs()->where('status', 'Active')
                ->orderBy('created_at', 'desc')->take(5)->get();
        }

        return view('employer.employer_profile',
            compact('user', 'employer', 'company', 'applications', 'similar_jobs', 'allJobs', 'draftJobs', 'pendingJobs', 'activeJobs', 'expiredJobs'));
    }

    public function editCompanyProfile()
    {
        $industries = Industries::where('status', 'Active')->get();
        return view('employer.common.edit_company', compact('industries'));
    }

    public function editUser(){
        $user = User::authUser();
        return view('employer.common.edit_user',compact('user'));
    }


    public function updateUser(Request $request){
        if($request->ajax()) {
            $this->validate($request, [
                'first_name' => 'required|min:2| max:18',
                'last_name' => 'required|min:2| max:18',
                'email' => 'email|required',
                'mobile' => 'required|numeric|min:9',
                'address' => 'required',
            ]);

           $user= User::authUser();
           $user->update([
                   'first_name' => trim($request->first_name),
                   'last_name' => trim($request->last_name),
                   'email' => trim($request->email),
                   'mobile' => trim($request->mobile),
                   'address' => trim($request->address),
               ]);
            return response()->json('User Updated Successfully',200);

        }else{
            abort(404);
        }

    }


    public function updateCompanyProfile(Request $request)
    {
        if ($request->ajax()) {
            $user = User::authUser();
            $employer = $user->employer;

            $this->validate($request, [
                'company_name' => 'required|min:2| max:50',
                'company_industry' => 'required|numeric',
                'company_address' => 'required|min:2| max:35',
                'company_email' => 'email|required',
                'company_phone' => 'required| min:8 |max:15',
                'company_employers' => 'required',
                'company_branches' => 'required',
                'company_establish' => 'required',
                'company_ownership' => 'required',
                'company_description' => 'required',
            ]);

            $employer->company->update([
                'industry_id' => $request->company_industry,
                'title' => trim($request->company_name),
                'address' => trim($request->company_address),
                'email' => trim($request->company_email),
                'phone' => trim($request->company_phone),
                'website' => $request->company_website ? $request->company_website : null,
                'fax' => $request->company_fax ? $request->company_fax : null,
                'total_employees' => trim($request->company_employers),
                'branches' => trim($request->company_branches),
                'established_date' => trim($request->company_establish),
                'ownership' => trim($request->company_ownership),
                'description' => trim($request->company_description),
                'seo' => $request->company_name,
            ]);
            return response()->json('Profile Updated', 200);
        } else {
            abort(404);
        }

    }

    public function updateLogo(Request $request)
    {
        $user = User::authUser();
        if ($request->has('logo_image')) {
            if (!empty($user->employer->company)) {
                if (file_exists(public_path('uploads/companies/logos/thumbnails/' . $user->employer->company->logo))) {
                    unlink(public_path('uploads/companies/logos/thumbnails/' . $user->employer->company->logo));
                }
                if (file_exists(public_path('uploads/companies/logos/' . $user->employer->company->logo))) {
                    unlink(public_path('uploads/companies/logos/' . $user->employer->company->logo));
                }
            }
            $uploaded_image = $request->file('logo_image');
            $image = str_slug($user->employer->company->title) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companies/logos/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image);
            $destinationPath = public_path('/uploads/companies/logos/');
            $uploaded_image->move($destinationPath, $image);

            $user->employer->company->update([
                'logo' => $image
            ]);
            return response()->json('Company Logo Updated', 200);
        }

    }

    public function updateCover(Request $request)
    {
        $user = User::authUser();
        if ($request->has('cover_image')) {
            if (!empty($user->employer->company)) {
                if (file_exists(public_path('uploads/companies/covers/thumbnails/' . $user->employer->company->cover_image))) {
                    unlink(public_path('uploads/companies/covers/thumbnails/' . $user->employer->company->cover_image));
                }
                if (file_exists(public_path('uploads/companies/covers/' . $user->employer->company->cover_image))) {
                    unlink(public_path('uploads/companies/covers/' . $user->employer->company->cover_image));
                }
            }
            $uploaded_image = $request->file('cover_image');
            $image = str_slug($user->employer->company->title) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companies/covers/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image);
            $destinationPath = public_path('/uploads/companies/covers/');
            $uploaded_image->move($destinationPath, $image);

            $user->employer->company->update([
                'cover_image' => $image
            ]);
            return response()->json('Company Cover Image Updated', 200);
        }
    }
    

}
