<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="paymenteUpdateForm"  data-id="{{ $payment->id }}">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-edit"></i>
                    <h3 class="box-title"> Edit Advertise : <span>@isset($payment)"{{ $payment->bank_title }}" @endisset</span></h3>
                </div>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="bank_title" class="control-label">Payment Title (Bank Name/ Payment Method) <span class="required">*</span></label>
                            <input type="text" name="bank_title" class="form-control" id="bank_title"  @isset($payment->bank_title) value="{{ $payment->bank_title }}" @endisset >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="account_name" class="control-label">Account Name <span class="required">*</span></label>
                        <input type="text" name="account_name" class="form-control" id="account_name" @isset($payment->account_name) value="{{ $payment->account_name    }}" @endisset  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="account_number" class="control-label">Account Number <span class="required">*</span></label>
                        <input type="text" name="account_number" class="form-control" id="account_number" @isset($payment->account_number) value="{{ $payment->account_number }}" @endisset >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account_type" class="control-label">Account Type <span class="required">*</span></label>
                            <select  class="form-control" name="account_type" id="account_type">
                                <option value="Saving" @isset($payment->account_type)@if($payment->account_type=='Saving') selected @endif @endisset>Saving</option>
                                <option value="Fixed" @isset($payment->account_type)@if($payment->account_type=='Fixed') selected @endif @endisset>Fixed</option>
                                <option value="Current" @isset($payment->account_type)@if($payment->account_type=='Current') selected @endif @endisset>Current</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="control-label">Status <span class="required">*</span></label>
                            <select  class="form-control" name="status" id="status">
                                <option value="Active" @isset($payment->status)@if($payment->status=='Active') selected @endif @endisset>Active</option>
                                <option value="Inactive" @isset($payment->status)@if($payment->status=='Inactive') selected @endif @endisset>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pay_image" class="control-label">Payment Image </label>
                            <input type="file" name="pay_image" id="pay_image" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if(file_exists(public_path('uploads/payments/'.$payment->image)))
                            <img src="{{ asset('uploads/payments/'.$payment->image) }}" alt="" height="150px" width="200px">
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-image"></i> Update Advertise</button>
            </div>
        </div>
    </form>
</div>