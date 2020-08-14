@extends('admin.layouts.master')
@section('title')
    Job Application Lists
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
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="">Applications</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Job Applications for "{{ $job->title }}"</h3>

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
                                    <th>Job Seeker</th>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Service Type</th>
                                    <th>Application Date</th>
                                    <th>Deadline</th>
                                    {{--<th>Status</th>--}}
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

    <div class="modal" id="quickView" tabindex="-1" role="dialog" aria-labelledby=""> </div>

@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#jobApplicationTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('jobapplications.json', $job->id) }}",
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong> #ID_' + data + '</strong>';
                        }
                    },
                    {
                        data: 'jobseeker',name:'jobseeker.user.first_name',
                        render: function (data, type, row) {
                            return '<strong>' + data.user.first_name +' ' + data.user.last_name + '</strong>';
                        }
                    },
                    {
                        data: 'jobs', name:'jobs.title',
                        render: function (data, type, row) {
                            return '<strong>' + data.title + '</strong>';
                        }
                    },
                    {
                        data: 'company',name:'company.title',
                        render: function (data, type, row) {
                            return '<strong>' + data.title + '</strong>';
                        }
                    },
                    {
                        data: 'jobs', name:'jobs.service_type',
                        render: function (data, type, row) {
                            return '<label class="label col-form-label-lg label-warning ">' + data.service_type + '</label>';
                        }
                    },
                    {
                        data: 'created_at', name:'created_at',
                        render: function (data, type, row) {
                            return '<label class="label col-form-label-lg label-warning ">' +  data + '</label>';
                        }
                    },
                    {
                        data: 'jobs',name:'jobs.job_deadline',
                        render: function (data, type, row) {
                            return '<label class="label col-form-label-lg label-danger ">' + data.job_deadline + '</label>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(document).on('click', '.btn-delete-application', function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            swal({
                title: "Are you sure want to Delete?",
                text: "Once deleted, you will not be able to recover !",
                icon: "error",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var tempDeleteUrl = "{{ route('jobapplications.destroy', ':id') }}";
                    tempDeleteUrl = tempDeleteUrl.replace(':id', id);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: tempDeleteUrl,
                        success: function (data) {
                            if (data) {
                                swal("Success!", data, "success");
                            }
                        },
                        complete: function () {
                            $('#jobApplicationTable').DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });
        });

        var $modal = $('#quickView');
        $(document).on("click", ".btn-view-application", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempurl = "{{ route('jobapplications.show',':id') }}";
            tempurl = tempurl.replace(':id', id);
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

    </script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>
    {{--<script type='text/javascript' src="{{ asset('assets/admin/js/semantic.min.js') }}"></script>--}}


@endsection


