@extends('admin.layouts.master')

@section('title')
    Companies
@endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Companies
                <small>list of all companies</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="{{ url('/admin/companies') }}" disabled="">Companies</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Comapnies</h3>

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
                                    <table id="companyTable" class="ui celled table" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Company Title</th>
                                            <th>Industry</th>
                                            <th>Logo</th>
                                            <th>Cover Image</th>
                                            <th>Job Posts</th>
                                            <th>Status</th>
                                            <th>Top Company</th>
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
    <div class="modal" id="quickView" tabindex="-1" role="dialog"
         aria-labelledby="quickView">
    </div>
@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#companyTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('companies.json') }}",
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
                        data: 'industry_name',
                        render: function (data, type, row) {
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    {
                        data: 'logo',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/companies/logos/thumbnails/') }}' + '/' + data + '" style="width:100%;height:auto;">';
                        }
                    }, {
                        data: 'cover_image',
                        orderable: false,
                        render: function (data, type, row) {
                            return '<img src="{{ asset('/uploads/companies/covers/thumbnails/') }}' + '/' + data + '" style="width:100%;height:auto;">';
                        }
                    },
                    {
                        data: 'jobcount',
                        render: function (data, type, row) {
                            return '<label class="label col-form-label-lg label-warning ">' + data + '</label>';
                        }
                    },
                    {
                        data: 'status',
                        render: function (data, type, row) {
                            return data == 'Active' ? '<button class="btn btn-xs btn-success btn-update-status"  data-id="' + row.id + '">Active</button>' : '<button class="btn btn-xs btn-danger btn-update-status"  data-id="' + row.id + '">Inactive</button>';
                        }
                    },
                    {
                        data: 'top_company',
                        orderable: false,
                        render: function (data, type, row) {
                            return data == 'Yes' ? '<button class="btn btn-xs btn-success btn-top-company"  data-id="' + row.id + '">Yes</button>' : '<button class="btn btn-xs btn-danger btn-top-company"  data-id="' + row.id + '">No</button>';
                        }
                    },
                    {
                        data: 'email',
                        render: function (data, type, row) {
                            return '<a href="mailto:' + row.email + '">' + row.email + '</a>';
                        }
                    },
                    {
                        data: 'phone',
                        render: function (data, type, row) {
                            return '<a href="tel:' + row.phone + '">' + row.phone + '</a>';
                        }
                    },
                    {data: 'address', name: 'address'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        var $modal = $('#quickView');
        $(document).on("click", ".btn-edit", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('companies.edit', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", ".btn-update-status", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('companies.status', ':id') }}";
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
                    $('#companyTable').DataTable().ajax.reload();
                }
            });
        });

        $(document).on("click", ".btn-top-company", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('companies.topcompany', ':id') }}";
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
                    $('#companyTable').DataTable().ajax.reload();
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
                    var tempDeleteUrl = "{{ route('companies.destroy', ':id') }}";
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
                            $('#companyTable').DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });
        });

        $(document).on("submit", "#updateCompanyForm", function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var params = $('#updateCompanyForm').serializeArray();
            var formData = new FormData($('#updateCompanyForm')[0]);

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
                url: "{{ route('companies.update.company') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Updated', "success");
                    $('#companyTable').DataTable().ajax.reload();
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
                    $('#quickView').modal('hide');
                    $('#companyTable').DataTable().ajax.reload();
                }
            });
        });
    </script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

@endsection


