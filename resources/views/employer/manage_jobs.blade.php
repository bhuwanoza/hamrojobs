@extends('layouts.master')
@section('title')
    @if(isset($title))
        {{ $title }}
    @endif
@endsection

@section('content')
    @if(isset($company))
        <section id="user-profile">

            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <!-- left sidebar -->
                        <div class="right-sidebar acc--shadow">
                            <!-- manage account -->
                            <div class="manage--account">
                                <h4>Manage Jobs</h4>
                                <ul class="nav nav-tabs " id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#active_jobs" role="tab" aria-controls="active_jobs" aria-selected="false">Active Jobs
                                            @if($activeJobs)<span class="notinumber">{{ $activeJobs }}</span>@endif

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#pending_jobs" role="tab" aria-controls="pending_jobs" aria-selected="false">Pending Jobs
                                            @if($pendingJobs)<span class="notinumber">{{ $pendingJobs }}</span>@endif
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#inactive_jobs" role="tab" aria-controls="inactive_jobs" aria-selected="false">Inactive Jobs
                                            @if($inactiveJobs)<span class="notinumber">{{ $inactiveJobs }}</span>@endif
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#draft_jobs" role="tab" aria-controls="draft_jobs" aria-selected="false">Draft Jobs
                                            @if($draftJobs)<span class="notinumber">{{ $draftJobs }}</span>@endif
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#expired_jobs" role="tab" aria-controls="draft_jobs" aria-selected="false">Expired Jobs
                                            @if($expiredJobs)<span class="notinumber">{{ $expiredJobs }}</span>@endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- manage Jobs -->
                            <div class="manage--jobs">
                                <h4>Manage Applications</h4>
                                <ul class="nav nav-tabs" id="myTab1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#manage_applications" role="tab" aria-controls="settings">Manage Application</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#user_setting" role="tab" aria-controls="settings">User Setting</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <!-- right content Area  -->
                        <div class="tab-content tab__detail">

                            <!-- Active Jobs -->
                            <div class="tab-pane active show" id="active_jobs" role="tabpanel">
                                <div class="header">
                                    <div class="header float-left">
                                        <h5><span>Active Jobs</span></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                </div>
                                @if($activeJobs)
                                    <div class="{{--col-md-12--}} row">
                                        <div class="table p-3 no-border">
                                            <table class="ui table table-no-border no-border" cellspacing="0" style="width:100%"
                                                   id="tblActive">
                                                <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Banner</th>
                                                    <th class="text-center">Vacancy</th>
                                                    <th>Service</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                    <th class="text-center"><i class="fa fa-gear"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <h4 class="text-center p-3"> <span class="badge badge-info ">You have no Active Jobs</span></h4>
                                    </div>
                                @endif
                            </div>
                            <!-- Pending Jobs -->
                            <div class="tab-pane" id="pending_jobs" role="tabpanel">

                                <div class="header">
                                    <div class="header float-left">
                                        <h5><span>Pending Jobs</span></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>

                                </div>
                                @if($pendingJobs)
                                    <div class="{{--col-md-12--}} row">
                                        <div class="table p-3 no-border">
                                            <table class="ui table table-no-border no-border" cellspacing="0" style="width:100%"
                                                   id="tblPending">
                                                <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Banner</th>
                                                    <th class="text-center">Vacancy</th>
                                                    <th>Service</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                    <th class="text-center"><i class="fa fa-gear"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <h4 class="text-center p-3"> <span class="badge badge-info ">You have no Pending jobs</span></h4>
                                    </div>
                                @endif
                            </div>
                            <!-- Inactive Jobs -->
                            <div class="tab-pane" id="inactive_jobs" role="tabpanel">
                                <div class="header">
                                    <div class="header float-left">
                                        <h5><span>Inactive Jobs</span></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>

                                </div>
                                @if($inactiveJobs)
                                    <div class="{{--col-md-12--}} row">
                                        <div class="table p-3 no-border">
                                            <table class="ui table table-no-border no-border" cellspacing="0" style="width:100%"
                                                   id="tblInactive">
                                                <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Banner</th>
                                                    <th class="text-center">Vacancy</th>
                                                    <th>Service</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                    <th class="text-center"><i class="fa fa-gear"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <h4 class="text-center p-3"> <span class="badge badge-info ">You have no Inactive jobs</span></h4>
                                    </div>
                                @endif
                            </div>
                            <!-- Draft Jobs -->
                            <div class="tab-pane " id="draft_jobs" role="tabpanel">
                                <div class="header">
                                    <div class="header float-left">
                                        <h5><span>Draft Jobs</span></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>

                                </div>
                                @if($draftJobs)
                                    <div class="{{--col-md-12--}} row">
                                        <div class="table p-3 no-border">
                                            <table class="ui table table-no-border no-border" cellspacing="0" style="width:100%"
                                                   id="tlbDraft">
                                                <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Banner</th>
                                                    <th class="text-center">Vacancy</th>
                                                    <th>Service</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                    <th class="text-center"><i class="fa fa-gear"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <h4 class="text-center p-3"> <span class="badge badge-info ">You have no Draft jobs</span></h4>
                                    </div>
                                @endif
                            </div>
                            <!-- Draft Jobs -->
                            <div class="tab-pane " id="expired_jobs" role="tabpanel">
                                <div class="header">
                                    <div class="header float-left">
                                        <h5><span>Expired Jobs</span></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>

                                </div>
                                @if($expiredJobs)
                                    <div class="{{--col-md-12--}} row">
                                        <div class="table p-3 no-border">
                                            <table class="ui table table-no-border no-border" cellspacing="0" style="width:100%"
                                                   id="tblExpired">
                                                <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Banner</th>
                                                    <th class="text-center">Vacancy</th>
                                                    <th>Service</th>
                                                    <th>Deadline</th>
                                                    <th>Status</th>
                                                    <th class="text-center"><i class="fa fa-gear"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <h4 class="text-center p-3"> <span class="badge badge-info ">You have no Expired jobs</span></h4>
                                    </div>
                                @endif
                            </div>

                            <!-- Manage Application -->
                            <div class="tab-pane" id="manage_applications" role="tabpanel">
                                <div class="header">
                                    <div class="header float-left">
                                        <h5><span>All Applications</span></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>

                                </div>
                                @if($applications->isNotEmpty())
                                    <div class="col-md-12">
                                        <div class="table p-3 no-border">
                                            <table class="ui table table-no-border no-border" cellspacing="0"
                                                   style="width:100%" id="tblApplication">
                                                <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Job Seeker</th>
                                                    <th>Application Date</th>
                                                    <th>Deadline</th>
                                                    <th class="text-center"><i class="fa fa-gear"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <h2 class="text-center"> <span class="badge badge-info ">You have not received job applications. </span></h2>
                                    </div>
                                @endif
                            </div>

                            <div class="tab-pane" id="user_setting" role="tabpanel">
                                <div class="header">
                                    <div class="header float-left">
                                        <h5><span>@isset($user) {{ $user->first_name }} {{ $user->last_name }} @endisset</span></h5>
                                    </div>
                                    <div class="edit__basic_information float-right">
                                        <a id="edit_user_detail" class="info-edit-user-profile" ><i class="far fa-edit"></i> Edit</a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>

                                </div>
                                @isset($user)
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover ">
                                                <tbody>
                                                <tr>
                                                    <td width="25%">Full Name<span class="float-right">:</span></td>
                                                    <td><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></td>
                                                </tr>

                                                <tr>
                                                    <td>Current Address<span class="float-right">:</span></td>
                                                    <td>
                                                        {{ $user->address }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email <span class="float-right">:</span></td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile No.<span class="float-right">:</span></td>
                                                    <td>{{ $user->mobile }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                @endisset
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 offset-md-2">
                <div class="modal fade" id="launchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tblActive').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                searching: false,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('job-post.active-jobs') }}",
                columns: [
                    {
                        data: 'title',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/jobs/') }}/' + row.slug + '"  data-id="' + row.id + '" target="_blank"><strong>' + data + '</strong></a>';
                        }
                    },
                    {
                        data: 'job_banner',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/jobposts/thumbnails/') }}' + '/' + data + '" style="width:100%;height:auto;">';
                        }
                    },
                    {
                        data: 'number_of_vacancies',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5>';
                        }

                    },
                    {
                        data: 'service_type',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Top Job':
                                    statusClass = "success";
                                    break;
                                case 'Hot Job':
                                    statusClass = "warning";
                                    break;
                                case 'Featured Job':
                                    statusClass = "danger";
                                    break;
                                case 'Free Job':
                                    statusClass = "success";
                                    break;
                                case 'Newspaper Job':
                                    statusClass = "info";
                                    break;
                                case 'Other Job':
                                    statusClass = "info";
                                    break;
                                default:
                                    statusClass = "danger";
                            }

                            return '<h5><span class="badge badge-' + statusClass + '">' + data + '</span></h5>';
                        }
                    },
                    {
                        data: 'job_deadline',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5> ';
                        }
                    },
                    {
                        data: 'status',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Active':
                                    statusClass = "success";
                                    break;
                                case 'Inactive':
                                    statusClass = "info";
                                    break;
                                case 'Pending':
                                    statusClass = "warning";
                                    break;
                                case 'Draft':
                                    statusClass = "danger";
                                    break;
                                default:
                                    statusClass = "info";
                            }

                            return '<h5><span class="badge badge-' + statusClass + ' badge-sm">' + data + '</span></h5>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(document).ready(function () {
            $('#tblPending').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                searching: false,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('job-post.pending-jobs') }}",
                columns: [

                    {
                        data: 'title',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/jobs/') }}/' + row.slug + '"  data-id="' + row.id + '" target="_blank"><strong>' + data + '</strong></a>';
                        }
                    },
                    {
                        data: 'job_banner',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/jobposts/thumbnails/') }}' + '/' + data + '" style="width:100%;height:auto;">';
                        }
                    },
                    {
                        data: 'number_of_vacancies',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5>';
                        }

                    },
                    {
                        data: 'service_type',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Top Job':
                                    statusClass = "success";
                                    break;
                                case 'Hot Job':
                                    statusClass = "warning";
                                    break;
                                case 'Featured Job':
                                    statusClass = "danger";
                                    break;
                                case 'Free Job':
                                    statusClass = "success";
                                    break;
                                case 'Newspaper Job':
                                    statusClass = "info";
                                    break;
                                case 'Other Job':
                                    statusClass = "info";
                                    break;
                                default:
                                    statusClass = "danger";
                            }

                            return '<h5><span class="badge badge-' + statusClass + '">' + data + '</span></h5>';
                        }
                    },
                    {
                        data: 'job_deadline',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5>';
                        }
                    },
                    {
                        data: 'status',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Active':
                                    statusClass = "success";
                                    break;
                                case 'Inactive':
                                    statusClass = "info";
                                    break;
                                case 'Pending':
                                    statusClass = "warning";
                                    break;
                                case 'Draft':
                                    statusClass = "danger";
                                    break;
                                default:
                                    statusClass = "info";
                            }

                            return '<h5><span class="badge badge-' + statusClass + ' badge-sm">' + data + '</span></h5>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(document).ready(function () {
            $('#tblInactive').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                searching: false,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('job-post.inactive-jobs') }}",
                columns: [

                    {
                        data: 'title',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/jobs/') }}/' + row.slug + '"  data-id="' + row.id + '" target="_blank"><strong>' + data + '</strong></a>';
                        }
                    },
                    {
                        data: 'job_banner',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/jobposts/thumbnails/') }}' + '/' + data + '" style="width:100%;height:auto;">';
                        }
                    },
                    {
                        data: 'number_of_vacancies',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5>';
                        }

                    },
                    {
                        data: 'service_type',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Top Job':
                                    statusClass = "success";
                                    break;
                                case 'Hot Job':
                                    statusClass = "warning";
                                    break;
                                case 'Featured Job':
                                    statusClass = "danger";
                                    break;
                                case 'Free Job':
                                    statusClass = "success";
                                    break;
                                case 'Newspaper Job':
                                    statusClass = "info";
                                    break;
                                case 'Other Job':
                                    statusClass = "info";
                                    break;
                                default:
                                    statusClass = "danger";
                            }

                            return '<h5><span class="badge badge-' + statusClass + '">' + data + '</span></h5>';
                        }
                    },
                    {
                        data: 'job_deadline',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5>';
                        }
                    },
                    {
                        data: 'status',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Active':
                                    statusClass = "success";
                                    break;
                                case 'Inactive':
                                    statusClass = "info";
                                    break;
                                case 'Pending':
                                    statusClass = "warning";
                                    break;
                                case 'Draft':
                                    statusClass = "danger";
                                    break;
                                default:
                                    statusClass = "info";
                            }

                            return '<h5><span class="badge badge-' + statusClass + ' badge-sm">' + data + '</span></h5>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(document).ready(function () {
            $('#tblDraft').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                searching: false,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('job-post.draft-jobs') }}",
                columns: [

                    {
                        data: 'title',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/jobs/') }}/' + row.slug + '"  data-id="' + row.id + '" target="_blank"><strong>' + data + '</strong></a>';
                        }
                    },
                    {
                        data: 'job_banner',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/jobposts/thumbnails/') }}' + '/' + data + '" style="width:100%;height:auto;">';
                        }
                    },
                    {
                        data: 'number_of_vacancies',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5>';
                        }

                    },
                    {
                        data: 'service_type',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Top Job':
                                    statusClass = "success";
                                    break;
                                case 'Hot Job':
                                    statusClass = "warning";
                                    break;
                                case 'Featured Job':
                                    statusClass = "danger";
                                    break;
                                case 'Free Job':
                                    statusClass = "success";
                                    break;
                                case 'Newspaper Job':
                                    statusClass = "info";
                                    break;
                                case 'Other Job':
                                    statusClass = "info";
                                    break;
                                default:
                                    statusClass = "danger";
                            }

                            return '<h5><span class="badge badge-' + statusClass + '">' + data + '</span></h5>';
                        }
                    },
                    {
                        data: 'job_deadline',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5> ';
                        }
                    },
                    {
                        data: 'status',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Active':
                                    statusClass = "success";
                                    break;
                                case 'Inactive':
                                    statusClass = "info";
                                    break;
                                case 'Pending':
                                    statusClass = "warning";
                                    break;
                                case 'Draft':
                                    statusClass = "danger";
                                    break;
                                default:
                                    statusClass = "info";
                            }

                            return '<h5><span class="badge badge-' + statusClass + ' badge-sm">' + data + '</span></h5>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(document).ready(function () {
            $('#tblExpired').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                searching: false,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('job-post.expired-jobs') }}",
                columns: [
                    {
                        data: 'title',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/jobs/') }}/' + row.slug + '"  data-id="' + row.id + '" target="_blank"><strong>' + data + '</strong></a>';
                        }
                    },
                    {
                        data: 'job_banner',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/jobposts/thumbnails/') }}' + '/' + data + '" style="width:100%;height:auto;">';
                        }
                    },
                    {
                        data: 'number_of_vacancies',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5>';
                        }

                    },
                    {
                        data: 'service_type',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Top Job':
                                    statusClass = "success";
                                    break;
                                case 'Hot Job':
                                    statusClass = "warning";
                                    break;
                                case 'Featured Job':
                                    statusClass = "danger";
                                    break;
                                case 'Free Job':
                                    statusClass = "success";
                                    break;
                                case 'Newspaper Job':
                                    statusClass = "info";
                                    break;
                                case 'Other Job':
                                    statusClass = "info";
                                    break;
                                default:
                                    statusClass = "danger";
                            }

                            return '<h5><span class="badge badge-' + statusClass + '">' + data + '</span></h5>';
                        }
                    },
                    {
                        data: 'job_deadline',
                        render: function (data, type, row) {
                            return '<h5><span class="badge badge-info">' + data + '</span></h5>';
                        }
                    },
                    {
                        data: 'status',
                        render: function (data, type, row) {
                            var statusClass = '';
                            switch (data) {
                                case 'Active':
                                    statusClass = "success";
                                    break;
                                case 'Inactive':
                                    statusClass = "info";
                                    break;
                                case 'Pending':
                                    statusClass = "warning";
                                    break;
                                case 'Draft':
                                    statusClass = "danger";
                                    break;
                                default:
                                    statusClass = "info";
                            }

                            return '<h5><span class="badge badge-' + statusClass + ' badge-sm">' + data + '</span></h5>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(document).ready(function () {
            $('#tblApplication').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                searching: false,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('application.json') }}",
                columns: [
                    {
                        data: 'jobs',name:'jobs.title',
                        render: function (data, type, row) {
                            return '<h5>' + data.title + '</h5>';
                        }
                    },
                    {
                        data: 'jobseeker',name:'jobseeker.user.first_name',
                        render: function (data, type, row) {
                            return '<h5>' + data.user.first_name +' ' + data.user.last_name + '</h5>';
                        }
                    },
                    {
                        data: 'created_at',name:'created_at',
                        render: function (data, type, row) {
                            return '<h5>' + data + '</h5>';
                        }
                    },

                    {
                        data: 'jobs',name:'jobs.job_deadline',
                        render: function (data, type, row) {
                            var badge='success';
                            date= new Date().toISOString().slice(0,10);
                            if (data.job_deadline < date) {
                                badge='danger'
                            }
                            return '<h5><span class="badge badge-'+ badge+'">' + data.job_deadline + '</span></h5>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

    </script>

    <script>

        var $modal = $('#launchModal');

        $(document).on("click", ".btn-edit", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempurl = "{{ route('job-post.editjob',':id') }}";
            tempurl = tempurl.replace(':id', id);
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", "#edit_user_detail", function (e) {
            e.preventDefault();
            var tempurl = "{{ route('company.edit-user') }}";
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('submit', '#updateUser', function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var params = $('#updateUser').serializeArray();
            var formData = new FormData($('#updateUser')[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('company.update-user') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Job Updated Successfully',
                        type: 'blue',
                        typeAnimated: true,

                    });
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                        });
                    }
                },
                complete: function () {
                }
            });
        });

        $(document).on('submit', '#updateJob', function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var params = $('#updateJob').serializeArray();
            var formData = new FormData($('#updateJob')[0]);
            formData.append('id', $(this).attr('data-id'));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('job-post.updatejob') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#launchModal').modal('hide');
                    $.confirm({
                        closeIcon: true,
                        closeIconClass: 'fa fa-close',
                        title: 'Success!',
                        content: 'Job Updated Successfully',
                        type: 'blue',
                        typeAnimated: true,

                    });
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                        });
                    }
                },
                complete: function () {
                }
            });
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.confirm({

                title: 'Confirm Delete!',
                theme: 'bootstrap',
                icon: 'fa fa-warning',
                closeIconClass: 'fa fa-close',
                closeIcon: true,
                animation: 'scale',
                type: 'red',
                content: ' Are You Sure Want to Delete?',
                buttons: {
                    confirm: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function () {
                            var deleteUrl = "{{ route('job-post.destroy', ':id') }}";
                            deleteUrl = deleteUrl.replace(':id', id);
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "DELETE",
                                url: deleteUrl,
                                success: function (data) {
                                    $('#tblActive').DataTable().ajax.reload();
                                    $('#tblPending').DataTable().ajax.reload();
                                    $('#tblDraft').DataTable().ajax.reload();
                                    $('#tblExpired').DataTable().ajax.reload();
                                    $.confirm({
                                        closeIcon: true,
                                        closeIconClass: 'fa fa-close',
                                        title: 'Success!',
                                        content: data,
                                        type: 'blue',
                                        typeAnimated: true,
                                        buttons: {
                                            close: function () {
                                            }
                                        }
                                    });
                                },
                                complete: function () {
                                }
                            });
                        }
                    },


                    cancel: function () {
                    }
                }
            });
        });

        $(document).on("click", ".btn-view-application", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempurl = "{{ route('application.show',':id') }}";
            tempurl = tempurl.replace(':id', id);
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('click', '.btn-delete-application', function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.confirm({

                title: 'Confirm Delete!',
                theme: 'bootstrap',
                icon: 'fa fa-warning',
                closeIconClass: 'fa fa-close',
                closeIcon: true,
                animation: 'scale',
                type: 'red',
                content: ' Are You Sure Want to Delete?',
                buttons: {
                    confirm: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function () {
                            var deleteUrl = "{{ route('application.destroy', ':id') }}";
                            deleteUrl = deleteUrl.replace(':id', id);
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "DELETE",
                                url: deleteUrl,
                                success: function (data) {
                                    $('#tblApplication').DataTable().ajax.reload();
                                    $.confirm({
                                        closeIcon: true,
                                        closeIconClass: 'fa fa-close',
                                        title: 'Success!',
                                        content: data,
                                        type: 'blue',
                                        typeAnimated: true,
                                        buttons: {
                                            close: function () {
                                            }
                                        }
                                    });
                                },
                                complete: function () {
                                }
                            });
                        }
                    },


                    cancel: function () {
                    }
                }
            });
        });

    </script>


    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script type='text/javascript' src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type='text/javascript' src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>


@endsection
