<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="testimonialUpdateForm" data-id="{{ $testimonial->id }}">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-edit"></i>
                    <h3 class="box-title"> Edit Testimonial : </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="testimonial_title" class="control-label">Testimonial Title (User's Name) <span
                                        class="required">*</span></label>
                            <input type="text" name="testimonial_title" class="form-control" id="testimonial_title"
                                   @isset($testimonial->title) value="{{ $testimonial->title }}" @endisset >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="testimonial_position" class="control-label">Testimonial Position (User Position)
                            <span class="required">*</span></label>
                        <input type="text" name="testimonial_position" class="form-control" id="testimonial_position"
                               @isset($testimonial->position) value="{{ $testimonial->position }}" @endisset >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="testimonial_description" class="control-label">Testimonial Description<span
                                    class="required">*</span></label>
                        <textarea class="form-control" name="testimonial_description" id="testimonial_description"
                                  cols="30"
                                  rows="10">@isset($testimonial->description) {{ $testimonial->description  }} @endisset</textarea>
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
                                <option value="Active"
                                        @isset($testimonial->status) @if($testimonial->status=='Active') selected @endif @endisset>
                                    Active
                                </option>
                                <option value="Inactive"
                                        @isset($testimonial->status) @if($testimonial->status=='Inactive') selected @endif  @endisset>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 center">
                            @if(file_exists(public_path('uploads/testimonials/'.$testimonial->image)))
                                <img src="{{ asset('uploads/testimonials/'.$testimonial->image) }}" alt=""
                                     height="150px" width="200px">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close
                </button>
                <button type="submit" class="btn btn-success"><i class="fa fa-quote-left"></i> Update Testimonial
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    CKEDITOR.replace('testimonial_description');
</script>