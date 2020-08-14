@extends('admin.layouts.master')

@section('title')
    JobSeekers
@endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                JobSeekers
                <small>All listed JobSeekers</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="{{ url('/admin/jobseekers') }}">JobSeekers</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">JobSeekers</h3>
                    <button class="btn btn-xs btn-success " id="btn-add-jobseeker"> <i class="fa fa-plus"></i> Add New JobSeekers</button>


                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table -responsive">
                                    <table id="jobSeekerTable" class="ui celled table" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Picture</th>
                                            <th>Status</th>
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
                    Footer
                </div>
            </div>
        </section>
    </div>

    <div class="modal  {{--bs-example-modal-lg--}}" id="quickView" tabindex="-1" role="dialog"
         aria-labelledby="{{--myLargeModalLabel--}}">

    </div>

@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#jobSeekerTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('jobseekers.json') }}",
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
                        data: 'user_image',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/jobseekers/thumbnails/') }}' + '/' + data + '" style="width:100%;height:80%;">';
                        }
                    },

                    {
                        data: 'jobseeker',
                        orderable: false,
                        render: function (data, type, row) {
                            return data.status == 'Active' ? '<button class="btn btn-xs btn-success btn-update-status"  data-id="' + data.id + '">Active</button>' : '<button class="btn btn-xs btn-danger btn-update-status"  data-id="' + data.id + '">Inactive</button>';
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
    </script>
    <script>

        var $modal = $('#quickView');
        $(document).on("click", "#btn-add-jobseeker", function (e) {
            e.preventDefault();
            var tempEditUrl = "{{ route('jobseekers.create') }}";
            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", ".btn-edit", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('jobseekers.edit', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal({show: true});
            });
        });

        $(document).on('submit','#addJobseekerForm',function(e){
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#addJobseekerForm')[0]);
            var params = $('#addJobseekerForm').serializeArray();
            var type="POST";
            var myUrl="{{ route('jobseekers.store') }}";

            $.each(params, function (i, val) {
                form.append(val.name, val.value)
            });
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
                    $('#jobSeekerTable').DataTable().ajax.reload();
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color: red;">'+error[0]+'</span>').fadeOut(15000));
                        });
                    }
                    else {
                        $('#error-message').text(response.responseJSON.message);
                        $('#notify-error').show().fadeOut(10000);
                    }
                }
            });
        });

        $(document).on("submit", "#updateJobseekerForm", function (e) {
            e.preventDefault();
            var params = $('#updateJobseekerForm').serializeArray();
            var formData = new FormData($('#updateJobseekerForm')[0]);

            formData.append('id', $(this).attr('data-id'));
            if ($('#user_image').val()) {
                formData.append('user_image', $('input[type=file]')[0].files[0]);
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
                url:"{{ route('jobseekers.update.jobseeker') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Updated', "success");
                    $('#jobSeekerTable').DataTable().ajax.reload();
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color: red;">'+error[0]+'</span>').fadeOut(15000));
                        });
                    }
                },
                complete: function () {

                }
            });
        });

        $(document).on("click", ".btn-update-status", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('jobseekers.status', ':id') }}";
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
                    $('#jobSeekerTable').DataTable().ajax.reload();
                },
                complete: function () {

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
                    var tempDeleteUrl = "{{ route('jobseekers.destroy', ':id') }}";
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
                            $('#jobSeekerTable').DataTable().ajax.reload();
                        },
                        complete: function () {
                        },
                        error: function () {
                            swal("Warning",response.responseJSON.message,'warning');
                        }
                    });
                }
            });

        });

    </script>

    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>
    {{--<script type='text/javascript' src="{{ asset('assets/admin/js/semantic.min.js') }}"></script>--}}
@endsection


