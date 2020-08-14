<?php

namespace App\Http\Controllers\Admin;

use App\Model\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonial.index');
    }


    public function create()
    {
        return view('admin.testimonial.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'testimonial_title' => 'required|min:2| max:55',
            'testimonial_position' => 'required',
            'testimonial_description' => 'required',
            'testimonial_status' => 'required',
            'testimonial_image' => 'sometimes|dimensions:min_width=120,min_height=120|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $testimonial = Testimonial::create([
            'title' => trim($request->testimonial_title),
            'position' => trim($request->testimonial_position),
            'description' => trim($request->testimonial_description),
            'status' => trim($request->testimonial_status),
        ]);
         if ($request->hasFile('testimonial_image')) {
            $uploaded_image = $request->file('testimonial_image');
            $test_image = str_slug($request->testimonial_title) . '-' . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/testimonials/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $test_image);

            $destinationPath = public_path('/uploads/testimonials/');
            $uploaded_image->move($destinationPath, $test_image);

            $testimonial->update([
                'image' => $test_image
            ]);
        }
      
        return response()->json($testimonial->title, 200);
    }


    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }


    public function updateTestimonial(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'testimonial_position' => 'required',
            'testimonial_description' => 'required',
            'testimonial_status' => 'required',
            'testimonial_image' => 'sometimes|dimensions:min_width=120,min_height=120|image|mimes:jpeg,png,jpg,gif,svg|max:10240',

        ]);

        $id = $request->id;
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->update([
            'title' => trim($request->testimonial_title),
            'position' => trim($request->testimonial_position),
            'description' => trim($request->testimonial_description),
            'status' => trim($request->testimonial_status),
        ]);


        if ($request->hasFile('testimonial_image')) {
            if (!empty($testimonial->image)) {
                if (file_exists(public_path('uploads/testimonials/thumbnails/' . $testimonial->image))) {
                    unlink(public_path('uploads/testimonials/thumbnails/' . $testimonial->image));
                }
                if (file_exists(public_path('uploads/testimonials/' . $testimonial->image))) {
                    unlink(public_path('uploads/testimonials/' . $testimonial->image));
                }
            }

            $uploaded_image = $request->file('testimonial_image');
            $test_image = str_slug($request->testimonial_title) . '-' . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/testimonials/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $test_image);

            $destinationPath = public_path('/uploads/testimonials/');
            $uploaded_image->move($destinationPath, $test_image);

            $testimonial->update([
                'image' => $test_image
            ]);
        }
        return response()->json($testimonial->title, 200);
    }

    public function updateStatus($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->status == 'Active') {
            $testimonial->status = 'Inactive';
        } else {
            $testimonial->status = 'Active';
        }
        $testimonial->update();
        return response()->json('Status Updated', 200);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if (!empty($testimonial->image)) {
            if (file_exists(public_path('uploads/testimonials/thumbnails/' . $testimonial->image))) {
                unlink(public_path('uploads/testimonials/thumbnails/' . $testimonial->image));
            }
            if (file_exists(public_path('uploads/testimonials/' . $testimonial->image))) {
                unlink(public_path('uploads/testimonials/' . $testimonial->image));
            }
        }
        $testimonial->delete();
        return response()->json('Successfully Deleted', 200);
    }

    public function testimonialJson()
    {
        $testimonial = Testimonial::all();
        return DataTables::of($testimonial)
            ->addColumn('action', function ($testimonial) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $testimonial->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $testimonial->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })->make();
    }
}
