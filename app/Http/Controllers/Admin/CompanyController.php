<?php

namespace App\Http\Controllers\Admin;

use App\Model\Companies;
use App\Model\Industries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;


class CompanyController extends Controller
{
    public function index()
    {
        return view('admin.companies.index');
    }


    public function edit($id)
    {
        $company = Companies::findOrFail($id);
        $industries = Industries::where('status', 'Active')->get();
        return view('admin.companies.edit', compact('company', 'industries'));
    }


    public function updateCompany(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
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
            'company_banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6096',
            'company_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6096',
        ]);
        $id = trim($request->id);
        $company = Companies::findOrFail($id);
        $company->update([
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


        if ($request->hasFile('company_logo')) {
            if (!empty($company->logo)) {
                if (file_exists(public_path('uploads/companies/logos/thumbnails/' . $company->logo))) {
                    unlink(public_path('uploads/companies/logos/thumbnails/' . $company->logo));
                }
                if (file_exists(public_path('uploads/companies/logos/' . $company->logo))) {
                    unlink(public_path('uploads/companies/logos/' . $company->logo));
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
            $company->update([
                'logo' => $logo
            ]);
        }
        if ($request->hasFile('company_banner')) {
            if (!empty($company->cover_image)) {
                if (file_exists(public_path('uploads/companies/covers/thumbnails/' . $company->cover_image))) {
                    unlink(public_path('uploads/companies/covers/thumbnails/' . $company->cover_image));
                }
                if (file_exists(public_path('uploads/companies/covers/' . $company->cover_image))) {
                    unlink(public_path('uploads/companies/covers/' . $company->cover_image));
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
            $company->update([
                'cover_image' => $banner
            ]);
        }
        return response()->json("$company->title", 200);

    }


    public function companyJson()
    {
        $companies = Companies::all();
        foreach ($companies as $company) {
            $company->jobcount = $company->jobposts->count();
            $company->industry_name = $company->industry->title;
        }

        return DataTables::of($companies)
            ->addColumn('action', function ($companies) {
                return '<button type="button" class="btn btn-xs btn-success btn-view" data-id="' . $companies->id . '"><i class="fa fa-eye"></i> View</button>
                        <button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $companies->id . '"><i class="fa fa-edit"></i> Edit</button>';
            })
            ->make();

    }

    public function updateTopcompany($id)
    {
        $company = Companies::findOrFail($id);
        if ($company->top_company == 'Yes') {
            $company->top_company = 'No';
        } else {
            $company->top_company = 'Yes';
        }
        $company->update();
        return response()->json('company top updated', 200);

    }

    public function updateStatus($id)
    {
        $companies = Companies::findOrFail($id);
        if ($companies->status == 'Active') {
            $companies->status = 'Inactive';
        } else {
            $companies->status = 'Active';
        }
        $companies->update();
        return response()->json('status updated');

    }

}
