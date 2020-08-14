@extends('admin.layouts.master')

@section('title')
    Employers
@endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Employers
                <small>All listed employers</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="{{ url('/admin/employers') }}">Employers</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Employers</h3>
                    <button class="btn btn-xs btn-success btn-add-employer"><i class="fa fa-plus"></i> Add New Employer
                    </button>
                    <hr>
                    <style>
                        .blink_me {
                            animation: blinker 1s linear 10000;
                        }
                        @keyframes blinker {
                            50% {
                                opacity: 0;
                            }
                        }
                    </style>
                    <p class="label-warning text-center blink_me" style="animation: blinker 1s linear infinite;"> <strong>Deleting "Employers" leads to delete belonging "Company","Job Posts" and "Saved Jobs".</strong></p>

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
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="employerTable" class="ui celled table" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Employer Name</th>
                                            <th>Company</th>
                                            <th>Status</th>
                                            <th>Top Employer</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <section class="col-lg-7 connectedSortable">
                            </section>

                            <section class="col-lg-5 connectedSortable">
                            </section>
                        </div>
                    </section>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </section>
    </div>

    <div class="modal  {{--bs-example-modal-lg--}}" id="quickView" tabindex="-1" role="dialog"
         aria-labelledby="quickView">

    </div>

@endsection
@section('extra_scripts')

    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>
    {{--<script type='text/javascript' src="{{ asset('assets/admin/js/semantic.min.js') }}"></script>--}}

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#employerTable').DataTable({
                aaSorting: [0, 'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('employers.json') }}",
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong> #ID_' + data + '</strong>';
                        }
                    },
                    {
                        data: 'first_name',
                        render: function (data, type, row) {
                            return '<strong>' + row.first_name + '  ' + row.last_name + '</strong>';
                        }
                    },

                    {
                        data: 'company', name: 'company',
                        render: function (data, type, row) {
                            return data == 'No' ? '<span class="label label-danger"><i class="fa fa-info-circle"></i>Not Registered</span>' : '<span class="label label-success">' + data.title + '</span>';
                        }

                    },
                    {
                        data: 'employer',
                        orderable: false,
                        render: function (data, type, row) {
                            return data.status == 'Active' ? '<button class="btn btn-xs btn-success btn-update-status"  data-id="' + data.id + '">Active</button>' : '<button class="btn btn-xs btn-danger btn-update-status"  data-id="' + data.id + '">Inactive</button>';
                        }
                    },
                    {
                        data: 'employer',
                        orderable: false,
                        render: function (data, type, row) {
                            return data.top_employer == 'Yes' ? '<button class="btn btn-xs btn-success btn-top-employer"  data-id="' + data.id + '">YES</button>' : '<button class="btn btn-xs btn-danger btn-top-employer"  data-id="' + data.id + '">NO</button>';
                        }
                    },
                    {
                        data: 'email',
                        render: function (data, type, row) {
                            return '<a href="mailto:' + row.email + '">' + row.email + '</a>';
                        }
                    },
                    {
                        data: 'mobile',
                        render: function (data, type, row) {
                            return '<a href="tel:' + row.mobile + '">' + row.mobile + '</a>';
                        }
                    },
                    {data: 'address', name: 'address'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        var $modal = $('#quickView');
        $(document).on('click', '.btn-add-employer', function (e) {
            e.preventDefault();
            var tempEditUrl = "{{ route('employers.create') }}";
            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('click', '.btn-edit', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var tempEditUrl = "{{ route('employers.edit', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('submit', '#addEmployerForm', function (e) {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#addEmployerForm')[0]);
            var params = $('#addEmployerForm').serializeArray();
            var type = "POST";
            var myUrl = "{{ route('employers.store') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: type,
                url: myUrl,
                contentType: false,
                processData: false,
                data: form,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Added', "success");
                    $('#employerTable').DataTable().ajax.reload();
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

        $(document).on('submit', '#updateEmployerForm', function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var params = $('#updateEmployerForm').serializeArray();
            var formData = new FormData($('#updateEmployerForm')[0]);

            formData.append('id', $(this).attr('data-id'));
            if ($('#company_logo').val()) {
                formData.append('company_logo', $('input[type=file]')[0].files[0]);
            }
            if ($('#company_banner').val()) {
                formData.append('company_banner', $('input[type=file]')[0].files[0]);
            }

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('employers.update.employer') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Updated', "success");
                    $('#employerTable').DataTable().ajax.reload();
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

        $(document).on('click', '.btn-update-status', function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('employers.status', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: tempEditUrl,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function (data) {
                },
                success: function (data) {

                },
                complete: function () {
                    $('#employerTable').DataTable().ajax.reload();
                }
            });

        });

        $(document).on('click', '.btn-top-employer', function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('employers.topemployer', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: tempEditUrl,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function (data) {
                },
                success: function (data) {

                },
                complete: function () {
                    $('#employerTable').DataTable().ajax.reload();
                }
            });

        });

        $(document).on('click', '.btn-delete', function (e) {
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
                    var tempDeleteUrl = "{{ route('employers.destroy', ':id') }}";
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
                            $('#employerTable').DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });
        });

    </script>

@endsection


