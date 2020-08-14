<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <div class="modal-header">
            <h5 class="modal-title">Edit Job</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="updateUser" enctype="multipart/form-data">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="@isset($user){{ $user->first_name }}@endisset"
                                   placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="@isset($user){{ $user->last_name }}@endisset"
                                   placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="email">Email Id</label>
                            <input type="email" name="email" id="email" class="form-control" value="@isset($user){{ $user->email }}@endisset">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">Mobile No</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" value="@isset($user){{ $user->mobile }}@endisset">
                        </div>
                    </div>
                    {{--<div class="row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Repeat Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control" value="">
                        </div>
                    </div>--}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="@isset($user){{ $user->address }} @endisset">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-update-user"><i
                                class="fa fa-briefcase"></i> Update Info
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
