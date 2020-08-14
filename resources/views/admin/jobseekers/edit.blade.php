<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <form id="updateJobseekerForm" enctype="multipart/form-data" data-id="{{ $user->id  }}">
        <div class="modal-header bg_light_blue">
            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-edit"></i>
                <h3 class="box-title"> Edit Job Seeker </h3>
            </div>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="header">
                    <h3 style="margin: 10px"> Basic Information</h3>
                    <hr>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name <span class="required">*</span></label>
                            <input type="text" name="first_name" class="form-control"
                                   @isset($user->first_name) value="{{ $user->first_name }}"
                                   @endisset  placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name <span class="required">*</span></label>
                            <input type="text" name="last_name" class="form-control"
                                   @isset($user->first_name) value="{{ $user->last_name }}"
                                   @endisset placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Email Id <span class="required">*</span></label>
                            <input type="email" name="email" id="email" class="form-control"
                                   @isset($user->email) value="{{ $user->email }}" @endisset>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">Mobile No <span class="required">*</span></label>
                            <input type="text" name="mobile" id="mobile" class="form-control"
                                   @isset($user->mobile) value="{{ $user->mobile }}" @endisset>
                        </div>
                    </div>
                    <p class="note" style="color: red"><strong>Note : </strong> Leave blank if you don't want to
                        update password</p>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="password">Password <span class="required">*</span></label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Repeat Password <span class="required">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="address">Address <span class="required">*</span></label>
                            <input type="text" name="address" id="address" class="form-control"
                                   @isset($user->address) value="{{ $user->address }}" @endisset>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status" class="control-label">Status <span class="required">*</span></label>
                            <select class="form-control" name="status" id="status">
                                <option value="Active" @isset($user->jobseeker) @if($user->jobseeker->status=='Active') selected @endif @endisset>Active</option>
                                <option value="Inactive" @isset($user->jobseeker) @if($user->jobseeker->status=='Inactive') selected @endif @endisset>Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="header">
                    <h3 style="margin: 10px"> More Information</h3>
                    <hr>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="gender">Gender <span class="required">*</span></label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male" @isset($user->jobseeker->gender) @if($user->jobseeker->gender=='Male') selected @endif @endisset> Male</option>
                                <option value="Female" @isset($user->jobseeker->gender) @if($user->jobseeker->gender=='Female') selected @endif @endisset> Female</option>
                                <option value="Not Specified" @isset($user->jobseeker->gender) @if($user->jobseeker->gender=='Not Specified') selected @endif @endisset> Not Specified</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dob">Date of Birth <span class="required">*</span></label>
                            <input type="date" name="dob" id="dob" class="form-control" @isset($user->jobseeker->dob) value="{{ $user->jobseeker->dob }}" @endisset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="marital_status">Marital Status <span class="required">*</span></label>
                            <select name="marital_status" id="marital_status" class="form-control">
                                <option value="Single" @isset($user->jobseeker->marital_status) @if($user->jobseeker->marital_status=='Single') selected @endif @endisset>Single</option>
                                <option value="Married" @isset($user->jobseeker->marital_status) @if($user->jobseeker->marital_status=='Married') selected @endif @endisset>Married</option>
                                <option value="Not Specified" @isset($user->jobseeker->marital_status) @if($user->jobseeker->marital_status=='Not Specified') selected @endif @endisset>Not Specified</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="religion">Religion <span class="required">*</span></label>
                            <input type="text" name="religion" id="religion" class="form-control" @isset($user->jobseeker->religion) value="{{ $user->jobseeker->religion }}" @endisset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nationality">Nationality <span class="required">*</span></label>
                            <input type="text" name="nationality" id="nationality" class="form-control" @isset($user->jobseeker->nationality) value="{{ $user->jobseeker->nationality }}" @endisset>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="secondary_mobile">Secondary Mobile (Optional)</label>
                            <input type="text" name="secondary_mobile" id="secondary_mobile"
                                   class="form-control" @isset($user->jobseeker->mobile) value="{{ $user->jobseeker->mobile }}" @endisset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="current_address">Current Address </label>
                            <input type="text" name="current_address" id="current_address" class="form-control" @isset($user->jobseeker->current_address) value="{{ $user->jobseeker->current_address }}" @endisset>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="permanent_address">Permanent Address <span class="required">*</span></label>
                            <input type="text" name="permanent_address" id="permanent_address" class="form-control" @isset($user->address) value="{{ $user->address }}" @endisset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="about_me">About Me</label>
                            <textarea name="about_me" id="about_me" cols="110" rows="6" class="form-control">@isset($user->jobseeker->about_me) {{ $user->jobseeker->about_me }} @endisset</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="user_image">Job Seeker Image <span class="required">*</span></label>
                            <input id="user_image" class="image" name="user_image" type="file" accept="image">
                            <p class="note" style="color: red"><strong>Note : </strong> Leave the field blank if you
                                don't want to change picture.</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status" class="control-label">Status <span class="required">*</span></label>
                            <select class="form-control" name="status" id="status">
                                <option value="Active" @isset($user->jobseeker) @if($user->jobseeker->status=='Active') selected @endif @endisset>Active</option>
                                <option value="Inactive" @isset($user->jobseeker) @if($user->jobseeker->status=='Inactive') selected @endif @endisset>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        @isset($user->jobseeker)
                        @if(file_exists(public_path('/uploads/jobseekers/'.$user->jobseeker->image)))
                            <div class="form-group col-md-6">
                                <label for="">User Image</label>
                                <img src="{{ asset('/uploads/jobseekers/'.$user->jobseeker->image) }}"
                                     class="form-control      " style="width:150px;height:150px;">
                            </div>
                        @endif
                        @endisset
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i
                        class="fa fa-times"></i> Cancel
            </button>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Update Job Seeker
            </button>
        </div>
        </form>
    </div>
</div>