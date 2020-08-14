<?php

namespace App\Http\Controllers\Admin;

use App\Model\Industries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class IndustryController extends Controller
{
    public function index()
    {
        return view('admin.industries.industry');
    }


    public function create()
    {
        return view('admin.industries.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'industry_title' => 'required|min:2| max:50',
            'industry_status' => 'required',
            'industry_top' => 'required',
        ]);

        $industry = Industries::create([
            'title' => $request->industry_title,
            'status' => $request->industry_status,
            'top' => $request->industry_top,
        ]);
        return response()->json("$industry->title, added");
    }

    public function updateIndustry(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'industry_title' => 'required|min:2| max:50',
            'industry_status' => 'required',
            'industry_top' => 'required',
        ]);
        $id = $request->id;
        $industry = Industries::findOrFail($id);
        $industry->update([
            'title' => $request->industry_title,
            'status' => $request->industry_status,
            'top' => $request->industry_top,
        ]);
        return response()->json("$industry->title, Updated");
    }

    public function show($id)
    {
        $industry = Industries::findOrFail($id);
        return view('admin.industries.show', compact('industry'));
    }

    public function edit($id)
    {
        $industry = Industries::findOrFail($id);
        return view('admin.industries.edit', compact('industry'));
    }

    public function destroy($id)
    {
        $industry = Industries::findOrFail($id);
        if($industry->jobs()->exists() || $industry->jobseekeradditional()->exists()){
            return response()->json('Industry cannot be deleted, It is being used by another elements!',500);
        }else{
            $industry->delete();
            return response()->json("Successfully deleted ," . $industry->title);
        }
    }

    public function industryJson()
    {
        $industries = Industries::all();
        return DataTables::of($industries)
            ->addColumn('action', function ($industries) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $industries->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $industries->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })
            ->make();

    }

    public function updateTop($id)
    {
        $industry = Industries::findOrFail($id);
        if ($industry->top == 'Yes') {
            $industry->top = 'No';
        } else {
            $industry->top = 'Yes';
        }
        $industry->update();
        return response()->json('updated');

    }

    public function updateStatus($id)
    {
        $industry = Industries::findOrFail($id);
        if ($industry->status == 'Active') {
            $industry->status = 'Inactive';
        } else {
            $industry->status = 'Active';
        }
        $industry->update();
        return response()->json('updated');
    }

}
