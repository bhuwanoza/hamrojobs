<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="academicForm">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-graduation-cap  "></i>
                    <h3 class="box-title"> Add New Academic Qualification</h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="academic_title" class="control-label">Academic Name:</label>
                    <input type="text" name="academic_title" class="form-control" id="academic_title" required>
                </div>
                <div class="form-group">
                    <label for="academic_status" class="control-label">Status</label>
                    <select  class="form-control" name="academic_status" id="academic_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-graduation-cap"></i> Add Academic</button>
            </div>
        </div>
    </form>
</div>