<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body {
            margin: 5%;
            font-size: 12px;
        }
        img {
            max-width: 120px;
            max-height: 120px;
        }
        hr {
            margin-top: 0;
            border: 1px solid #737272;
        }
        .text-muted {
            margin-bottom: 0;
        }
        p {
            font-size: 10px;
        }
        .w1 {
            margin-left: 15px;
            vertical-align: top;
        }
    </style>
</head>

<body class="home blog dark">

<div class="hfeed site" id="page">
    <div id="main">
        <div class="content_area" id="primary">
            <div role="main" class="site_content" id="content">
                <section class="section profile_section first odd" id="profile">
                    <div class="section_header profile_section_header opened">
                        <table cellpadding="0" cellspacing="0">
                			<tbody>
    						    <tr>
        							<td class="title" width="300px">
        								@if(is_file(public_path('uploads/jobseekers/' . $user->jobseeker->image)))
                        <img src="{{ url('/') }}/uploads/jobseekers/{{ $user->jobseeker->image }}">
                    @endif
        							</td>
        							
        							<td>
        								<div id="profile_name">
                                            <h2 id="profile_title">
                                                <span class="firstname">{{ $user->first_name }}</span> <span
                                                        class="lastname">{{ $user->last_name }}</span></h2>
                                            @isset($user->jobseeker->additional)
                                                <h5 id="profile_position">{{ $user->jobseeker->additional->specialization }}</h5>@endisset
                                        </div>
                                        <div id="profile_data">
                                            <div class="profile_row name" style="display: block;"><span class="th">Name:</span><span
                                                        class="td">{{ $user->first_name }} {{ $user->last_name }}</span></div>
                                            {{--<div class="profile_row birth" style="display: block;"><span
                                                        class="th">Date of birth:</span><span
                                                        class="td">{{ \Carbon\Carbon::parse($user->jobseeker->dob)->toFormattedDateString() }}</span>
                                            </div>--}}
                                            <div class="profile_row address" style="display: block;"><span
                                                        class="th">Address:</span><span class="td">{{ $user->address }}</span>
                                            </div>
                                            <div class="profile_row phone" style="display: block;"><span
                                                        class="th">Mobile:</span><span class="td">{{ $user->mobile }}</span></div>
                                            <div class="profile_row email" style="display: block;"><span
                                                        class="th">Email:</span><span class="td">{{ $user->email }}</span>
                                            </div>
                                        </div>
        							</td>
        						</tr>
        					</tbody>
                		</table>
                    </div>
                    <!--<div class="section_body profile_section_body">-->
                    <!--    <div class="proile_body">@isset($user->jobseeker) {{ $user->jobseeker->about_me }} @endisset-->
                    <!--    </div>-->
                    <!--</div>-->
                </section>
                <br>
                <div id="mainpage_accordion_area">

                    <!-- RESUME -->
                    <section class="section resume_section even open" id="resume">

                        <div class="section_body resume_section_body" style="display: block;">
                            <div class="sidebar resume_sidebar">

                                <aside class="widget widget_skills">
                                    <h3 class="widget_title">About</h3><hr>
                                    <div class="widget_inner style_3">
                                        @isset($user->jobseeker->gender)
                                            <div class="skills_row odd first">
                                                <span class=""><strong>Gender</strong></span>
                                                :<span class="caption">
                                                    <span>{{ $user->jobseeker->gender }}</span>
                                                </span>
                                            </div>
                                        @endisset
                                        @isset($user->jobseeker->dob)
                                            <div class="skills_row odd first">
                                                <span class="header"><strong>Date of Birth</strong></span>
                                                :<span class="caption">
                                                    <span>{{ \Carbon\Carbon::parse($user->jobseeker->dob)->toFormattedDateString()}}</span>
                                                </span>
                                            </div>
                                        @endisset
                                        @isset($user->jobseeker->marital_status)
                                            <div class="skills_row odd first">
                                                <span class="header"><strong>Marital Status</strong></span>
                                                :<span class="caption">
                                                    <span>{{ $user->jobseeker->marital_status }}</span>
                                                </span>
                                            </div>
                                        @endisset
                                        @isset($user->jobseeker->religion)
                                            <div class="skills_row odd first">
                                                <span class="header"><strong>Religion</strong></span>
                                                :<span class="caption">
                                                    <span>{{ $user->jobseeker->religion }}</span>
                                                </span>
                                            </div>
                                        @endisset
                                        @isset($user->jobseeker->nationality)
                                            <div class="skills_row odd first">
                                                <span class="header"><strong>Nationality</strong></span>
                                                :<span class="caption">
                                                    <span>{{ $user->jobseeker->nationality }}</span>
                                                </span>
                                            </div>
                                        @endisset


                                    </div>
                                </aside>

                                <br>
                                @isset($user->jobseeker->skills)
                                    <aside class="widget widget_skills">
                                        <h3 class="widget_title">Skills</h3><hr>
                                        <div class="another spaced example"> @foreach($user->jobseeker->skills as $skill)
                                                <h6 class="ui basic button">{{ $skill->title }}</h6>
                                            @endforeach

                                        </div>
                                    </aside>
                                @endisset
                            </div>
                            <br>
                            <div class="wrapper resume_wrapper">
                                <div class="category resume_category resume_category_1 first even">
                                    <div class="category_header resume_category_header">
                                        <h3 class="category_title">
                                            <span class="category_title_icon aqua"></span>Work Experience
                                        </h3><hr>
                                    </div>
                                    <table cellspacing="0" cellpadding="0">
                                        <tbody>
                                        @isset($user->jobseeker->experiences)
                                            @foreach($user->jobseeker->experiences as $experience)
                                            <tr>
                                                <td class="w1" width="200px">
                                                    @php if(isset($experience->start_date)){ $s_date = explode("-", $experience->start_date); $s_day = $s_date[2]; $s_month = $s_date[1]; $s_year = $s_date[0]; } if(isset($experience->end_date)){ $e_date = explode("-", $experience->end_date); $e_day = $e_date[2];
                                                    $e_month = $e_date[1]; $e_year = $e_date[0]; } @endphp
                                                        <h6>
                                                            <i class="fas fa-calendar"></i> @isset($s_month) {{ $s_month }}
                                                            / {{ $s_year }} @endisset
                                                            - @if($experience->end_date==null)
                                                                Still Working @else @isset($e_month) {{ $e_month }}
                                                                / {{ $e_year }} @endisset
                                                            @endif
                                                        </h6>
                                                </td>
                                                <td class="w2" width="450px">

                                                    <div class="" style="display: block;">
                                                        <h5>
                                                            <span class="font-md">{{ $experience->job_title }}</span>
                                                            <span class="font-sm text-muted">({{ $experience->job_level }}
                                                            )</span>
                                                        </h5>
                                                        @if($experience->hide_organization=='No')
                                                            <h6>
                                                                <span>{{ $experience->organization_title  }}</span>
                                                            </h6>
                                                        @endif
                                                        <h6>
                                                            <i class="fas fa-industry"></i> {{ $experience->industry->title }}
                                                        </h6>
                                                        
                                                        <h6>
                                                            <i class="fas fa-location-arrow"></i> {{ $experience->job_location }}
                                                        </h6>
                                                        <p class="text-muted font-weight-bold">Duties and Responsibilities:</p>
                                                        <p class="text-muted" style="display: block;">{{ str_limit($experience->duties_responsibilities,500) }}</p>
                                                    </div>

                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <p> No Work Experience</p>
                                        @endisset
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <!-- .category -->
                                <div class="category resume_category resume_category_2 odd">
                                    <div class="category_header resume_category_header">
                                        <h3 class="category_title"><span class="category_title_icon green"></span>Education
                                        </h3><hr>
                                    </div>
                                    <table cellspacing="0" cellpadding="0">
                                        <tbody>
                                        @isset($user->jobseeker->academics)
                                            @foreach($user->jobseeker->academics as $academics)
                                                <tr>
                                                    <td class="w1" width="200px">
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
                                                        <h6>
                                                        <i class="fas fa-calendar"></i>
                                                            @isset($s_year){{ $s_year }}@endisset -
                                                            @if($academics->end_date==null)Running
                                                            @else
                                                                @isset($e_year){{ $e_year }}@endisset
                                                            @endif
                                                        </h6>
                                                    </td>
                                                    <td width="450px" class="w2"
                                                         id="education-{{ $academics->id }}">
                                                        <h5>
                                                            {{ $academics->academic_program }}
                                                        </h5>
                                                        <span>
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
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td><p> No Education Listed</p></td>
                                        </tr>
                                        @endisset
                                        </tbody>
                                    </table>
                                    <!-- /category_body -->
                                </div> <!-- .category -->
                                <div class="category resume_category resume_category_2 even">
                                    <div class="text-right">
                                        <h6>
                                            <span class="badge badge-success"></span>Generated By :
                                        </h6>
                                        <div class="category_body resume_category_body">
                                            <a href="{{ url('/') }}">
                                                <img src="{{ asset('settings').'/'.getConfiguration('site_logo')}}"
                                                     alt="" width="150px">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
