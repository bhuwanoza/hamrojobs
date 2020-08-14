@extends('layouts.master')
@section('title')
    @isset($company) {{ $company->title }} @endisset
@endsection
@section('content')
    <section id="company-description">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="header-detail  box--shadow">
                        <div class="cover-banner relative">

                            @if(file_exists('uploads/companies/covers/' . $company->cover_image))
                                <img class="img-fluid img-responsive " 
                                     src="{{ asset('uploads/companies/covers/' . $company->cover_image) }}"
                                     alt="" style="height: 200px; width: 100%">
                            @else
                                <img class="img-fluid img-responsive " 
                                     src="{{ asset('uploads/companies/default/default_user.jpg') }}"
                                     alt="" style="height: 200px; width: 100%">
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <aside>
                        <div class="sidebar">
                            <div class="box box--shadow">
                                <div class="p-3">
                                    <div class="profile-img relative mb-2">
                                        @if(file_exists('uploads/companies/logos/' . $company->logo))
                                            <img class="img-rounded img-responsive center"
                                                 src="{{ asset('uploads/companies/logos/' . $company->logo) }}"
                                                 alt="" style="height: 200px; width: 260px">
                                        @else
                                            <img class="img-rounded img-responsive center"
                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                 alt="" style="height: 200px; width: 260px">
                                        @endif
                                    </div>
                                    
                                    <div class="text-center"><h3>{{ $company->title }}</h3></div>

                                </div>
                                <ul>
                                    <li class="relative">
                                        <span><i class="fas fa-industry"></i>
                                            {{ $company->industry->title }}
                                    </span>
                                        <span><i class="fa fa-map-marker"></i>
                                            <span class="m-2">{{ $company->address }}</span>
                                        </span>
                                        <span><i class="fa fa-envelope"></i>
                                            <span class="m-2"><a
                                                        href="mailto:{{ $company->email }}"> {{ $company->email }}</a></span>
                                        </span>
                                        <span><i class="fa fa-phone"></i>
                                            <span class="m-2"><a
                                                        href="tel:{{ $company->phone }}">{{ $company->phone }}</a></span></span>

                                        <span><i class="fa fa-globe"></i>
                                            <span class="m-2">
                                                <a href="{{ $company->website }}">{{ $company->website }}</a>
                                            </span>
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            @isset($similar_jobs)
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
                                                                 style="height: 80px;width: 80px;object-fit:contain;">
                                                        @else
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                 alt=""
                                                                style="height: 80px;width: 80px;object-fit:contain;">
                                                        @endif
                                                    </figure>
                                                    <div>
                                                        <h5 style="text-transform: capitalize">{{ $similarjob->title }}</h5>
                                                        <p style="text-transform: capitalize">{{ $similarjob->company->title }}</p>
                                                    </div>
                                                </a>
                                                <div>
                                                <span class="">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    Deadline:
                                                </span>
                                                    {{ \Carbon\Carbon::parse($similarjob->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                </div>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @endisset
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="box-body">
                        <div class="">
                            <div class="job-specification pr-1 pl-1">
                                <div class="">
                                    <h2> {{ $company->title }}</h2>
                                    {!! $company->description !!}
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            @if($company->jobposts()->exists())
                                @foreach( $company->jobposts->where('status','Active')->where('job_deadline', '>=', \Carbon\Carbon::now()) as $job)
                                    <div class="col-md-6">
                                        <div class="job-specification">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
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
                                                                     src="{{ asset('uploads/companies/default/default_user.jpg') }}"
                                                                     alt="">
                                                            @endif
                                                        @endisset
                                                    </div>
                                                    <div class="job-description">
                                                        <h4 title="{{ $job->title }}">{{ str_limit($job->title,35) }}</h4>
                                                        @isset($job->company)
                                                            <p title="{{ $job->company->title }}"> {{ str_limit($job->company->title,25) }} </p> @endisset
                                                        <div>
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            {{ $job->location }}
                                                        </div>
                                                        <!--<div>-->
                                                        <!--    <i class="far fa-sticky-note"></i>-->
                                                        <!--    Posted:-->
                                                        <!--    {{ \Carbon\Carbon::parse($job->created_at) ->diffForHumans(null,null, false, 1) }}-->
                                                        <!--</div>-->
                                                    </div>
                                                </a>
                                                <!--<hr>-->
                                                <!--<div class="d-flex">-->
                                                <!--    <div class="text-success mx-3">-->
                                                <!--        <span>Views: </span> <span-->
                                                <!--                class="badge badge-success"> {{ $job->count }}</span>-->
                                                <!--    </div>-->
                                                <!--    <div>-->
                                                <!--          <span class="">-->
                                                <!--                <i class="fas fa-calendar-alt"></i>-->
                                                <!--            Deadline:-->
                                                <!--          </span>-->
                                                <!--        {{ \Carbon\Carbon::parse($job->job_deadline) ->diffForHumans(null,null, false, 2) }}-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                
                                                 <div class="d-flex p-2 justify-content-between">
                                                            
                                                            <div>
                                                              <span class="">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                Deadline:
                                                              </span>
                                                              <span>
                                                                  {{ \Carbon\Carbon::parse($job->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                              </span>
                                                                    
                                                            </div>
                                                            <div class=" " style="color: #606060;font-weight: bold;">
                                                                 
                                                                <span class=""> {{ $job->count }}</span>
                                                                <span>Views </span>
                                                            </div>
                                                        </div>
                                                
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <hr>
                                                <div class="job-type">
                                                    <ul class="d-flex  p-0 ">
                                                        @php
                                                            $status= checkSaved($job->id)
                                                        @endphp
                                                        <li @if($status=='not logged in'||$status=='user not jobseeker')
                                                            title="You are not Logged in with Job Seekers Account"
                                                            disabled="" class="disabled"
                                                                @endif>
                                                            <a id="{{$job->slug}}"
                                                               class=" btn-save-job"
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
                                                        <li><a href="#"
                                                               class="">{{ $job->job_type }}</a>
                                                        </li>
                                                        <li style="flex:1">
                                                            <a href="{{ route('jobs-single',['slug'=>$job->slug]) }}"
                                                               class="btn btn-success p-1  "><i class="fas fa-plus-circle"></i>Apply</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                @endforeach
                                @else
                                <div class="job-specification">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 ">
                                            <h5 class="text-center">There is currently no jobs at "<span>{{ $company->title }}</span>"  </h5>
                                        </div>
                                    </div>
                                </div>


                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
