<?php

namespace App\Http\Controllers\Front;

use App\Model\Industries;
use App\Model\JobPosts;
use App\Model\Qualifications;
use App\Model\Skills;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustriesController extends Controller
{
    public function index(){
        $industries= Industries::where('status','Active')->orderBy('title', 'asc')->get();
        return view('front.industries',compact('industries'));
    }

    public function showIndustry($slug){
        $industry= Industries::where('status','Active')->where('slug', trim($slug))->first();

         if(isset($industry)){
             $industries = Industries::where('status', 'Active')->get();
             $locations = JobPosts::where('status', 'Active')->pluck('location', 'location');
             $educations = Qualifications::where('status', 'Active')->get();
             $skills= Skills::all();
             $jobs = JobPosts::whereHas('industry',function ($query) use($industry){
                 $query->where('id',$industry->id);
             })->where('job_deadline', '>=', Carbon::now())->orderBy('created_at', 'DESC')->paginate(6);

             return view('front.jobs_all',compact('industry','industries', 'locations', 'educations', 'jobs','skills'));
         }
         else{
              abort(404);
         }
    }
}
