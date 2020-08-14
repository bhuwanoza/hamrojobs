@extends('layouts.master')
@section('title')
    Reset Password
@endsection
@section('content')


    <section class="breadcrumbs-banner" uk-parallax="bgy: -200"
             style="background: url(http://gva.edu.np/wp-content/uploads/2017/05/banner-aus.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Reset Your Password</h2>
                    <ul class="bread-list">
                        <li><a href="{{ route('index') }}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">Reset Your Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.notification')
    <section id="login">
        <!-- login_form_wrapper -->
        <div class="login_tab_wrapper mt-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <!-- Login Form -->

                        <div class="login_form_wrapper">
                            <form id="resetPassword" method="post" role="form">
                                {{ csrf_field() }}
                                <div class="login_wrapper">
                                    <div class="regiter_top_heading">
                                        <h4 class="center"> Create Your New Password </h4>
                                    </div>
                                    <div class="relative">
                                        <div class="form-group i-email">
                                            <input type="password" name="password" id="password" class="form-control" required placeholder="Password*">
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <div class="form-group i-password">
                                            <input type="password" name="password_confirmation" class="form-control" required id="password_confirmation" placeholder="Confirm Password *">
                                        </div>
                                    </div>

                                    <div class="login_btn clearfix">
                                        <a class="btn btn-primary float-right" id="btnUpdatePassword"> Change Password </a>
                                    </div>
                                    <div class="login_message text-center">
                                        <p><a href="{{ route('login') }}"> Back To Login </a>
                                        </p>
                                    </div>
                                </div>
                            </form>


                            <!-- /.login_wrapper-->
                        </div>
                        <!--  -->


                    </div>
                </div>
            </div>
        </div>


    </section>


@endsection
@section('scripts')
    <script>
        $(document).on("click", "#btnUpdatePassword", function (e) {
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#resetPassword')[0]);
            var params = $('#resetPassword').serializeArray();
            var type="POST";
            var myUrl=location.href;

            $.each(params, function (i, val) {
                form.append(val.name, val.value)
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: type,
                url: myUrl,
                contentType: false,
                processData: false,
                data: form,
                beforeSend: function (data) {
                },
                success: function (response) {
                    console.log(response);
                    if(response) {
                        window.location='{{ url('/') }}'+response.route;
                    }
                },
                error: function (response) {
                    if (response.status == 422){
                        $.each(response.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color: red;">'+error[0]+'</span>').fadeOut(5000));
                        });
                    }
                    else{
                        $('.alert-message').text(response.responseJSON.message);
                        $('.notify').show().fadeOut(10000);
                    }
                }
            });
        });

    </script>


@endsection