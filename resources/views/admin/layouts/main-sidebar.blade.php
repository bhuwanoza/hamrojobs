<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="padding-bottom: 25px">
            <div class="pull-left image">
                @if(file_exists('uploads/admin/thumbnails/' . Sentinel::getUser()->admin->image))
                    <img class="img-circle"
                         src="{{ asset('uploads/admin/thumbnails/' . Sentinel::getUser()->admin->image) }}"
                         alt="">
                @else
                    <img class="img-circle"
                         src="{{ asset('uploads/default/default-user.png') }}"
                         alt="">
                @endif
            </div>
            <div class="pull-left info">
                <p>
                    <a href="{{ route('admin.profile') }}" style="text-transform: capitalize">
                        {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}
                    </a>
                </p>

                <a href="{{ route('admin.profile') }}"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">-->
        <!--    <div class="input-group">-->
        <!--        <input type="text" name="q" class="form-control" placeholder="Search...">-->
        <!--        <span class="input-group-btn">-->
        <!--        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>-->
        <!--        </button>-->
        <!--      </span>-->
        <!--    </div>-->
        <!--</form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" ">
                <a href="{{ url('/admin/dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="">
                <a href="{{ url('admin/job-applications') }}">
                    <i class="fa fa-list-alt"></i> <span>Job Applications </span>
                </a>
            </li>
            <li class="">
                <a href="{{ url('/admin/job-posts') }}">
                    <i class="fa fa-rss"></i> <span>Posted Jobs</span>
                </a>
            </li>
            <li class="">
                <a href="{{ url('admin/employers') }}">
                    <i class="fa fa-briefcase"></i> <span>Employers </span>
                </a>
            </li>
            <li class="">
                <a href="{{ url('/admin/jobseekers') }}">
                    <i class="fa fa-user"></i> <span>JobSeekers</span>
                </a>
            </li>
            <li class="">
                <a href="{{ url('/admin/companies') }}">
                    <i class="fa fa-desktop"></i> <span>Companies</span>
                </a>
            </li>
            <li class="">
                <a href="{{ url('/admin/industries') }}">
                    <i class="fa fa-industry"></i> <span>Industries </span>
                </a>
            </li>


            <li>
                <a href="{{ url('admin/users') }}">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Others</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="">
                        <a href="{{ route('academics.index') }}">
                            <i class="fa fa-graduation-cap"></i> <span>Academic Qualification </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('advertise.index') }}">
                            <i class="fa fa-picture-o"></i> <span>Advertisement</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('blogposts.index') }}">
                            <i class="fa fa-microphone"></i> <span>Blog Posts</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('messages.index') }}">
                            <i class="fa fa-envelope-open"></i> <span>Contact Messages</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('payment.index') }}">
                            <i class="fa fa-money"></i> <span>Payment Options</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('testimonial.index') }}">
                            <i class="fa fa-quote-left"></i> <span>Testimonials</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('skills.index') }}">
                            <i class="fa fa-code"></i> <span>Skills</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ url('/admin/settings') }}">
                    <i class="fa fa-gears"></i> <span>Setting</span>
                </a>
            </li>
            <li class="">
                <a onclick="document.getElementById('logout-form').submit()">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
                <form action="{{ url('logout') }}" method="post" class="pull-right" id="logout-form">
                    {{ csrf_field() }}
                </form>

            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>