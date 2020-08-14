<div class="row">
    <div class="col-md-12">
        <div class="card box--shadow ">
            <div class="card-block row m-3">
                <div class="col-6">
                    <h5>
                        Showing {{ $jobpost->count() }} job of {{ $jobpost->total() }}
                    </h5>
                </div>
                <div class="col-6">
                    <ul class="nav nav-inline float-right">
                        <li class="nav-item mr-3">
                            <span  id="sort_by_date" data-select="all"
                                   class="text-secondary">
                                <span class="icon-calendar"></span>
                                Posted:
                                <span id="date_value" style="clear: both">
                                    @isset($end_date)
                                        <span class='badge badge-info'>
                                            {{ $start_date }}  -   {{ $end_date }}
                                        </span>
                                    @else
                                        All time
                                    @endisset
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if($jobpost  && $jobpost->count())
            @foreach($jobpost as $job)
                <div class="job-specification">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 ">
                            <a href="{{ route('jobs-single',['slug'=>$job->slug]) }}"
                               class="d-flex d-flex align-items-center">
                                <div class="company-img">
                                    @isset($job->company)
                                        @if(file_exists('uploads/companies/logos/thumbnails/' . $job->company->logo))
                                            <img class="post_img"
                                                 src="{{ asset('uploads/companies/logos/thumbnails/' . $job->company->logo) }}"
                                                 alt="">
                                        @else
                                            <img class="post_img"
                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                 alt="">
                                        @endif
                                    @endisset
                                </div>
                                <div class="job-description">
                                    <h4 title="{{ $job->title }}" class="job-title"> {{ str_limit($job->jobtitle,35) }}</h4>
                                    @isset($job->company)
                                        <p title="{{ $job->company->title }}"> {{ str_limit($job->company->title,25) }} </p> @endisset
                                    <div>
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $job->location }}
                                    </div>
                                    <div>
                                        <i class="far fa-sticky-note"></i>
                                        Posted:
                                        {{ \Carbon\Carbon::parse($job->created_at) ->diffForHumans(null,null, false,1) }}
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <div class="d-flex">
                                <div class="text-success mx-3">
                                    <span>Views: </span> <span
                                            class="badge badge-success"> {{ $job->count }}</span>
                                </div>
                                <div>
                                                          <span class="">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            Deadline:
                                                          </span>
                                    {{ \Carbon\Carbon::parse($job->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                            <div class="job-type">
                                <ul>
                                    @php
                                        $status=checkSaved($job->id)
                                    @endphp
                                    <li @if($status=='not logged in'||$status=='user not jobseeker')
                                        title="You are not Logged in with Job Seekers Account"
                                        disabled="" class="disabled"
                                            @endif>
                                        <a id="{{$job->slug}}"
                                           class="btn btn-danger btn-save-job"
                                           data-id="{{ $job->id }}">


                                            @switch(checkSaved($job->id))
                                                @case('not saved')
                                                <i class="far fa-bookmark"></i>Save
                                                @break
                                                @case('saved')
                                                <i class="fas fa-bookmark"></i>Saved
                                                @break
                                                @case('not logged in')
                                                <i class="far fa-bookmark disabled"
                                                   title="Log in to Save Job"></i>Save
                                                @break
                                                @case('user not jobseeker')
                                                <i class="far fa-bookmark disabled"
                                                   title="You are not Logged in with Job Seekers Account"></i>
                                                Save
                                                @break

                                                @default
                                                <i class="far fa-bookmark"></i>Save
                                            @endswitch
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('print-job',$job->id)}}" class="btn btn-primary">
                                            <i class="far fa-file-pdf"></i>Print
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('jobs-single',['slug'=>$job->slug]) }}"
                                           class="btn btn-success ">Apply</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        @else
            <div class="job-specification">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <strong class="center"> No job Found</strong>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<!--Pagination-->
<nav aria-label="pagination ">
    <ul class="pagination justify-content-center pg-blue">
        {{ $jobpost->links() }}

    </ul>
</nav>