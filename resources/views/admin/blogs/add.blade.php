<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="blogForm">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-microphone"></i>
                    <h3 class="box-title"> Add New Blog </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="blog_title" class="control-label">Blog Title:</label>
                    <input type="text" name="blog_title" class="form-control" id="blog_title" required>
                </div>
                <div class="form-group">
                    <label for="blog_content" class="control-label">Blog Content:</label>
                    <textarea class="form-control" name="blog_content" id="blog_content" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="blog_tag" class="control-label">Blog Tag:</label>
                    <input type="text" name="blog_tag" class="form-control" id="blog_tag" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="blog_image" class="control-label">Image</label>
                            <input type="file" name="blog_image" id="blog_image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="blog_status" class="control-label">Status</label>
                            <select  class="form-control" name="blog_status" id="blog_status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-microphone"></i> Add Blog</button>
            </div>
        </div>
    </form>
</div>
<script>
    CKEDITOR.replace('blog_content');
</script>
