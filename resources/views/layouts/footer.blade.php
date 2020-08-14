@if(!\Sentinel::check())
    <section id="newsletter_wrapper">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="newsletter_text">
                        <!--<img src="http://www.webstrot.com/html/jobpro/job_dark/images/content/news_logo.png"-->
                        <!--     class="img-responsive" alt="news_logo">-->
                            <i class="fas fa-bell"></i>
                             <span >Subscribe our Newsletter for FREE!!!</span>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-10  mt-sm-0 mt-3 ">
                    <div class="newsletter_field">
                        <i class="fa fa-envelope"></i><input type="text" placeholder="Enter Your Email">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

<section id="hj_footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="hj_footer_first_cont_wrapper">
                    <div class="hj_footer_first_cont">
                        <h2>Who We Are</h2>
                        <p>{!!   html_entity_decode(str_limit( getConfiguration('who_we_are'),200)) !!} </p>
                        <ul>
                            <li><i class="fa fa-plus-circle"></i> <a href="{{ route('about-us') }}">READ MORE</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="hj_footer_candidate_wrapper hj_footer_candidate_wrapper2">
                    <div class="hj_footer_candidate">
                        <h4>Job Seekers</h4>
                        <ul>
                            @php
                                if(Sentinel::check()){
                                $js_user = \Sentinel::getUser()->roles()->first()->slug=='jobseeker';
                                                              }
                            @endphp

                            <li><a href="@if(!empty($js_user)){{ route('applications.index') }} @else /# @endif"><i
                                            class="fa fa-caret-right" aria-hidden="true"></i> Applications</a>
                            </li>
                            <li><a href="@if(!empty($js_user)){{ route('applications.index') }} @else /# @endif"><i
                                            class="fa fa-caret-right" aria-hidden="true"></i> Job Alerts</a>
                            </li>
                            <li><a href="@if(!empty($js_user)){{ route('applications.index') }} @else /# @endif"><i
                                            class="fa fa-caret-right" aria-hidden="true"></i> Saved Jobs</a>
                            </li>
                            <li><a href="@if(!empty($js_user)){{ route('account.index') }} @else /# @endif"><i
                                            class="fa fa-caret-right" aria-hidden="true"></i> My Account</a>
                            </li>
                            <li><a href="@if(!empty($js_user)){{ route('applications.index') }} @else /# @endif"><i
                                            class="fa fa-caret-right" aria-hidden="true"></i> Your Jobs</a>
                            </li>
                        </ul>
                    </div>

                    <div class="hj_footer_candidate">
                        <h4>Employers</h4>
                        <ul>

                            @php
                                if(Sentinel::check()){
                                   Sentinel::check() ;
                                  $emp_user = Sentinel::getUser()->roles()->first()->slug=='employer';
                                }
                            @endphp
                            <li>
                                <a href="@if(!empty($emp_user)) {{ route('company-profile.index') }} @else /# @endif">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i> Employer Profile
                                </a>
                            </li>
                            <li>
                                <a href="@if(!empty($emp_user)) {{ route('job-post.index') }} @else /#@endif">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i> Add Job
                                </a>
                            </li>
                            <li>
                                <a href="@if(!empty($emp_user)){{ route('application.index') }} @else /# @endif">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i> Application Received
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 float-right">
                <div class="hj_footer_candidate_wrapper hj_footer_candidate_wrapper4">
                    <div class="hj_footer_candidate">
                        <h3>Information</h3>
                        <ul>
                            <li><a href="{{ route('jobs') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>
                                    Jobs</a></li>
                            <li><a href="{{ route('industry') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>
                                    Industries</a></li>
                            <li><a href="{{ route('company') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>
                                    Companies</a></li>

                            <li><a href="{{ route('about-us') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>
                                    About Us</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Terms &amp;
                                    Conditions</a></li>
                            <li><a href="{{ route('privacy-policy') }}"><i class="fa fa-caret-right"
                                                                           aria-hidden="true"></i> Privacy Policy</a>
                            </li>
                            <li><a href="{{ route('payment-methods') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Payment Options</a>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Careers with Us</a>
                            </li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Sitemap</a></li>
                            <li><a href="{{ route('contact-us') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>
                                    Contact Us</a></li>
                            <li><a href="faqpage.html"><i class="fa fa-caret-right" aria-hidden="true"></i> FAQs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 float-right">
                <div class="hj_footer_candidate_wrapper hj_footer_candidate_wrapper4">
                    <div class="hj_footer_candidate">
                        <h3>Our Location</h3>
                        {!! html_entity_decode(getConfiguration('site_map')) !!}
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="hj_bottom_footer_left">
                    <p>© {{ date('Y') }} {{ getConfiguration('site_title') }}. All Rights Reserved.</p>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="hj_bottom_footer_right">
                    <ul>
                        <li><a href="{{ getConfiguration('facebook_link') }}"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="{{ getConfiguration('twitter_link') }}"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ getConfiguration('googleplus_link') }}"><i class="fab fa-google-plus"></i></a>
                        </li>
                        <li><a href="{{ getConfiguration('instagram_link') }}"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ getConfiguration('linkedin_link') }}"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="center aligned">
                    Designed and Developed By: <a href="https://nextnepal.com" target="_blank"> Next Nepal </a>
                </div>
            </div>
        </div>
    </div>
</section>