<?php

namespace App\Http\Controllers\Admin;

use App\Model\AppliedJobs;
use App\Model\Employers;
use App\Model\JobPosts;
use App\Model\JobSeekers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{

    public function index()
    {
        $jscount = JobSeekers::where('status', 'Active')->count();
        $empcount = Employers::where('status', 'Active')->count();
        $jpcount = JobPosts::count();
        $appcount = AppliedJobs::count();
        return view('admin.dashboard', compact('jscount', 'empcount', 'jpcount', 'appcount'));
    }

    public function profile()
    {
        $user = User::authUser();
        return view('admin.profile.index', compact('user'));
    }

    public function postProfile(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|min:2| max:18',
            'last_name' => 'required|min:2| max:18',
            'email' => 'email|required',
            'mobile' => 'required|numeric|min:9',
            'address' => 'required',

        ]);
        $user = User::authUser();
        $user->update([
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'email' => trim($request->email),
            'mobile' => trim($request->mobile),
            'address' => trim($request->address),

        ]);
        return redirect()->back()->with(['success_message' => 'Account Information Changed']);
    }

    public function postPasswordChange(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required| min:5 |max:30',
            'password' => 'confirmed|required| min:5 |max:30',
            'password_confirmation' => 'required| min:5 |max:30',
        ]);
        $user = User::authUser();
        if (Hash::check($request->input('current_password'), $user->password)) {
            $user->update(['password' => bcrypt($request->password)]);
            return redirect()->back()->with('success', 'Password Changed Successfully !');
        } else {
            return redirect()->back()->with('error', 'YOU HAVE ENTERED WRONG PASSWORD !');
        }

    }

    public function updateImage(Request $request)
    {
        $user = User::authUser();
        if ($request->has('image')) {
            if (!empty($user->admin->image)) {
                if (file_exists(public_path('uploads/admin/thumbnails/' . $user->admin->image))) {
                    unlink(public_path('uploads/admin/thumbnails/' . $user->admin->image));
                }
                if (file_exists(public_path('uploads/admin/' . $user->admin->image))) {
                    unlink(public_path('uploads/admin/' . $user->admin->image));
                }
            }
            $uploaded_image = $request->file('image');
            $image = str_slug($user->first_name) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/admin/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image);
            $destinationPath = public_path('/uploads/admin/');
            $uploaded_image->move($destinationPath, $image);
            $user->admin->update([
                'image' => $image
            ]);
        }

        return response()->json('success', 200);

    }

    public function recentJobsJson()
    {
        $jobpost = JobPosts::orderBy('created_at', 'desc')->take(10)->get();
        foreach ($jobpost as $job) {
            $jobpost->job_company = $job->company;
            $jobpost->job_industry = $job->industry;
        }
        return DataTables::of($jobpost)->make();
    }

}
