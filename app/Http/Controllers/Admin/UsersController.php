<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{

    public function index()
    {
        return view('admin.users.user');
    }

    public function show($id){
        $user= User::findOrFail($id);
        return view('admin.users.quick_view',compact('user'));
    }


    public function addAdmin(){
         return view('admin.users.add_admin');
    }

    public function store(Request $request){
         if($request->ajax()){
             $this->validate($request, [
                 'first_name' => 'required|min:2| max:18',
                 'last_name' => 'required|min:2| max:18',
                 'email' => 'email|required|unique:users,email',
                 'password' => 'confirmed|required| min:5 |max:30',
                 'password_confirmation' => 'required| min:5 |max:30',
                 'mobile' => 'required|numeric|min:9',
                 'address' => 'required',
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
             $role = \Sentinel::findRoleBySlug('admin');
             $role->users()->attach($user);

             $user->admin()->create([
                 'image' => '',
             ]);
             if ($request->hasFile('user_image')) {
                 $this->validate($request, [
                     'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000',
                 ]);
                 $uploaded_image = $request->file('user_image');
                 $logo = str_slug($request->first_name) . '-' . str_slug($request->last_name) . '-' . time() . '.' . $uploaded_image->getClientOriginalExtension();
                 $destinationPath = public_path('/uploads/admin/thumbnails/');
                 $img = \Image::make($uploaded_image->getRealPath());
                 $img->resize(150, 150, function ($constraint) {
                     $constraint->aspectRatio();
                 })->save($destinationPath . '/' . $logo);
                 $destinationPath = public_path('/uploads/admin/');
                 $uploaded_image->move($destinationPath, $logo);
                 $user->admin()->update([
                     'image' => $logo
                 ]);
             }
             return response()->json("$user->first_name   $user->last_name", 200);

         }
          else{
              abort(404);
          }
    }

    public function userJson(){
        $users = User::has('jobseeker','employer')->get();
         foreach($users as $user){
              $user->role= $user->employer()->exists()?'Employer':'Job Seeker' ;
         }

        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return '<button type="button" class="btn btn-xs btn-success btn-view" data-id="' . $users->id . '"><i class="fa fa-eye"></i> View</button>';
            })
            ->make();
    }

    public function adminJson(){
        $users = User::has('admin')->get();
        foreach($users as $user){
            $user->role= "Administrator";
        }
        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return '<button type="button" class="btn btn-xs btn-success btn-view" data-id="' . $users->id . '"><i class="fa fa-eye"></i> View</button>
                          <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $users->id . '"><i class="fa fa-times"></i> Delete</button>';
            })
            ->make();
    }

     public function destroy($id){
        $user= User::findOrFail($id);
        if($user->admin()->exists()){
            if(file_exists('uploads/admin/thumbnails/'. $user->admin->image)){
                unlink(public_path('uploads/admin/thumbnails/' . $user->admin->image));
            }
            if (file_exists(public_path('uploads/admin/' . $user->admin->image))) {
                unlink(public_path('uploads/admin/' . $user->admin->image));
            }
            $user->admin()->delete();
            $user->delete();
            return response()->json('Admin Deleted',200);
        }
        return response()->json('Error Occurred',500);

     }

}
