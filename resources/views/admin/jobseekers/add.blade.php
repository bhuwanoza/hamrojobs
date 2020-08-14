<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <div class="modal-header bg_light_blue">

            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-user"></i>
                <h3 class="box-title"> Add Job Seeker </h3>
            </div>
        </div>
        <div class="modal-body">
            <form id="addJobseekerForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="header">
                        <h3 style="margin: 10px"> Basic Information</h3>
                        <hr>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name <span class="required">*</span></label>
                                <input type="text" name="first_name" class="form-control" value=""
                                       placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name <span class="required">*</span></label>
                                <input type="text" name="last_name" class="form-control" value=""
                                       placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Id <span class="required">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile No <span class="required">*</span></label>
                                <input type="text" name="mobile" id="mobile" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password <span class="required">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Repeat Password <span class="required">*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control" value="">
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
                                    <option value="Male" class="form-control">Male</option>
                                    <option value="Female" class="form-control">Female</option>
                                    <option value="Not Specified" class="form-control">Not Specified</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Birth <span class="required">*</span></label>
                                <input type="date" name="dob" id="dob" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="marital_status">Marital Status <span class="required">*</span></label>
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Not Specified">Not Specified</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="religion">Religion <span class="required">*</span></label>
                                <input type="text" name="religion" id="religion" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nationality">Nationality <span class="required">*</span></label>
                                <input type="text" name="nationality" id="nationality" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="secondary_mobile">Secondary Mobile (Optional)</label>
                                <input type="text" name="secondary_mobile" id="secondary_mobile"
                                       class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="current_address">Current Address </label>
                                <input type="text" name="current_address" id="current_address" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="permanent_address">Permanent Address <span class="required">*</span></label>
                                <input type="text" name="permanent_address" id="permanent_address" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="about_me">About Me</label>
                                <textarea name="about_me" id="about_me" cols="110" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="user_image">Job Seeker Image</label>
                                <input id="user_image" class=" image" name="user_image" type="file" accept="image">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status" class="control-label">Status <span class="required">*</span></label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-user"></i> Add
                        Job Seeker
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>