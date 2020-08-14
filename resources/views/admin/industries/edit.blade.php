<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="industryUpdateForm"  data-id="{{ $industry->id }}">
        <div class="modal-content">
            <div class="modal-header">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-edit"></i>
                    <h3 class="box-title"> Edit Industry : <span>"{{ $industry->title }}"</span></h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="industry_title" class="control-label">Industry Name:</label>
                    <input type="text" name="industry_title" class="form-control" id="industry_title" @isset($industry->title) value="{{ $industry->title }}" @endisset required>
                </div>
                <div class="form-group">
                    <label for="industry_status" class="control-label">Status</label>
                    <select class="form-control" name="industry_status" id="industry_status">
                        <option value="Active"  @isset($industry->status)@if($industry->status== 'Active') selected @endif @endisset>Active</option>
                        <option value="Inactive" @isset($industry->status)@if($industry->status== 'Inactive') selected @endif @endisset>Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="industry_top" class="control-label">Top Industy:</label>
                    <select class="form-control" name="industry_top" id="industry_top">
                        <option value="Yes" @isset($industry->top)@if($industry->top== 'Yes') selected @endif @endisset>Yes</option>
                        <option value="No" @isset($industry->top)@if($industry->top== 'No') selected @endif @endisset>No</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i>
                    Close
                </button>
                <button type="submit" class="btn btn-success"><i class="fa fa-industry"></i> Update Industry
                </button>
            </div>
        </div>
    </form>
</div>