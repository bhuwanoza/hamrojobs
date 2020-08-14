@extends('layouts.master')
@section('title') Login @endsection
@section('content')
    {{--<section class="breadcrumbs-banner" uk-parallax="bgy: -200"--}}
             {{--style="background: url(http://gva.edu.np/wp-content/uploads/2017/05/banner-aus.png);">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h2>About</h2>--}}
                    {{--<ul class="bread-list">--}}
                        {{--<li><a href="{{ route('index') }}">Home<i class="fa fa-angle-right"></i></a></li>--}}
                        {{--<li class="active"><a >Login</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <section id="login">
        <div class="login_tab_wrapper mt-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <!-- Login Form -->

                        <div class="login_form_wrapper">
                            <form id="loginForm" method="post" role="form">
                                {{ csrf_field() }}
                                <div class="login_wrapper">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                            <a href="#" class="btn  facebook">
                                                <i class="fab fa-facebook-f"></i>
                                                <span>Login with Facebook</span> <span class="clearfix"></span>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                            <a href="#" class="btn  google-plus"> <i
                                                        class="fab fa-google-plus-g"></i>
                                                <span> Login with Google</span>
                                                <span class="clearfix"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <h2>or</h2>
                                    <div class="relative">
                                        <div class="form-group i-email">
                                            <input type="email" name="email" id="email" class="form-control" required placeholder="Email*">
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <div class="form-group i-password">
                                            <input type="password" name="password" class="form-control" required id="password" placeholder="Password *">
                                        </div>
                                    </div>
                                    <div class="login_remember_box">
                                        <label class="control control--checkbox">
                                            <input type="checkbox" name="remember_me" id="remember_me">Remember me
                                            <span class="control__indicator"></span>
                                        </label>
                                        <a href="{{ route('forgot-password') }}" class="forget_password">
                                            Forgot Password?
                                        </a>
                                    </div>
                                    <div class="login_btn clearfix">
                                        {{--<a href="#" class="btn btn-primary float-left"> Login as Jobseeker </a>--}}
                                        <button type="submit" class="btn btn-primary float-right" > Login </button>
                                    </div>
                                    <div class="login_message text-center">
                                        <p>Don’t have an account ? <a href="{{ route('register') }}"> Register Now </a>
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
        $('#loginForm').on("submit", function (e) {
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#loginForm')[0]);
            var params = $('#loginForm').serializeArray();
            var type = "POST";
            var myUrl = "{{ url('/login') }}";

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
                    if (response) {
                        window.location = '{{ url('/') }}' + response.route;
                    }
                },
                error: function (response) {
                    if (response.status == 422) {
                        $.each(response.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(5000));
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