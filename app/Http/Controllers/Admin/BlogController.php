<?php

namespace App\Http\Controllers\Admin;

use App\Model\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{

    public function index()
    {
        return view('admin.blogs.index');
    }

    public function blogJson()
    {
        $blogs = BlogPost::all();
        foreach($blogs as $blog) {
            $blog->content = str_limit(strip_tags(html_entity_decode($blog->content)), 100);
        }
        return DataTables::of($blogs)
            ->addColumn('action', function ($blogs) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit-blog" data-id="' . $blogs->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete-blog" data-id="' . $blogs->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })->make();
    }

    public function create()
    {
        return view('admin.blogs.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_title' => 'required|min:2| max:155',
            'blog_content' => 'required',
            'blog_image' => 'dimensions:min_width=150,min_height=150|image|mimes:jpeg,png,jpg,gif,svg|max:6096',
            'blog_status' => 'required',
        ]);

        $blog = BlogPost::create([
            'title' => trim($request->blog_title),
            'content' => trim($request->blog_content),
            'tag' => trim($request->blog_tag),
            'status' => trim($request->blog_status),
        ]);

        if ($request->hasFile('blog_image')) {
            $uploaded_image = $request->file('blog_image');
            $banner = str_slug($request->blog_title) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);
            $destinationPath = public_path('/uploads/blogs/');
            $uploaded_image->move($destinationPath, $banner);
            $blog->update([
                'image' => $banner
            ]);
        }
        return response()->json($blog->title, 200);
    }

    public function edit($id)
    {
        $blog = BlogPost::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function updateBlog(Request $request)
    {
        $this->validate($request, [
            'blog_title' => 'required|min:2| max:155',
            'blog_content' => 'required',
            'blog_image' => 'dimensions:min_width=150,min_height=150|image|mimes:jpeg,png,jpg,gif,svg|max:6096',
            'blog_status' => 'required',
        ]);
        $id = $request->id;
        $blog = BlogPost::findOrFail($id);

        $blog->update([
            'title' => trim($request->blog_title),
            'content' => trim($request->blog_content),
            'tag' => trim($request->blog_tag),
            'status' => trim($request->blog_status),
        ]);

        if ($request->hasFile('blog_image')) {

            if (!empty($blog->image)) {
                if (file_exists(public_path('uploads/blogs/thumbnails/' . $blog->image))) {
                    unlink(public_path('uploads/blogs/thumbnails/' . $blog->image));
                }
                if (file_exists(public_path('uploads/blogs/' . $blog->image))) {
                    unlink(public_path('uploads/blogs/' . $blog->image));
                }
            }
            $uploaded_image = $request->file('blog_image');
            $banner = str_slug($request->blog_title) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/blogs/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);
            $destinationPath = public_path('/uploads/blogs/');
            $uploaded_image->move($destinationPath, $banner);
            $blog->update([
                'image' => $banner
            ]);
        }
        return response()->json($blog->title, 200);
    }

    public function updateStatus($id)
    {
        $blog = BlogPost::findOrFail($id);
        if ($blog->status == 'Active') {
            $blog->status = 'Inactive';
        } else {
            $blog->status = 'Active';
        }
        $blog->update();
        return response()->json('status updated', 200);
    }

    public function destroy($id)
    {
        $blog = BlogPost::findOrFail($id);
        if (!empty($blog->image)) {
            if (file_exists(public_path('uploads/blogs/thumbnails/' . $blog->image))) {
                unlink(public_path('uploads/blogs/thumbnails/' . $blog->image));
            }
            if (file_exists(public_path('uploads/blogs/' . $blog->image))) {
                unlink(public_path('uploads/blogs/' . $blog->image));
            }
        }

        $blog->delete();
        return response()->json('deleted', 200);
    }
    
    public function deleteImage($id)
    {
        $blog = BlogPost::findOrFail($id);
        
        if (isset($blog) && !empty($blog->image)) {
            if (file_exists(public_path('uploads/blogs/thumbnails/' . $blog->image))) {
                unlink(public_path('uploads/blogs/thumbnails/' . $blog->image));
            }
            if (file_exists(public_path('uploads/blogs/' . $blog->image))) {
                unlink(public_path('uploads/blogs/' . $blog->image));
            }
        }
        $blog->image = null;
        $blog->update();
        
        return response()->json('image deleted', 200);
    }
}
