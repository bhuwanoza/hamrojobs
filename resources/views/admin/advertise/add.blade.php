<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="advertiseForm">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-image"></i>
                    <h3 class="box-title"> Add New Advertise </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="ad_title" class="control-label">Advertise Title:</label>
                    <input type="text" name="ad_title" class="form-control" id="ad_title" required>
                </div>
                <div class="form-group">
                    <label for="ad_link" class="control-label">Advertise Link:</label>
                    <input type="text" name="ad_link" class="form-control" id="ad_link">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ad_position" class="control-label">Position</label>
                            <select  class="form-control" name="ad_position" id="ad_position">
                                <!--<option value="Top">Top (625 X 550)</option>-->
                                <!--<option value="Middle">Middle (625 X 1000)</option>-->
                                <option value="Content Right">Content Right (625 X 1000) (Nos. 2)</option>
                                <option value="Content Left">Content Left (625 X 300)</option>
                                <option value="Bottom">Bottom (2200 X 800) (Nos. 1)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ad_expire" class="control-label">Expire Date</label>
                            <input type="date" name="ad_expire" class="form-control" id="ad_expire" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ad_status" class="control-label">Status</label>
                            <select  class="form-control" name="ad_status" id="ad_status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ad_image" class="control-label">Image</label>
                            <input type="file" name="ad_image" id="ad_image" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-success " id="btn-save-advertise"> <i class="fa fa-image"></i> Add Advertise</button>
            </div>
        </div>
    </form>
</div>