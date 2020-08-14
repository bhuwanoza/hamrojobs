<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="paymentForm">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-image"></i>
                    <h3 class="box-title"> Add New Payment </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="bank_title" class="control-label">Payment Title (Bank Name/ Payment Method) <span class="required">*</span></label>
                            <input type="text" name="bank_title" class="form-control" id="bank_title" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="account_name" class="control-label">Account Name <span class="required">*</span></label>
                        <input type="text" name="account_name" class="form-control" id="account_name" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="account_number" class="control-label">Account Number <span class="required">*</span></label>
                        <input type="text" name="account_number" class="form-control" id="account_number" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account_type" class="control-label">Account Type <span class="required">*</span></label>
                            <select  class="form-control" name="account_type" id="account_type">
                                <option value="Saving">Saving</option>
                                <option value="Fixed">Fixed</option>
                                <option value="Current">Current</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="control-label">Status <span class="required">*</span></label>
                            <select  class="form-control" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pay_image" class="control-label">Payment Image <span class="required">*</span></label>
                            <input type="file" name="pay_image" id="pay_image" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-success" id="btn-save-advertise"> <i class="fa fa-image"></i> Add Advertise</button>
            </div>
        </div>
    </form>
</div>