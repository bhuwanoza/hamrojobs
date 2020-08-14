@extends('layouts.master')
@section('title') Resume @endsection

@section('content')
    <section id="user-profile">
        <div class="container">
            <div class="row">
                @include('jobseeker.partial.sidebar')
                <div class="col-md-8 col-sm-8 col-xs-12">

                    <div class="{{--tab-content--}} tab__detail">
                        <div class="tab-pane" id="My__resume" role="tabpanel">
                            <div class="job-alerts-item candidates">
                                <h3 class="alerts-title">Manage Resumes</h3>
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        <a href=""><img class="resume-thumb" src="assets/img/jobs/avatar.jpg"
                                                        alt=""></a>
                                        <div class="manager-info">
                                            <div class="manager-name">
                                                <h4><a href="#">John Doe</a></h4>
                                                <h5>Front-end developer</h5>
                                            </div>
                                            <div class="manager-meta">
                                            <span class="location"><i
                                                        class="ti-location-pin"></i> Cupertino, CA, USA</span>
                                                <span class="rate"><i class="ti-time"></i> $55 per hour</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update-date">
                                        <p class="status">
                                            <strong>Updated on:</strong> Fab 22, 2017
                                        </p>
                                        <div class="action-btn">
                                            <a class="btn btn-xs btn-purple" href="#">Hide</a>
                                            <a class="btn btn-xs btn-primary" href="addresume.html">Edit</a>
                                            <a class="btn btn-xs btn-danger" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        <a href=""><img class="resume-thumb" src=""
                                                        alt=""></a>
                                        <div class="manager-info">
                                            <div class="manager-name">
                                                <h4><a href="#">John Doe</a></h4>
                                                <h5>Front-end developer</h5>
                                            </div>
                                            <div class="manager-meta">
                                            <span class="location"><i
                                                        class="ti-location-pin"></i> Cupertino, CA, USA</span>
                                                <span class="rate"><i class="ti-time"></i> $55 per hour</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update-date">
                                        <p class="status">
                                            <strong>Updated on:</strong> Fab 22, 2017
                                        </p>
                                        <div class="action-btn">
                                            <a class="btn btn-xs btn-purple" href="#">Hide</a>
                                            <a class="btn btn-xs btn-primary" href="addresume.html">Edit</a>
                                            <a class="btn btn-xs btn-danger" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>


                                <a class="btn btn-success btn-sm" href="addresume.html">Add new resume</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- modals for edit profile -->
    @include('jobseeker.modals.modal')

@endsection

