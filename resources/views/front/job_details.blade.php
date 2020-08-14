@extends('layouts.master')
@section('title')
    @isset($job) {{ $job->title }} @endisset
@endsection
@section('styles')
    <style>
        .listinclude ul {
            list-style: initial;

        }
    </style>

@endsection

@section('content')

    <section id="basic_job_info">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    @isset($job)
                        <div class="header-detail  box--shadow">
                            <div class="cover-banner relative">
                                @if(file_exists('uploads/companies/covers/' . $job->company->cover_image))
                                    <img class="profile-user-img img-responsive " 
                                         src="{{ asset('uploads/companies/covers/' . $job->company->cover_image) }}"
                                         alt="" style="height: 240px; width: 100%">
                                @else
                                    <img class="profile-user-img img-responsive " 
                                         src="{{ asset('uploads/default/default-company-cover.jpg') }}"
                                         alt="" style="height: 240px; width: 100%">
                                @endif
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <aside>
                        <div class="sidebar">
                            <div class="box box--shadow">
                                <div class="p-3">
                                    <div class="profile-img relative">
                                        @if(file_exists(public_path('uploads/companies/logos/' . $job->company->logo)))
                                            <img class="img-rounded img-responsive center"
                                                 src="{{ asset('uploads/companies/logos/' . $job->company->logo) }}"
                                                 alt="" style="height: 200px; width: 260px; object-fit:contain;">
                                        @else
                                            <img class="img-rounded img-responsive center"
                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                 alt="" style="height: 200px; width: 260px; object-fit:contain;">
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <h3>
                                            <a href="{{ route('company.show',[$job->company->slug]) }}">{{ $job->company->title }}</a>
                                        </h3>
                                    </div>
                                </div>
                                <ul>
                                    <li class="relative" style="display:flex; flex-direction:column">
                                        <span><i class="fas fa-industry"></i>
                                            {{ $job->company->industry->title }}
                                        </span>
                                        <span><i class="fa fa-map-marker"></i>{{ $job->company->address }}</span>
                                        {{--<span><i class="fa fa-envelope"></i><a--}}
                                        {{--href="mailto:{{ $job->company->email }}"> {{ $job->company->email }}</a></span>--}}
                                        {{--<span><i class="fa fa-phone"></i><a--}}
                                        {{--href="tel:{{ $job->company->phone }}">{{ $job->company->phone }}</a></span>--}}
                                        <span><i class="fa fa-globe"></i><a
                                                    href="{{ $job->company->website }}">{{ $job->company->website }}</a></span>
                                        {{--<span><i class="fa fa-star"></i> Job Posts ({{ $job->company->jobposts->count() }}--}}
                                        {{--)</span>--}}
                                        {{--<span><i class="fa fa-calendar"></i>Joined ({{ $job->company->user->created_at->diffForHumans() }}--}}
                                        {{--)</span>--}}
                                        <hr>
                                    </li>
                                </ul>
                            </div>
                            {{--Other jobs at --}}
                            @if($company_other_jobs->isNotEmpty())
                                <div class="sidebar-jobs box box--shadow">
                                    <div class="title-head">
                                        <h5 class="small-title">Other Jobs at {{  $job->company->title }}</h5>
                                    </div>
                                    <ul >
                                        @foreach($company_other_jobs as $otherjobs)
                                            <li class="mb-1" >
                                                <a href="{{ route('jobs-single',['slug'=>$otherjobs->slug]) }}"
                                                   class="d-flex mb-2" >
                                                    <figure class="mr-1">
                                                        @if(is_file('uploads/companies/logos/thumbnails/' . $otherjobs->company->logo))
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/companies/logos/thumbnails/' . $otherjobs->company->logo) }}"
                                                                 alt=""
                                                                 style="height: 80px;width: 80px; object-fit:contain">
                                                        @else
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                 alt=""
                                                                 style="height: 80px;width: 80px; object-fit:contain;">
                                                        @endif
                                                    </figure>
                                                    <div>
                                                        <h5 style="text-transform: capitalize">{{ $otherjobs->title }}</h5>
                                                        <p style="text-transform: capitalize">{{ $otherjobs->company->title }}</p>

                                                    </div>
                                                    <span class="clearfix"></span>
                                                </a>
                                                <div>
                                                    <span class="">
                                                        <i class="fas fa-calendar-alt"></i>
                                                        Deadline:
                                                    </span>
                                                    {{ \Carbon\Carbon::parse($otherjobs->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                </div>
                                            </li>
                                            <hr>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            @if($similar_jobs->isNotEmpty())
                                <div class="sidebar-jobs box box--shadow">
                                    <div class="title-head">
                                        <h5 class="small-title">Similar Jobs</h5>
                                    </div>
                                    <ul>
                                        @foreach($similar_jobs as $similarjob)
                                            <li class="mb-1">
                                                <a href="{{ route('jobs-single',['slug'=>$similarjob->slug]) }}"
                                                   class="d-flex mb-2">
                                                    <figure class="mr-1">
                                                        @if(file_exists('uploads/companies/logos/thumbnails/' . $similarjob->company->logo))
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/companies/logos/thumbnails/' . $similarjob->company->logo) }}"
                                                                 alt=""
                                                                 style="height: 80px;width: 80px; object-fit:contain;">
                                                        @else
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                 alt=""
                                                                 style="height: 80;width: 80px; object-fit:contain;">
                                                        @endif
                                                    </figure>
                                                    <div>
                                                        <h5 style="text-transform: capitalize">{{ $similarjob->title }}</h5>
                                                        <p style="text-transform: capitalize">{{ $similarjob->company->title }}</p>
                                                    </div>
                                                    <span class="clearfix"></span>
                                                </a>
                                                <div>
                                                <span class="">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    Deadline:
                                                </span>
                                                    {{ \Carbon\Carbon::parse($similarjob->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                </div>
                                            </li>
                                            <hr>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <div class="side-top-employer  mt-3 mb-3">
                                @php
                                    $rightjobs=getAdvertise('Content Left');
                                @endphp
                                @isset($rightjobs)
                                    @if($rightjobs->isNotEmpty())
                                        @foreach($rightjobs as $rightjob)
                                            <div class="ad-img_300">
                                                <a href="{{ $rightjob->link }}" target="_blank">
                                                    <img src="{{ asset('uploads/advertise/'.$rightjob->image) }}"
                                                     alt="">
                                                 </a>
                                            </div>
                                        @endforeach
                                    @endif
                                @endisset
                            </div>
                        </div>
                    </aside>

                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="listing_left_sidebar_wrapper mt-2">
                        <div class="card ">
                            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                                <div class="float-left">
                                    <h4>{{ $job->title }}</h4>
                                </div>
                                <div class="float-right">
                                    <div class="float-right ">
                                        <span class="text-success">Views: {{ $job->count }}</span> |
                                        <span>Apply Before: {{ \Carbon\Carbon::parse($job->job_deadline) ->diffForHumans(null,null, false, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block px-5 py-3">
                                <!-- Basic Job Information Card -->
                                <div class="card-group">
                                    <div class="card border-0">
                                        <div class="card-header p-2" style="background:white;">
                                            <h5 class="mb-1">Basic Job Information
                                            </h5>
                                        </div>
                                        <div class="card-block p-0 table-responsive">
                                            <table class="table table-hover table-no-border m-0">
                                                <tbody>
                                                @isset($job->industry)
                                                    <tr>
                                                        <td width="33%">Job Category</td>
                                                        <td width="3%">:</td>
                                                        <td width="64%">
                                                            <a href="{{ url('/industry/'.$job->industry->slug) }}">{{ $job->industry->title }}</a>
                                                        </td>
                                                    </tr>
                                                @endisset
                                                <tr>
                                                    <td>Job Level</td>
                                                    <td>:</td>
                                                    <td>
                                                        <h4>
                                                            <span class="badge badge-info">
                                                                {{ $job->job_level }}
                                                            </span>
                                                        </h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. of Vacancies</td>
                                                    <td>:</td>
                                                    <td>
                                                        <h4>
                                                            <span class="badge badge-danger">
                                                             {{ $job->number_of_vacancies }}
                                                        </span>
                                                        </h4>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Employment Type</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $job->job_type }}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                        Job Location
                                                    </td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $job->location }}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>Offered Salary</td>
                                                    <td>:</td>
                                                    <td>
                                                        <h5>
                                                             <span class="badge badge-success">
                                                             @if($job->salary_type=='Negotiable')
                                                                     Negotiable
                                                                 @elseif($job->salary_type=='Range')
                                                                     Rs.  {{ number_format($job->min_salary, 2, '.', ',') }}
                                                                     -
                                                                     Rs. {{ number_format($job->max_salary, 2, '.', ',') }}
                                                                 @else
                                                                     {{ number_format($job->min_salary, 2, '.', ',') }}
                                                                 @endif
                                                         </span>
                                                        </h5>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Apply Before<span class="font-xs mx-2">(Deadline)</span></td>
                                                    <td>:</td>
                                                    <td>
                                                        <h5>
                                                            <span class="badge badge-danger">
                                                            {{ \Carbon\Carbon::parse($job->job_deadline)->toFormattedDateString()  }}
                                                                ({{ \Carbon\Carbon::parse($job->job_deadline) ->diffForHumans(null,null, false, 3) }}
                                                                )
                                                        </span>
                                                        </h5>
                                                    </td>
                                                </tr>
                                                @if($job->skills()->exists())
                                                    <tr>
                                                        <td>Skills <span class="font-xs mx-2"></span></td>
                                                        <td>:</td>
                                                        <td>
                                                            <h5>
                                                                @foreach($job->skills()->get() as $skills)
                                                                    <span class="badge badge-primary">{{ $skills->title }}</span>
                                                                @endforeach
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-4">
                                <!-- Job Specification Card -->

                                @isset($job->jobadditional)
                                    <div class="card-group">
                                        <div class="card border-0">
                                            <div class="card-header p-2" style="background:white;">
                                                <h5 class="mb-1 ">Job Specification
                                                </h5>
                                            </div>
                                            <div class="card-block p-0 table-responsive">
                                                <table class="table table-hover table-no-border m-0">

                                                    <tbody>
                                                    <tr>
                                                        <td width="33%">Education Level</td>
                                                        <td width="3%">:</td>
                                                        <td width="64%">
                                                        <span> @isset($job->jobadditional->qualification)
                                                                {{ $job->jobadditional->qualification->title }}
                                                            @else
                                                                Not Required
                                                            @endisset
                                                        </span>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <td width="33%">Experience Required</td>
                                                        <td width="3%">:</td>
                                                        <td width="64%">
                                                            <h5>
                                                                <span class="badge badge-danger">
                                                            @isset($job->jobadditional->experience)
                                                                        {{ $job->jobadditional->experience_boundary }} {{ $job->jobadditional->experience }} {{ $job->jobadditional->experience_measure }}
                                                                    @else
                                                                        No Experience Required
                                                                    @endisset

                                                        </span>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                                <div class="card-group">
                                                    <div class="card border-0">
                                                        <div class="card-block p-2">
                                                            <h5 class="mb-1">Other Specification
                                                            </h5>
                                                        </div>
                                                        <div class="card-text p-2 listinclude">

                                                            {!! html_entity_decode($job->jobadditional->specification) !!}

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-0 mb-4">
                                    <!-- Job Description Card -->
                                    @isset($job->jobadditional->description)
                                        <div class="card-group">
                                            <div class="card border-0">
                                                <div class="card-block p-2" style="background:white;">
                                                    <h5>Job Description
                                                    </h5>
                                                    <hr>
                                                </div>

                                                <div class="card-text text-justify p-2 listinclude">

                                                    {!! html_entity_decode($job->jobadditional->description) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endisset

                                    <hr class="mt-0 mb-4">
                                @endisset


                                <div class="mt-3">
                                    @if(file_exists(public_path('uploads/jobposts/' . $job->job_banner)))
                                    <a href="{{ asset('uploads/jobposts/' . $job->job_banner) }}">
                                        <img class="img-responsive"
                                             src="{{ asset('uploads/jobposts/' . $job->job_banner) }}"
                                             alt="">
                                    </a>

                                    @endif

                                </div>


                                <!-- APPLY ONLINE OR APPLYING PROCEDURE CHECK -->
                                {{--<div class="mt-3">
                                    @php
                                        $checkapplied = checkApplied($job->id)
                                    @endphp
                                    <button type="button"
                                        @if($checkapplied=='user not jobseeker'||'not logged in' ||'applied')
                                        class="btn btn-success disabled float-right"
                                        @else
                                        id="btn-apply" data-id="{{ $job->id }}"
                                        @endif>
                                        <i class="far fa-sticky-note"></i>
                                        @if($checkapplied=='applied')
                                            APPLIED
                                        @else
                                            APPLY NOW
                                        @endif
                                    </button>
                                </div>--}}
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                   <span class="">
                                   <a id="{{$job->slug}}" class="btn-save-job"
                                      data-id="{{ $job->id }}" @if(checkSaved($job->id)=='not logged in'||'user not jobseeker') @endif>
                                       @switch( checkSaved($job->id))
                                           @case('not saved')
                                           <i class="far fa-bookmark"></i>Save
                                           @break
                                           @case('saved')
                                           <i class="fas fa-bookmark"></i>Saved
                                           @break
                                           @case('not logged in')
                                           <i class="far fa-bookmark"></i>Save
                                           @break
                                           @case('user not jobseeker')
                                           <i class="far fa-bookmark "></i>Save
                                           @break
                                           @default
                                           <i class="far fa-bookmark"></i>Save
                                       @endswitch
                                   </a>&nbsp;
                                   </span>
                                        <span class="">
                                        <a href="{{route('print-job',$job->id)}}">
                                        <i class="far fa-file-pdf "></i>Print
                                        </a>
                                    </span>
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-success  float-right" id="btn-apply"
                                            @if(\Sentinel::check())
                                            job-id="{{ $job->slug }}" data-id="{{ $job->id }}"
                                            @else
                                            data-toggle="modal"
                                            data-target="#login__modal"
                                            @endif>

                                        @if(\Sentinel::check())
                                            @if(checkApplied($job->id)=='already')
                                                <i class="fas fa-plus-circle"></i> APPLIED
                                            @else
                                                <i class="fas fa-plus-circle"></i> APPLY NOW
                                            @endif
                                        @else
                                            <i class="fas fa-plus-circle"></i> APPLY NOW
                                        @endif
                                    </button>
                                </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                
                                <div class="float-right">
                                    <span>Share With</span>&nbsp;:&nbsp;
                                    <!--<div class="fb-share-button"-->
                                    <!--     data-href="{{ route('jobs-single',['slug'=>$job->slug]) }}"-->
                                    <!--     data-layout="button" data-size="small" data-mobile-iframe="true">-->
                                    <!--    <a target="_blank" href="{{ route('jobs-single',['slug'=>$job->slug]) }}"-->
                                    <!--       class="fb-xfbml-parse-ignore">Share</a>-->
                                    <!--</div>-->
                                    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                                    <div class="addthis_inline_share_toolbox_4yy9" data-url="{{ route('jobs-single',['slug'=>$job->slug]) }}" data-title="{{ $job->title }}" data-media="{{ asset('uploads/companies/logos/' . $job->company->logo) }}" data-description="{!! strip_tags($job->jobadditional->description) !!}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<div id="fb-root"></div>-->
    <!--<script>(function (d, s, id) {-->
    <!--        var js, fjs = d.getElementsByTagName(s)[0];-->
    <!--        if (d.getElementById(id)) return;-->
    <!--        js = d.createElement(s);-->
    <!--        js.id = id;-->
    <!--        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";-->
    <!--        fjs.parentNode.insertBefore(js, fjs);-->
    <!--    }(document, 'script', 'facebook-jssdk'));-->
    <!--</script>-->

    @if(!\Sentinel::check())

        <div class="modal fade" id="login__modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Login with &nbsp; : &nbsp;
                            <a href="" class="fab fa-facebook-square" style="color: #3B5998;"></a>&nbsp;
                            <a href="" class="fab fa-google-plus-square" style="color: #d34836"></a></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Login Form -->

                        <div class="login_form_wrapper">
                            <form id="loginForm" method="post" role="form">
                                {{ csrf_field() }}
                                <div class="login_wrapper">
                                    <div class="relative">
                                        <div class="form-group i-email">
                                            <input type="email" name="email" id="email" class="form-control" required
                                                   placeholder="Email*">
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <div class="form-group i-password">
                                            <input type="password" name="password" class="form-control" required
                                                   id="password" placeholder="Password *">
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
                                    <hr>
                                    <div class="login_btn text-center">
                                        <button type="submit" class="btn btn-primary float-right"> Login</button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="login_message text-center">
                                        <p>Don’t have an account ? <a href="{{ route('register') }}"> Register Now </a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('scripts')
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5beab45447528fe3"></script>
    <script>
        $(document).on('click', '#btn-apply', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            if (id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var tempurl = "{{ route('job-apply',':id') }}";
                tempurl = tempurl.replace(':id', id);

                $.ajax({
                    type: 'POST',
                    url: tempurl,
                    contentType: false,
                    processData: false,
                    beforeSend: function (data) {
                    },
                    success: function (response) {
                        $('#btn-apply').html('<i class="far fa-sticky-note"></i> APPLIED');
                        $.alert({
                            closeIcon: true,
                            closeIconClass: 'fa fa-close',
                            title: 'Success',
                            icon: 'fa fa-check',
                            type: 'green',
                            content: '<h5 class="center"> ' + response + '  </h5>'
                        });

                    },
                    error: function (err) {
                        if (err.status == 422) {
                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="' + i + '"]');
                                el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                            });
                        } else {
                            $.alert({
                                closeIcon: true,
                                closeIconClass: 'fa fa-close',
                                title: 'Warning',
                                icon: 'fa fa-warning',
                                type: 'red',
                                content: '<h5 class="center">' + err.responseText + ' </h5>',
                            });
                        }
                    }
                })
            }else{
                console.log('not logged in')
            }


        });
    </script>

    @if(!\Sentinel::check())
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
                        } else {
                            $('#error-message').text(response.responseJSON.message);
                            $('#notify-error').show().fadeOut(10000);
                        }
                    }
                });
            });
        </script>
    @endif

@endsection

