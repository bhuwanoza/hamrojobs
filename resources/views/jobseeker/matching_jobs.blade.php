@extends('layouts.master')
@section('title')
    Your Matching Jobs@endsection
@section('content')
    <section id="user-profile">
        <div class="container">
            <div class="row">
                @include('jobseeker.partial.sidebar')
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="tab__detail">
                        <div class="tab-pane"  role="tabpanel">
                            <div class="job-alerts-item">
                                <h3 class="alerts-title">Job Alerts</h3>
                                <div class="table table-responsive">
                                    <table class="table table-hover table-borderless ">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>location</th>
                                            <th>Contract Type</th>
                                            <th>Frequency</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td><h6>Web Designer</h6>
                                            </td>
                                            <td><span class="location"><i
                                                            class="fas fa-map-marker"></i> Manhattan, NYC</span></td>
                                            <td><span class="full-time">Full-Time</span></td>
                                            <td><p>Daily</p></td>

                                        </tr>

                                        </tbody>

                                    </table>
                                </div>
                                <div class="job-specification">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 d-flex align-items-center">
                                            <div class="company-img">
                                                <img src="http://www.webstrot.com/html/jobpro/job_dark/images/content/job_post_img3.jpg"
                                                     alt="post_img">
                                            </div>
                                            <div class="job-description">
                                                <h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
                                                <p>Webstrot Technology Pvt. Ltd.</p>
                                                <ul>
                                                    <li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
                                                    <li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="job-type">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#">Part Time</a></li>
                                                    <li><a href="#">Apply</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="job-specification">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 d-flex align-items-center">
                                            <div class="company-img">
                                                <img src="http://www.webstrot.com/html/jobpro/job_dark/images/content/job_post_img3.jpg"
                                                     alt="post_img">
                                            </div>
                                            <div class="job-description">
                                                <h4>HTML Developer (1 - 2 Yrs Exp.)</h4>
                                                <p>Webstrot Technology Pvt. Ltd.</p>
                                                <ul>
                                                    <li><i class="fa fa-cc-paypal"></i>&nbsp; $12K - 15k P.A.</li>
                                                    <li><i class="fa fa-map-marker"></i>&nbsp; Caliphonia, PO 455001
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="job-type">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#">Part Time</a></li>
                                                    <li><a href="#">Apply</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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

