<?php

namespace App\Http\Controllers\Admin;

use App\Model\JobSeekers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Sentinel;

class JobseekerController extends Controller
{
    public function index()
    {
        return view('admin.jobseekers.index');
    }

    public function create()
    {
        return view('admin.jobseekers.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:2| max:18',
            'last_name' => 'required|min:2| max:18',
            'email' => 'email|required|unique:users,email',
            'password' => 'confirmed|required| min:5 |max:30',
            'password_confirmation' => 'required| min:5 |max:30',
            'mobile' => 'required|numeric|min:9',
            'gender' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'permanent_address' => 'required',
            'status' => 'required',

        ]);
        $credentials = [
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'email' => trim($request->email),
            'password' => trim($request->password),
            'mobile' => trim($request->mobile),
            'address' => trim($request->permanent_address),
        ];

        $user = \Sentinel::registerAndActivate($credentials);
        $role = \Sentinel::findRoleBySlug('jobseeker');
        $role->users()->attach($user);

        $user->jobseeker()->create([
            'about_me' => $request->about_me,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'marital_status'=>$request->marital_status,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
            'mobile' => $request->secondary_mobile,
            'current_address' => $request->current_address,
            'permanent_address' =>$request->permanent_address,
            'status' => $request->status,
        ]);

        if ($request->hasFile('user_image')) {
            $this->validate($request, [
                'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            ]);
            $uploaded_image = $request->file('user_image');
            $user_image = str_slug($request->first_name) . '-' . str_slug($request->last_name) . '-' . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/jobseekers/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $user_image);
            $destinationPath = public_path('/uploads/jobseekers/');
            $uploaded_image->move($destinationPath, $user_image);
            $user->jobseeker()->update([
                'image' => $user_image
            ]);
        }

        return response()->json("$user->first_name   $user->last_name, Account Created", 200);

    }

    public function updateJobSeeker(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'first_name' => 'required|min:2| max:18',
            'last_name' => 'required|min:2| max:18',
            'email' => 'email|required',
            'mobile' => 'required|numeric|min:9',
            'permanent_address' => 'required',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'status' => 'required',
        ]);

        $user = User::findOrFail($request->id);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->permanent_address
        ]);

        $user->jobseeker()->updateOrcreate(['user_id'=>$user->id],[
            'about_me' => $request->about_me,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'marital_status'=>$request->marital_status,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
            'mobile' => $request->secondary_mobile,
            'current_address' => $request->current_address,
            'permanent_address' =>$request->permanent_address,
            'status' => $request->status,
        ]);

        if ($request->password) {
            $this->validate($request, [
                'password' => 'confirmed|required| min:5 |max:30',
                'password_confirmation' => 'required| min:5 |max:30',
            ]);
            $user->update([
                'password' => bcrypt(trim($request->password))
            ]);
        }
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
            $user_image = str_slug($request->first_name) . '-' . str_slug($request->last_name) . '-' . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/jobseekers/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $user_image);
            $destinationPath = public_path('/uploads/jobseekers/');
            $uploaded_image->move($destinationPath, $user_image);
            $user->jobseeker()->update([
                'image' => $user_image
            ]);
        }
        $user->update();
        return response()->json("$user->first_name   $user->last_name", 200);
    }


    public function edit($id)
    {
        $user = User::has('jobseeker')->find($id);
        return view('admin.jobseekers.edit', compact('user'));

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (!empty($user->jobseeker->image)) {
            if (file_exists(public_path('uploads/jobseekers/thumbnails/' . $user->jobseeker->image))) {
                unlink(public_path('uploads/jobseekers/thumbnails/' . $user->jobseeker->image));
            }
            if (file_exists(public_path('uploads/jobseekers/' . $user->jobseeker->image))) {
                unlink(public_path('uploads/jobseekers/' . $user->jobseeker->image));
            }
        }
        $user->jobseeker()->delete();
        $user->delete();
        return response()->json('delete success', 200);
    }


    public function jobSeekerJson()
    {
        $users = User::has('jobseeker')->get();
        foreach ($users as $user) {
            $user->jobseeker = $user->jobseeker;
            $user->user_image = $user->jobseeker->image;
            $user->status = $user->jobseeker->status;
        }

        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $users->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $users->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })
            ->make();
    }

    public function updateStatus($id)
    {
        $jobseeker = JobSeekers::findOrFail($id);
        if ($jobseeker->status == 'Active') {
            $jobseeker->status = 'Inactive';
        } else {
            $jobseeker->status = 'Active';
        }
        $jobseeker->update();
        return response()->json('updated');

    }

}
