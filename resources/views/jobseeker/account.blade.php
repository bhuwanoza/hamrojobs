@extends('layouts.master')
@section('title')
    Account Setup
@endsection

@section('content')
    <section id="user-profile">
        <div class="container">
            <div class="row">
                @include('jobseeker.partial.sidebar')
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="{{--tab-content--}} tab__detail">
                        <div class="tab-pane" id="Account__settings" role="tabpanel">
                            <div class="accordion" id="accordion-for-account-setting">
                                <!-- Change Email -->
                               {{-- <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5>
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                <span class="float-left">Change Email </span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="change__email">
                                                <form action="">
                                                    <div class="form-group">
                                                        <label for="email"> Change Email</label>
                                                        <input type="email" class="form-control" placeholder="email">
                                                    </div>
                                                </form>
                                                <button type="submit" class="btn btn-primary">Apply Now</button>
                                            </div>
                                           --}}{{-- <div class="add__email">
                                                <form action="">
                                                    <div class="form-group">
                                                        <label for="email"> Add Email</label>
                                                        <input type="email" class="form-control" placeholder="email">
                                                    </div>


                                                </form>
                                                <button type="submit" class="btn btn-primary">Add Now</button>

                                            </div>--}}{{--
                                        </div>
                                    </div>
                                </div>--}}
                                <!-- Change Password -->
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                <span class="float-left"> Change Password </span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <form class="form" id="change-password" >
                                                <div class="form-group is-empty">
                                                    <label class="control-label" for="current_password">Current Password*</label>
                                                    <input class="form-control" type="password" name="current_password" id="current_password">
                                                </div>
                                                <div class="form-group is-empty">
                                                    <label class="control-label" for="password">New Password*</label>
                                                    <input class="form-control" type="password" name="password" id="password">
                                                </div>
                                                <div class="form-group is-empty">
                                                    <label class="control-label" for="password_confirmation">Re-Type
                                                        Password*</label>
                                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                                                </div>
                                                <button type="submit" class="btn btn-primary"> Change Password</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Privacy Setting -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                <span class="float-left">Privacy Setting </span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <form method="POST"><input type="hidden" name="csrfmiddlewaretoken"
                                                                       value="5SVkDXO3IxrxScGTX54SyualUy1kROz1fB9QN5hEQN76i4O7aSLmGksNvxJstH8b">
                                                <div class="card-block">


                                                    <input type="hidden" name="csrfmiddlewaretoken"
                                                           value="5SVkDXO3IxrxScGTX54SyualUy1kROz1fB9QN5hEQN76i4O7aSLmGksNvxJstH8b">
                                                    <div class="form-group">
                                                        <div id="div_id_profile_searchable" class="checkbox"><label
                                                                    for="id_profile_searchable" class="">

                                                                Profile searchable
                                                            </label>
                                                            <small id="hint_id_profile_searchable" class="text-muted">
                                                                All
                                                                the registered employer can see your full profile.
                                                            </small>
                                                        </div>
                                                        <label class="bs-switch">
                                                            <span class="tog-yes">yes</span>
                                                            <input type="checkbox">
                                                            <span class="slider round"></span><span
                                                                    class="tog-no">No</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div id="div_id_profile_confidential" class="checkbox"><label
                                                                    for="id_profile_confidential" class="">
                                                                Profile confidential
                                                            </label>
                                                            <small id="hint_id_profile_confidential" class="text-muted">
                                                                Only
                                                                those employer can view your full profile for whom you
                                                                have
                                                                applied the job
                                                            </small>
                                                        </div>
                                                        <label class="bs-switch">
                                                            <span class="tog-yes">yes</span>
                                                            <input type="checkbox">
                                                            <span class="slider round"></span><span
                                                                    class="tog-no">No</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div id="div_id_want_job_alert" class="checkbox"><label
                                                                    for="id_want_job_alert" class="">
                                                                Would you like to get job alerts in your email?
                                                            </label>
                                                            <small id="hint_id_want_job_alert" class="text-muted">This
                                                                will
                                                                keep you alert of new jobs available.
                                                            </small>
                                                        </div>
                                                        <label class="bs-switch">
                                                            <span class="tog-yes">yes</span>
                                                            <input type="checkbox">
                                                            <span class="slider round"></span><span
                                                                    class="tog-no">No</span>
                                                        </label>
                                                    </div>

                                                </div>

                                                <div class="card-footer text-center">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <a href="#" class="btn btn-danger">Cancel</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Social Account -->
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseFour" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                <span class="float-left">  Social Account </span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <h5>Connected Social Account</h5>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                       name="inlineCheckboxOptions"
                                                       id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1"><a href=""
                                                                                                         class="btn facebook"><i
                                                                class="fab fa-facebook-f"></i>facebook </a></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                       name="inlineCheckboxOptions"
                                                       id="inlineCheckbox2" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2"><a href=""
                                                                                                         class="btn google-plus"><i
                                                                class="fab fa-google-plus-g"></i>google+</a></label>
                                            </div>

                                            <button type="button" class="btn btn-danger text-center display--block"
                                                    style="margin-top: 30px; "> Remove
                                            </button>
                                            <div class="card-footer text-center">
                                                <div class="social__account">
                                                    <h5>Add Social Accounts</h5>
                                                    <a href="" class="btn google-plus"><i
                                                                class="fab fa-google-plus-g"></i></a>
                                                    <a href="" class="btn facebook"><i class="fab fa-facebook-f"></i>
                                                    </a>
                                                    <a href="" class="btn twitter"><i class="fab fa-twitter"></i> </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Deactivate -->
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h5>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseFive" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                <span class="float-left"> Deactivate Account </span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div id="deactivate">
                                                <form method="post">
                                                    <div class="card-block">
                                                        <strong>Fill your password to deactivate your account.</strong>
                                                        <p class="text-muted text-danger">Note: This action cannot be
                                                            reverted.</p>
                                                        <div id="div_id_password" class="form-group">
                                                            <label for="id_password"
                                                                   class="form-control-label  requiredField">
                                                                Password<span>*</span> </label>
                                                            <div class="">
                                                                <input type="password" name="password" required=""
                                                                       class="textinput textInput form-control"
                                                                       id="id_password"></div>
                                                        </div>

                                                    </div>
                                                    <div class="card-footer text-center">

                                                        <button type="submit" class="btn btn-danger">Deactivate</button>
                                                        <a href="" class="btn btn-info">Cancel</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        $(document).on("submit", "#change-password", function (e) {
            e.preventDefault();
            var params = $('#change-password').serializeArray();
            var formData = new FormData($('#change-password')[0]);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('account.change-password') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#change-password').trigger("reset");
                    $.confirm({
                        title: 'Success ',
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        content: data,
                        type: 'green',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                            }
                        }
                    });
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                        });
                    }
                    else{
                        $.confirm({
                            title: 'Error Occurred!',
                            closeIcon: true,
                            closeIconClass: 'fa fa-close',
                            content: err.responseText,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                close: function () {
                                }
                            }
                        });
                    }
                },
                complete: function () {
                    $('#change-password').trigger("reset");
                }
            });
        });
    </script>
    @endsection

