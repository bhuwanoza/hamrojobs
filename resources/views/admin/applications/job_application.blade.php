@extends('admin.layouts.master')
@section('title')
    Job Applications
@endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Job Applications
                <small>All Applications</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="">Applications</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Job Applications</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <section class="content">
                        <div class="table">
                            <table id="jobApplicationTable" class="ui celled table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Service Type</th>
                                    <th>No of Applications</th>
                                    <th>Deadline</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#jobApplicationTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('job_applications.json') }}",
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong> #ID_' + data + '</strong>';
                        }
                    },
                    {
                        data: 'title', name:'title',
                        render: function (data, type, row) {
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    {
                        data: 'company_name',name:'company_name',
                        render: function (data, type, row) {
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    {
                        data: 'service_type', name:'service_type',
                        render: function (data, type, row) {
                            return '<label class="label col-form-label-lg label-warning ">' + data + '</label>';
                        }
                    },
                    {
                        data: 'count', name:'count',
                        render: function (data, type, row) {
                            var tempViewUrl = "{{ route('export.excel', ':id') }}";
                            tempViewUrl = tempViewUrl.replace(':id', row.id);
                            return '<label class="label col-form-label-lg label-success ">' +  data + '</label> <a href="' + tempViewUrl + '" class="btn btn-xs btn-default">Excel</a>';
                        }
                    },
                    {
                        data: 'job_deadline',name:'job_deadline',
                        render: function (data, type, row) {
                            return '<label class="label col-form-label-lg label-danger ">' + data + '</label>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

    </script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>
    {{--<script type='text/javascript' src="{{ asset('assets/admin/js/semantic.min.js') }}"></script>--}}


@endsection


