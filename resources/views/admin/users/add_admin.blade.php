<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <div class="modal-header bg_light_blue">

            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-user"></i>
                <h3 class="box-title"> Add Administrator </h3>
            </div>
        </div>
        <div class="modal-body">
            <form id="saveAdmin" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value=""
                                       placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value=""
                                       placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Id</label>
                                <input type="email" name="email" id="email" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile No</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Repeat Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="status" class="control-label">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="user_image">Admin Image</label>
                                <input id="user_image" class=" image" name="user_image" type="file" accept="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-user"></i> Add
                        Admin
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>