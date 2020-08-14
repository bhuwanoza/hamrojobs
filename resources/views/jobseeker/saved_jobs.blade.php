@extends('layouts.master')
@section('title')Saved Jobs @endsection

@section('content')
    <section id="user-profile">
        <div class="container">
            <div class="row">
                @include('jobseeker.partial.sidebar')
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="tab__detail">
                        <div class="tab-pane" id="bookmarked" role="tabpanel">
                            @isset($savedjobs)
                                @foreach($savedjobs as $savedjob)
                                    <div class="job-specification">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 ">
                                                <a href="{{ route('jobs-single',['slug'=>$savedjob->jobs->slug]) }}"
                                                   class="d-flex d-flex align-items-center">
                                                    <div class="company-img">
                                                        @isset($savedjob->jobs->company)
                                                            @if(file_exists('uploads/companies/logos/thumbnails/' . $savedjob->jobs->company->logo))
                                                                <img class="post_img"
                                                                     src="{{ asset('uploads/companies/logos/thumbnails/' . $savedjob->jobs->company->logo) }}"
                                                                     alt="">
                                                            @else
                                                                <img class="post_img"
                                                                     src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                     alt="">
                                                            @endif
                                                        @endisset
                                                    </div>
                                                    <div class="job-description">
                                                        <h4 title="{{ $savedjob->jobs->title }}">{{ str_limit($savedjob->jobs->title,35) }}</h4>
                                                        @isset($savedjob->jobs->company)
                                                            <p title="{{ $savedjob->jobs->company->title }}"> {{ str_limit($savedjob->jobs->company->title,25) }} </p> @endisset
                                                        <div>
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            {{ $savedjob->jobs->location }}
                                                        </div>
                                                        <div>

                                                            {{--<i class="fas fa-calendar-alt"></i>--}}
                                                            {{--{{ \Carbon\Carbon::parse($savedjob->jobs->job_deadline) ->diffForHumans(null,null, false, 3) }}--}}
                                                        </div>
                                                    </div>
                                                </a>
                                                <hr>
                                                <div class="d-flex">
                                                    <div class="text-success mx-3">
                                                        <span>Views: </span> <span
                                                                class="badge badge-success"> {{ $savedjob->jobs->count }}</span>
                                                    </div>
                                                    <div>
                                                          <span class="">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            Deadline:
                                                          </span>
                                                        {{ \Carbon\Carbon::parse($savedjob->jobs->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                                <div class="job-type">
                                                    <ul>
                                                        @php
                                                            $status=checkSaved($savedjob->jobs->id)
                                                        @endphp
                                                        <li @if($status=='not logged in'||$status=='user not jobseeker')
                                                            title="You are not Logged in with Job Seekers Account"
                                                            disabled="" class="disabled"
                                                                @endif>
                                                            <a id="{{$savedjob->jobs->slug}}"
                                                               class="btn btn-danger btn-save-job"
                                                               data-id="{{ $savedjob->jobs->id }}">


                                                                @switch(checkSaved($savedjob->jobs->id))
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
                                                               class="btn btn-primary">{{ $savedjob->jobs->job_type }}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('jobs-single',['slug'=>$savedjob->jobs->slug]) }}"
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
                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 ">
                                            <p> You have no saved jobs</p>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- modals for edit profile -->
    @include('jobseeker.modals.modal')

@endsection

