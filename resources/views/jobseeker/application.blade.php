@extends('layouts.master')
@section('title')
    Applications
@endsection

@section('content')
    <section id="user-profile">
        <div class="container">
            <div class="row">
                @include('jobseeker.partial.sidebar')
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="{{--tab-content--}} tab__detail">
                        <div class="tab-pane" id="Manage_applications" role="tabpanel">
                            <div class="job-alerts-item">
                                <h3 class="alerts-title">Manage applications</h3>
                                @isset($applications)
                                    @foreach($applications as $application)

                                        @php
                                            $job=\App\Model\JobPosts::findOrfail($application->job_id)
                                        @endphp

                                        <div class="applications-content">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="thums">
                                                        @if(file_exists(public_path('uploads/companies/logos/thumbnails/' . $job->company->logo)))
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/companies/logos/thumbnails/' . $job->company->logo) }}"
                                                                 alt="">
                                                        @else
                                                            <img class="post_img"
                                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                 alt="">
                                                        @endif
                                                    </div>
                                                    <h3>{{ $job->title }}</h3>
                                                    <h6>{{ $job->company->title }}</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <p><span class="full-time">{{ $job->job_type }}</span></p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p>Pending</p>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger btn-sm btn-remove-job"
                                                            data-id="{{ $application->id }}">
                                                        delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="applications-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p> You have not applied for jobs.</p>
                                            </div>
                                        </div>
                                    </div>


                                @endisset

                                <br>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script>

        $(document).on('click', '.btn-remove-job', function (e) {
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
                            var deleteUrl = "{{ route('applications.destroy', ':id') }}";
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
                                    $.alert({
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
                                    window.location.reload();
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
@endsection
