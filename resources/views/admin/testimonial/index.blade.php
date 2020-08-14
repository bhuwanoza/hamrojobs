@extends('admin.layouts.master')
@section('title')
    Testimonial Management
@endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Testimonial
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="{{ route('testimonial.index') }}" disabled="">Testimonial Management</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Testimonial Management </h3>
                    <button class="btn btn-xs btn-success" id="btn-add-testimonial"  data-toggle="modal"> <i class="fa fa-plus"></i> Add New</button>
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
                                    <table id="testimonialTable" class="ui celled table" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title  </th>
                                            <th>Position</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Status</th>
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
            $('#testimonialTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('testimonial.json') }}",
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong> #ID_' + data + '</strong>';
                        }
                    },
                    {
                        data: 'title',name:'title',
                        render: function (data, type, row) {
                            return '<strong>' + data+ '</strong>';
                        }
                    },
                    {
                        data: 'position',name:'position',
                        render: function (data, type, row) {
                            return '<strong>' + data+ '</strong>';
                        }
                    },
                    {
                        data: 'image',name:'image',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/testimonials/thumbnails/') }}' + '/' + data + '" style="width:150px;height:auto;">';
                        }
                    },

                    {
                        data: 'description',name:'description',
                        render: function (data, type, row) {
                            return '<strong>' + data+ '</strong>';
                        }
                    },
                    {
                        data: 'status',name:'status',
                        render: function (data, type, row) {
                            return data == 'Active' ? '<button class="btn btn-xs btn-success btn-update-status"  data-id="' + row.id + '">Active</button>' : '<button class="btn btn-xs btn-danger btn-update-status"  data-id="' + row.id + '">Inactive</button>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
    <script>
        var $modal = $('#quickView');
        /* Brings modal for Adding new Advertise*/
        $(document).on("click", "#btn-add-testimonial", function (e) {
            e.preventDefault();
            var tempEditUrl = "{{ route('testimonial.create') }}";
            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('submit','#testimonialForm', function (e) {
            e.preventDefault();
            var form = new FormData($('#testimonialForm')[0]);
            var params = $('#testimonialForm').serializeArray();
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
                url: "{{ route('testimonial.store') }}",
                contentType: false,
                processData: false,
                data: form,
                dataType: 'json',
                beforeSend: function (data) {
                },
                success: function (response) {
                    $('#quickView').modal('hide');
                    swal(response, 'Successfully Added', "success");
                    $('#testimonialTable').DataTable().ajax.reload();
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

        $(document).on("click", ".btn-edit", function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var tempEditUrl = "{{ route('testimonial.edit', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("submit", "#testimonialUpdateForm", function (e) {
            e.preventDefault();
            var params = $('#testimonialUpdateForm').serializeArray();
            var formData = new FormData($('#testimonialUpdateForm')[0]);
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
                url:"{{ route('testimonial.update.testimonial') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Updated', "success");
                    $('#testimonialTable').DataTable().ajax.reload();
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
            var tempEditUrl = "{{ route('testimonial.status', ':id') }}";
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
                    $('#testimonialTable').DataTable().ajax.reload();
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
                    var tempDeleteUrl = "{{ route('testimonial.destroy', ':id') }}";
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
                            $('#testimonialTable').DataTable().ajax.reload();
                        },
                        complete: function () {
                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });

        });

    </script>

    <script>
        CKEDITOR.replace('testimonial_description');
    </script>

    <script type='text/javascript' src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>


    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>
{{--    <script type='text/javascript' src="{{ asset('assets/admin/js/semantic.min.js') }}"></script>--}}
@endsection


