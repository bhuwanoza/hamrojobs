<?php

namespace App\Http\Controllers;

use App\Model\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $blogposts=BlogPost::where('status','Active')->orderBy('created_at', 'desc')->paginate(3);
        return view('blogs.index',compact('blogposts'));
    }


    public function show($slug)
    {
         $blogpost=BlogPost::where('status','Active')->where('slug',$slug)->first();
          if(isset($blogpost)){
              return view('blogs.blogs-detail',compact('blogpost'));
          }
          else{
               abort(404);
          }

    }

}
