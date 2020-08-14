@extends('layouts.master')
@section('title')
    Home
@endsection
@section('styles')
    <style>
        .custom-paginate ul {
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <!--<div id="fb-root"></div>-->
    <!--<script>(function (d, s, id) {-->
    <!--        var js, fjs = d.getElementsByTagName(s)[0];-->
    <!--        if (d.getElementById(id)) return;-->
    <!--        js = d.createElement(s);-->
    <!--        js.id = id;-->
    <!--        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';-->
    <!--        fjs.parentNode.insertBefore(js, fjs);-->
    <!--    }(document, 'script', 'facebook-jssdk'));-->
    <!--</script>-->

    @include('layouts.search_banner')

    <section id="category_section">
        <div class="container">
            <h2 class="category-title text-center">Browse Industries</h2>
            <div class="row">
                @isset($heavy_industries)
                    @foreach($heavy_industries->take(16) as $heavyindustry)
                        <div class="col-md-3 col-sm-3 col-xs-12 f-category mini-post">
                            <a href="{{ route('industry.show',$heavyindustry->slug) }}">
                                <!--<div class="icon">-->
                                <!--    <i class="ti-home"></i>-->
                                <!--</div>-->
                                <h3>{{ $heavyindustry->title }}</h3>
                                <p>{{ $heavyindustry->jobs->where('job_deadline', '>=', \Carbon\Carbon::now())->where('status','Active')->count() }} jobs</p>
                            </a>
                        </div>
                    @endforeach
                    <a class="loadbtn" id="loadMore"><i class="fas fa-chevron-down"></i></a>
                    <a class="loadbtn" id="loadless"><i class="fas fa-chevron-up"></i></a>
                @endisset
            </div>
        </div>
    </section>
    @if($trending_jobs && $trending_jobs->isNotEmpty())
        <section id="trending-jobs">
            <div class="container">
                <div class="row">
                    <div class="trending-title d-flex align-items-center justify-content-center">
                        <h3>Trending Jobs </h3>
                    </div>
                    <div class="trending-job-wrapper owl-carousel">
                        @foreach($trending_jobs as $trendingjob)
                            <div class="trending-job-list">
                                <a href="{{ url('/jobs/'.$trendingjob->slug) }}">
                                    <figure>
                                        @isset($trendingjob->company)
                                            @if(file_exists('uploads/companies/logos/thumbnails/' . $trendingjob->company->logo))
                                                <img class="post_img"
                                                     src="{{ asset('uploads/companies/logos/thumbnails/' . $trendingjob->company->logo) }}"
                                                     alt="">
                                            @else
                                                <img class="post_img"
                                                     src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                     alt="">
                                            @endif
                                        @endisset
                                    </figure>
                                    <div class="trending-job-company">
                                        <h6>
                                            <span style="text-transform: capitalize">{{ $trendingjob->title }}</span>
                                        </h6>
                                        <span>@isset($trendingjob->company) {{ $trendingjob->company->title }} @endisset</span>

                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <div class="main-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9" style="padding: 0">
                    {{--@if(!\Sentinel::check())
                        <Section id="im_an">
                            <div class="register_section_main_wrapper">

                                <div class="regis_left_side_box">
                                    <img src="http://www.webstrot.com/html/jobpro/job_dark/images/content/regis_icon.png"
                                         alt="icon" style="width:auto;height:auto">
                                    <h4>Create a free account to post vacancy</h4>
                                    <p>Signed in companies are able to post new<br> job offers, searching for
                                        candidate...</p>
                                    <ul>
                                        <li><a href="{{ route('register') }}" class="btn btn-primary RegOption" data-option="employer" ><i
                                                        class="fa fa-plus-circle"></i> &nbsp;REGISTER AS Employer</a></li>
                                    </ul>
                                </div>

                                <div class="regis_right_side_box">
                                    <img src="http://www.webstrot.com/html/jobpro/job_dark/images/content/regis_icon2.png"
                                         alt="icon" style="width:auto;height:auto">
                                    <h4>Create a free account to apply for jobs</h4>
                                    <p>Signed in job seekers are able to apply new<br> job offers, searching for
                                        jobs...</p>
                                    <ul>
                                        <li><a href="{{ route('register') }}" class="btn btn-primary RegOption" data-option="jobseeker"><i
                                                        class="fa fa-plus-circle"></i> &nbsp;REGISTER AS
                                                Job Seeker</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </Section>
                    @endif--}}

                    <section id="recent-job">
                        <div class="recent--job">
                            <div class="recent-job-title">
                                <h2>Recent Jobs</h2>
                            </div>
                            <nav class="nav nav-tabs" role="tablist">
                                <a class="nav-item nav-link active" href="#top" aria-controls="top" role="tab"
                                   data-toggle="tab"
                                   aria-expanded="false">Top Jobs</a>
                                <a class="nav-item nav-link" href="#hot" aria-controls="hot" role="tab"
                                   data-toggle="tab"
                                   aria-expanded="false">Hot Jobs</a>
                                <a class="nav-item nav-link " href="#featured" aria-controls="featured" role="tab"
                                   data-toggle="tab"
                                   aria-expanded="false">Featured Jobs</a>
                                <a class="nav-item nav-link " href="#free" aria-controls="free" role="tab"
                                   data-toggle="tab"
                                   aria-expanded="true">Free Jobs </a>
                                <a class="nav-item nav-link " href="#newspaper" aria-controls="newspaper" role="tab"
                                   data-toggle="tab"
                                   aria-expanded="true">Newspaper Jobs </a>
                            </nav>
                        </div>
                        <div class="tab-content job--content">
                            <div role="tabpanel" class="tab-pane fade show active " id="top">
                                <div class="row">
                                                                    @isset($top_jobs)
                                    @if($top_jobs->isNotEmpty())
                                        @foreach($top_jobs as $topjobs)
                                            <div class="col-md-6">
                                               <div class="job-specification">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <a href="{{ route('jobs-single',['slug'=>$topjobs->slug]) }}"
                                                           class="d-flex align-items-center">
                                                            <div class="company-img">
                                                                @isset($topjobs->company)
                                                                    @if(file_exists('uploads/companies/logos/thumbnails/' . $topjobs->company->logo))
                                                                        <img class="post_img"
                                                                             src="{{ asset('uploads/companies/logos/thumbnails/' . $topjobs->company->logo) }}"
                                                                             alt="">
                                                                    @else
                                                                        <img class="post_img"
                                                                             src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                             alt="">
                                                                    @endif
                                                                @endisset
                                                            </div>
                                                            <div class="job-description">
                                                                <h4 title="{{ $topjobs->title }}">{{ str_limit($topjobs->title,35) }}</h4>
                                                                @isset($topjobs->company)
                                                                    <p title="{{ $topjobs->company->title }}"> {{ str_limit($topjobs->company->title,25) }} </p> @endisset
                                                                <div>
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                    {{ $topjobs->location }}
                                                                </div>
                                                                <!--<div>-->
                                                                <!--    <i class="far fa-sticky-note"></i>-->
                                                                <!--    Posted:-->
                                                                <!--    {{ \Carbon\Carbon::parse($topjobs->created_at)->diffForHumans(null,null, false, 1) }}-->
                                                                <!--</div>-->
                                                            </div>
                                                        </a>
                                                        <!--<hr>-->
                                                        <div class="d-flex p-2 justify-content-between">
                                                            
                                                            <div>
                                                              <span class="">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                Deadline:
                                                              </span>
                                                              <span>
                                                                  {{ \Carbon\Carbon::parse($topjobs->job_deadline)->diffForHumans(null,null, false, 2) }}
                                                              </span>
                                                                    
                                                            </div>
                                                            <div class=" " style="color: #606060;font-weight: bold;">
                                                                 
                                                                <span class=""> {{ $topjobs->count }}</span>
                                                                <span>Views </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <hr>
                                                        <div class="job-type">
                                                            <ul class="d-flex  p-0 ">
                                                                @php
                                                                    $status= checkSaved($topjobs->id)
                                                                @endphp
                                                                <li @if($status=='not logged in'||$status=='user not jobseeker')
                                                                    title="You are not Logged in with Job Seekers Account"
                                                                    disabled="" class="disabled"
                                                                        @endif>
                                                                    <a id="{{$topjobs->slug}}"
                                                                       class=" btn-save-job"
                                                                       data-id="{{ $topjobs->id }}">

                                                                        @switch(checkSaved($topjobs->id))
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
                                                                    <a href="{{ route('print-job',$topjobs->id)}}"
                                                                       class="">
                                                                        <i class="far fa-file-pdf"></i>Print
                                                                    </a>
                                                                </li>
                                                                <li  style="flex:1">
                                                                    <a href="{{ route('jobs-single',['slug'=>$topjobs->slug]) }}"
                                                                       class="btn btn-success p-1  "><i class="fas fa-plus-circle"></i>Apply</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            </div>
                                            
                                        @endforeach

                                        {{--<div class="custom-paginate">--}}
                                            {{--{{ $top_jobs->links() }}--}}
                                        {{--</div>--}}
                                    @endif

                                @endisset
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="hot">
                                <div class="row">
                                    
                                
                                @isset($hot_jobs)
                                    @if($hot_jobs->isNotEmpty())
                                        @foreach($hot_jobs as $hotjob)
                                            <div class="col-md-6">
                                                <div class="job-specification">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <a href="{{ route('jobs-single',['slug'=>$hotjob->slug]) }}"
                                                           class="d-flex align-items-center">
                                                            <div class="company-img">
                                                                @isset($hotjob->company)
                                                                    @if(file_exists('uploads/companies/logos/thumbnails/' . $hotjob->company->logo))
                                                                        <img class="post_img"
                                                                             src="{{ asset('uploads/companies/logos/thumbnails/' . $hotjob->company->logo) }}"
                                                                             alt="">
                                                                    @else
                                                                        <img class="post_img"
                                                                             src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                             alt="">
                                                                    @endif
                                                                @endisset
                                                            </div>
                                                            <div class="job-description">
                                                                <h4 title="{{ $hotjob->title }}">{{ str_limit($hotjob->title,35) }}</h4>
                                                                @isset($hotjob->company)
                                                                    <p title="{{ $hotjob->company->title }}"> {{ str_limit($hotjob->company->title,25) }} </p> @endisset
                                                                <div>
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                    {{ $hotjob->location }}
                                                                </div>
                                                                <!--<div>-->
                                                                <!--    <i class="far fa-sticky-note"></i>-->
                                                                <!--    Posted:-->
                                                                <!--    {{ \Carbon\Carbon::parse($hotjob->created_at) ->diffForHumans(null,null, false, 1) }}-->
                                                                <!--</div>-->
                                                            </div>
                                                        </a>
                                                        <!--<hr>-->
                                                        <!--<div class="d-flex">-->
                                                        <!--    <div class="mx-3">-->
                                                        <!--        <span>Views: </span> <span-->
                                                        <!--                class="badge badge-success"> {{ $hotjob->count }}</span>-->
                                                        <!--    </div>-->
                                                        <!--    <div>-->
                                                        <!--  <span class="">-->
                                                        <!--        <i class="fas fa-calendar-alt"></i>-->
                                                        <!--    Deadline:-->
                                                        <!--  </span>-->
                                                        <!--        {{ \Carbon\Carbon::parse($hotjob->job_deadline) ->diffForHumans(null,null, false, 2) }}-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        
                                                        <div class="d-flex p-2 justify-content-between">
                                                            
                                                            <div>
                                                              <span class="">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                Deadline:
                                                              </span>
                                                              <span>
                                                                  {{ \Carbon\Carbon::parse($hotjob->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                              </span>
                                                                    
                                                            </div>
                                                            <div class=" " style="color: #606060;font-weight: bold;">
                                                                 
                                                                <span class=""> {{ $hotjob->count }}</span>
                                                                <span>Views </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <hr>
                                                        <div class="job-type">
                                                            <ul class="d-flex align-items-center p-0">
                                                                @php
                                                                    $status=checkSaved($hotjob->id)
                                                                @endphp
                                                                <li @if($status=='not logged in'||$status=='user not jobseeker')
                                                                    title="You are not Logged in with Job Seekers Account"
                                                                    disabled="" class="disabled"
                                                                        @endif>
                                                                    <a id="{{$hotjob->slug}}"
                                                                       class=" btn-save-job"
                                                                       data-id="{{ $hotjob->id }}">


                                                                        @switch(checkSaved($hotjob->id))
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
                                                                    <a href="{{ route('print-job',$hotjob->id)}}"
                                                                       class="">
                                                                        <i class="far fa-file-pdf"></i>Print
                                                                    </a>
                                                                </li>
                                                                
                                                                <li  style="flex:1">
                                                                    <a href="{{ route('jobs-single',['slug'=>$hotjob->slug]) }}"
                                                                       class="btn btn-success p-1  "><i class="fas fa-plus-circle"></i>Apply</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            
                                        @endforeach
                                    @endif
                                @endisset
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="featured">
                                <div class="row">
                                    
                                
                                @isset($featured_jobs)
                                    @if($featured_jobs->isNotEmpty())
                                        @foreach($featured_jobs as $featuredjob)
                                        <div class="col-md-6">
                                            <div class="job-specification">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                                        <a href="{{ route('jobs-single',['slug'=>$featuredjob->slug]) }}"
                                                           class="d-flex align-items-center">
                                                            <div class="company-img">
                                                                @isset($featuredjob->company)
                                                                    @if(file_exists('uploads/companies/logos/thumbnails/' . $featuredjob->company->logo))
                                                                        <img class="post_img"
                                                                             src="{{ asset('uploads/companies/logos/thumbnails/' . $featuredjob->company->logo) }}"
                                                                             alt="">
                                                                    @else
                                                                        <img class="post_img"
                                                                             src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                             alt="">
                                                                    @endif
                                                                @endisset
                                                            </div>
                                                            <div class="job-description">
                                                                <h4 title="{{ $featuredjob->title }}">{{ str_limit($featuredjob->title,35) }}</h4>
                                                                @isset($featuredjob->company)
                                                                    <p title="{{ $featuredjob->company->title }}"> {{ str_limit($featuredjob->company->title,25) }} </p> @endisset
                                                                <div>
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                    {{ $featuredjob->location }}
                                                                </div>
                                                                <!--<div>-->
                                                                <!--    <i class="far fa-sticky-note"></i>-->
                                                                <!--    Posted:-->
                                                                <!--    {{ \Carbon\Carbon::parse($featuredjob->created_at) ->diffForHumans(null,null, false, 1) }}-->
                                                                <!--</div>-->
                                                            </div>
                                                        </a>
                                                        
                                                        <div class="d-flex p-2 justify-content-between">
                                                            
                                                            <div>
                                                              <span class="">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                Deadline:
                                                              </span>
                                                              <span>
                                                                  {{ \Carbon\Carbon::parse($featuredjob->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                              </span>
                                                                    
                                                            </div>
                                                            <div class=" " style="color: #606060;font-weight: bold;">
                                                                 
                                                                <span class=""> {{ $featuredjob->count }}</span>
                                                                <span>Views </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <hr>
                                                        <div class="job-type">
                                                            <ul class="d-flex align-items-center p-0">
                                                                @php
                                                                    $status=checkSaved($featuredjob->id)
                                                                @endphp
                                                                <li @if($status=='not logged in'||$status=='user not jobseeker')
                                                                    title="You are not Logged in with Job Seekers Account"
                                                                    disabled="" class="disabled"
                                                                        @endif>
                                                                    <a id="{{$featuredjob->slug}}"
                                                                       class=" btn-save-job"
                                                                       data-id="{{ $featuredjob->id }}">


                                                                        @switch(checkSaved($featuredjob->id))
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
                                                                <li><a href="{{ route('print-job',$featuredjob->id)}}"
                                                                       class="">
                                                                        <i class="far fa-file-pdf"></i>Print
                                                                    </a>
                                                                </li>
                                                                
                                                                <li  style="flex:1">
                                                                    <a href="{{ route('jobs-single',['slug'=>$featuredjob->slug]) }}"
                                                                       class="btn btn-success p-1  "><i class="fas fa-plus-circle"></i>Apply</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        @endforeach
                                    @endif
                                @endisset
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="newspaper">
                                <div class="row">
                                    
                                
                                @isset($newspaper_jobs)
                                    @if($newspaper_jobs->isNotEmpty())
                                    @foreach($newspaper_jobs as $newspaperjob)
                                        <div class="col-md-6">
                                            <div class="job-specification">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                                    <a href="{{ route('jobs-single',['slug'=>$newspaperjob->slug]) }}"
                                                       class="d-flex  align-items-center">
                                                        <div class="company-img">
                                                            @isset($newspaperjob->company)
                                                                @if(file_exists('uploads/companies/logos/thumbnails/' . $newspaperjob->company->logo))
                                                                    <img class="post_img"
                                                                         src="{{ asset('uploads/companies/logos/thumbnails/' . $newspaperjob->company->logo) }}"
                                                                         alt="">
                                                                @else
                                                                    <img class="post_img"
                                                                         src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                         alt="">
                                                                @endif
                                                            @endisset
                                                        </div>
                                                        <div class="job-description">
                                                            <h4 title="{{ $newspaperjob->title }}">{{ str_limit($newspaperjob->title,35) }}</h4>
                                                            @isset($newspaperjob->company)
                                                                <p title="{{ $newspaperjob->company->title }}"> {{ str_limit($newspaperjob->company->title,25) }} </p> @endisset
                                                            <div>
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                {{ $newspaperjob->location }}
                                                            </div>
                                                            <!--<div>-->
                                                            <!--    <i class="far fa-sticky-note"></i>-->
                                                            <!--    Posted:-->
                                                            <!--    {{ \Carbon\Carbon::parse($newspaperjob->created_at) ->diffForHumans(null,null, false, 1) }}-->
                                                            <!--</div>-->
                                                        </div>
                                                    </a>
                                                    
                                                    
                                                    <div class="d-flex p-2 justify-content-between">
                                                            
                                                            <div>
                                                              <span class="">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                Deadline:
                                                              </span>
                                                              <span>
                                                                  {{ \Carbon\Carbon::parse($newspaperjob->job_deadline)->diffForHumans(null,null, false, 2) }}
                                                              </span>
                                                                    
                                                            </div>
                                                            <div class=" " style="color: #606060;font-weight: bold;">
                                                                 
                                                                <span class=""> {{ $newspaperjob->count }}</span>
                                                                <span>Views </span>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <hr>
                                                    <div class="job-type">
                                                        <ul class="d-flex align-items-center p-0">
                                                            @php
                                                                $status=checkSaved($newspaperjob->id)
                                                            @endphp
                                                            <li @if($status=='not logged in'||$status=='user not jobseeker')
                                                                title="You are not Logged in with Job Seekers Account"
                                                                disabled="" class="disabled"
                                                                    @endif>
                                                                <a id="{{$newspaperjob->slug}}"
                                                                   class=" btn-save-job"
                                                                   data-id="{{ $newspaperjob->id }}">

                                                                    @switch(checkSaved($newspaperjob->id))
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
                                                                <a href="{{ route('print-job',$newspaperjob->id)}}"
                                                                   class="">
                                                                    <i class="far fa-file-pdf"></i>Print
                                                                </a>
                                                            </li>
                                                            
                                                            <li  style="flex:1">
                                                                    <a href="{{ route('jobs-single',['slug'=>$newspaperjob->slug]) }}"
                                                                       class="btn btn-success p-1  "><i class="fas fa-plus-circle"></i>Apply</a>
                                                                </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                                    @endforeach
                                    @endif
                                @endisset
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="free">
                                <div class="row">
                                    @isset($free_jobs)
                                    @if($free_jobs->isNotEmpty())
                                    @foreach($free_jobs as $freejob)
                                        <div class="col-md-6">
                                            <div class="job-specification">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                                                    <a href="{{ route('jobs-single',['slug'=>$freejob->slug]) }}"
                                                       class="d-flex align-items-center">
                                                        <div class="company-img">
                                                            @isset($freejob->company)
                                                                @if(is_file('uploads/companies/logos/thumbnails/' . $freejob->company->logo))
                                                                    <img class="post_img"
                                                                         src="{{ asset('uploads/companies/logos/thumbnails/' . $freejob->company->logo) }}"
                                                                         alt="">
                                                                @else
                                                                    <img class="post_img"
                                                                         src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                         alt="">
                                                                @endif
                                                            @endisset
                                                        </div>
                                                        <div class="job-description">
                                                            <h4 title="{{ $freejob->title }}">{{ str_limit($freejob->title,35) }}</h4>
                                                            @isset($freejob->company)
                                                                <p title="{{ $freejob->company->title }}"> {{ str_limit($freejob->company->title,25) }} </p> @endisset
                                                            <div>
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                {{ $freejob->location }}
                                                            </div>
                                                            <!--<div>-->
                                                            <!--    <i class="far fa-sticky-note"></i>-->
                                                            <!--    Posted:-->
                                                            <!--    {{ \Carbon\Carbon::parse($freejob->created_at) ->diffForHumans(null,null, false, 1) }}-->
                                                            <!--</div>-->
                                                        </div>
                                                    </a>
                                                    <div class="d-flex p-2 justify-content-between">
                                                            
                                                            <div>
                                                              <span class="">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                Deadline:
                                                              </span>
                                                              <span>
                                                                  {{ \Carbon\Carbon::parse($freejob->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                              </span>
                                                                    
                                                            </div>
                                                            <div class=" " style="color: #606060;font-weight: bold;">
                                                                 
                                                                <span class=""> {{ $freejob->count }}</span>
                                                                <span>Views </span>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <hr>
                                                    <div class="job-type">
                                                        <ul class="d-flex align-items-center p-0">
                                                            @php
                                                                $status=checkSaved($freejob->id)
                                                            @endphp
                                                            <li @if($status=='not logged in'||$status=='user not jobseeker')
                                                                title="You are not Logged in with Job Seekers Account"
                                                                disabled="" class="disabled"
                                                                    @endif>
                                                                <a id="{{$freejob->slug}}"
                                                                   class=" btn-save-job"
                                                                   data-id="{{ $freejob->id }}">

                                                                    @switch(checkSaved($freejob->id))
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
                                                                <a href="{{ route('print-job',$freejob->id)}}"
                                                                   class="">
                                                                    <i class="far fa-file-pdf"></i>Print
                                                                </a>
                                                            </li>
                                                            
                                                            <li  style="flex:1">
                                                                    <a href="{{ route('jobs-single',['slug'=>$freejob->slug]) }}"
                                                                       class="btn btn-success p-1  "><i class="fas fa-plus-circle"></i>Apply</a>
                                                                </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                                    @endforeach
                                    @endif
                                @endisset
                                </div>
                                
                            </div>
                        </div>
                    </section>

                </div>

                <div class="col-lg-3 col-md-3" style="padding: 0">
                    <section id="side-section">
                        <div class="side-top-employer mt-2">
                            @php
                                $rightjobs=getAdvertise('Content Right');
                            @endphp
                            @isset($rightjobs)
                                @if($rightjobs->isNotEmpty())
                                    @foreach($rightjobs->slice(0,1) as $rightjob)
                                        <div class="ad-img_300 ">
                                            <a href="{{ $rightjob->link }}" target="_blank">
                                                <img src="{{ asset('uploads/advertise/'.$rightjob->image) }}"
                                                 alt="">
                                             </a>
                                        </div>
                                    @endforeach
                                @endif
                            @endisset
                        </div>


                        <div class="side-top-employer border-left-right">
                            <div class="title-head">
                                <h3>Top Employers</h3>
                            </div>
                            <div class="side-jobs-by-category">
                                <ul class="ul-top-employers slider owl-carousel top-employers-carousel">
                                    @isset($top_companies)
                                        @foreach($top_companies as $topcompany)
                                            <li class="industry-count">
                                                <a href="{{ route('company.show',['slug'=>$topcompany->slug]) }}"
                                                   class="d-flex center">
                                                    <span>
                                                         @if(file_exists('uploads/companies/logos/thumbnails/' . $topcompany->logo))
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/companies/logos/thumbnails/' . $topcompany->logo) }}"
                                                                 alt="" style="height: 100px;width: 100%;">
                                                        @else
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                 alt="" style="height: 100px;width: 100%;">
                                                        @endif
                                                    </span>
                                                    {{--<span class="col-md-6">{{ $topcompany->title }}</span>--}}

                                                </a>
                                                {{--<span  style="font-size: 12px">@isset($topcompany->jobposts) ( {{ $topcompany->jobposts->count() }} ) @endisset</span>--}}

                                            </li>
                                        @endforeach
                                    @endisset
                                </ul>
                                {{--<div class="float-right">--}}
                                {{--<a href="{{ route('company') }}"> View All</a>--}}
                                {{--</div>--}}
                                <div class="clearfix"></div>

                            </div>
                        </div>
                        
                        <div class="side-top-employer border-left-right">
                            <div class="fb-page" data-href="https://www.facebook.com/careernepaljob/"
                                 data-tabs="timeline" data-small-header="false" data-adapt-container-width="true"
                                 data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/careernepaljob/"
                                            class="fb-xfbml-parse-ignore"><a
                                            href="https://www.facebook.com/careernepaljob/">Hamro Jobs</a>
                                </blockquote>
                            </div>
                        </div>

                        <div class="side-top-employer mt-2">
                            @php
                                $rightjobs=getAdvertise('Content Right');
                            @endphp
                            @isset($rightjobs)
                                @if($rightjobs->isNotEmpty())
                                    @foreach($rightjobs->slice(1,2) as $rightjob)
                                        <div class="ad-img_300 ">
                                            <a href="{{ $rightjob->link }}" target="_blank">
                                                <img src="{{ asset('uploads/advertise/'.$rightjob->image) }}"
                                                 alt="Advertisement">
                                             </a>
                                        </div>
                                    @endforeach
                                @endif
                            @endisset
                        </div>

                        <div class="side-top-employer border-left-right">
                            <div class="title-head">
                                <h3>Jobs by Industry</h3>
                            </div>
                            <div class="side-jobs-by-category">
                                <ul class="ul-top-employers">
                                    @isset($top_industries)
                                        @foreach($top_industries as $topindustry)
                                            <li class="industry-count">
                                                <a href="{{ url('/industry/'.$topindustry->slug) }}"
                                                   class="d-flex align-items-center">
                                                    {{ $topindustry->title }}
                                                </a>
                                                <span class="industry-count-span" style="font-size: 12px">@isset($topindustry->jobs)
                                                        ( {{ $topindustry->jobs->count() }} ) @endisset</span>

                                            </li>
                                        @endforeach
                                    @endisset
                                </ul>
                                <hr>
                                <div class="float-right">
                                    <a href="{{ route('industry') }}" class="uk-button-primary p-1" style="border-radius:5px;font-size:12px"> View all</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


    </div>

    @php
        $bottomads=getAdvertise('Bottom');
    @endphp
    @isset($bottomads)
        <div class="advertisement-job mt-2" style="width: 100%; height: 300px">
            <a href="{{ $bottomads->link }}" target="_blank">
                <img src="{{ asset('uploads/advertise/'.getAdvertise('Bottom')->image) }}" alt="">
            </a>
        </div>
    @endisset

    @if($testimonials->isNotEmpty())
        <section id="testimonials">
            <div class="container">
                <div class="title center">
                    <h3>Testimonial</h3>
                </div>
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <div id="testimonial-slider" class="owl-carousel">
                            @foreach($testimonials as $testimonial)
                                <div class="testimonial">
                                    <div class="pic">
                                        @if(file_exists(public_path('uploads/testimonials/'.$testimonial->image)))
                                            <img src="{{ asset('uploads/testimonials/'.$testimonial->image) }}">
                                        @endif</div>
                                    <p class="description">
                                        {!! $testimonial->description  !!}
                                    </p>
                                    <h3 class="testimonial-title">
                                        {{ $testimonial->title }}
                                        <small class="post">{{ $testimonial->position }}</small>
                                    </h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif


@endsection

@section('scripts')
    <script>

    </script>
@endsection


