<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <form id="updateJobseekerForm" enctype="multipart/form-data" data-id="{{ $user->id  }}">
            <div class="modal-header bg_light_blue">
                <div class="box-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="box-title">{{ $user->first_name }}  {{ $user->last_name }}   (
                        @if($user->admin()->exists())
                            (Administrator)
                            @else
                        {{ $user->employer()->exists()?'Employer':'Job Seeker'  }} )  </h3>
                    @endif
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>:
                                {{ $user->first_name }}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>:
                                {{ $user->last_name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Id</label>:
                                {{ $user->email }}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile No</label>:
                                {{ $user->mobile }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>:
                                {{ $user->address }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i
                            class="fa fa-times"></i> Close
                </button>

            </div>
        </form>
    </div>
</div>