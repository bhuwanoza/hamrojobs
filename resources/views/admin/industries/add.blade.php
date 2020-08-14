<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="industryForm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-industry"></i>
                    <h3 class="box-title"> Add New Industry </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="industry_title" class="control-label">Industry Name:</label>
                    <input type="text" name="industry_title" class="form-control" id="industry_title" required>
                </div>
                <div class="form-group">
                    <label for="industry_status" class="control-label">Status</label>
                    <select class="form-control" name="industry_status" id="industry_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="industry_top" class="control-label">Top Industy:</label>
                    <select class="form-control" name="industry_top" id="industry_top">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i>
                    Close
                </button>
                <button type="submit" class="btn btn-success"><i class="fa fa-industry"></i> Add Industry
                </button>
            </div>
        </div>
    </form>
</div>