@extends('admin.layouts.master')
@section('title')
    Blogs Management
@endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Blogs
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="{{ url('/admin/advertise') }}" disabled="">Blogs Management</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Blog Management </h3>
                    <button class="btn btn-xs btn-success" id="btn-add-blog"  data-toggle="modal"> <i class="fa fa-plus"></i> Add Blog</button>
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
                                <div class="table-responsive">
                                    <table id="blogTable" class="ui celled table" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Date</th>
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
            $('#blogTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('blogposts.json') }}",
                columnDefs: [
                    { width: 150, targets: 2 }
                ],
                fixedColumns: true,
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong> #ID_' + data + '</strong>';
                        }
                    },
                    {
                        data: 'title',name:'',
                        render: function (data, type, row) {
                            return '<strong>' + data+ '</strong>';
                        }
                    }, {
                        data: 'content',name:'',
                        render: function (data, type, row) {
                            return '<strong>' + data+ '</strong>';
                        }
                    },
                    {
                        data: 'image',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/blogs/thumbnails/') }}' + '/' + data + '" style="width:150px;height:auto;">';
                        }
                    },
                    {
                        data: 'status',name:'status',
                        render: function (data, type, row) {
                            return data == 'Active' ? '<button class="btn btn-xs btn-success btn-update-status"  data-id="' + row.id + '">Active</button>' : '<button class="btn btn-xs btn-danger btn-update-status"  data-id="' + row.id + '">Inactive</button>';
                        }
                    },

                    {
                        data: 'created_at',name:'created_at',
                        render: function (data, type, row) {
                            return '<label class="label label-danger">' + data + '</label>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    <script>
        var $modal = $('#quickView');
        $(document).on("click", "#btn-add-blog", function (e) {
            e.preventDefault();
            var tempEditUrl = "{{ route('blogposts.create') }}";
            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('submit','#blogForm', function (e) {
            e.preventDefault();
            var form = new FormData($('#blogForm')[0]);
            var params = $('#blogForm').serializeArray();
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
                url: "{{ route('blogposts.store') }}",
                contentType: false,
                processData: false,
                data: form,
                dataType: 'json',
                beforeSend: function (data) {
                },
                success: function (response) {
                    $('#quickView').modal('hide');
                    swal(response, 'Successfully Added', "success");
                    $('#blogTable').DataTable().ajax.reload();
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

        $(document).on("click", ".btn-edit-blog", function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var tempEditUrl = "{{ route('blogposts.edit', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("submit", "#blogUpdateForm", function (e) {
            e.preventDefault();
            var params = $('#blogUpdateForm').serializeArray();
            var formData = new FormData($('#blogUpdateForm')[0]);
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
                url:"{{ route('blogposts.update.blog') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Updated', "success");
                    $('#blogTable').DataTable().ajax.reload();
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
            var tempUrl = "{{ route('blogposts.status', ':id') }}";
            tempUrl = tempUrl.replace(':id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: tempUrl,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#blogTable').DataTable().ajax.reload();
                },
                complete: function () {
                }
            });

        });

        $(document).on('click', '.btn-delete-blog', function (e) {
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
                    var tempDeleteUrl = "{{ route('blogposts.destroy', ':id') }}";
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
                            $('#blogTable').DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });

        });
        
        $(document).on('click', '.btn-delete-image', function (e) {
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
                    var tempDeleteUrl = "{{ route('blogposts.delete.image', ':id') }}";
                    tempDeleteUrl = tempDeleteUrl.replace(':id', id);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "GET",
                        url: tempDeleteUrl,
                        success: function (data) {
                            if (data) {
                                swal("Success!", data, "success");
                            }
                        },
                        complete: function () {
                            $('#blogTable').DataTable().ajax.reload();
                            $('#quickView').modal('hide');
                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });

        });

    </script>

    <script type='text/javascript' src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>
    {{--<script type='text/javascript' src="{{ asset('assets/admin/js/semantic.min.js') }}"></script>--}}
@endsection


