<div class="modal-dialog" role="document">
    <form enctype="multipart/form-data" id="advertiseUpdateForm"  data-id="{{ $ads->id }}">
        <div class="modal-content">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-edit"></i>
                    <h3 class="box-title"> Edit Advertise : <span>@isset($ads)"{{ $ads->title }}" @endisset</span></h3>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="ad_title" class="control-label">Advertise Title:</label>
                    <input type="text" name="ad_title" class="form-control" id="ad_title" @isset($ads->title) value="{{ $ads->title }}" @endisset required>
                </div>
                <div class="form-group">
                    <label for="ad_link" class="control-label">Advertise Link:</label>
                    <input type="text" name="ad_link" class="form-control" id="ad_link" @isset($ads->link) value="{{ $ads->link }}" @endisset>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ad_position" class="control-label">Position</label>
                            <select  class="form-control" name="ad_position" id="ad_position">
                                <!--<option value="Top" @isset($ads->position)@if($ads->position=='Top') selected @endif @endisset>Top (625 X 550)</option>-->
                                <!--<option value="Middle" @isset($ads->position)@if($ads->position=='Middle') selected @endif @endisset>Middle (625 X 1000)</option>-->
                                <option value="Content Right" @isset($ads->position)@if($ads->position=='Content Right') selected @endif @endisset>Content Right (625 X 1000) (Nos. 2)</option>
                                <option value="Content Left" @isset($ads->position)@if($ads->position=='Content Left') selected @endif @endisset>Content Left (625 X 300)</option>
                                <option value="Bottom" @isset($ads->position)@if($ads->position=='Bottom') selected @endif @endisset>Bottom (2200 X 800) (Nos. 1)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ad_expire" class="control-label">Expire Date</label>
                            <input type="date" name="ad_expire" class="form-control" @isset($ads->expires_on) value="{{ $ads->expires_on }}" @endisset id="ad_expire" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ad_status" class="control-label">Status</label>
                            <select  class="form-control" name="ad_status" id="ad_status">
                                <option value="Active" @isset($ads->status)@if($ads->status=='Active') selected @endif @endisset>Active</option>
                                <option value="Inactive" @isset($ads->status)@if($ads->status=='Inactive') selected @endif @endisset>Inactive</option>
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
                @if(file_exists(public_path('uploads/advertise/'.$ads->image)))
                    <img src="{{ asset('uploads/advertise/'.$ads->image) }}" alt="" height="150px" width="auto">
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-image"></i> Update Advertise</button>
            </div>
        </div>
    </form>
</div>