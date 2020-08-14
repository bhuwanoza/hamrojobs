@extends('layouts.master')
@section('title')
    @if(isset($company))
        {{ $company->title }}
    @endif
@endsection
@section('styles')

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" type="text/css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css" type="text/css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.semanticui.min.css" type="text/css">--}}

    {{--    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">--}}
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection

@section('content')
    <style>
    </style>
    <section class="job-detail" id="company-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="header-detail  box--shadow">
                        <div class="cover-banner relative">

                            @if(file_exists(public_path('uploads/companies/covers/' . $company->cover_image)))
                                <img class="img-fluid img-responsive "
                                     src="{{ asset('uploads/companies/covers/' . $company->cover_image) }}"
                                     alt="" style="height: 250px">
                            @else
                                <img class="img-fluid img-responsive "
                                     src="{{ asset('uploads/default/default-company-cover.png') }}"
                                     alt="" style="height: 250px">
                            @endif

                            <div class="overlap">
                                <form action="" enctype="multipart/form-data" id="coverForm">
                                    {{ csrf_field() }}
                                    <input type="file" name="cover_image" id="cover_image" hidden>
                                </form>

                                <label for="cover_image" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>change
                                </label>
                            </div>
                        </div>

                        <div class="clearfix">
                            <div class="meta">
                                <span>
                                    <a class="btn  btn-default btn-sm" href="mailto:{{ $company->email }}">
                                        <i class="fa fa-envelope"></i> Email
                                    </a>
                                </span>
                                <span>
                                    <a class="btn btn-sm btn-success float-right"
                                       href="{{ route('job-post.index') }}">
                                        <i class="fa fa-plus"></i>
                                        Post New Job
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <aside>
                        <div class="sidebar">
                            <div class="box box--shadow">
                                <div class="p-3">
                                    <div class="profile-img relative">
                                        @if(file_exists('uploads/companies/logos/' . $company->logo))
                                            <img class="img-rounded img-responsive center"
                                                 src="{{ asset('uploads/companies/logos/' . $company->logo) }}"
                                                 alt="" style="height: 200px; width: 260px">
                                        @else
                                            <img class="img-rounded img-responsive center"
                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                 alt="" style="height: 200px; width: 260px">
                                        @endif
                                        <div class="overlap">
                                            <form action="" enctype="multipart/form-data" id="logoForm">
                                                {{ csrf_field() }}
                                                <input type="file" name="logo_image" id="logo_image" hidden>
                                            </form>
                                            <label for="logo_image" class="btn btn-info btn-sm" id="upload_logo">
                                                <i class="fa fa-edit"></i>change
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center"><h3>{{ $company->title }}</h3></div>
                                </div>
                                <ul>
                                    <li class="relative">
                                        <span><i class="fas fa-industry"></i>
                                            {{ $company->industry->title }}
                                        </span>
                                        <a class="info-edit" id="edit_company_detail">
                                            <i class="far fa-edit"
                                               style="position:absolute;top:10px; right:10px;">
                                            </i>
                                        </a>
                                        <span><i class="fa fa-map-marker"></i>{{ $company->address }}</span>
                                        <span><i class="fa fa-envelope"></i><a
                                                    href="mailto:{{ $company->email }}"> {{ $company->email }}</a></span>
                                        <span><i class="fa fa-phone"></i><a
                                                    href="tel:{{ $company->phone }}">{{ $company->phone }}</a></span>
                                        <span><i class="fa fa-globe"></i><a
                                                    href="{{ $company->website }}">{{ $company->website }}</a></span>
                                        <span><i class="fa fa-star"></i> Job Posts ({{ $company->jobposts->count() }}
                                            )</span>
                                        <span><i class="fa fa-calendar"></i>Joined ({{ $company->user->created_at->diffForHumans() }}
                                            )</span>
                                        <hr>
                                        <h5 class="m-2"><span> About Us</span></h5>
                                        <div class="m-2">
                                            {!! $company->description  !!}
                                        </div>
                                    </li>
                                    {{--<li>--}}
                                    {{--<h5>Medical Transcrption</h5>--}}
                                    {{--<span><i class="fa fa-map-marker"></i>San Francisco, CA</span>--}}
                                    {{--<span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>

                            @if($similar_jobs->isNotEmpty())
                                <div class="sidebar-jobs box box--shadow">
                                    <div class="title-head">
                                        <h5 class="small-title">Similar Jobs</h5>
                                    </div>
                                    <ul>
                                        @foreach($similar_jobs as $similarjob)
                                            <li>
                                                <a href="{{ route('jobs-single',['slug'=>$similarjob->slug]) }}"
                                                   class="d-flex align-items-center">
                                                    <figure>
                                                        @if(file_exists('uploads/companies/logos/thumbnails/' . $similarjob->company->logo))
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/companies/logos/thumbnails/' . $similarjob->company->logo) }}"
                                                                 alt=""
                                                                 style="height: 60px;width: 100px; padding: 10px;">
                                                        @else
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                 alt=""
                                                                 style="height: 60px;width: 100px; padding: 10px;">
                                                        @endif
                                                    </figure>
                                                    <div>
                                                        <h5 style="text-transform: capitalize">{{ $similarjob->title }}</h5>
                                                        <p style="text-transform: capitalize">{{ $similarjob->company->title }}</p>
                                                    </div>
                                                    <span class="clearfix"></span>
                                                </a>
                                                <div>
                                                <span class="">
                                                    <i class="fas fa-calendar-alt"></i>
                                                    Deadline:
                                                </span>
                                                    {{ \Carbon\Carbon::parse($similarjob->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{--<div class="sidebar-jobs box box--shadow">
                                <div class="title-head">
                                    <h5 class="small-title">Jobs Gallery</h5>
                                </div>
                                <ul>
                                    <li>
                                        <h5>Medical Transcrption</h5>
                                        <span><i class="fa fa-map-marker"></i>San Francisco, CA</span>
                                        <span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
                                    </li>
                                </ul>
                            </div>--}}
                        </div>
                    </aside>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="content-area">
                        <div class="box box--shadow">
                            <div class="box-header">
                                <div class="header float-left">
                                    <h5><span>Job Applications</span></h5>
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('application.index') }}"></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="box-body">
                                @if($applications->isNotEmpty())
                                    <div class="col-md-12">
                                        <div class="table p-3 no-border">
                                            <table class="ui table table-no-border no-border" cellspacing="0"
                                                   style="width:100%" id="tblApplication">
                                                <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Job Seeker</th>
                                                    <th>Application Date</th>
                                                    <th>Deadline</th>
                                                    <th class="text-center"><i class="fa fa-gear"></i></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        <h2 class="text-center"> <span class="badge badge-info ">You have no received applications. </span></h2>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 offset-md-2">
                <div class="modal fade" id="launchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tblApplication').DataTable({
                aaSorting:[0,'desc'],
                processing: true,
                serverSide: true,
                searching: false,
                bPaginate: false,
                bLengthChange: false,
                bFilter: true,
                bInfo: false,
                bAutoWidth: false,
                ajax: "{{ route('application.json') }}",
                columns: [
                    {
                        data: 'jobs',name:'',
                        render: function (data, type, row) {
                            return '<strong>' + data.title + '</strong>';
                        }
                    },
                    {
                        data: 'jobseeker',name:'jobseeker.user.first_name',
                        render: function (data, type, row) {
                            return '<strong>' + data.user.first_name +' ' + data.user.last_name + '</strong>';
                        }
                    },
                    {
                        data: 'created_at',name:'created_at',
                        render: function (data, type, row) {
                            return '<strong>' + data + '</strong>';
                        }
                    },

                    {
                        data: 'jobs',name:'jobs.job_deadline',
                        render: function (data, type, row) {
                            var badge='success';
                            date= new Date().toISOString().slice(0,10);
                            if (data.job_deadline < date) {
                                badge='danger'
                            }
                            return '<h5><span class="badge badge-'+ badge+'">' + data.job_deadline + '</span></h5>';
                        }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

        var $modal = $('#launchModal');

        $(document).on("click", ".btn-view-application", function (e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.attr('data-id');
            var tempurl = "{{ route('application.show',':id') }}";
            tempurl = tempurl.replace(':id', id);
            $modal.load(tempurl, function (response) {
                $modal.modal('show');
            });
        });

        $(document).on('click', '.btn-delete-application', function (e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $.confirm({

                title: 'Confirm Delete!',
                theme: 'bootstrap',
                icon: 'fa fa-warning',
                closeIconClass: 'fa fa-close',
                closeIcon: true,
                animation: 'scale',
                type: 'red',
                content: ' Are You Sure Want to Delete?',
                buttons: {
                    confirm: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function () {
                            var deleteUrl = "{{ route('application.destroy', ':id') }}";
                            deleteUrl = deleteUrl.replace(':id', id);
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "DELETE",
                                url: deleteUrl,
                                success: function (data) {
                                    $('#tblApplication').DataTable().ajax.reload();
                                    $.confirm({
                                        closeIcon: true,
                                        closeIconClass: 'fa fa-close',
                                        title: 'Success!',
                                        content: data,
                                        type: 'blue',
                                        typeAnimated: true,
                                        buttons: {
                                            close: function () {
                                            }
                                        }
                                    });
                                },
                                complete: function () {
                                }
                            });
                        }
                    },


                    cancel: function () {
                    }
                }
            });
        });

    </script>

    <script type='text/javascript' src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type='text/javascript' src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>

@endsection
