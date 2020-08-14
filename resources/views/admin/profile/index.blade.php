@extends('admin.layouts.master')
@section('title')
    @isset($user){{ strtoupper($user->first_name) }} {{ strtoupper($user->last_name) }}  @endisset
@endsection
@section('extra_styles')

@endsection
@section('content')
    <div class="content-wrapper">
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
        <section class="content-header">
            <h1 style="text-transform: capitalize">
                @isset($user) {{ $user->first_name }} {{ $user->last_name }}  @endisset
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li  disabled="">Admin Profile</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box box-primary">
                                <div class="box-body box-profile" >
                                    @isset($user)
                                        <form enctype="multipart/form-data" id="imageForm" method="post">
                                            {{ csrf_field() }}
                                                @if($user->admin()->count())

                                                @if(file_exists('uploads/admin/thumbnails/' . $user->admin->image))
                                                    <img class="profile-user-img img-responsive img-circle"
                                                         src="{{ asset('uploads/admin/thumbnails/' . $user->admin->image) }}"
                                                         alt="">
                                                @else
                                                    <img class="profile-user-img img-responsive img-circle"
                                                         src="{{ asset('uploads/admin/default/default_user.jpg') }}"
                                                         alt="">
                                                @endif

                                               <div class="col-md-12" style="background: #90e7c2">
                                                   <div class="col-md-6">
                                                       <div class="pull-left" >
                                                           <label for="upload" ><i class="fa fa-upload"></i></label>
                                                           <input type="file" name="logo" id="upload" class="upload_logo hidden" >
                                                       </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <div class="pull-right" >
                                                           <label for="upload" ><i class="fa fa-remove"></i></label>
                                                           <input type="file" name="image" id="remove" class="hidden" >
                                                       </div>
                                                   </div>
                                               </div>
                                            @else
                                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploads/admin/default_user.jpg') }}" >
                                                <div class="text-center">
                                                    <label for="upload" ><i class="fa fa-upload"></i></label>
                                                    <div>
                                                        <input type="file" id="upload" class="upload_logo hidden" >
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                    @endisset
                                    <h3 class="profile-username text-center" style="text-transform: capitalize">@isset($user){{ $user->first_name }} {{ $user->last_name }}  @endisset</h3>
                                        <p class="text-muted text-center"></p>
                                        <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <div class="col-md-1"><i class="fa fa-envelope"></i></div>
                                            <div class="col-md-4"><b>Email</b> :</div>
                                            <div class="col-md-6"><a>@isset($user) {{ $user->email }} @endisset</a></div>
                                            <div class="clearfix"></div>
                                        </li>
                                         <li class="list-group-item">
                                            <div class="col-md-1"><i class="fa fa-mobile"></i></div>
                                            <div class="col-md-4"><b>Mobile</b> :</div>
                                            <div class="col-md-6"><a>@isset($user) {{ $user->mobile }} @endisset</a></div>
                                            <div class="clearfix"></div>
                                        </li>
                                         <li class="list-group-item">
                                            <div class="col-md-1"><i class="fa fa-location-arrow"></i></div>
                                            <div class="col-md-4"><b>Address</b> :</div>
                                            <div class="col-md-6"><a>@isset($user) {{ $user->address }} @endisset</a></div>
                                            <div class="clearfix"></div>
                                        </li>

                                    </ul>
                                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        @isset($errors)
                            @foreach ($errors->all() as $message)
                                {{ $message }}
                            @endforeach
                            @endisset
                        <div class="col-md-8">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li  class="active"><a href="#general" data-toggle="tab" aria-expanded="false">General</a></li>
                                    <li><a href="#changepsw" data-toggle="tab">Change Password</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="general">

                                        <form class="form-horizontal" method="post" action="{{ route('admin.postprofile') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="first_name" class="col-sm-2 control-label">First Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="first_name" name="first_name"  type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="last_name" name="last_name" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Email</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" id="email"  type="email" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile" class="col-sm-2 control-label">Mobile</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" id="mobile" name="mobile" placeholder="Mobile" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="address" name="address" placeholder="Address" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success ">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="changepsw">

                                        <form class="form-horizontal" method="post" action="{{ route('admin.updatepassword') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Old Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="email"  type="password" name="current_password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-sm-2 control-label">Password</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" id="password" placeholder="Password" type="password" name="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password</label>

                                                <div class="col-sm-10">
                                                    <input class="form-control" id="password_confirmation" placeholder="Confirm Password" type="password" name="password_confirmation">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success ">Change</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection


@section('extra_scripts')
    <script>
        $(function() {
            $(".upload_logo").change(function(e){
                e.preventDefault();
                var form = new FormData($('#imageForm')[0]);

                if ($('#upload').val()) {
                    form.append('image', $('input[type=file]')[0].files[0]);
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('dashboard.updateimage') }}",
                    contentType: false,
                    processData: false,
                    data: form,
                    beforeSend: function (data) {
                    },
                    success: function (data) {
                        swal(data, 'Image Updated Successfully', "success");
                        window.location.reload();
                    },
                    error: function (err) {
                        if (err.status == 422) {
                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');
                                el.after($('<span style="color: red;">'+error[0]+'</span>').fadeOut(15000));
                            });
                        }
                        swal(err, 'Error', "warning");
                    }
                });
            });
        });
    </script>
@endsection
