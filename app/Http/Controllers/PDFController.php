<?php

namespace App\Http\Controllers;

use App\Model\JobPosts;
use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function jobseekerCV(){
        $user=User::authUser();
         if(isset($user)&& $user->jobseeker()->exists()){
             $pdf=\PDF::loadView('pdf.user_cv',compact('user'));
             return $pdf->download($user->first_name.'-'.$user->last_name.'-cv.pdf');
         }
         else
             abort(404);
    }

    public function jobPDF($id){
        $job= JobPosts::findOrFail($id);
        if(isset($job)){
           $pdf= \PDF::loadView('pdf.print_job',compact('job'));
            return $pdf->download(str_slug($job->title).'-job.pdf');
        }
        else
            abort(404);

    }

    public function downloadCV($id){
        $user=User::findOrFail($id);
        if(isset($user)&& $user->jobseeker()->exists()){
            $pdf=\PDF::loadView('pdf.user_cv',compact('user'));
            return $pdf->download($user->first_name.'-'.$user->last_name.'-cv.pdf');
        }
        else
            abort(404);
    }

}
