<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="testimonialForm">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-quote-left"></i>
                    <h3 class="box-title"> Add New Testimonial </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="testimonial_title" class="control-label">Testimonial Title (User's Name) <span
                                        class="required">*</span></label>
                            <input type="text" name="testimonial_title" class="form-control" id="testimonial_title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="testimonial_position" class="control-label">Testimonial Position (User Position)
                            <span class="required">*</span></label>
                        <input type="text" name="testimonial_position" class="form-control" id="testimonial_position">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="testimonial_description" class="control-label">Testimonial Description<span
                                    class="required">*</span></label>
                        <textarea class="form-control" name="testimonial_description" id="testimonial_description"
                                  cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="testimonial_image" class="control-label">Payment Image <span
                                        class="required">*</span></label>
                            <input type="file" name="testimonial_image" id="testimonial_image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="testimonial_status" class="control-label">Status <span class="required">*</span></label>
                            <select class="form-control" name="testimonial_status" id="testimonial_status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close
                </button>
                <button type="submit" class="btn btn-success" id="btn-save-advertise"><i class="fa fa-quote-left"></i>
                    Add Testimonial
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    CKEDITOR.replace('testimonial_description');
</script>