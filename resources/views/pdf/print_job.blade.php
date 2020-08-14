<div class="modal-dialog modal-lg">
    <div class="modal-content data">

        <div class="modal-body">
            <div class="row">
                <div class="header bg-success">
                    <h3 style="margin: 10px"> Basic Information</h3>
                    <hr>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="job_company"><strong> Company Name:</strong></label>
                                @isset($job->company){{ $job->company->title }} @endisset
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="job_title"><strong>Job Title:</strong></label>
                                @isset($job->title) {{ $job->title }} @endisset
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="job_service"><strong>Job Service:</strong></label>
                                @isset($job->service_type){{ $job->service_type }}@endisset

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_of_vacancies"><strong>Number of vacancies:</strong></label>

                                @isset($job->number_of_vacancies){{ $job->number_of_vacancies }}
                                @endisset
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_level"><strong>Job Level:</strong></label>
                                @isset($job->job_level){{ $job->job_level }}@endisset

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="job_industry"><strong>Job Industry:</strong></label>
                                @isset($job->industry) {{ $job->industry->title }} @endisset
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_type"><strong>Job Type :</strong></label>
                                @isset($job->job_type){{ $job->job_type }} @endisset

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_deadline"><strong>Deadline:</strong> </label>
                                @isset($job->job_deadline) {{ $job->job_deadline }}
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="job_category"><strong>Job Location:</strong></label>
                                @isset($job->location) {{ $job->location }}
                                @endisset
                            </div>
                        </div>
                    </div>
                    @isset($job->salary_type)
                        @if($job->salary_type=="Negotiable")
                        @elseif($job->salary_type=="Range")
                            <div class="row" id="min_salary_div">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="max_salary"><strong>Min Offered salary:</strong></label>
                                        @isset($job->min_salary)  {{ $job->min_salary }}
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="max_salary_div">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="max_salary"> <strong>Max Offered Salary:</strong></label>
                                        @isset($job->max_salary)  {{ $job->max_salary }}
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        @elseif($job->salary_type=="Fixed")
                            <div class="row" id="min_salary_div">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="max_salary"> <strong>Min Offered salary:</strong></label>
                                        @isset($job->min_salary)  {{ $job->min_salary }}
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endisset
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="header">
                    <h4 style="margin: 10px">More Information</h4>
                </div>
                <hr>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="h5">Education Qualification</label>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="education_level"><strong>Education Level:</strong></label>
                                @isset($job->jobadditional->education_level) {{ $job->jobadditional->qualification->title }}  @endisset
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="required_education"><strong>Required Education:</strong></label>
                                @isset($job->jobadditional->required_education) {{ $job->jobadditional->required_education  }}
                                @endisset
                            </div>
                        </div>
                    </div>
                    <label class="h5"><strong>Required Work Experience</strong></label>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label for="required_experience"><strong>Required Experience:</strong></label>
                                @isset($job->jobadditional->experience_boundary) {{ $job->jobadditional->experience_boundary }} @endisset
                                @isset($job->jobadditional->experience){{ $job->jobadditional->experience }} @endisset
                                @isset($job->jobadditional->experience_measure) {{ $job->jobadditional->experience_measure }} @endisset

                            </div>
                        </div>

                    </div>
                    <label class="h5">Required Skills</label>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="skills"><strong>Required Skills:</strong></label>
                                @isset($job->skills)
                                    @foreach($job->skills as $ski)
                                        <button>{{ $ski->title }}</button>
                                    @endforeach
                                @endisset
                            </div>
                        </div>
                    </div>
                    <label class="h5"><strong>Required Gender and Age :</strong></label>
                    <hr>

                    <label class="h5">Gender</label>
                    @isset($job->jobadditional) {{ $job->jobadditional->gender }} @endisset

                    <label class="h5">Age</label>

                    @isset($job->jobadditional) {{ $job->jobadditional->age_boundary }} @endisset
                    @isset($job->jobadditional) {{ $job->jobadditional->age }} @endisset

                    <label class="h5">Other Specification</label>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="specification">Other Specification</label>
                                @isset($job->jobadditional->specification){!!   $job->jobadditional->specification  !!} @endisset
                            </div>
                        </div>
                    </div>
                    <label class="h5">Job Description</label>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                @isset($job->jobadditional->description) {!!  $job->jobadditional->description !!} @endisset
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_banner"></label>
                                @if(file_exists(public_path('uploads/jobposts/thumbnails/' . $job->job_banner)))
                                    <img class="rounded-circle"
                                         src="{{ asset('uploads/jobposts/thumbnails/' . $job->job_banner) }}">

                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="category_header resume_category_header pull-right">
                        <h3 class="">
                            <span class="badge badge-success"></span>Generated By :
                        </h3>
                        <div class="category_body resume_category_body">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('settings').'/'.getConfiguration('site_logo')}}" alt=""
                                     width="150px">

                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
