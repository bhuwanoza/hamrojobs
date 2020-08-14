<div class="col-md-4 col-sm-4 col-xs-12">
    <!-- left sidebar -->
    <div class="right-sidebar acc--shadow">
        <!-- manage account -->
        <div class="manage--account">
            <h4>Manage Account</h4>
            <ul class="nav nav-tabs " id="myTab" role="tablist">
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">My Profile</a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ route('resume.index') }}" class="nav-link">My Resume</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="" class="nav-link" >Notifications <span class="notinumber">2</span></a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a href="{{ route('userprofile.edit') }}" class="nav-link">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account.index') }}" class="nav-link"> Account Setting</a>
                </li>

            </ul>
        </div>
        <!-- manage Jobs -->
        <div class="manage--jobs">
            <h4>Manage Job</h4>
            <ul class="nav nav-tabs" id="myTab1" role="tablist">
                <li class="nav-item">
                    <a href="{{ route('profile.saved-jobs') }}" class="nav-link">Saved Jobs</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('applications.index') }}" class="nav-link">Manage Application</a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a href="" class="nav-link">Job Alerts</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
</div>