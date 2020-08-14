<?php

namespace App\Http\Controllers\Admin;

use App\Model\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class AdsController extends Controller
{

    public function index()
    {
        return view('admin.advertise.index');

    }


    public function create()
    {
        return view('admin.advertise.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'ad_title' => 'required|min:2| max:55',
            'ad_position' => 'required',
            'ad_status' => 'required',
            'ad_expire' => 'required',
            'ad_image' => 'dimensions:min_width=120,min_height=150|image|mimes:jpeg,png,jpg,gif,svg|max:6096',
        ]);

        $ads = Ads::create([
            'title' => trim($request->ad_title),
            'link' => $request->ad_link ? trim($request->ad_link) : null,
            'status' => trim($request->ad_status),
            'position' => trim($request->ad_position),
            'expires_on' => trim($request->ad_expire),
        ]);

        if ($request->hasFile('ad_image')) {
            $uploaded_image = $request->file('ad_image');
            $banner = str_slug($request->ad_title) . '-' . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/advertise/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);

            $destinationPath = public_path('/uploads/advertise/');
            $uploaded_image->move($destinationPath, $banner);

            $ads->update([
                'image' => $banner
            ]);
        }
        return response()->json($ads->title, 200);
    }


    public function edit($id)
    {
        $ads = Ads::findOrFail($id);
        return view('admin.advertise.edit', compact('ads'));
    }


    public function updateAdvertise(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'ad_title' => 'required|min:2| max:55',
            'ad_position' => 'required',
            'ad_status' => 'required',
            'ad_expire' => 'required',
            'ad_image' => 'dimensions:min_width=120,min_height=150|image|mimes:jpeg,png,jpg,gif,svg|max:10096',
        ]);

        $id = $request->id;
        $ads = Ads::findOrFail($id);

        $ads->update([
            'title' => trim($request->ad_title),
            'link' => $request->ad_link ? trim($request->ad_link) : null,
            'status' => trim($request->ad_status),
            'position' => trim($request->ad_position),
            'expires_on' => trim($request->ad_expire),
        ]);


        if ($request->hasFile('ad_image')) {
            if (!empty($ads->image)) {
                if (file_exists(public_path('uploads/advertise/thumbnails/' . $ads->image))) {
                    unlink(public_path('uploads/advertise/thumbnails/' . $ads->image));
                }
                if (file_exists(public_path('uploads/advertise/' . $ads->image))) {
                    unlink(public_path('uploads/advertise/' . $ads->image));
                }
            }
            $uploaded_image = $request->file('ad_image');
            $banner = str_slug($request->ad_title) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/advertise/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);
            $destinationPath = public_path('/uploads/advertise/');
            $uploaded_image->move($destinationPath, $banner);
            $ads->update([
                'image' => $banner
            ]);
        }
        return response()->json($ads->title, 200);
    }

    public function updateStatus($id)
    {
        $ads = Ads::findOrFail($id);
        if ($ads->status == 'Active') {
            $ads->status = 'Inactive';
        } else {
            $ads->status = 'Active';
        }
        $ads->update();
        return response()->json('Status Updated', 200);
    }

    public function destroy($id)
    {
        $ads = Ads::findOrFail($id);
        if (!empty($ads->image)) {
            if (file_exists(public_path('uploads/advertise/thumbnails/' . $ads->image))) {
                unlink(public_path('uploads/advertise/thumbnails/' . $ads->image));
            }
            if (file_exists(public_path('uploads/advertise/' . $ads->image))) {
                unlink(public_path('uploads/advertise/' . $ads->image));
            }
        }

        $ads->delete();
        return response()->json('Successfully Deleted', 200);
    }

    public function adsJson()
    {
        $ads = Ads::all();
        return DataTables::of($ads)
            ->addColumn('action', function ($ads) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $ads->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $ads->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })->make();
    }
}
