@extends('admin.layouts.master')

@section('title')
    Industries
@endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Industries
                <small>list of all companies</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="{{ url('/admin/industries') }}" disabled="">Industries</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Industries</h3>
                    <button class="btn btn-xs btn-success" id="btn-add-industry" data-toggle="modal"
                            ><i class="fa fa-plus"></i> Add new Industry
                    </button>

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
                                <div class="table -responsive">
                                    <table id="industryTable" class="ui celled table" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Industries Title</th>
                                            <th>Status</th>
                                            <th>Top</th>
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

    <div class="modal fade" id="quickView" tabindex="-1" role="dialog" aria-labelledby="">

    </div>


@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#industryTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('industries.json') }}",
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
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    {
                        data: 'status',
                        // orderable: false,
                        render: function (data, type, row) {
                            return data == 'Active' ? '<button class="btn btn-xs btn-success btn-update-status"  data-id="' + row.id + '">Active</button>' : '<button class="btn btn-xs btn-danger btn-update-status"  data-id="' + row.id + '">Inactive</button>';
                        }
                    }, {
                        data: 'top',
                        // orderable: false,
                        render: function (data, type, row) {
                            return data == 'Yes' ? '<button class="btn btn-xs btn-success btn-top"  data-id="' + row.id + '">Yes</button>' : '<button class="btn btn-xs btn-danger btn-top"  data-id="' + row.id + '">No</button>';
                        }
                    },

                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        var $modal = $('#quickView');
        $(document).on("click", "#btn-add-industry", function (e) {
            e.preventDefault();
            var tempEditUrl = "{{ route('industries.create') }}";
            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", ".btn-edit", function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var tempEditUrl = "{{ route('industries.edit', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('submit','#industryForm', function (e) {
            e.preventDefault();
            var form = new FormData($('#industryForm')[0]);
            var params = $('#industryForm').serializeArray();
            $.each(params, function (i, val) {
                form.append(val.name, val.value)
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('industries.store') }}",
                contentType: false,
                processData: false,
                data: form,
                dataType: 'json',
                beforeSend: function (data) {
                },
                success: function (response) {
                    $('#quickView').modal('hide');
                    swal(response, 'Successfully Added', "success");
                    $('#industryTable').DataTable().ajax.reload();
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(5000));
                        });
                    }
                }
            });

        });

        $(document).on("click", ".btn-update-status", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('industries.status', ':id') }}";
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
                    $('#industryTable').DataTable().ajax.reload();
                },
                complete: function () {
                }
            });

        });

        $(document).on("click", ".btn-top", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('industries.top', ':id') }}";
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
                    $('#industryTable').DataTable().ajax.reload();
                },
                complete: function () {

                }
            });

        });

        $(document).on("submit", "#industryUpdateForm", function (e) {
            e.preventDefault();
            var params = $('#industryUpdateForm').serializeArray();
            var formData = new FormData($('#industryUpdateForm')[0]);
            formData.append('id', $(this).attr('data-id'));

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
                url:"{{ route('industries.update.industry') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Updated', "success");
                    $('#industryTable').DataTable().ajax.reload();
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
                    $('#quickView').modal('hide');
                    $('#industryTable').DataTable().ajax.reload();
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
                    var tempDeleteUrl = "{{ route('industries.destroy', ':id') }}";
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
                            $('#industryTable').DataTable().ajax.reload();
                        },
                        error: function (response) {
                            console.log(response);
                            swal("Warning", response.responseJSON ,'error');
                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });

        });

    </script>

    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>
    {{--    <script type='text/javascript' src="{{ asset('assets/admin/js/semantic.min.js') }}"></script>--}}
@endsection


