<?php

namespace App\Http\Controllers\Front;

use App\Model\Companies;
use App\Model\Industries;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    public function index(){
        $companies= Companies::where('status','Active')->orderBy('title', 'asc')->get();
        return view('front.companies_all',compact('companies') );

    }

    public function  showCompany($slug){
        $company=Companies::where('status','Active')->where('slug',$slug)->first();
        if(isset($company)){

            $parent_industry=Industries::where('id',$company->industry_id)->first();
            if(isset($parent_industry)){
                if($company->jobposts->isNotEmpty()){
                    $similar_jobs=$parent_industry->jobs()->where('status','Active')->where('job_deadline', '>=', Carbon::now())
                        ->whereNotIn('id',[$company->jobposts])->orderBy('created_at', 'desc')->take(5)->get();
                }
                else{
                    $similar_jobs=$parent_industry->jobs()->where('status','Active')->where('job_deadline', '>=', Carbon::now())
                        ->orderBy('created_at', 'desc')->take(5)->get();
                }
            }
            return view('front.company_single',compact('company','similar_jobs'));

        }
        else{
            abort(404);
        }
    }
}
