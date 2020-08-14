<?php

namespace App\Http\Controllers\Admin;

use App\Model\Skills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class SkillController extends Controller
{

    public function autoSuggest(Request $request){
/*        >where( 'products.name','like', '%' . $queryParam . '%'  );*/
         $skill= Skills::where('name','like', '%' . $request->query . '%'  )->get();
          return response()->json($skill);
    }

    public function index()
    {
        return view('admin.skills.index');
    }


    public function create()
    {
        return view('admin.skills.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'skill_title' => 'required|min:2| max:55',
            'skill_status' => 'required',
        ]);

        $skill = Skills::create([
            'title' => trim($request->skill_title),
            'status' => trim($request->skill_status),
        ]);

        return response()->json($skill->title, 200);
    }


    public function edit($id)
    {
        $skill = Skills::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    public function updateSkills(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'skill_title' => 'required|min:2| max:55',
            'skill_status' => 'required',
            ]);

        $id = $request->id;
        $skill = Skills::findOrFail($id);

        $skill->update([
            'title' => trim($request->skill_title),
            'status' => trim($request->skill_status),
        ]);
        return response()->json($skill->title, 200);
    }

    public function updateStatus($id)
    {
        $skill = Skills::findOrFail($id);
        if ($skill->status == 'Active') {
            $skill->status = 'Inactive';
        } else {
            $skill->status = 'Active';
        }
        $skill->update();
        return response()->json('Status Updated', 200);
    }

    public function destroy($id)
    {
        $skill = Skills::findOrFail($id);

        $skill->delete();
        return response()->json('Successfully Deleted', 200);
    }

    public function skillJson()
    {
        $skill = Skills::all();
        return DataTables::of($skill)
            ->addColumn('action', function ($skill) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $skill->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $skill->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })->make();
    }
}
