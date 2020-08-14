@extends('admin.layouts.master')
@section('title')
    Users  @endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Users
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="">Users</li>
            </ol>
        </section>
        <section class="content">
            {{--User--}}
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Users </h3>
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
                            <table id="userTable" class="ui celled table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th>Role</th>
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

            {{--Admin--}}
            <div class="box">
                <div class="box-header">

                    <h3 class="box-title">All Administrators </h3>


                    <div class="box-tools pull-right" >
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                    <div>
                        <button type="button" id="add-admin" class="btn btn-success" style="display: inline-block;">
                            <i class="fa fa-plus"></i> Add Admin
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <section class="content">
                        <div class="table">
                            <table id="adminTable" class="ui celled table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Address</th>
                                    <th>Role</th>
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

    <div class="modal" id="quickView" tabindex="-1" role="dialog"
         aria-labelledby="">
    </div>

@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('users.json') }}",
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    {
                        data: 'first_name',name:'first_name',
                        render: function (data, type, row) {
                            return '<h5>' + row.first_name +' '+ row.last_name+ '</h5>';
                        }
                    },
                    {
                        data: 'email',name:'email',
                        render: function (data, type, row) {
                            return '<a href="mailto:'+data +'"> ' + data + '</a>';
                        }
                    },
                    {
                        data: 'mobile',name:'mobile',
                        render: function (data, type, row) {
                            return '<a href="tel:'+data +'"> ' + data + '</a>';
                        }
                    },
                    {
                        data: 'address',name:'address',
                        render: function (data, type, row) {
                            return '<p>' + data + '</p>';
                        }

                    },
                    {
                        data: 'role',name:'role',
                        render: function (data, type, row) {
                            return '<h5>' + data + '</h5>';
                        }

                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        $(document).ready(function () {
            $('#adminTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('users.json1') }}",
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    {
                        data: 'first_name',name:'first_name',
                        render: function (data, type, row) {
                            return '<h5>' + row.first_name +' '+ row.last_name+ '</h5>';
                        }
                    },
                    {
                        data: 'email',name:'email',
                        render: function (data, type, row) {
                            return '<a href="mailto:'+data +'"> ' + data + '</a>';
                        }
                    },
                    {
                        data: 'mobile',name:'mobile',
                        render: function (data, type, row) {
                            return '<a href="tel:'+data +'"> ' + data + '</a>';
                        }
                    },
                    {
                        data: 'address',name:'address',
                        render: function (data, type, row) {
                            return '<p>' + data + '</p>';
                        }

                    },
                    {
                        data: 'role',name:'role',
                        render: function (data, type, row) {
                            return '<h5>' + data + '</h5>';
                        }

                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


        var $modal = $('#quickView');

        $(document).on("click", ".btn-view", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('users.show', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);

            $modal.load(tempEditUrl, function (response) {
                $modal.modal({show: true});
            });
        });
        $(document).on("click", "#add-admin", function (e) {
            e.preventDefault();
            var tempEditUrl = "{{ route('users.addAdmin') }}";
            $modal.load(tempEditUrl, function (response) {
                $modal.modal({show: true});
            });
        });


        $(document).on('submit','#saveAdmin',function(e){
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#saveAdmin')[0]);
            var params = $('#saveAdmin').serializeArray();
            var myUrl="{{ route('users.store') }}";

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
                url: myUrl,
                contentType: false,
                processData: false,
                data: form,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Added', "success");
                    $('#adminTable').DataTable().ajax.reload();
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="'+i+'"]');
                            el.after($('<span style="color: red;">'+error[0]+'</span>').fadeOut(15000));
                        });
                    }
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
                    var tempDeleteUrl = "{{ route('users.destroy', ':id') }}";
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
                            $('#adminTable').DataTable().ajax.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });

        });





    </script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/ckeditor.js') }}"></script>

    <script type='text/javascript' src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/admin/js/dataTables.semanticui.min.js') }}"></script>
    {{--    <script type='text/javascript' src="{{ asset('assets/admin/js/semantic.min.js') }}"></script>--}}

    <script type='text/javascript' src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>




@endsection


