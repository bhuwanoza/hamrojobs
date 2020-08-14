<section id="header">
    <header class="header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Top bar-->
        <div class="top-bar">
            <div class="container">
                <div class="content-holder d-flex justify-content-between align-items-center">
                    <div class="info d-flex">
                        <div class="contact d-flex">
                            <p><a href="mailto:{{ getConfiguration('site_primary_email') }}"> <i
                                            class="fa fa-envelope "></i><span
                                            class="d-none d-md-inline">{{ getConfiguration('site_primary_email') }}</span></a>
                            </p>
                            <p><a href="tel:{{ getConfiguration('site_primary_phone') }}"><i
                                            class="fa fa-phone"></i><span
                                            class="d-none d-md-inline">{{ getConfiguration('site_primary_phone') }}</span></a>
                            </p>
                        </div>
                    </div>
                    <div class="d-none d-sm-block">
                        <ul class="d-flex justify-content-between align-items-center">
                            <li><a href="{{ getConfiguration('facebook_link') }}" target="_blank" class="i-facebook"><i
                                            class="fab fa-facebook"></i></a></li>
                            <li><a href="{{ getConfiguration('twitter_link') }}" target="_blank" class="i-twitter"><i
                                            class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ getConfiguration('instagram_link') }}" target="_blank"
                                   class="i-instagram"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ getConfiguration('googleplus_link') }}" target="_blank" class="i-google"><i
                                            class="fab fa-google-plus"></i></a></li>
                            <li><a href="{{ getConfiguration('linkedin_link') }}" target="_blank" class="i-linkedin"><i
                                            class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Navbar-->
        <nav class="navbar navbar-expand-lg" uk-sticky>
            <div class="container">
                <!-- Navbar Brand -->
                <a href="{{ route('index') }}" style="width: 175px" class="navbar-brand">
                    <img src="{{ asset('/settings/') }}/{{ getConfiguration('site_logo') }}" alt="HamroJobs.com">
                </a>
                <!-- Toggle Button-->
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse"
                        aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler"><i class="fa fa-bars"></i></button>
                <!-- Navbar Menu -->
                <div id="navbarcollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <!-- Search-->
                        <li class="nav-item"><a href="{{ route('index') }}" class="nav-link active"><i class="fas fa-home"></i>Home</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('about-us') }}" class="nav-link">About </a>
                        </li>
                        <li class="nav-item"><a href="{{ route('contact-us') }}" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('blogs.index') }}" class="nav-link">Blogs</a>
                        </li>
                        @if(Sentinel::check())
                            @if(Sentinel::getUser()->roles()->first()->slug=='employer')
                            @php
                                $emp= Sentinel::getUser();
                                $company_logo='';
                                if ($emp->employer->company()->exists()){
                                 $company_logo=$emp->employer->company->logo;
                                }
                            @endphp
                            <li class="nav-item">
                                @if(is_file(public_path('uploads/companies/logos/thumbnails/' . $company_logo)))
                                    <img class="rounded-circle" src="{{ asset('uploads/companies/logos/thumbnails/' . $company_logo) }}"
                                         alt="" style="height: 40px;width: 40px;">
                                @else
                                    <img class="rounded-circle" src="{{ asset('uploads/default/default-company-logo.png') }}"
                                         alt="" style="height: 40px;width: 40px;">
                                @endif

                                <div uk-dropdown="pos: bottom-justify">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li class="nav-item">
                                                <a href="{{ url('/employer/company-profile') }}" class="nav-link">
                                                   <i class="fas fa-building"></i>Company Profile </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="{{ route('manage-jobs') }}" class="nav-link">
                                                    <i class="fa fa-suitcase"></i>Manage Jobs </a>
                                            </li>
                                            <li class="nav-item">
                                                <a onclick="document.getElementById('logout-form').submit()"
                                                   class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                            </li>
                                            <form action="{{ url('logout') }}" method="post" class="pull-right"
                                                  id="logout-form">
                                                {{ csrf_field() }}
                                            </form>
                                        </ul>
                                    </div>

                            </li>
                            @endif
                            @if(Sentinel::getUser()->roles()->first()->slug=='jobseeker')
                                @php
                                   $js= Sentinel::getUser();
                                   $js_logo='';
                                    if($js->jobseeker()->exists()){
                                    $js_logo=$js->jobseeker->image;
                                    }
                                @endphp
                                <li class="nav-item">
                                    <a href="{{ url('/jobseeker/profile') }}"
                                       class="nav-link">
                                        @if(is_file(public_path('uploads/jobseekers/thumbnails/' . $js_logo)))
                                            <img class="rounded-circle" src="{{ asset('uploads/jobseekers/thumbnails/' . $js_logo) }}"
                                                 alt="" style="height: 40px;width: 40px;">
                                        @else
                                            <img class="rounded-circle" src="{{ asset('uploads/default/default-user.png') }}"
                                                 alt="" style="height: 40px;width: 40px;">
                                        @endif
                                    </a>
                                    <div uk-dropdown="pos: bottom-justify">
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li class="nav-item">
                                                <a href="{{ url('jobseeker/profile') }}" class="nav-link">
                                                   <i class="fa fa-user"></i> Profile </a>
                                            </li>
                                            <li class="nav-item">
                                                <a onclick="document.getElementById('logout-form').submit()"
                                                   class="nav-link">
                                                    <i class="fas fa-sign-out-alt"></i>Logout</a>
                                            </li>
                                            <form action="{{ url('logout') }}" method="post" class="pull-right"
                                                  id="logout-form">
                                                {{ csrf_field() }}
                                            </form>
                                        </ul>
                                    </div>

                                </li>
                            @endif
                            @if(Sentinel::getUser()->roles()->first()->slug=='admin')
                            <li class="nav-item">
                                <a href="{{ url('/admin/dashboard') }}" style="text-transform: capitalize"
                                   class="nav-link">
                                    {{ Sentinel::getUser()->first_name }}
                                </a>
                                <div uk-dropdown="pos: bottom-justify">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li class="nav-item">
                                            <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                                                <i class="fa fa-tachometer-alt" aria-hidden="true"></i>Dashboard </a>
                                        </li>
                                        <li class="nav-item">
                                            <a onclick="document.getElementById('logout-form').submit()"
                                               class="nav-link">
                                                <i class="fas fa-sign-out-alt"></i>Logout</a>
                                            <form action="{{ url('logout') }}" method="post" class="pull-right"
                                                  id="logout-form">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>

                                    </ul>
                                </div>

                            </li>
                        @endif
                        @else
                            <div class="CTAs " style="margin-left:15px">                                
                                <ul class="nav-pill" style="display: inline-block; padding-left: 0px;">
                                    <li class="nav-item dropdown show">
                                        <a href="#" class="login custom-login-nav dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-sign-in-alt"></i><span class="d-none d-md-inline">Login</span></a>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right p-3 fixed-width-300 right" id="#" x-placement="bottom-end" aria-labelledby="page-header-user-dropdown">
                                            <ul class="nav nav-tabs" role="tablist" id="CustomLoginBlock">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" data-loginurl="/jobseeker/login/" href="#jobseeker-tab" role="tab" aria-selected="true">Jobseeker</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" data-loginurl="/employer/login/" href="#employer-tab" role="tab" aria-selected="false">Employer</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="jobseeker-tab" role="tabpanel">
                                                    <div class="row">
                                                        <form id="topLoginForm" method="post" class="col-md-12">
                                                            <div class="text-title mt-2 mb-3">
                                                                <small>Login with your registered Email & Password.</small>
                                                            </div>
                                                            <div class="form-group i-email">
                                                                <input type="email" name="email" id="email" class="form-control" required="" placeholder="Email*">
                                                            </div>
                                                            <div class="form-group i-password">
                                                                <input type="password" name="password" class="form-control" required="" id="password" placeholder="Password *">
                                                            </div>
                                                            <div class="login_remember_box">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <label class="control control--checkbox">
                                                                            <input type="checkbox" name="remember_me" id="remember_me">Remember me
                                                                            <span class="control__indicator"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <a href="http://localhost/hamrojobs.com.np/public/index.php/forgot-password" class="forget_password">
                                                                            Forgot Password?
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="login_btn clearfix"> 
                                                                <button type="button" class="btn btn-primary waves-effect waves-light"> Login </button>
                                                            </div>
                                                        </form>
                                                        <div class="login_message text-center">
                                                            <p>Don’t have an account ? <a href="{{url('register')}}"> Register Now </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="employer-tab" role="tabpanel">
                                                    <div class="row">
                                                        <form id="topLoginForm" method="post" class="col-md-12">
                                                            <div class="text-title mt-2 mb-3">
                                                                <small>Login with your registered Email & Password.</small>
                                                            </div>
                                                            <div class="form-group i-email">
                                                                <input type="email" name="email" id="email" class="form-control" required="" placeholder="Email*">
                                                            </div>
                                                            <div class="form-group i-password">
                                                                <input type="password" name="password" class="form-control" required="" id="password" placeholder="Password *">
                                                            </div>
                                                            <div class="login_remember_box">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <label class="control control--checkbox">
                                                                            <input type="checkbox" name="remember_me" id="remember_me">Remember me
                                                                            <span class="control__indicator"></span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <a href="{{url('forgot-password')}}" class="forget_password">
                                                                            Forgot Password?
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="login_btn clearfix"> 
                                                                <button type="button" class="btn btn-primary waves-effect waves-light"> Login </button>
                                                            </div>
                                                        </form>
                                                        <div class="login_message text-center">
                                                            <p>Don’t have an account ? <a href="{{url('register')}}"> Register Now </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <a href="{{ route('register') }}" class="login RegOption" id="RegOption" data-link="jobseeker"> <i class="fa fa-user"></i><span
                                            class="d-none d-md-inline">Register</span></a>
                               <!--  <ul class="nav-pill">
                                    <li class="nav-item dropdown show">
                                        <a href="#" class="login custom-login-nav dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user"></i><span class="d-none d-md-inline">Register</span></a>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right p-3 fixed-width-300 right" id="#" x-placement="bottom-end" aria-labelledby="page-header-user-dropdown">
                                            <ul class="nav nav-tabs" role="tablist" id="CustomLoginBlock">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" data-loginurl="/jobseeker/login/" href="#jobseeker-reg" role="tab" aria-selected="true">Jobseeker</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" data-loginurl="/employer/login/" href="#employer-reg" role="tab" aria-selected="false">Employer</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="jobseeker-reg" role="tabpanel">
                                                    <div class="row">
                                                        <div class="login_btn clearfix"> 
                                                            <div class="mt-4 mb-4">
                                                                <i class="fas fa-user-tie"></i>
                                                            </div>
                                                            <a href="{{ route('register') }}" class="btn btn-primary waves-effect waves-light login RegOption" id="RegOption" data-link="jobseeker"><span
                                                                class="d-none d-md-inline">Register</span></a>
                                                        </div>
                                                        <div class="login_message text-center mt-3">
                                                            <p>Create a free account to apply for jobs</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="employer-reg" role="tabpanel">
                                                    <div class="row">
                                                        <div class="login_btn clearfix">
                                                            <div class="mt-4 mb-4">
                                                                <i class="fas fa-building"></i>
                                                            </div> 
                                                            <a href="{{ route('register','employer') }}" class="btn btn-primary waves-effect waves-light login RegOption" id="RegOption" data-link="jobseeker"><span
                                                                class="d-none d-md-inline">Register</span></a>
                                                        </div>
                                                        <div class="login_message text-center mt-3">
                                                            <p>Create a free account to apply for jobs</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul> -->
                                <!-- <a href="{{ route('login') }}" class="login"><i class="fas fa-sign-in-alt"></i><span
                                            class="d-none d-md-inline">Login</span></a>
                                <a href="{{ route('register') }}" class="login RegOption" id="RegOption" data-link="jobseeker"> <i class="fa fa-user"></i><span
                                            class="d-none d-md-inline">Register</span></a> -->
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</section>