<?php

namespace App\Http\Controllers\Admin;

use App\Model\Employers;
use App\Model\Industries;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class EmployerController extends Controller
{

    public function index()
    {
        $all_employer = User::has('employer')->get();
        return view('admin.employers.index', compact('all_employer'));
    }

    public function create()
    {
        $industries = Industries::where('status', 'Active')->get();
        return view('admin.employers.add', compact('industries'));
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
            'address' => 'required',
            'company_name' => 'required|min:2| max:50',
            'company_industry' => 'required|numeric',
            'company_address' => 'required|min:2| max:35',
            'company_email' => 'email|required|unique:companies,email',
            'company_phone' => 'required| min:8 |max:15',
            'company_employers' => 'required',
            'company_branches' => 'required',
            'company_establish' => 'required',
            'company_ownership' => 'required',
            'company_description' => 'required',
            'company_banner' => 'image|mimes:jpeg,png,jpg,gif,svg| max:6096',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096 ',
        ]);

        $credentials = [
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'email' => trim($request->email),
            'password' => trim($request->password),
            'mobile' => trim($request->mobile),
            'address' => trim($request->address),
        ];

        $user = \Sentinel::registerAndActivate($credentials);
        $role = \Sentinel::findRoleBySlug('employer');
        $role->users()->attach($user);

        $user->employer()->create([
            'top_employer' => 'NO',
            'status' => 'Active',
            'image' => ''
        ]);


        $company = $user->company()->create([
            'industry_id' => $request->company_industry,
            'user_id' => $user->id,
            'employers_id' => $user->employer->id,
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
        if (!isset($company)) {
            $user->delete();
            $user->employer()->delete();
            return response()->json('error', 'Error occurred try again ! ');
        }

        if ($request->hasFile('company_logo')) {
            $uploaded_image = $request->file('company_logo');
            $logo = str_slug($request->company_name) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/companies/logos/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $logo);
            $destinationPath = public_path('/uploads/companies/logos/');
            $uploaded_image->move($destinationPath, $logo);
            $user->company()->update([
                'logo' => $logo
            ]);
        }
        if ($request->hasFile('company_banner')) {
            $uploaded_image = $request->file('company_banner');
            $banner = str_slug($request->company_name) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companies/covers/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);
            $destinationPath = public_path('/uploads/companies/covers/');
            $uploaded_image->move($destinationPath, $banner);
            $user->company()->update([
                'cover_image' => $banner
            ]);
        }

        return response()->json("$company->title ", 200);

    }

    public function updateEmployer(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'first_name' => 'required|min:2| max:18',
            'last_name' => 'required|min:2| max:18',
            'email' => 'email|required',
            'mobile' => 'required|numeric|min:9',
            'address' => 'required',
            'company_name' => 'required|min:2| max:50',
            'company_industry' => 'required|numeric',
            'company_address' => 'required|min:2| max:35',
            'company_email' => 'email|required',
            'company_phone' => 'required| min:8 |max:15',
            'company_employers' => 'required',
            'company_branches' => 'required',
            'company_establish' => 'required',
            'company_ownership' => 'required',
            'company_banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6096',
            'company_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6096',
        ]);

        $user = User::findOrFail($request->id);
        $user->update([
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'email' => trim($request->email),
            'mobile' => trim($request->mobile),
            'address' => trim($request->address)
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

        $user->company()->updateOrCreate(['employers_id' => $user->employer->id], [
            'industry_id' => $request->company_industry,
            'user_id' => $user->id,
            'employers_id' => $user->employer->id,
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


        if ($request->hasFile('company_logo')) {
            if ($user->company()->exists()) {
                if (!empty($user->company->logo)) {
                    if (file_exists(public_path('uploads/companies/logos/thumbnails/' . $user->company->logo))) {
                        unlink(public_path('uploads/companies/logos/thumbnails/' . $user->company->logo));
                    }
                    if (file_exists(public_path('uploads/companies/logos/' . $user->company->logo))) {
                        unlink(public_path('uploads/companies/logos/' . $user->company->logo));
                    }
                }
            }
            $uploaded_image = $request->file('company_logo');
            $logo = str_slug($request->company_name) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/companies/logos/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $logo);
            $destinationPath = public_path('/uploads/companies/logos/');
            $uploaded_image->move($destinationPath, $logo);
            $user->company()->update([
                'logo' => $logo
            ]);
        }

        if ($request->hasFile('company_banner')) {
            if ($user->company()->exists()) {
                if (!empty($user->company->cover_image)) {
                    if (file_exists(public_path('uploads/companies/covers/thumbnails/' . $user->company->cover_image))) {
                        unlink(public_path('uploads/companies/covers/thumbnails/' . $user->company->cover_image));
                    }
                    if (file_exists(public_path('uploads/companies/covers/' . $user->company->cover_image))) {
                        unlink(public_path('uploads/companies/covers/' . $user->company->cover_image));
                    }
                }
            }
            $uploaded_image = $request->file('company_banner');
            $banner = str_slug($request->company_name) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companies/covers/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);
            $destinationPath = public_path('/uploads/companies/covers/');
            $uploaded_image->move($destinationPath, $banner);
            $user->company()->update([
                'cover_image' => $banner
            ]);
        }

        return response()->json("$user->first_name   $user->last_name", 200);
    }

    public function edit($id)
    {
        $employer = Employers::where('user_id', $id)->first();
        $industries = Industries::where('status', 'Active')->get();
        return view('admin.employers.edit', compact('employer', 'industries'));
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->company()->exists()) {
           if(!empty( $user->company->logo)) {
                if (file_exists(public_path('uploads/companies/logos/thumbnails/'. $user->company->logo))) {
                    unlink(public_path('uploads/companies/logos/thumbnails/'. $user->company->logo));
                }
                if (file_exists(public_path('uploads/companies/logos/'. $user->company->logo))) {
                    unlink(public_path('uploads/companies/logos/'. $user->company->logo));
                }
            }
            if(!empty( $user->company->cover_image)) {
                if (file_exists(public_path('uploads/companies/covers/thumbnails/'. $user->company->cover_image))) {
                    unlink(public_path('uploads/companies/covers/thumbnails/'. $user->company->cover_image));
                }
                if (file_exists(public_path('uploads/companies/covers/'. $user->company->cover_image))) {
                    unlink(public_path('uploads/companies/covers/'. $user->company->cover_image));
                }
            }
            if ($user->company->jobposts()->exists()) {
                foreach ($user->company->jobposts as $jobpost) {
                    if(isset($jobpost->job_banner)){
                        if (file_exists(public_path('uploads/jobposts/thumbnails/'.$jobpost->job_banner))) {
                            unlink(public_path('uploads/jobposts/thumbnails/'.$jobpost->job_banner));
                        }
                        if (file_exists(public_path('uploads/jobposts/'.$jobpost->job_banner))) {
                            unlink(public_path('uploads/jobposts/'.$jobpost->job_banner));
                        }
                    }

                    if ($jobpost->savedjob()->exists()) {
                        $jobpost->savedjob()->delete();
                    }
                    if ($jobpost->jobadditional()->exists()) {
                        $jobpost->jobadditional()->delete();
                    }
                    if ($jobpost->skills()->exists()) {
                        $jobpost->skills()->detach();
                    }
                    if($jobpost->applications()->exists()){
                        $jobpost->applications()->delete();
                    }
                    $jobpost->delete();
                }
            }
            $user->company()->delete();
        }
        $user->employer()->delete();
        $user->delete();

        return response()->json('delete success', 200);
    }

    public function employerJson()
    {
        $all_employer = User::has('employer')->get();
        foreach ($all_employer as $employer) {
            $employer->employers = $employer->employer;
            $employer->company = $employer->company()->exists() ? $employer->company : 'No';

        }
        return DataTables::of($all_employer)
            ->addColumn('action', function ($all_employer) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $all_employer->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $all_employer->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })
//            ->editColumn('id', 'ID: {{ $id }}')
            ->make();
    }

    public function updateStatus($id)
    {
        $employer = Employers::findOrFail($id);
        if ($employer->status == 'Active') {
            $employer->status = 'Inactive';
        } else {
            $employer->status = 'Active';
        }
        $employer->update();
        return response()->json('updated');

    }

    public function updateTopEmployer($id)
    {
        $employer = Employers::findOrFail($id);
        if ($employer->top_employer == 'Yes') {
            $employer->top_employer = 'No';
        } else {
            $employer->top_employer = 'Yes';
        }
        $employer->update();
        return response()->json('updated', 200);

    }

}
