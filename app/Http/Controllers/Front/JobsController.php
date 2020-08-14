<?php

namespace App\Http\Controllers\Front;

use App\Mail\JobAppliedMail;
use App\Model\AppliedJobs;
use App\Model\Industries;
use App\Model\JobPosts;
use App\Model\Qualifications;
use App\Model\SavedJobs;
use App\Model\Skills;
use App\User;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Share;


class JobsController extends Controller
{
    public function index()
    {
        $industries = Industries::where('status', 'Active')->orderBy('title', 'asc')->get();
        $locations = JobPosts::where('status', 'Active')->orderBy('location', 'asc')->pluck('location', 'location');
        $educations = Qualifications::where('status', 'Active')->get();
        $jobs = JobPosts::where('status', 'Active')->where('job_deadline', '>=', Carbon::now())->orderBy('created_at', 'DESC')->paginate(6);
        $skills = Skills::orderBy('title', 'asc')->get();
        return view('front.jobs_all', compact('industries', 'locations', 'educations', 'jobs', 'skills'));
    }

    public function search(Request $request)
    {
        $industries = Industries::where('status', 'Active')->orderBy('title', 'asc')->get();
        $educations = Qualifications::where('status', 'Active')->get();
        $locations = JobPosts::where('status', 'Active')->orderBy('location', 'asc')->pluck('location', 'location');
        $skills = Skills::orderBy('title', 'asc')->get();

        $query = $request->get('query');
        if (isset($query)) {
            $queryParam = explode(' ', $query);
        } else {
            $queryParam = null;
        }
        $jobs = JobPosts::where(function ($que) use ($queryParam) {
            if (isset($queryParam)) {
                foreach ($queryParam as $queries) {
                    $que->orWhere('job_posts.title', 'like', '%' . $queries . '%');
                    $que->orWhere('job_posts.location', 'like', '%' . $queries . '%');
                    $que->orWhere('companies.title', 'like', '%' . $queries . '%');
//                    $que->orWhere('skills.title', 'like', '%' . $queries . '%');
                }
            }
        })
            ->join('companies', 'companies.id', '=', 'job_posts.company_id')
            /*->join('job_posts_skills', 'job_posts_skills.job_posts_id', '=', 'job_posts.id')
            ->join('skills', 'job_posts_skills.skills_id', '=', 'skills.id')*/
            ->where('job_posts.status','Active')
            ->where('job_posts.job_deadline', '>=', Carbon::now())
            ->orderBy('created_at', 'DESC')
            ->select('job_posts.*')
            ->groupBy('job_posts.id')
            ->paginate(10);

        return view('front.jobs_all', compact('industries', 'educations', 'locations', 'empty', 'skills', 'jobs', 'query'));

    }

    public function jobFilter(Request $request)
    {
        if ($request->ajax()) {

//            $this->validate($request, [
//                'job_industry' => 'numeric',
//                'job_level' => 'string',
//                'job_type' => 'string',
//                'job_category' => 'string',
//                'job_education' => 'numeric',
//                'job_location' => 'string',
//            ]);
            if ($request->has('job_industry') || $request->has('job_level') || $request->has('job_type') ||
                $request->has('job_category') || $request->has('job_education') || $request->has('job_location') ||
                $request->has('start_date') || $request->has('end_date') || $request->has('skills') || $request->has('query')) {

                $job = JobPosts::where(function ($que) use ($request) {
                    $que->join('job_post_additionals', 'job_post_additionals.job_id', '=', 'job_posts.id');

                    if ($request->has('job_education')) {
                        $que->join('qualifications', 'qualifications.id', '=', 'job_post_additionals.education_level');
                        $que->whereIn('qualifications.id', $request->job_education);
                    }
                });
                if($request->has('query')){
                     $query = $request->get('query');
                     if (isset($query)) {
                         $queryParam = explode(' ', $query);
                     } else {
                         $queryParam = null;
                     }
                     if (isset($queryParam)) {
                         $job->where( function($query) use ($queryParam){
                             foreach ($queryParam as $queries) {
                                 $query->orWhere('job_posts.title', 'like', '%' . $queries . '%');
                                 $query->orWhere('job_posts.location', 'like', '%' . $queries . '%');
                                 $query->orWhere('companies.title', 'like', '%' . $queries . '%');
                             }
                         });

                         $job->join('companies', 'companies.id', '=', 'job_posts.company_id');
                     }
                 }
                if ($request->has('job_industry')) {
                    $job->join('industries', 'industries.id', '=', 'job_posts.industry_id');
                    $job->whereIn('industries.id', $request->job_industry);
                }
                if ($request->has('job_location')) {
                    $job->whereIn('job_posts.location', $request->job_location);
                }
                if ($request->has('job_level')) {
                    $job->whereIn('job_posts.job_level', $request->job_level);
                }
                if ($request->has('job_category')) {
                    $job->whereIn('job_posts.service_type', $request->job_category);
                }
                if ($request->has('job_type')) {
                    $job->whereIn('job_posts.job_type', $request->job_type);
                }
                if ($request->has('skills')) {
                    $job->join('job_posts_skills', 'job_posts_skills.job_posts_id', '=', 'job_posts.id');
                    $job->join('skills', 'job_posts_skills.skills_id', '=', 'skills.id');
                    $job->whereIn('skills.id', $request->skills);
                }
                if (($request->has('start_date') && $request->start_date != '') && ($request->has('end_date') && $request->end_date != '')) {
                    $start_date = $request->start_date;
                    $end_date = $request->end_date;
                    $job->whereBetween('job_posts.created_at', [$start_date, $end_date]);
                } else {
                    $job->orderBy('created_at', 'desc');
                }
                $job->select('job_posts.title as jobtitle', 'job_posts.*');
                $job->where('job_posts.status', 'Active');
                $job->where('job_posts.job_deadline', '>=', Carbon::now());

//                return $job->get();

                $jobpost = $job->paginate(6);
                return view('front.filtered', compact('jobpost', 'start_date', 'end_date'));
            }
        }
    }

