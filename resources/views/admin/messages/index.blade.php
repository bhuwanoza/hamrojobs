@extends('admin.layouts.master')
@section('title')
Contact Messages @endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Contact Us Messages
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
                            <table id="messageTable" class="ui celled table" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Messenger Name</th>
                                    <th>Subject</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Messages</th>
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
         aria-labelledby="">

    </div>

@endsection
@section('extra_scripts')
    <script>
        $(document).ready(function () {
            $('#messageTable').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('messages.json') }}",
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            return '<strong> #ID_' + data + '</strong>';
                        }
                    },
                    {
                        data: 'fullname',
                        render: function (data, type, row) {
                            return '<strong>' + data + '</strong>';
                        }
                    },
                    {
                        data: 'subject',name:'subject'
                    },
                    {
                        data: 'email',
                        render: function (data, type, row) {
                            return '<a href="mailto:'+data +'"> ' + data + '</a>';
                        }
                    },
                    {
                        data: 'mobile',
                        render: function (data, type, row) {
                            return '<a href="tel:'+data +'"> ' + data + '</a>';
                        }
                    },
                    {
                        data: 'message',
                        render: function (data, type, row) {
                            return '<p>' + data + '</p>';
                        }

                    },
                    {
                         data: 'status',
                         render: function (data, type, row) {
                             return data == 'Seen' ? '<button class="btn btn-xs btn-success btn-update-status"  data-id="' + row.id + '">Seen</button>' : '<button class="btn btn-xs btn-danger btn-update-status"  data-id="' + row.id + '">Unseen</button>';
                         }
                     },

                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        var $modal = $('#quickView');



        $(document).on("click", ".btn-update-status", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempEditUrl = "{{ route('messages.status', ':id') }}";
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
                    swal("Success!", data, "success");
                },
                complete: function () {
                    $('#messageTable').DataTable().ajax.reload();
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
                    var tempDeleteUrl = "{{ route('messages.destroy', ':id') }}";
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
                            $('#messageTable').DataTable().ajax.reload();
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


