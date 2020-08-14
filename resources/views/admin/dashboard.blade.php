@extends('admin.layouts.master')
@section('title')
    Dashboard
@endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control Panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>@isset($jpcount) {{ $jpcount }} @endisset</h3>
                            <p>Total Posted Jobs</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-suitcase"></i>
                        </div>
                        <a href="{{ url('admin/job-posts') }}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>@isset($jscount) {{ $jscount }} @endisset</h3>

                            <p>Active JobSeekers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ url('admin/jobseekers') }}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>@isset($empcount) {{ $empcount }} @endisset</h3>
                            <p>Active Employers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-university"></i>
                        </div>
                        <a href="{{ url('admin/employers') }}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>@isset($appcount) {{ $appcount }} @endisset</h3>

                            <p>Job Applications</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <a href="{{ url('admin/jobapplications') }}" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Job Posts</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <section class="content">
                        <div class="table">
                            <table id="recentJobs" class="ui celled table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Job Title</th>
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    <th>Required No.</th>
                                    <th>Deadline</th>
                                    <th>Job Location</th>
                                    <th>Company</th>
                                    <th>Industry</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="row">
                            <section class="col-lg-7 connectedSortable">
                            </section>

                            <section class="col-lg-5 connectedSortable">
                            </section>
                        </div>
                    </section>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" style="">
                        <a href="{{ route('job-posts.index') }}" class="btn btn-sm btn-info btn-flat pull-right">View All
                            JobPosts</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </section>
    </div>
@endsection
@section('extra_scripts')
    {{--<script type='text/javascript' src="{{ asset('assets/admin/js/dashboard.js') }}"></script>--}}

    <script>
        $(document).ready(function () {
            $('#recentJobs').DataTable({
                aaSorting:[0,'desc'],
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.recentjson') }}",
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong> #ID_' + data + '</strong>';
                        }
                    },
                    {
                        data: 'title',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/jobs/') }}/' + row.slug + '"  data-id="' + row.id + '" target="_blank"><strong>' + data + '</strong></a>';
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

                            return '<span class="label label-' + statusClass + '">' + data + '</span>';
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

                            return '<span class="label label-' + statusClass + '">' + data + '</span>';
                        }
                    },
                    {
                        data: 'number_of_vacancies',
                        render: function (data, type, row) {
                            return '<label class="btn-xs btn-info text-center">' + data + '</label>';
                        }

                    },
                    {
                        data: 'job_deadline',
                        render: function (data, type, row) {
                            return '<label class="label label-danger">' + data + '</label>';
                        }
                    },
                    {
                        data: 'location',
                        render: function (data, type, row) {
                            return '<label>' + data + '</label>';
                        }

                    },
                    {
                        data: 'company',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/companies/') }}/' + data.slug + '"  data-id="' + data.id + '" target="_blank">' + data.title + '</a>';
                        }
                    },
                    {
                        data: 'industry',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/industries/') }}/' + data.slug + '"  data-id="' + data.id + '" target="_blank">' + data.title + '</a>';
                        }
                    }
                ]
            });
        });
    </script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>


@endsection

