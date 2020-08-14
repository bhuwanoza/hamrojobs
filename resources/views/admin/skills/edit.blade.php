<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="skillsUpdateForm" data-id="{{ $skill->id }}">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-edit"></i>
                    <h3 class="box-title"> Edit Skill : </h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="skill_title" class="control-label">Skill Title<span
                                        class="required">*</span></label>
                            <input type="text" name="skill_title" class="form-control" id="skill_title" @isset($skill->title) value="{{ $skill->title }}" @endisset>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="skill_status" class="control-label">Status <span class="required">*</span></label>
                            <select class="form-control" name="skill_status" id="skill_status">
                                <option value="Active" @isset($skill->status) @if($skill->status=='Active') selected @endif @endisset>Active</option>
                                <option value="Inactive" @isset($skill->status) @if($skill->status=='Active') selected @endif @endisset>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close
                </button>
                <button type="submit" class="btn btn-success"><i class="fa fa-code"></i> Update Skill
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    CKEDITOR.replace('testimonial_description');
</script>