<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        @isset($application)
            @isset($user)
                <div class="modal-header">
                    <h5 class="modal-title"> {{ $user->first_name }}  {{ $user->last_name }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">
                        <!-------mother container middle class------------------->
                        <div class="col-lg-12 col-md-12">
                            <div class="" style="width:100%">
                                @if(file_exists(public_path('uploads/jobseekers/' . $user->jobseeker->image)))
                                    <img class="center card-img-top rounded-circle"
                                         src="{{ asset('uploads/jobseekers/' . $user->jobseeker->image) }}"
                                         alt="" style="width:250px;height: 250px;">
                                @else
                                    <img class="center card-img-top rounded-circle"
                                         src="{{ asset('uploads/default/default-user.png') }}"
                                         alt=""  style="width:250px;height: 250px;">
                                @endif

                                <div class="card-body">
                                    <h4 class="card-title center">{{ $user->first_name }}  {{ $user->last_name }}</h4>
                                    <ul class="list-inline center" id="courses">
                                        <li class="list-inline-item">
                                            {{--<h5><span class="badge badge-info"><i class="fas fa-star"></i> {{ $user->jobseeker->additional->specialization }}</span></h5>--}}
                                        </li>

                                    </ul>
                                    <table class="table">
                                        @isset($user->mobile)
                                            <tr>
                                                <td>Mobile<span class="float-right">:</span></td>
                                                <td>{{ $user->mobile }}</td>
                                            </tr>
                                        @endisset
                                        @isset($user->email)
                                            <tr>
                                                <td>Email<span class="float-right">:</span></td>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                        @endisset
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
                                    <p class="card-text">
                                        {{ $user->jobseeker->about_me }}
                                    </p>


                                    <hr>
                                    <h4 class="title">Academic Qualification</h4>

                                    @isset($user->jobseeker->academics)
                                        @foreach($user->jobseeker->academics as $academics)
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
                                            <p>No Academic Information</p>
                                        </div>
                                    @endisset
                                    <hr>
                                    <h4 class="title">Work Experiences</h4>

                                    @isset($user->jobseeker->experiences)
                                        @foreach($user->jobseeker->experiences as $experience)
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
                                            <h4>No Work Experience</h4>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <a href="{{ route('download-cv',$user->id) }}" type="button" class="btn btn-secondary" ><i class="fa fa-download"></i>Download Resume</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-remove"></i>Close</button>
                </div>
            @endisset
        @else
            <div class="modal-header">
                <h5 class="modal-title">Error </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Error Occurred</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        @endisset
    </div>
</div>
