@extends('layouts.master')
@section('title')
    Forgot Password
@endsection
@section('content')
    <section class="breadcrumbs-banner" uk-parallax="bgy: -200"
             style="background: url(http://gva.edu.np/wp-content/uploads/2017/05/banner-aus.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Forgot Password</h2>
                    <ul class="bread-list">
                        <li><a href="{{ route('index') }}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="#">Forgot Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.notification')
    <section id="login">
        <div class="login_tab_wrapper mt-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="login_form_wrapper">
                            <form id="forgotPasswordForm" method="post" role="form">
                                {{ csrf_field() }}
                                <div class="login_wrapper">
                                    <div class="regiter_top_heading">
                                        <h4 class="center"> Forgot Password ?</h4>
                                        <p>Lost your password? Please enter your email address. You will receive
                                            a link to create a new password.</p>
                                    </div>

                                    <div class="relative">
                                        <div class="form-group i-email">
                                            <input type="email" name="email" id="email" class="form-control" required placeholder="Email*">
                                        </div>
                                    </div>

                                    <div class="login_btn clearfix">
                                        <a class="btn btn-primary float-right" id="btnForgotPassword"> Send Password Reset Link </a>
                                    </div>
                                    <div class="login_message text-center">
                                        <p><a href="{{ route('login') }}"> Back To Login </a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                            <!-- /.login_wrapper-->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
@section('scripts')
    <script>
        $(document).on("click", "#btnForgotPassword", function (e) {
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#forgotPasswordForm')[0]);
            var params = $('#forgotPasswordForm').serializeArray();
            var type="POST";
            var myUrl="{{ url('/forgot-password') }}";

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
                    if(response) {
                        $('#success-message').text(response.message);
                        $('#notify-success').show().fadeOut(10000);
                        $('#btnForgotPassword').text('Resend Link');
                        $('input[name="email"]').val('');
                    }
                },
                error: function (response) {
                    if (response.status == 422){
                        $.each(response.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color: red;">'+error[0]+'</span>').fadeOut(5000));
                        });
                    }
                    else {
                        $('#error-message').text(response.responseJSON.message);
                        $('#notify-error').show().fadeOut(10000);
                    }
                }
            });
        });

    </script>
    @endsection

