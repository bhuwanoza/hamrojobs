@extends('layouts.master')
@section('title')
    Edit Profile
@endsection

@section('content')

    <section id="user-profile">
        <div class="container">
            <div class="row">
                @include('jobseeker.partial.sidebar')
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="tab__detail">
                        <div class="tab-pane" id="Edit__User__profile" role="tabpanel">
                            <div class="accordion" id="accordion-for-edit-user-profile ">
                                <div class="card">
                                    <div class="card-header" id="headingBasic">
                                        <h5>
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseBasic" aria-expanded="true"
                                                    aria-controls="collapseBasic">
                                                <span class="float-left">Basic Information </span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseBasic" class="collapse {{--show--}}" aria-labelledby="headingBasic"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="edit__basic_information float-right">
                                                <a href="" class="info-edit-user-profile" data-toggle="modal"
                                                   id="edit_user_detail"><i
                                                            class="far fa-edit"></i> Edit</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-hover ">
                                                    <tbody>
                                                    <tr>
                                                        <td width="25%">Full Name<span class="float-right">:</span></td>
                                                        <td>
                                                            <strong>{{ $jobseeker->user->first_name }} {{ $jobseeker->user->last_name }}</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="25%">Display Picture<span
                                                                    class="float-right">:</span>
                                                        </td>
                                                        <td>
                                                            <div class="thumb "
                                                                 style="height: 100px;width: 100px; padding: 10px 20px;">

                                                                @if(is_file(public_path('uploads/jobseekers/' . $jobseeker->image)))
                                                                    <img class="rounded-circle"
                                                                         src="{{ asset('uploads/jobseekers/' . $jobseeker->image) }}"
                                                                         alt="">
                                                                @else
                                                                    <img class="rounded-circle"
                                                                         src="{{ asset('uploads/default/default-user.png') }}"
                                                                         alt="">
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @isset($jobseeker->current_address)
                                                        <tr>
                                                            <td>Current Address<span class="float-right">:</span></td>
                                                            <td>{{ $jobseeker->current_address }} </td>
                                                        </tr>
                                                    @endisset

                                                    @isset($jobseeker->permanent_address)
                                                        <tr>
                                                            <td>Permanent Address<span class="float-right">:</span></td>
                                                            <td>{{ $jobseeker->permanent_address }} </td>
                                                        </tr>
                                                    @endisset

                                                    @isset($jobseeker->user->mobile)
                                                        <tr>
                                                            <td>Mobile No.<span class="float-right">:</span></td>
                                                            <td>{{ $jobseeker->user->mobile }} (Primary)</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->mobile)
                                                        <tr>
                                                            <td>Mobile No.<span class="float-right">:</span></td>
                                                            <td>{{ $jobseeker->mobile  }} (Secondary)</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->gender)
                                                        <tr>
                                                            <td>Gender<span class="float-right">:</span></td>
                                                            <td>{{ $jobseeker->gender }}</td>
                                                        </tr>
                                                    @endisset

                                                    @isset($jobseeker->dob)
                                                        <tr>
                                                            <td>Date of Birth<span class="float-right">:</span></td>
                                                            <td>{{ \Carbon\Carbon::parse($jobseeker->dob)->toFormattedDateString() }}
                                                                ()
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->marital_status)
                                                        <tr>
                                                            <td>Marital Status<span class="float-right">:</span></td>
                                                            <td>{{ $jobseeker->marital_status }}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->religion)
                                                        <tr>
                                                            <td>Religion<span class="float-right">:</span></td>
                                                            <td>{{ $jobseeker->religion }}</td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->nationality)
                                                        <tr>
                                                            <td>Nationality<span class="float-right">:</span></td>
                                                            <td>{{ $jobseeker->nationality }}</td>
                                                        </tr>
                                                    @endisset
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Job Preference -->
                                <div class="card">
                                    <div class="card-header" id="headingPref">
                                        <h5>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapsePref" aria-expanded="false"
                                                    aria-controls="collapsePref">
                                                <span class="float-left"> Job Preference </span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapsePref" class="collapse" aria-labelledby="headingPref"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="edit__job__preference float-right">
                                                <a href="" class="info-edit-user-profile" id="edit_preference">
                                                    <i class="far fa-edit"></i> Edit</a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-hover ">
                                                    <tbody>
                                                    @isset($jobseeker->additional->industries)
                                                        <tr>
                                                            <td width="25%">Job Category<span
                                                                        class="float-right">:</span>
                                                            </td>
                                                            <td>
                                                                @foreach($jobseeker->additional->industries as $indust)
                                                                    <span class="badge red">{{ $indust->title }} </span>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->additional->loking_for)
                                                        <tr>
                                                            <td>Looking for<span class="float-right">:</span></td>
                                                            <td>
                                                                {{ $jobseeker->additional->loking_for }}
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->additional->available_for)

                                                        <tr>
                                                            <td>Available for<span class="float-right">:</span></td>
                                                            <td>
                                                                {{ $jobseeker->additional->available_for }}
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->additional->specialization)
                                                        <tr>
                                                            <td>Specialization<span class="float-right">:</span></td>
                                                            <td>
                                                                <span class=" badge cyan">{{ $jobseeker->additional->specialization }}</span>
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->skills)
                                                        <tr>
                                                            <td>Skills<span class="float-right">:</span></td>
                                                            <td>
                                                                @foreach($jobseeker->skills as $skill)
                                                                    <span class=" badge cyan">{{ $skill->title }}</span>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->additional)
                                                        <tr>
                                                            <td>Expected Salary<span class="float-right">:</span></td>
                                                            <td>

                                                                {{ $jobseeker->additional->expected_salary_currency }}.
                                                                ({{ $jobseeker->additional->expected_salary_boundary }})
                                                                {{ number_format($jobseeker->additional->expected_salary, 2, '.', ',') }}
                                                                <span class=" badge purple darken-2">{{ $jobseeker->additional->expected_salary_basic  }}</span>
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->additional)
                                                        <tr>
                                                            <td>Current Salary<span class="float-right">:</span></td>
                                                            <td>
                                                                {{ $jobseeker->additional->current_salary_currency }}. (
                                                                {{ $jobseeker->additional->current_salary_boundary }})
                                                                {{ number_format($jobseeker->additional->current_salary, 2, '.', ',') }}
                                                                <span class=" badge purple darken-2">{{ $jobseeker->additional->current_salary_basic  }}</span>

                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->additional->job_preference_location)
                                                        <tr>
                                                            <td>Job Preference Location<span
                                                                        class="float-right">:</span>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge cyan">{{ $jobseeker->additional->job_preference_location }}</span>
                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    @isset($jobseeker->additional->career_objective)
                                                        <tr>
                                                            <td>Career Objective Summary<span
                                                                        class="float-right">:</span>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    <li> {{ $jobseeker->additional->career_objective }}</li>
                                                                </ul>

                                                            </td>
                                                        </tr>
                                                    @endisset
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Education -->
                                <div class="card">
                                    <div class="card-header" id="headingEdu">
                                        <h5>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseEdu" aria-expanded="false"
                                                    aria-controls="collapseEdu">
                                                <span class="float-left">Education </span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseEdu" class="collapse" aria-labelledby="headingEdu"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="edit__edu__preference float-right">
                                                <a class="info-edit-user-profile"
                                                   id="add_education">
                                                    <i class="icon-plus"></i> Add</a>
                                            </div>
                                            <hr>
                                            <div class="card-block">
                                                @isset($jobseeker->academics)
                                                    @foreach($jobseeker->academics as $academics)
                                                        <div class="pb-3 pt-3 col-sm-12"
                                                             id="education-id-{{ $academics->id }}">
                                                            <div class=" float-right">
                                                                <a class="mr-2 edit_education"
                                                                   data-id="{{ $academics->id }}">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </a>
                                                                <a class="font-sm delete_education"
                                                                   data-id="{{ $academics->id }}">
                                                                    <span class="icon-trash mr-1"></span>Delete
                                                                </a>
                                                            </div>
                                                            <span class="font-md float-left">

                                                                <strong>{{ $academics->academic_program }}</strong>
                                                            </span>

                                                            <span>
                                                                <br>
                                                                <h6 class="text-muted">
                                                                    <i class="fas fa-building"></i>
                                                                    {{ $academics->academic_institute }}
                                                                </h6>
                                                                <h6 class="text-muted">
                                                                    <i class="fas fa-user-graduate"></i>
                                                                    {{ $academics->qualification->title }}
                                                                </h6>
                                                                <h6 class="text-muted">
                                                                    <i class="fas fa-university"></i>
                                                                    {{ $academics->academic_board }}
                                                                </h6>
                                                                @php
                                                                    if(isset($academics->start_date)){
                                                                        $s_date = explode("-", $academics->start_date);
                                                                        $s_day = $s_date[2];
                                                                        $s_month = $s_date[1];
                                                                        $s_year = $s_date[0];
                                                                     }
                                                                   if(isset($academics->end_date)){
                                                                        $e_date = explode("-", $academics->end_date);
                                                                        $e_day = $e_date[2];
                                                                        $e_month = $e_date[1];
                                                                        $e_year = $e_date[0];
                                                                    }
                                                                @endphp
                                                                <h6 class="text-muted">
                                                                     <i class="fas fa-calendar"></i>
                                                                    @isset($s_year){{ $s_year }}@endisset -
                                                                    @if($academics->end_date==null)Running
                                                                    @else
                                                                        @isset($e_year){{ $e_year }}@endisset
                                                                    @endif
                                                                </h6>

                                                            </span>
                                                            <span class="float-right">

                                                            </span>
                                                        </div>
                                                    @endforeach

                                                @else
                                                    <div class="pb-3 pt-3 col-sm-12">
                                                        <h4>You Do Not Have Any Academic</h4>
                                                        <p>Please Update your </p>
                                                    </div>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Work JobSeekerExperiences -->
                                <div class="card">
                                    <div class="card-header" id="headingWork">
                                        <h5>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseWork" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                <span class="float-left">Work Experience</span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseWork" class="collapse" aria-labelledby="headingWork"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="edit__work__preference float-right">
                                                <a href="" class="info-edit-user-profile"
                                                   id="add_experience">
                                                    <i class="fas fa-plus"></i> Add</a>
                                            </div>
                                            <br>
                                            <hr>
                                            <div class="card-block">
                                                @isset($jobseeker->experiences)
                                                    @foreach($jobseeker->experiences as $experience)
                                                        <div class="pb-3 pt-3 col-sm-12"
                                                             id="experience-id-{{ $experience->id }}">
                                                            <div class=" float-right">
                                                                <a class="mr-2 edit_experience"
                                                                   data-id="{{ $experience->id }}">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </a>
                                                                <a class="font-sm delete_experience"
                                                                   data-id="{{ $experience->id }}">
                                                                    <span class="icon-trash mr-1"></span>Delete
                                                                </a>
                                                            </div>
                                                            <span class="font-md">
                                                                <strong>{{ $experience->job_title }}</strong>
                                                            </span>
                                                            <span class="font-sm text-muted">
                                                                ({{ $experience->job_level }})
                                                            </span>
                                                            <h6 class="text-muted">
                                                                <i class="fas fa-industry"></i>
                                                                {{ $experience->industry->title }}
                                                            </h6>
                                                            @php
                                                                if(isset($experience->start_date)){
                                                                    $s_date = explode("-", $experience->start_date);
                                                                    $s_day = $s_date[2];
                                                                    $s_month = $s_date[1];
                                                                    $s_year = $s_date[0];
                                                                  }
                                                                  if(isset($experience->end_date)){
                                                                    $e_date = explode("-", $experience->end_date);
                                                                    $e_day = $e_date[2];
                                                                    $e_month = $e_date[1];
                                                                    $e_year = $e_date[0];
                                                                  }
                                                            @endphp
                                                            <h6 class="text-muted">
                                                                <i class="fas fa-calendar"></i>
                                                                @isset($s_month) {{ $s_month }}/ {{ $s_year }} @endisset
                                                                to
                                                                @if($experience->end_date==null)
                                                                    Still Working
                                                                @else
                                                                    @isset($e_month) {{ $e_month }}
                                                                    / {{ $e_year }} @endisset
                                                                @endif
                                                            </h6>
                                                            <h6 class="text-muted">
                                                                <i class="fas fa-location-arrow"></i> {{ $experience->job_location }}
                                                            </h6>
                                                            <br>
                                                            <h5>Duties and Responsibilities:</h5>
                                                            <p class="text-muted">{{ str_limit($experience->duties_responsibilities,500) }}</p>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="pb-3 pt-3 col-sm-12">
                                                        <h4>You Do Not Have Any Experience</h4>
                                                        <p>Add New </p>
                                                    </div>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Language -->
                            {{--<div class="card">
                                <div class="card-header" id="headingLanguage">
                                    <h5>
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseLanguage" aria-expanded="false"
                                                aria-controls="collapseThree">
                                            <span class="float-left"> Language</span><i
                                                    class="fas fa-plus float-right"></i><span
                                                    class="clearfix"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseLanguage" class="collapse" aria-labelledby="headingLanguage"
                                     data-parent="#accordion">
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>--}}
                            <!-- Social links -->
                                <div class="card">
                                    <div class="card-header" id="headingSocial">
                                        <h5>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseSocial" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                <span class="float-left">Social</span><i
                                                        class="fas fa-plus float-right"></i><span
                                                        class="clearfix"></span>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSocial" class="collapse" aria-labelledby="headingSocial"
                                         data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="edit__social__preference float-right">
                                                <a href="" class="info-edit-user-profile"
                                                   id="add_social">
                                                    <i class="fas fa-plus"></i> Add</a>
                                            </div>

                                            <table class="table table-striped table-no-border">
                                                <tbody>
                                                @isset($jobseeker->social)
                                                    @foreach($jobseeker->social as $social)
                                                        <tr id="social-id-{{$social->id}}">
                                                            <td>
                                                                <span class="label label-default">{{ $social->social_account }}</span><span
                                                                        class="float-right">:</span></td>
                                                            <td><a href="https://www.instagram.com/viney_maharzan/"
                                                                   target="_blank">{{ $social->social_link }}</a>
                                                            </td>
                                                            <td>
                                                                <a class="mr-2 edit_social"
                                                                   data-id="{{ $social->id }}">
                                                                    <i class="far fa-edit"></i>
                                                                    Edit
                                                                </a>
                                                                <a class="font-sm delete_social"
                                                                   data-id="{{ $social->id }}">
                                                                    <span class="icon-trash mr-1"></span>
                                                                    Delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Reference -->
                            {{--<div class="card">
                                <div class="card-header" id="headingRefer">
                                    <h5>
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseRefer" aria-expanded="false"
                                                aria-controls="collapseThree">
                                            <span class="float-left"> Reference</span><i
                                                    class="fas fa-plus float-right"></i><span
                                                    class="clearfix"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseRefer" class="collapse" aria-labelledby="headingRefer"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="edit__refer__preference float-right">
                                            <a href="" class="info-edit-user-profile" data-toggle="modal"
                                               data-target="#edit_refer_detail"><i
                                                        class="far fa-edit"></i> Edit</a>
                                        </div>
                                        <hr>
                                        <strong>add refernce</strong>
                                        <a href="">

                                        </a>
                                    </div>
                                </div>
                            </div>--}}
                            <!-- Other Information -->
                                <!--<div class="card">-->
                                <!--    <div class="card-header" id="headingOther">-->
                                <!--        <h5>-->
                                <!--            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"-->
                                <!--                    data-target="#collapseOther" aria-expanded="false"-->
                                <!--                    aria-controls="collapseEdu">-->
                                <!--                <span class="float-left">Other Information </span><i-->
                                <!--                        class="fas fa-plus float-right"></i><span-->
                                <!--                        class="clearfix"></span>-->
                                <!--            </button>-->
                                <!--        </h5>-->
                                <!--    </div>-->
                                <!--    <div id="collapseOther" class="collapse" aria-labelledby="headingEdu"-->
                                <!--         data-parent="#accordion">-->
                                <!--        <div class="card-body">-->
                                <!--            <form method="POST">-->
                                <!--                <div class="form-group">-->
                                <!--                    <div id="div_id_profile_searchable" class="checkbox"><label-->
                                <!--                                for="id_profile_searchable" class="">-->

                                <!--                            Profile searchable-->
                                <!--                        </label>-->
                                <!--                        <small id="hint_id_profile_searchable" class="text-muted">All-->
                                <!--                            the registered employer can see your full profile.-->
                                <!--                        </small>-->
                                <!--                    </div>-->
                                <!--                    <label class="bs-switch">-->
                                <!--                        <span class="tog-yes">yes</span>-->
                                <!--                        <input type="checkbox">-->
                                <!--                        <span class="slider round"></span><span class="tog-no">No</span>-->
                                <!--                    </label>-->
                                <!--                </div>-->
                                <!--                <div class="form-group">-->
                                <!--                    <div id="div_id_profile_confidential" class="checkbox"><label-->
                                <!--                                for="id_profile_confidential" class="">-->
                                <!--                            Profile confidential-->
                                <!--                        </label>-->
                                <!--                        <small id="hint_id_profile_confidential" class="text-muted">Only-->
                                <!--                            those employer can view your full profile for whom you have-->
                                <!--                            applied the job-->
                                <!--                        </small>-->
                                <!--                    </div>-->
                                <!--                    <label class="bs-switch">-->
                                <!--                        <span class="tog-yes">yes</span>-->
                                <!--                        <input type="checkbox">-->
                                <!--                        <span class="slider round"></span><span class="tog-no">No</span>-->
                                <!--                    </label>-->
                                <!--                </div>-->
                                <!--                <div class="form-group">-->
                                <!--                    <div id="div_id_want_job_alert" class="checkbox"><label-->
                                <!--                                for="id_want_job_alert" class="">-->
                                <!--                            Would you like to get job alerts in your email?-->
                                <!--                        </label>-->
                                <!--                        <small id="hint_id_want_job_alert" class="text-muted">This will-->
                                <!--                            keep you alert of new jobs available.-->
                                <!--                        </small>-->
                                <!--                    </div>-->
                                <!--                    <label class="bs-switch">-->
                                <!--                        <span class="tog-yes">yes</span>-->
                                <!--                        <input type="checkbox">-->
                                <!--                        <span class="slider round"></span><span class="tog-no">No</span>-->
                                <!--                    </label>-->
                                <!--                </div>-->


                                <!--            </form>-->
                                <!--        </div>-->
                                <!--        <div class="card-footer text-center">-->
                                <!--            <button type="submit" class="btn btn-primary">Save</button>-->
                                <!--            <a href="#" class="btn btn-danger">Cancel</a>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 offset-md-2">
                <div class="modal fade" id="launchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var $modal = $('#launchModal');
        $(document).on("click", "#edit_user_detail", function (e) {
            e.preventDefault();
            var tempurl = "{{ route('profile.edit-basic') }}";
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", "#edit_preference", function (e) {
            e.preventDefault();
            var tempurl = "{{ route('profile.edit-preference') }}";
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", "#add_education", function (e) {
            e.preventDefault();
            var tempurl = "{{ route('profile.add-education') }}";
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", ".edit_education", function (e) {
            e.preventDefault();

            var $this = $(this);
            var id = $this.attr('data-id');
            var tempurl = "{{ route('profile.edit-education',':id') }}";
            tempurl = tempurl.replace(':id', id);
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", "#add_experience", function (e) {
            e.preventDefault();
            var tempurl = "{{ route('profile.add-experience') }}";
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", ".edit_experience", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempurl = "{{ route('profile.edit-experience',':id') }}";
            tempurl = tempurl.replace(':id', id);
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });


        $(document).on("click", "#add_social", function (e) {
            e.preventDefault();
            var tempurl = "{{ route('profile.add-social') }}";
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", ".edit_social", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempurl = "{{ route('profile.edit-social',':id') }}";
            tempurl = tempurl.replace(':id', id);
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });


        /*Form Submissions*/

        $(document).on("submit", "#editProfile", function (e) {
            e.preventDefault();
            var params = $('#editProfile').serializeArray();
            var formData = new FormData($('#editProfile')[0]);

            if ($('#user_image').val()) {
                formData.append('user_image', $('input[type=file]')[0].files[0]);
            }

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('profile.update-basic') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Profile Updated Successfully',
                        type: 'blue',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                                window.location.reload();
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
                },
                complete: function () {
                }
            });
        });

        $(document).on("submit", "#editPreferences", function (e) {
            e.preventDefault();
            var params = $('#editPreferences').serializeArray();
            var formData = new FormData($('#editPreferences')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('profile.update-preference') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Preference Updated Successfully',
                        type: 'blue',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                                window.location.reload();
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
                },
                complete: function () {
                }
            });
        });

        $(document).on("submit", "#addEducation", function (e) {
            e.preventDefault();
            var params = $('#addEducation').serializeArray();
            var formData = new FormData($('#addEducation')[0]);

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('profile.save-education') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Education Added Successfully',
                        type: 'blue',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                                window.location.reload();
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
                },
                complete: function () {

                }
            });
        });

        $(document).on("submit", "#editEducation", function (e) {
            e.preventDefault();
            var params = $('#editEducation').serializeArray();
            var formData = new FormData($('#editEducation')[0]);
            formData.append('id', $(this).attr('data-id'));

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('profile.update-education') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Education Updated Successfully',
                        type: 'blue',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                                window.location.reload();
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
                },
                complete: function () {
                }
            });
        });

        $(document).on("submit", "#addExperience", function (e) {
            e.preventDefault();
            var params = $('#addExperience').serializeArray();
            var formData = new FormData($('#addExperience')[0]);

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('profile.save-experience') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Experience Added Successfully',
                        type: 'blue',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                                window.location.reload();
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
                },
                complete: function () {
                }
            });
        });

        $(document).on("submit", "#editExperience", function (e) {
            e.preventDefault();
            var params = $('#editExperience').serializeArray();
            var formData = new FormData($('#editExperience')[0]);
            formData.append('id', $(this).attr('data-id'));

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('profile.update-experience') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Experience Updated Successfully',
                        type: 'blue',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                                window.location.reload();

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
                },
                complete: function () {
                }
            });
        });

        $(document).on("submit", "#addSocial", function (e) {
            e.preventDefault();
            var params = $('#addSocial').serializeArray();
            var formData = new FormData($('#addSocial')[0]);

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('profile.save-social') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Social Added Successfully',
                        type: 'blue',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                                window.location.reload();
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
                },
                complete: function () {
                }
            });
        });

        $(document).on("submit", "#editSocial", function (e) {
            e.preventDefault();
            var params = $('#editSocial').serializeArray();
            var formData = new FormData($('#editSocial')[0]);
            formData.append('id', $(this).attr('data-id'));

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('profile.update-social') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Social Updated Successfully',
                        type: 'blue',
                        typeAnimated: true,
                        buttons: {
                            close: function () {
                                window.location.reload();
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
                },
                complete: function () {
                }
            });
        });


        $(document).on('click', '.delete_education', function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.confirm({

                title: 'Confirm Delete!',
                icon: 'fas fa-info-circle',
                theme: 'bootstrap',
                closeIconClass: 'fa fa-close',
                closeIcon: true,
                animation: 'scale',
                type: 'red',
                content: ' Are You Sure Want to Delete?',
                buttons: {
                    confirm: function () {
                        var deleteUrl = "{{ route('profile.delete-education', ':id') }}";
                        deleteUrl = deleteUrl.replace(':id', id);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: deleteUrl,
                            success: function (data) {
                                $('#education-id-' + id).fadeOut(1000);
                                $.confirm({
                                    closeIcon: true,
                                    closeIconClass: 'fa fa-close',
                                    title: 'Success!',
                                    content: 'Deleted Successfully',
                                    type: 'blue',
                                    typeAnimated: true,
                                    buttons: {
                                        close: function () {
                                        }
                                    }
                                });
                            },
                            complete: function () {
                            }
                        });
                    },
                    cancel: function () {
                        $.alert('Delete Canceled!');
                    }
                }
            });
        });

        $(document).on('click', '.delete_experience', function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.confirm({
                closeIcon: true,
                closeIconClass: 'fa fa-close',
                title: 'Confirm Delete!',
                icon: 'fas fa-info-circle',
                theme: 'bootstrap',
                animation: 'scale',
                type: 'red',
                content: ' Are You Sure Want to Delete?',
                buttons: {
                    confirm: function () {
                        var deleteUrl = "{{ route('profile.delete-experience', ':id') }}";
                        deleteUrl = deleteUrl.replace(':id', id);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: deleteUrl,
                            success: function (data) {
                                $('#experience-id-' + id).fadeOut(1000);
                                $.confirm({
                                    closeIcon: true,
                                    closeIconClass: 'fa fa-close',
                                    title: 'Success!',
                                    content: 'Deleted Successfully',
                                    type: 'blue',
                                    typeAnimated: true,
                                    buttons: {
                                        close: function () {
                                        }
                                    }
                                });
                            },
                            complete: function () {
                            }
                        });
                    },
                    cancel: function () {
                        $.alert('Delete Canceled!');
                    }
                }
            });
        });

        $(document).on('click', '.delete_social', function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.confirm({
                closeIcon: true,
                closeIconClass: 'fa fa-close',
                title: 'Confirm Delete!',
                icon: 'fas fa-info-circle',
                theme: 'bootstrap',
                animation: 'scale',
                type: 'red',
                content: ' Are You Sure Want to Delete?',
                buttons: {
                    confirm: function () {
                        var deleteUrl = "{{ route('profile.delete-social', ':id') }}";
                        deleteUrl = deleteUrl.replace(':id', id);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: deleteUrl,
                            success: function (data) {
                                $('#social-id-' + id).fadeOut(1000);
                                $.confirm({
                                    closeIcon: true,
                                    closeIconClass: 'fa fa-close',
                                    title: 'Success!',
                                    content: 'Deleted Successfully',
                                    type: 'blue',
                                    typeAnimated: true,
                                    buttons: {
                                        close: function () {
                                        }
                                    }
                                });
                            },
                            complete: function () {
                            }
                        });
                    },
                    cancel: function () {
                        $.alert('Delete Canceled!');
                    }
                }
            });
        });

    </script>
    <script>
        $(document).on('click','#currently_studying', function () {
            if ($(this).is(':checked')) {
                $('#grad_end_year').hide();
            }
            else
                $('#grad_end_year').show();
        });
        $(document).on('click','#currently_working', function () {
            if ($(this).is(':checked')) {
                $('#exp_end_year').hide();
            }
            else
                $('#exp_end_year').show();
        });

    </script>

@endsection

