<?php

namespace App\Http\Controllers\Employer;

use App\Model\Companies;
use App\Model\Industries;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()    {
        $user= User::authUser();
        $title=$user->first_name;
        $industries= Industries::where('status','Active')->get();
        return view('employer.add_company',compact('user','title','industries'));
    }

    public function store(Request $request)   {
        $user= User::authUser();
        if(!$user){
            return abort(404);
        }
         if($user->company){
            return redirect('employer/profile');
         }
        $this->validate($request, [
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
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'company_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        if($request->hasFile('company_logo')){
            $uploaded_image = $request->file('company_logo');
            $logo =  str_slug($request->company_name). time() . '.' .$uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/companies/logos/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$logo);
            $destinationPath = public_path('/uploads/companies/logos/');
            $uploaded_image->move($destinationPath, $logo);
        }

        if($request->hasFile('company_banner')){

            $uploaded_image = $request->file('company_banner');
            $banner =  str_slug($request->company_name). time() . '.' .$uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/companies/covers/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$banner);
            $destinationPath = public_path('/uploads/companies/covers/');
            $uploaded_image->move($destinationPath, $banner);
        }

        $employer= $user->employer;

        $company= new Companies();
        $company->industry_id       =$request->company_industry;
        $company->user_id           =$user->id;
        $company->employers_id      =$employer->id;
        $company->title             =trim($request->company_name);
        $company->address           =trim($request->company_address);
        $company->email             =trim($request->company_email);
        $company->phone             =trim($request->company_phone);
        $company->website           =$request->company_website?$request->company_website:null;
        $company->fax               =$request->company_fax?$request->company_fax:null;
        $company->total_employees   =trim($request->company_employers);
        $company->branches          =trim($request->company_branches);
        $company->established_date  =trim($request->company_establish);
        $company->ownership         =trim($request->company_ownership);
        $company->description       =trim($request->company_description);

        $company->seo               = $request->company_name ;
        $company->status            = 'Active';
        $company->logo              = $logo;
        $company->cover_image       = $banner?$banner:null;
        $company->save();

        $request->session()->flash('success_message',"Profile updated successfully, Post your new jobs now.");
        return response()->json('success',200);

    }

}
