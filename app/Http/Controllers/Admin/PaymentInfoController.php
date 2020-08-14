<?php

namespace App\Http\Controllers\Admin;

use App\Model\PaymentInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class PaymentInfoController extends Controller
{
    public function index()
    {
        return view('admin.payment.index');
    }


    public function create()
    {
        return view('admin.payment.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'bank_title' => 'required|min:2| max:55',
            'account_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'status' => 'required',
            'pay_image' => 'dimensions:min_width=120,min_height=150|image|mimes:jpeg,png,jpg,gif,svg|max:6096',
        ]);

        $payment = PaymentInfo::create([
            'bank_title' => trim($request->bank_title),
            'account_name' => trim($request->account_name),
            'account_number' => trim($request->account_number),
            'account_type' => trim($request->account_type),
            'status' => trim($request->status),
        ]);

        if ($request->hasFile('pay_image')) {
            $uploaded_image = $request->file('pay_image');
            $banner = str_slug($request->ad_title) . '-' . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/payments/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);

            $destinationPath = public_path('/uploads/payments/');
            $uploaded_image->move($destinationPath, $banner);

            $payment->update([
                'image' => $banner
            ]);
        }
        return response()->json($payment->bank_title, 200);
    }


    public function edit($id)
    {
        $payment = PaymentInfo::findOrFail($id);
        return view('admin.payment.edit', compact('payment'));
    }


    public function updatePayment(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'bank_title' => 'required|min:2| max:55',
            'account_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'status' => 'required',
            'pay_image' => 'dimensions:min_width=120,min_height=150|image|mimes:jpeg,png,jpg,gif,svg|max:6096',
        ]);

        $id = $request->id;
        $payment = PaymentInfo::findOrFail($id);

        $payment->update([
            'bank_title' => trim($request->bank_title),
            'account_name' => trim($request->account_name),
            'account_number' => trim($request->account_number),
            'account_type' => trim($request->account_type),
            'status' => trim($request->status),
        ]);


        if ($request->hasFile('pay_image')) {
            if (!empty($payment->image)) {
                if (file_exists(public_path('uploads/payments/thumbnails/' . $payment->image))) {
                    unlink(public_path('uploads/payments/thumbnails/' . $payment->image));
                }
                if (file_exists(public_path('uploads/payments/' . $payment->image))) {
                    unlink(public_path('uploads/payments/' . $payment->image));
                }
            }
            $uploaded_image = $request->file('pay_image');
            $banner = str_slug($request->ad_title) . time() . '.' . $uploaded_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/payments/thumbnails/');
            $img = \Image::make($uploaded_image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $banner);
            $destinationPath = public_path('/uploads/payments/');
            $uploaded_image->move($destinationPath, $banner);
            $payment->update([
                'image' => $banner
            ]);
        }
        return response()->json($payment->bank_title, 200);
    }

    public function updateStatus($id)
    {
        $payment = PaymentInfo::findOrFail($id);
        if ($payment->status == 'Active') {
            $payment->status = 'Inactive';
        } else {
            $payment->status = 'Active';
        }
        $payment->update();
        return response()->json('Status Updated', 200);
    }

    public function destroy($id)
    {
        $payment = PaymentInfo::findOrFail($id);
        if (!empty($payment->image)) {
            if (file_exists(public_path('uploads/payments/thumbnails/' . $payment->image))) {
                unlink(public_path('uploads/payments/thumbnails/' . $payment->image));
            }
            if (file_exists(public_path('uploads/payments/' . $payment->image))) {
                unlink(public_path('uploads/payments/' . $payment->image));
            }
        }

        $payment->delete();
        return response()->json('Successfully Deleted', 200);
    }

    public function paymentJson()
    {
        $payment = PaymentInfo::all();
        return DataTables::of($payment)
            ->addColumn('action', function ($payment) {
                return '<button type="button" class="btn btn-xs btn-warning btn-edit" data-id="' . $payment->id . '"><i class="fa fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' . $payment->id . '"><i class="fa fa-remove"></i> Delete</button>';
            })->make();
    }
}
