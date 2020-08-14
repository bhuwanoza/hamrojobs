@extends('layouts.master')
@section('title')
    {{ $user->first_name }} {{ $user->last_name }}
@endsection
@section('content')
    <section id="user-profile">
        <div class="container">
            <div class="row">
                @include('jobseeker.partial.sidebar')
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="tab__detail">
                        <div class="tab-pane " id="profile" role="tabpanel">
                            <div class="my-resume">
                                <div class="author-resume">
                                    <div class="thumb" style="height: 200px;width: 200px; padding: 10px 20px;">
                                        @if(is_file(public_path('uploads/jobseekers/' . $user->jobseeker->image)))
                                            <img class="rounded-circle"
                                                 src="{{ asset('uploads/jobseekers/' . $user->jobseeker->image) }}"
                                                 alt="">
                                        @else
                                            <img class="rounded-circle"
                                                 src="{{ asset('uploads/default/default-user.png') }}"
                                                 alt="">
                                        @endif
                                    </div>

                                    <div class="author-info" style="padding: 10px 30px">
                                        <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
                                        @isset($user->jobseeker->additional->specialization)
                                        <p class="sub-title">
                                            <span>
                                                <i class="fas fa-star"></i>
                                                {{ $user->jobseeker->additional->specialization }}
                                            </span></p>
                                        @endisset

                                        <p><span class="address">
                                                <i class="fas fa-map-marker"></i>{{ $user->address }}
                                            </span>
                                        </p>
                                        <p>
                                            <span>
                                                <i class="fa fa-phone"></i>{{ $user->mobile }}
                                            </span>
                                        </p>
                                        <div class="social-link">
                                            <a class="i-twitter" target="_blank" data-original-title="twitter" href="#"
                                               data-toggle="tooltip" data-placement="top"><i class="fab fa-twitter"></i></a>
                                            <a class="i-facebook" target="_blank" data-original-title="facebook"
                                               href="#"
                                               data-toggle="tooltip" data-placement="top"><i
                                                        class="fab fa-facebook"></i></a>
                                            <a class="i-google" target="_blank" data-original-title="google-plus"
                                               href="#"
                                               data-toggle="tooltip" data-placement="top"><i class="fab fa-google"></i></a>
                                            <a class="i-linkedin" target="_blank" data-original-title="linkedin"
                                               href="#"
                                               data-toggle="tooltip" data-placement="top"><i
                                                        class="fab fa-linkedin"></i></a>
                                        </div>
                                        <p><a href="javascript:void(0);" class="btn-show__more"> Show Detail</a></p>
                                    </div>

                                    <div class="author-info__details" style="display: none;">
                                        <table class="table">
                                            @isset($user->jobseeker->gender)
                                                <tr>
                                                    <td>Gender<span class="float-right">:</span></td>
                                                    <td>{{ $user->jobseeker->gender }}</td>
                                                </tr>
                                            @endisset
                                            @isset($user->jobseeker->dob)
                                                <tr>
                                                    <td>Date of Birth<span class="float-right">:</span></td>
                                                    <td>{{ \Carbon\Carbon::parse($user->jobseeker->dob)->toFormattedDateString() }}</td>
                                                </tr>
                                            @endisset
                                            @isset($user->jobseeker->marital_status)

                                                <tr>
                                                    <td>Marital Status<span class="float-right">:</span></td>
                                                    <td>{{ $user->jobseeker->marital_status }}</td>
                                                </tr>
                                            @endisset
                                            @isset($user->jobseeker->religion)

                                                <tr>
                                                    <td>Religion<span class="float-right">:</span></td>
                                                    <td>{{ $user->jobseeker->religion }}</td>
                                                </tr>
                                            @endisset
                                            @isset($user->jobseeker->nationality)
                                                <tr>
                                                    <td>Nationality<span class="float-right">:</span></td>
                                                    <td>{{ $user->jobseeker->nationality }}</td>
                                                </tr>
                                            @endisset
                                            @isset($user->jobseeker->skills)
                                                <tr>
                                                    <td>Skills<span class="float-right">:</span></td>
                                                    <td>
                                                        @foreach($user->jobseeker->skills as $skill)

                                                            <span class=" badge cyan">{{ $skill->title }}</span>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endisset
                                            @isset($user->jobseeker->additional)
                                                <tr>
                                                    <td>Expected Salary<span class="float-right">:</span></td>
                                                    <td>

                                                        {{ $user->jobseeker->additional->expected_salary_currency }}.
                                                        ({{ $user->jobseeker->additional->expected_salary_boundary }})
                                                        {{ number_format($user->jobseeker->additional->expected_salary, 2, '.', ',') }}
                                                        <span class=" badge purple darken-2">{{ $user->jobseeker->additional->expected_salary_basic  }}</span>
                                                    </td>
                                                </tr>
                                            @endisset

                                            @isset($user->jobseeker->additional)
                                                <tr>
                                                    <td>Current Salary<span class="float-right">:</span></td>
                                                    <td>

                                                        {{ $user->jobseeker->additional->current_salary_currency }}.
                                                        ({{ $user->jobseeker->additional->current_salary_boundary }})
                                                        {{ number_format($user->jobseeker->additional->current_salary, 2, '.', ',') }}
                                                        <span class=" badge purple darken-2">{{ $user->jobseeker->additional->current_salary_basic  }}</span>
                                                    </td>
                                                </tr>
                                            @endisset

                                            @isset($user->jobseeker->gender)

                                                <tr>
                                                    <td>Gender<span class="float-right">:</span>
                                                    </td>
                                                    <td>
                                                        <span class=" badge cyan">{{ $user->jobseeker->gender }}</span>
                                                    </td>
                                                </tr>
                                            @endisset
                                        </table>
                                        <a href="javascript:void(0);" class="btn-show__more"> Hide Detail</a>
                                    </div>
                                </div>
                                <div class="about-me item">
                                    <h3 class="title">About Me </h3>

                                    <p>{{ $user->jobseeker->about_me }}</p>
                                </div>

                                <div class="education item">
                                    <h3 class="title">Education</h3>
                                    @if($jobseeker->academics->isNotEmpty())
                                        @foreach($jobseeker->academics as $academics)
                                            <div class="card m-2">
                                                <div class="pb-3 pt-3 col-sm-12"
                                                     id="education-{{ $academics->id }}">
                                                    <h4>
                                                        {{ $academics->academic_program }}
                                                    </h4>
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
                                            </div>
                                        @endforeach

                                    @else
                                        <div class="pb-3 pt-3 col-sm-12">
                                            <h4>You have not added your Academic info</h4>
                                            <p>Please Update your </p>
                                        </div>
                                    @endif
                                </div>
                                <div class="work-experence item">
                                    <h3 class="title">Work Experience </h3>
                                    @if($jobseeker->experiences->isNotEmpty())
                                        @foreach($jobseeker->experiences as $experience)
                                            <div class="card m-2">
                                                <div class="pb-3 pt-3 col-sm-12"
                                                     id="experience-{{ $experience->id }}">
                                                <span class="font-md">
                                                    <h4>{{ $experience->job_title }}</h4>
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
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="pb-3 pt-3 col-sm-12">
                                            <h4>You have not added Experience</h4>
                                        </div>
                                    @endisset
                                </div>
                                <div class="badge badge-success">
                                    <a href="{{ route('print-cv')}}">
                                    <i class="far fa-file-pdf"></i>
                                        Print Your CV
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

