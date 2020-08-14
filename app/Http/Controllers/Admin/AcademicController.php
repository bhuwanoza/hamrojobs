<?php

namespace App\Http\Controllers\Admin;

use App\Model\Qualifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class AcademicController extends Controller
{

    public function index()
    {
        return view('admin.academics.academic');
    }

    public function create()
    {
        return view('admin.academics.add');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'academic_title' => 'required|min:2| max:50',
            'academic_status' => 'required',
        ]);

        $qualify = Qualifications::create([
            'title' => $request->academic_title,
            'status' => $request->academic_status
        ]);
        return response()->json("$qualify->title, Added");

    }

    public function edit($id)
    {
        $academic = Qualifications::findOrFail($id);
        return view('admin.academics.edit', compact('academic'));
    }

    public function updateAcademic(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'academic_title' => 'required|min:2| max:50',
            'academic_status' => 'required',
        ]);
        $id = $request->id;
        $qualify = Qualifications::findOrFail($id);

        $qualify->update([
            'title' => $request->academic_title,
            'status' => $request->academic_status
        ]);

        return response()->json("$qualify->title, Updated");
    }

    public function destroy($id)
    {
        $qualification = Qualifications::findOrFail($id);
        if($qualification->jobadditional()->exists()){
            return response()->json('Academic cannot be deleted, It is being used by another elements!',500);
        }else{
            $qualification->delete();
            return response()->json("Successfully deleted ," . $qualification->title);
        }
    }

    public function academicJson()
    {
        $qualification = Qualifications::all();
        return DataTables::of($qualification)
            ->addColumn('action', function ($qualification) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $qualification->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $qualification->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })
            ->make();
    }

    public function updateStatus($id)
    {
        $qualification = Qualifications::findOrFail($id);
        if ($qualification->status == 'Active') {
            $qualification->status = 'Inactive';
        } else {
            $qualification->status = 'Active';
        }
        $qualification->update();
        return response()->json('updated');
    }


}