    public function showJobs($slug)
    {
        $job = JobPosts::where('status', 'Active')->where('slug', $slug)->first();
        if (isset($job)) {
            $job->increment('count', 4);

            $parent_industry = Industries::where('id', $job->industry_id)->first();
            if (isset($parent_industry)) {
                $similar_jobs = $parent_industry->jobs()->where('status', 'Active')->where('job_deadline', '>=', Carbon::now())->whereNotIn('id', [$job->id])->orderBy('created_at', 'desc')->take(5)->get();
            }
            $company = $job->company;
            $company_other_jobs = $company->jobposts()->where('status', 'Active')->where('job_deadline', '>=', Carbon::now())->whereNotIn('id', [$job->id])->orderBy('created_at', 'desc')->take(5)->get();
            // $socialshare= Share::load( route('jobs-single',['slug'=>$job->slug]), '')->services('facebook', 'gplus', 'twitter');
            return view('front.job_details', compact('job', 'similar_jobs', 'company_other_jobs'));
        } else {
            abort(404);
        }
    }

    public function jobSave($id)
    {
        $job = JobPosts::findOrFail($id);
        $user = User::authUser();
        if (isset($user) && $user->jobseeker()->exists()) {
            $already_saved = SavedJobs::where('job_seekers_id', $user->jobseeker->id)
                ->where('job_posts_id', $job->id)->first();
            if (isset($already_saved)) {
                $already_saved->delete();
                return response()->json('false');
            } else {
                SavedJobs::create([
                    'job_seekers_id' => $user->jobseeker->id,
                    'job_posts_id' => $job->id,
                ]);
                return response()->json('true');
            }
        } else {
            return 'User Not Logged In/ Not JobSeeker';
        }
    }

    public function applyJob($id)
    {
        $job = JobPosts::findOrFail($id);
        $user = User::authUser();
        if (isset($user)) {
            if ($user->jobseeker()->exists()) {
                if (empty($user->jobseeker->additional) || $user->jobseeker->academics->isEmpty()) {
                    return response()->json('Your profile is not completed. Please fill up all the required information in profile settings.', 500);
                }
                $already_applied = AppliedJobs::where('seeker_id', $user->jobseeker->id)->where('job_id', $job->id)->where('company_id', $job->company_id)->first();
                if (isset($already_applied)) {
                    return response()->json('You have already applied for this job', 200);
                } else {
                    AppliedJobs::create([
                        'seeker_id' => $user->jobseeker->id,
                        'job_id' => $job->id,
                        'company_id' => $job->company_id,
                        'ip_address' => \Request::ip()
                    ]);
                    
                    Mail::to($user->email)->send(new JobAppliedMail());
                    return response()->json('You have applied for "' . $job->title . '"', 200);
                }
            } else {
                return response('You are not logged in with JobSeeker\'s account', 500);
            }
        } else {
            return response('You need to login to apply this job', 500);
        }

    }
}
