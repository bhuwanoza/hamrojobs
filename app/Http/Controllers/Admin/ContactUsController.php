<?php

namespace App\Http\Controllers\Admin;

use App\Model\ContactUs;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ContactUsController extends Controller
{

    public function index()
    {
        $messages = ContactUs::where('status', 'Unseen')->orderBy('created_at', 'desc')->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function messageJson()
    {
        $messages = ContactUs::orderBy('created_at', 'desc')->get();
        foreach($messages as $message){
            $message->fullname = $message->first_name.' '.$message->last_name;
        }
        return DataTables::of($messages)
            ->addColumn('action', function ($messages) {
                return '<button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $messages->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })
            ->make();
    }

    public function updateStatus($id)
    {
        $contact = ContactUs::findOrFail($id);
        if ($contact->status == 'Seen') {
            $contact->status = 'Unseen';
        } else {
            $contact->status = 'Seen';
        }
        $contact->update();
        return response()->json(" Message Marked to  ".$contact->status);
    }

    public function destroy($id){
        $message = ContactUs::findOrFail($id);
        $message->delete();
        return response()->json(" Successfully deleted messge from ," . $message->first_name);

    }
}
