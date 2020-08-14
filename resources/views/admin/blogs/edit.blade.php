<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="blogUpdateForm"  data-id="{{ $blog->id }}">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-edit"></i>
                    <h3 class="box-title"> Edit Advertise : <span >@isset($blog)"{{ $blog->title }}" @endisset</span></h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="blog_title" class="control-label">Blog Title:</label>
                    <input type="text" name="blog_title" class="form-control" id="blog_title" @isset($blog->title) value="{{ $blog->title }}" @endisset >
                </div>
                <div class="form-group">
                    <label for="blog_content" class="control-label">Blog Content:</label>
                    <textarea class="form-control" name="blog_content" id="blog_content" cols="30" rows="10">@isset($blog->content) {{ $blog->content }}@endisset </textarea>
                </div>
                <div class="form-group">
                    <label for="blog_tag" class="control-label">Blog Tag:</label>
                    <input type="text" name="blog_tag" class="form-control" id="blog_tag" @isset($blog->tag) value="{{ $blog->tag }}" @endisset >
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
                                <option value="Active" @isset($blog->status)@if($blog->status=='Active') selected @endif @endisset>Active</option>
                                <option value="Inactive" @isset($blog->status)@if($blog->status=='Inactive') selected @endif @endisset>Inactive</option>
                            </select>


                        </div>
                    </div>
                    @if(file_exists(public_path('uploads/blogs/'.$blog->image)) && $blog->image != null)
                        <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="" height="150px" width="auto">
                        <a href="javascript: void(0);" class="btn-delete-image" data-id="{{ $blog->id }}"><i class="fa fa-trash" style="vertical-align: top;"></i></a>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-microphone"></i> Update Blog Post</button>
            </div>
        </div>
    </form>
</div>
<script>
    CKEDITOR.replace('blog_content');
</script>