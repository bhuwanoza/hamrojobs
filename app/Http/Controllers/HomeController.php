<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Mail\ReplyContactUs;
use App\Model\Companies;
use App\Model\ContactUs;
use App\Model\Industries;
use App\Model\JobPosts;
use App\Model\PaymentInfo;
use App\Model\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
       
        $top_industries = Industries::withCount('jobs')->where('status', 'Active')->orderBy('jobs_count','desc')->take(8)->get();

        // $heavy_industries= Industries::withCount('jobs')->where('status', 'Active')->orderBy('jobs_count','desc')->take(16)->get();
        $heavy_industries= Industries::with('jobs')->where('status', 'Active')->get()->sortBy(function($u){
                return count($u->jobs->where('job_deadline', '>=', Carbon::now())->where('status', 'Active'));
         }, $options = SORT_REGULAR, $descending = true);

        $top_companies = Companies::where('status', 'Active')
            ->where('top_company', 'Yes')->orderBy('created_at', 'desc')->get();

        $trending_jobs = JobPosts::where('status', 'Active')
            ->where('job_deadline', '>=', Carbon::today())
            // ->where('created_at', '>=', Carbon::now()->subMonth())
            ->where('count', '>', 10)->take(8)->orderBy('created_at', 'desc')->get();

        $top_jobs = JobPosts::where('status', 'Active')
            ->where('job_deadline', '>=', Carbon::today())
            // ->where('created_at', '>=', Carbon::now()->subMonth(2))
            ->where('service_type', 'Top Job')->orderBy('created_at', 'desc')->get();
            // ->where('service_type', 'Top Job')->orderBy('created_at', 'desc')->paginate(10, ['*'], 'top-jobs');

        $featured_jobs = JobPosts::where('status', 'Active')
            ->where('job_deadline', '>=', Carbon::today())
            // ->where('created_at', '>=', Carbon::now()->subMonth(2))
            ->where('service_type', 'Featured Job')->orderBy('created_at', 'desc')->get();

        $hot_jobs = JobPosts::where('status', 'Active')
            ->where('job_deadline', '>=', Carbon::today())
            // ->where('created_at', '>=', Carbon::now()->subMonth(2))
            ->where('service_type', 'Hot Job')->orderBy('created_at', 'desc')->get();

        $newspaper_jobs = JobPosts::where('status', 'Active')
            ->where('job_deadline', '>=', Carbon::today())
            // ->where('created_at', '>=', Carbon::now()->subMonth(2))
            ->where('service_type', 'Newspaper Job')->orderBy('created_at', 'desc')->get();

        $free_jobs = JobPosts::where('status', 'Active')
            ->where('job_deadline', '>=', Carbon::today())
            // ->where('created_at', '>=', Carbon::now()->subMonth(2))
            ->where('service_type', 'Free Job')->orderBy('created_at', 'desc')->get();

        $testimonials= Testimonial::where('status','Active')->get();

        return view('home', compact('top_industries', 'trending_jobs', 'top_jobs', 'featured_jobs', 'hot_jobs', 'newspaper_jobs', 'top_companies','heavy_industries','free_jobs','testimonials'));
    }

    public function aboutUs()
    {
        return view('about_us');

    }

    public function contactUs()
    {
        return view('contact_us');

    }

    public function postContactUs(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactUs::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'subject' => $request->subject,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
            'status' => 'Unseen',
            'ip_address' => \Request::ip(),
        ]);

        $data = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message'],
            'mobile' => $request['mobile']
        ];

        if (getConfiguration('site_primary_email')) {
            Mail::to(getConfiguration('site_primary_email'))->send(new ContactUsMail($data));
        }

        Mail::to($request['email'])->send(new ReplyContactUs($data));

        return response()->json('Thanks for contacting us. We will reply you soon.');
    }

    public function privacyPolicy()
    {
        return view('privacy_policy');

    }

    public function termsConditions()
    {
        return view('terms_conditions');

    }

    public function paymentMethods()
    {
        $payments= PaymentInfo::where('status','Active')->orderBy('bank_title', 'asc')->get();
        return view('front.payment_info',compact('payments'));
    }

    public function pageNotFound()
    {
        return view('errors.404');

    }

    public function internalServerError()
    {

    }

    public function locationSuggest(Request $request)
    {
        $terms = $request->data;
        $data = file_get_contents("https://maps.googleapis.com/maps/api/place/autocomplete/json?input=" . $terms . "&types=geocode&key=AIzaSyD-kHRaqZRqIjrKryJfhy6V0svlzVak3tg");


        $arr = array();
        $i = 0;
        foreach (json_decode($data)->predictions as $item) {
            $arr[$i] = array(
                'id' => $i,
                'text' => $item->description
            );
            $i++;
        }
        echo json_encode($arr);
    }
}








