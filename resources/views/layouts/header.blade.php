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
                        
                          <li class="nav-item"><a href="{{ url('/training') }}" class="nav-link">Training</a></li>
                        <li class="nav-item"><a href="{{ route('blogs.index') }}" class="nav-link">Blogs</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('contact-us') }}" class="nav-link">Contact</a></li>
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
                                <a href="{{ route('login') }}" class="login"><i class="fas fa-sign-in-alt"></i><span
                                            class="d-none d-md-inline">Login</span></a>
                                <a href="{{ route('register') }}" class="login RegOption" id="RegOption" data-link="jobseeker"> <i class="fa fa-user"></i><span
                                            class="d-none d-md-inline">Register</span></a>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</section>