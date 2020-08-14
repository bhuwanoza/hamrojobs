@extends('admin.layouts.master')
@section('title')
    Job Posts
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
                Posted Jobs
                <small>All listed posted Jobs</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="">Jobs</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Job Posts</h3>
                    <button class="btn btn-xs btn-success btn-add-job"><i class="fa fa-plus"></i> Add New Job
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
                        <div class="table">
                            <table id="jobTable" class="ui celled table" cellspacing="0">
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
                <div class="box-footer">
                    Footer
                </div>
            </div>
        </section>
    </div>

    <div class="modal" id="quickView" tabindex="-1" role="dialog"
         aria-labelledby="">
    </div>

@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#jobTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('job-posts.json') }}",
                columnDefs: [
                    {target: "9", width: "30%"}   
                ],
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
                        data: 'service_type',name:'service_type',
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
                            return '<label style="word-break: break-word;ms-word-break: break-word;min-width: 100px;">' + data + '</label>';
                        }

                    },
                    {
                        data: 'company',name:'company.title',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/companies/') }}/' + data.slug + '"  data-id="' + data.id + '" target="_blank">' + data.title + '</a>';
                        }
                    },
                    {
                        data: 'industry',name:'industry.title',
                        render: function (data, type, row) {
                            return '<a href="{{ url('/industries/') }}/' + data.slug + '"  data-id="' + data.id + '" target="_blank" style="word-break: break-word;ms-word-break: break-word;min-width: 100px;">' + data.title + '</a>';
                        }
                    },
                  

                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        var $modal = $('#quickView');
        $(document).on("click", ".btn-add-job", function (e) {
            e.preventDefault();
            var tempCreateurl = "{{ route('job-posts.create') }}";
            $modal.load(tempCreateurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on("click", ".btn-edit", function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var tempEditUrl = "{{ route('job-posts.edit', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('submit','#addJobForm',function(e){
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var params = $('#addJobForm').serializeArray();
            var form = new FormData($('#addJobForm')[0]);

            if ($('#job_banner').val()) {
                form.append('job_banner', $('input[type=file]')[0].files[0]);
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('job-posts.store') }}",
                contentType: false,
                processData: false,
                data: form,
                beforeSend: function (data) {
                    $('#loader').show()
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Added', "success");
                    $('#jobTable').DataTable().ajax.reload();
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            $('html, body').animate({
                                scrollTop: $(document).find('[name="'+i+'"]').offset().top-30
                            }, 2000);
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color: red;">'+error[0]+'</span>').fadeOut(15000));
                        });
                    }
                    swal(err, 'Error', "warning");
                },
                complete:function(data){
                    $('#loader').hide()
                }
            });
        });

        $(document).on("submit", "#editJobForm", function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var params = $('#editJobForm').serializeArray();
            var formData = new FormData($('#editJobForm')[0]);

            formData.append('id', $(this).attr('data-id'));
            if ($('#job_banner').val()) {
                formData.append('job_banner', $('input[type=file]')[0].files[0]);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url:"{{ route('job-posts.update.job') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                    $('#loader').show()
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Updated', "success");
                    $('#jobTable').DataTable().ajax.reload();
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
                    $('#loader').hide()
                }
            });
        });

        $(document).on("click", ".btn-update-status", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('job-posts.status', ':id') }}";
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
                    $('#jobTable').DataTable().ajax.reload();
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
                    var tempDeleteUrl = "{{ route('job-posts.destroy', ':id') }}";
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
                            $('#jobTable').DataTable().ajax.reload();
                            if (data) {
                                swal("Success!", data, "success");
                            }
                        },
                        complete: function () {

                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });
        });

        // $("#checkbox-container :checkbox").on("", function(){

        $(document).on('change','input[name="salary_type"]',function(e){
                var val = $(this).val();
                if (val == "Range") {
                    $('#min_salary_div').show();
                    $('#max_salary_div').show();
                }
                if (val == "Fixed") {
                    $('#min_salary_div').show();
                    $('#max_salary_div').hide();
                }
                if (val == "Negotiable") {
                    $('#min_salary_div').hide();
                    $('#max_salary_div').hide();
                }

        });

    </script>
    <script type='text/javascript' src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>




@endsection


