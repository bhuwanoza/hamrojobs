<?php

namespace App\Http\Controllers\Jobseeker;

use App\Model\Industries;
use App\Model\JobSeekerAcademics;
use App\Model\JobSeekerExperiences;
use App\Model\JobSeekerSocial;
use App\Model\Qualifications;
use App\Model\SavedJobs;
use App\Model\Skills;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JSProfileController extends Controller
{
    public function index()
    {
        $user = User::authUser();
        $jobseeker = $user->jobseeker;
        return view('jobseeker.profile', compact('user', 'jobseeker'));

    }

    public function showEditProfile()
    {
        $user = User::authUser();
        if ($user->jobseeker) {
            $jobseeker = $user->jobseeker;
            return view('jobseeker.edit_profile', compact('jobseeker'));
        } else {
            abort(404);
        }
    }

    public function editProfile()
    {
        $user = User::authUser();
        $jobseeker = $user->jobseeker;
        return view('jobseeker.modals.edit_profile', compact('jobseeker', 'user'));
    }

    public function updateProfile(Request $request)
    {
        if ($request->ajax()) {

            $this->validate($request, [
                'first_name' => 'required|min:2| max:18',
                'last_name' => 'required|min:2| max:18',
                'mobile_primary' => 'required|numeric|min:9',
                'mobile_secondary' => 'numeric|min:9',
                'permanent_address' => 'required',
                'secondary_address' => '',
                'marital_status' => 'required',
                'nationality' => 'string',
                'religion' => 'string',
                'dob' => 'date',
                'about_me' => '',
                'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);

            $user = User::authUser();

            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile_primary,
                'address' => $request->permanent_address
            ]);

            $user->jobseeker()->updateOrCreate(['user_id'=>$user->id],[
                'gender' => $request->gender,
                'dob' => $request->dob,
                'marital_status' => $request->marital_status,
                'religion' => $request->religion,
                'nationality' => $request->nationality,
                'current_address' => $request->current_address,
                'permanent_address' => $request->permanent_address,
                'mobile' => $request->mobile_secondary,
                'about_me' => $request->about_me,
            ]);

            if ($request->hasFile('user_image')) {
                if (!empty($user->jobseeker->image)) {
                    if (file_exists(public_path('uploads/jobseekers/thumbnails/' . $user->jobseeker->image))) {
                        unlink(public_path('uploads/jobseekers/thumbnails/' . $user->jobseeker->image));
                    }
                    if (file_exists(public_path('uploads/jobseekers/' . $user->jobseeker->image))) {
                        unlink(public_path('uploads/jobseekers/' . $user->jobseeker->image));
                    }
                }

                $uploaded_image = $request->file('user_image');
                $logo = str_slug($request->first_name) . time() . '.' . $uploaded_image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/jobseekers/thumbnails/');
                $img = \Image::make($uploaded_image->getRealPath());
                $img->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $logo);
                $destinationPath = public_path('/uploads/jobseekers/');
                $uploaded_image->move($destinationPath, $logo);
                $user->jobseeker()->update([
                    'image' => $logo
                ]);
            }

        } else
            abort(500);

    }

    public function editPreference()
    {
        $user = User::authUser();
        $jobseeker = $user->jobseeker;
        $industries = Industries::where('status', 'Active')->get();
        $skills = Skills::all();
        return view('jobseeker.modals.edit_preference', compact('jobseeker', 'user', 'industries', 'skills'));
    }

    public function updatePreference(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'job_categories' => 'required',
                'looking_for' => '',
                'available_for' => '',
                'specialization' => '',
                'skills' => 'required',
                'expected_salary_currency' => 'string',
                'expected_salary_boundary' => 'string',
                'expected_salary' => 'numeric',
                'expected_salary_basic' => 'string',
                'current_salary_currency' => 'string',
                'current_salary_boundary' => 'string',
                'current_salary' => 'numeric',
                'current_salary_basic' => 'string',
                'job_preference_location' => '',
            ]);

            $user = User::authUser();

            $user->jobseeker->additional()->updateOrCreate(['job_seekers_id' => $user->jobseeker->id],
                [
                    'looking_for' => $request->looking_for,
                    'available_for' => $request->available_for,
                    'specialization' => $request->specialization,
                    'expected_salary_currency' => $request->expected_salary_currency,
                    'expected_salary_boundary' => $request->expected_salary_boundary,
                    'expected_salary' => $request->expected_salary,
                    'expected_salary_basic' => $request->expected_salary_basic,
                    'current_salary_currency' => $request->current_salary_currency,
                    'current_salary_boundary' => $request->current_salary_boundary,
                    'current_salary' => $request->current_salary,
                    'current_salary_basic' => $request->current_salary_basic,
                    'job_preference_location' => $request->job_preference_location,
                ]);
            $user->jobseeker->additional->industries()->sync($request->job_categories);
            $user->jobseeker->skills()->sync($request->skills);
            return response()->json('Updated', 200);

        } else {
            abort('501');
        }
    }

    public function addEducation()
    {
        $user = User::authUser();
        $jobseeker = $user->jobseeker;
        $qualifications= Qualifications::where('status','Active')->get();
        return view('jobseeker.modals.add_education', compact('jobseeker', 'user','qualifications'));
    }

    public function editEducation($id)
    {
        $academic = JobSeekerAcademics::findOrFail($id);
        $user = User::authUser();
        $qualifications= Qualifications::where('status','Active')->get();
        if ($academic->jobseeker == $user->jobseeker) {
            return view('jobseeker.modals.edit_education', compact('academic','qualifications'));
        } else {
            return '';
        }
    }

    public function saveEducation(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'academic_degree' => 'required',
                'academic_program' => 'required',
                'academic_board' => 'required',
                'academic_institute' => 'required',
                'currently_studying' => '',
                'grade_type' => 'string',
                'mark_secured' => '',
                'start_date_year' => 'required|numeric',
                'start_date_month' => 'required|digits_between:1,12',
                'start_date_day' => 'required|digits_between:1,31',
                'end_date_year' => 'numeric',
                'end_date_month' => 'digits_between:1,12',
                'end_date_day' => 'digits_between:1,31',
            ]);
            $user = User::authUser();

            $start_date = $request->start_date_year . '-' . $request->start_date_month . '-' . $request->start_date_day;
            $end_date = $request->end_date_year . '-' . $request->end_date_month . '-' . $request->end_date_day;
            if (isset($request->currently_studying)) {
                $end_date = null;
            }
            $user->jobseeker->academics()->create([
                'academic_degree' => $request->academic_degree,
                'academic_program' => $request->academic_program,
                'academic_board' => $request->academic_board,
                'academic_institute' => $request->academic_institute,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'grade_type' => $request->grade_type,
                'mark_secured' => $request->mark_secured
            ]);

            return response()->json('Education Added', 200);

        } else {
            abort('500');
        }
    }

    public function updateEducation(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'academic_degree' => 'required',
                'academic_program' => 'required',
                'academic_board' => 'required',
                'academic_institute' => 'required',
                'currently_studying' => '',
                'grade_type' => 'string',
                'mark_secured' => '',
                'start_date_year' => 'required|numeric',
                'start_date_month' => 'required|digits_between:1,12',
                'start_date_day' => 'required|digits_between:1,31',
                'end_date_year' => 'numeric',
                'end_date_month' => 'digits_between:1,12',
                'end_date_day' => 'digits_between:1,31',
            ]);

            $user = User::authUser();
            $academic = JobSeekerAcademics::findOrFail($request->id);
            if ($academic->jobseeker == $user->jobseeker) {

                $start_date = $request->start_date_year . '-' . $request->start_date_month . '-' . $request->start_date_day;
                $end_date = $request->end_date_year . '-' . $request->end_date_month . '-' . $request->end_date_day;
                if (isset($request->currently_studying)) {
                    $end_date = null;
                }
                $academic->update([
                    'academic_degree' => $request->academic_degree,
                    'academic_program' => $request->academic_program,
                    'academic_board' => $request->academic_board,
                    'academic_institute' => $request->academic_institute,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'grade_type' => $request->grade_type,
                    'mark_secured' => $request->mark_secured
                ]);
                return response()->json('Education Updated', 200);
            } else {
                abort('500');
            }
        } else {
            abort('500');
        }
    }

    public function deleteEducation($id)
    {
        $user = User::authUser();
        $academic = JobSeekerAcademics::findOrFail($id);
        if ($academic->jobseeker == $user->jobseeker) {
            $academic->delete();
            return response()->json('Deleted Successfully', 200);
        } else {
            return response()->json('Invalid  Request', 500);
        }

    }

    public function addExperience()
    {
        $user = User::authUser();
        $jobseeker = $user->jobseeker;
        $industries = Industries::where('status', 'Active')->get();
        return view('jobseeker.modals.add_experience', compact('jobseeker', 'industries'));

    }

    public function editExperience($id)
    {
        $experience = JobSeekerExperiences::findOrFail($id);
        $user = User::authUser();

        if ($experience->jobseeker == $user->jobseeker) {
            $industries = Industries::where('status', 'Active')->get();
            return view('jobseeker.modals.edit_experience', compact('experience', 'industries'));
        } else {
            abort(500);
        }
    }

    public function saveExperience(Request $request)
    {

        if ($request->ajax()) {
            $this->validate($request, [
                'organization_title' => 'required',
                'organization_nature' => 'required',
                'job_location' => 'required',
                'job_title' => 'required',
                'job_category' => 'required',
                'job_level' => 'string',
                'organization' => 'string',
                'duties_responsibilities' => 'required',
                'start_date_year' => 'numeric',
                'start_date_month' => 'digits_between:1,12',
                'start_date_day' => 'digits_between:1,31',
                'end_date_year' => 'numeric',
                'end_date_month' => 'digits_between:1,12',
                'end_date_day' => 'digits_between:1,31',
            ]);
            $user = User::authUser();

            $start_date = $request->start_date_year . '-' . $request->start_date_month . '-' . $request->start_date_day;
            $end_date = $request->end_date_year . '-' . $request->end_date_month . '-' . $request->end_date_day;
            if (isset($request->currently_working)) {
                $end_date = null;
            }
            $hide_organization = 'No';
            if (isset($request->hide_organization)) {
                $hide_organization = 'Yes';
            }

            $user->jobseeker->experiences()->create([
                'organization_title' => $request->organization_title,
                'hide_organization' => $hide_organization,
                'organization_nature' => $request->organization_nature,
                'job_location' => $request->job_location,
                'job_title' => $request->job_title,
                'job_industry' => $request->job_category,
                'job_level' => $request->job_level,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'organization' => $request->organization,
                'duties_responsibilities' => $request->duties_responsibilities,

            ]);

            return response()->json('Experience Added', 200);

        } else {
            abort('500');
        }
    }

    public function updateExperience(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'id' => 'required',
                'organization_title' => 'required',
                'organization_nature' => 'required',
                'job_location' => 'required',
                'job_title' => 'required',
                'job_category' => 'required',
                'job_level' => 'string',
                'organization' => 'string',
                'duties_responsibilities' => 'required',
                'start_date_year' => 'numeric',
                'start_date_month' => 'digits_between:1,12',
                'start_date_day' => 'digits_between:1,31',
                'end_date_year' => 'numeric',
                'end_date_month' => 'digits_between:1,12',
                'end_date_day' => 'digits_between:1,31',
            ]);
            $user = User::authUser();
            $experience = JobSeekerExperiences::findOrFail($request->id);
            if ($experience->jobseeker == $user->jobseeker) {
                $start_date = $request->start_date_year . '-' . $request->start_date_month . '-' . $request->start_date_day;
                $end_date = $request->end_date_year . '-' . $request->end_date_month . '-' . $request->end_date_day;
                if (isset($request->currently_working)) {
                    $end_date = null;
                }
                $hide_organization = 'No';
                if (isset($request->hide_organization)) {
                    $hide_organization = 'Yes';
                }
                $experience->update([
                    'organization_title' => $request->organization_title,
                    'hide_organization' => $hide_organization,
                    'organization_nature' => $request->organization_nature,
                    'job_location' => $request->job_location,
                    'job_title' => $request->job_title,
                    'job_industry' => $request->job_category,
                    'job_level' => $request->job_level,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'organization' => $request->organization,
                    'duties_responsibilities' => $request->duties_responsibilities,
                ]);
                return response()->json('Experience Updated', 200);
            }
        } else {
            abort('500');
        }
    }

    public function deleteExperience($id)
    {
        $user = User::authUser();
        $experience = JobSeekerExperiences::findOrFail($id);
        if ($experience->jobseeker == $user->jobseeker) {
            $experience->delete();
            return response()->json('Deleted Successfully', 200);
        } else {
            return response()->json('Invalid  Request', 500);
        }

    }

    public function addSocial()
    {
        $user = User::authUser();
        if (isset($user)) {
            return view('jobseeker.modals.add_social');
        } else {
            abort(404);
        }
    }

    public function editSocial($id)
    {
        $social = JobSeekerSocial::findOrFail($id);
        $user = User::authUser();

        if ($social->jobseeker == $user->jobseeker) {
            return view('jobseeker.modals.edit_social', compact('social'));
        } else {
            abort(500);
        }
    }

    public function saveSocial(Request $request)
    {

        if ($request->ajax()) {
            $this->validate($request, [
                'social_account' => 'required|string',
                'social_link' => 'required|url',
            ]);
            $user = User::authUser();

            $user->jobseeker->social()->create([
                'social_account' => $request->social_account,
                'social_link' => $request->social_link,
            ]);

            return response()->json('Social Added', 200);

        } else {
            abort('500');
        }
    }

    public function updateSocial(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'id' => 'required|numeric',
                'social_account' => 'required|string',
                'social_link' => 'required|url',
            ]);
            $user = User::authUser();
            $social = JobSeekerSocial::findOrFail($request->id);
            if ($social->jobseeker == $user->jobseeker) {
                $social->update([
                    'social_account' => $request->social_account,
                    'social_link' => $request->social_link,
                ]);
                return response()->json('Social Updated', 200);
            } else {
                abort('501');
            }
        } else {
            abort('501');
        }
    }

    public function deleteSocial($id)
    {
        $user = User::authUser();
        $social = JobSeekerSocial::findOrFail($id);
        if ($social->jobseeker == $user->jobseeker) {
            $social->delete();
            return response()->json('Deleted Successfully', 200);
        } else {
            return response()->json('Invalid  Request', 500);
        }

    }

    public function relatedJobs()
    {
        return view('jobseeker.maching_jobs');
    }

    public function savedJobs()
    {
        $user = User::authUser();
        if (isset($user) && $user->jobseeker()->exists()) {
            $savedjobs = SavedJobs::where('job_seekers_id', $user->jobseeker->id)->get();
//            return $savedjobs;
            return view('jobseeker.saved_jobs', compact('savedjobs'));
        } else {
            return 'Not logged in';
        }

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
