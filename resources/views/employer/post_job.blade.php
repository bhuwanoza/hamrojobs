@extends('layouts.master')
@section('title')
    Post New Job
@endsection
@section('content')
    <section id="adding-jobs">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 ">        </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <form id="jobForm" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="job_form_heading_wrapper">
                                    <h2>Job Details</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="job_form_wrapper">
                                    <label for="job_title"> Job Title</label>
                                    <input type="text" name="job_title" id="job_title" placeholder="Job Title">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="job_form_wrapper">
                                    <label for="job_service">Job Service</label>
                                    <select name="job_service" class="select form-control" required=""
                                            id="job_service">
                                        <option value="Top Job">Top Job</option>
                                        <option value="Hot Job" selected="">Hot Job</option>
                                        <option value="Featured Job">Feature Job</option>
                                        <option value="Free job">Free Job</option>
                                        <option value="Newspaper Job">Newspaper Job</option>
                                        <option value="Other Job">Other Jobs</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="job_form_wrapper">
                                    <label for="no_of_vacancies">Number of vacancies</label>
                                    <input class="form-control" id="no_of_vacancies"
                                           name="no_of_vacancies" type="number" max="500" min="1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="job_form_wrapper">
                                    <label for="job_level">Job Level</label>
                                    <select name="job_level" class="select form-control" required="" id="job_level">
                                        <option value="Top Level" selected="">Top Level</option>
                                        <option value="Senior Level">Senior Level</option>
                                        <option value="Mid Level">Mid Level</option>
                                        <option value="Entry Level">Entry Level</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="job_form_wrapper">
                                    <label for="job_industry">Job Industry</label>
                                    <select class="form-control select " id="job_industry"
                                            name="job_industry">
                                        @if(isset($job_industries))
                                            @foreach($job_industries as $industry)
                                                <option value="{{ $industry->id }}"> {{ $industry->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="job_form_wrapper">
                                    <label for="job_type">Job Type </label>
                                    <select name="job_type" class="select form-control" required=""
                                            id="job_type">
                                        <option value="Full Time" selected>Full Time</option>
                                        <option value="Part time" selected>Part Time</option>
                                        <option value="Contract" selected>Contract</option>
                                        <option value="Home Based" selected>Home Based</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="job_form_wrapper">
                                    <label for="job_deadline">Deadline </label>
                                    <input type="date" class="form-control" id="job_deadline"
                                           name="job_deadline" placeholder="2018-09-09">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="job_form_wrapper">
                                    <label for="job_location">Job Location</label>
                                    <input class="form-control" id="job_location" name="job_location"
                                           placeholder="Job Location" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="header job_form_wrapper">Salary Type</div>
                                <div id="radioCheck" style="padding: 10px 0 0">
                                    <div class="radio form-check-inline">
                                        <label>
                                            <input name="salary_type" id="salary_fixed" value="Fixed"  type="radio">
                                            <label for="salary_fixed"> Fixed </label>
                                        </label>
                                    </div>
                                    <div class="radio form-check-inline">
                                        <label>
                                            <input name="salary_type" id="salary_range" value="Range" checked type="radio">
                                            <label for="salary_range">Range </label>
                                        </label>
                                    </div>
                                    <div class="radio form-check-inline">
                                        <label>
                                            <input name="salary_type" id="salary_negotiable" value="Negotiable"
                                                   type="radio">
                                            <label for="salary_negotiable">Negotiable</label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-md-6 col-xs-12" id="min_salary_div">
                                <div class="job_form_wrapper">
                                    <input type="text" name="min_salary" id="min_salary" class="form-control" placeholder="Min salary">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-md-6 col-xs-12" id="max_salary_div">
                                <div class="job_form_wrapper">
                                    <input type="text" name="max_salary" id="max_salary" class="form-control" placeholder="Max salary">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="job_choose_resume">
                                    <div class="custom-input float-left btn btn-secondary">
                                        <span><i class="fas fa-upload"></i> &nbsp;Job banner</span>
                                        <input type="file" name="job_banner" id="job_banner">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right" id="btnPostJob">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
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
        $(document).ready(function () {
            var check = $("#radioCheck input:radio:checked").val();
            if (check === "Range") {
                $('#min_offered_salary').show();
                $('#max_offered_salary').show();
            }
            else if (check === "Fixed") {
                $('#min_offered_salary').show();
                $('#max_offered_salary').hide();
            }
            else if(check=== 'Negotiable'){
                $('#min_offered_salary').hide();
                $('#max_offered_salary').hide();
            }

            $("#salary_range").click(function () {
                // range
                $('#min_salary').val("");
                $('#max_salary').val("");
                $('#min_offered_salary').show();
                $('#max_offered_salary').show();

            });

            $('#salary_fixed').click(function () {
                $('#min_offered_salary').show();
                $('#max_salary').val("");
                $('#max_offered_salary').hide();
            });
        });


        $("#jobForm").on('submit', function (e) {
            e.preventDefault();
            var form = new FormData($('#jobForm')[0]);
            var params = $('#jobForm').serializeArray();
            var type = "POST";
            var myUrl = "{{ route('job-post.store') }}";

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
                success: function (response) {
                    var route = "{{ route('specification.show',':id') }}";
                    route = route.replace(':id', response);
                    window.location = route;
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(5000));
                        });
                    }
                    else {
                        $('#error-message').text(response.responseJSON.message);
                        $('#notify-error').show().fadeOut(10000);
                    }
                }
            });
        });
    </script>
@endsection