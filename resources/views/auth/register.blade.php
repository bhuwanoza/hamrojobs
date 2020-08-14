@extends('layouts.master')
@section('title')Register @endsection
@section('content')
    {{--<section class="breadcrumbs-banner" uk-parallax="bgy: -200"
             style="background: url(http://gva.edu.np/wp-content/uploads/2017/05/banner-aus.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Register</h2>
                    <ul class="bread-list">
                        <li><a href="{{ route('index') }}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a href="">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>--}}

    @include('layouts.notification')
    <section id="register">
        <!-- register_form_wrapper -->
        <div class="register_tab_wrapper mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <!-- Nav tabs -->
                        <nav id="tabOne" class="nav nav-tabs register-tabs" role="tablist">
                            <a href="#jobseeker" class="nav-item nav-link active" data-toggle="tab" data-option="jobseeker"
                               aria-expanded="false">Job Seeker account <br> <span>I am looking for a job</span></a>
                            <a href="#employer" class="nav-item nav-link " data-toggle="tab" aria-expanded="true" data-option="employer">Employer
                                account <br> <span>We are hiring Employees</span></a>

                        </nav>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade register_left_form show active" id="jobseeker">

                                <form accept-charset="UTF-8" role="form" id="registerJobseeker">
                                    {{ csrf_field() }}
                                    <div class="regiter_top_heading">
                                        <h4 class="center"> You are registering as a Job Seeker</h4>
                                        <p>Fields with * are mandatory </p>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name_js" placeholder="First Name*">
                                        </div>

                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name_js" placeholder="Last Name*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="email"> Email Address</label>
                                            <input type="text" name="email" id="email_js" placeholder="Email*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="password" id="password_js"  placeholder="Password*">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="password_confirmation" id="password_confirmation_js"  placeholder="Re-enter Password*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="address" id="address_js" value="" placeholder="Address">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="mobile" id="mobile_js" value="" placeholder="Mobile*">
                                        </div>
                                    </div>
                                    <input type="text" name="user_type" value="jobseeker" id="user_type_js" hidden>
                                    <div class="row">
                                        {{--<div class="form-group col-md-6 col-sm-6 col-xs-12 custom_input">--}}
                                            {{--<input type="file" name="resume">--}}
                                            {{--<p>DOC, DOCX, RTF, PDF - 300KB MAX PREFERRED CV FORMAT - DOCX FILE</p>--}}
                                        {{--</div>--}}
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="check-box text-center">
                                                <input type="checkbox" name="shipping-option" id="account-option_1">  
                                                <label for="account-option_1">I agreed to the
                                                    <a href="#" class="check_box_anchr">
                                                        Terms and Conditions</a> governing the use of jobportal
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                        <button type="submit"   class="btn btn-primary login_btn" > Register </button>
                                    </div>
                                    <div class="login_message text-center">
                                        <p>Already a member? <a href="{{ route('login') }}"> Login Here </a></p>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade register_left_form" id="employer">
                                <form accept-charset="UTF-8" role="form" id="registerEmployer">
                                    {{ csrf_field() }}
                                    <div class="regiter_top_heading">
                                        <h4 class="center"> You are registering as a Company</h4>
                                        <p>Fields with * are mandatory </p>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name_emp" placeholder="First Name*">
                                        </div>

                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name_emp" placeholder="Last Name*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="email"> Email Address</label>
                                            <input type="text" name="email" id="email_emp" placeholder="Email*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="password" id="password_emp"  placeholder="Password*">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="password_confirmation" id="password_confirmation_emp"  placeholder="Re-enter Password*">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="address" id="address_emp" value="" placeholder="Address">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="mobile" id="mobile_emp" value="" placeholder="Mobile*">
                                        </div>
                                    </div>
                                    <input type="text" name="user_type" value="employer" id="user_type_emp" hidden>
                                    <div class="row">
                                        {{--<div class="form-group col-md-6 col-sm-6 col-xs-12 custom_input">--}}
                                        {{--<input type="file" name="resume">--}}
                                        {{--<p>DOC, DOCX, RTF, PDF - 300KB MAX PREFERRED CV FORMAT - DOCX FILE</p>--}}
                                        {{--</div>--}}
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="check-box text-center">
                                                <input type="checkbox" name="shipping-option" id="account-option_1">  
                                                <label for="account-option_1">I agreed to the
                                                    <a href="#" class="check_box_anchr">
                                                        Terms and Conditions</a> governing the use of jobportal
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="login_btn_wrapper register_btn_wrapper login_wrapper ">
                                        <button type="submit"  class="btn btn-primary login_btn" > Register </button>
                                    </div>
                                    <div class="login_message text-center">
                                        <p>Already a member? <a href="{{ route('login') }}"> Login Here </a></p>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $('#registerJobseeker').on("submit", function (e) {
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#registerJobseeker')[0]);
            var params = $('#registerJobseeker').serializeArray();
            var type = "POST";
            var myUrl = "{{ url('/register') }}";

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
                success: function (data) {
                    if (data == 'success') {
                        window.location = '{{ url('/') }}'
                    }
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[id ="' + i + '_js"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                        });
                    }
                    else {
                        $('#error-message').text(response.responseJSON.message);
                        $('#notify-error').show().fadeOut(10000);
                    }
                },

            });
        });


        $('#registerEmployer').on("submit", function (e) {
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#registerEmployer')[0]);
            var params = $('#registerEmployer').serializeArray();
            var type = "POST";
            var myUrl = "{{ url('/register') }}";

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
                success: function (data) {
                    if (data == 'success') {
                        window.location = '{{ url('/') }}'
                    }
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[id="' + i + '_emp"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                        });
                    } else {
                        $('#error-message').text(response.responseJSON.message);
                        $('#notify-error').show().fadeOut(10000);
                    }

                }
            });
        });
    </script>
@endsection