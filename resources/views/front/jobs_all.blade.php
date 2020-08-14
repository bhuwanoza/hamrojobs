@extends('layouts.master')
@section('title')
    Jobs
@endsection
@section('styles')
    <style>
        .selectize-control .selectize-input {
            font-size: 1rem;
            border-color: #D9D9D9 !important;
        }

        .selectize-control .selectize-input input {
            font-size: 1rem;
        }

        .selectize-control .selectize-input:focus, .selectize-control .selectize-input.focus {
            border-color: #CCCCCC !important;
            outline: 0;
        }

        .selectize-control .selectize-input > div .email {
            opacity: 0.8;
        }

        .selectize-control .selectize-input > div .email:before {
            content: '<';
        }

        .selectize-control .selectize-input > div .email:after {
            content: '>';
        }

        .selectize-control .selectize-input > div .name + .email {
            margin-left: 5px;
        }

        .selectize-control.selectize-rtl-select .selectize-input, .selectize-control.selectize-rtl-select .selectize-dropdown-content {
            text-align: right;
        }

        .selectize-control .selectize-dropdown {
            font-size: 1rem;
        }

        .selectize-control .selectize-dropdown .caption {
            font-size: 12px;
            display: block;
            color: #a0a0a0;
        }

        .selectize-control .selectize-dropdown .label {
            font-size: 75%;
            display: table-row;
            font-weight: 600;
            line-height: 1.25;
            color: #495c68;
        }

        .selectize-control .selectize-dropdown .active {
            background-color: #E0E0E0 !important;
            color: #424242 !important;
        }

        .selectize-control .selectize-dropdown [data-selectable] {
            padding: 10px 8px;
        }

        .selectize-control.repositories::before {
            -moz-transition: opacity 0.2s;
            -webkit-transition: opacity 0.2s;
            transition: opacity 0.2s;
            content: ' ';
            z-index: 2;
            position: absolute;
            display: block;
            top: 12px;
            right: 34px;
            width: 16px;
            height: 16px;
            background: url(../../../../images/icons/spinner.gif);
            background-size: 16px 16px;
            opacity: 0;
        }

        .selectize-control.repositories.loading::before {
            opacity: 0.4;
        }

        .selectize-control.repositories .selectize-dropdown div {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .selectize-control.repositories .selectize-dropdown .by {
            font-size: 11px;
            opacity: 0.8;
        }

        .selectize-control.repositories .selectize-dropdown .by::before {
            content: 'by ';
        }

        .selectize-control.repositories .selectize-dropdown .name {
            font-weight: bold;
            margin-right: 5px;
        }

        .selectize-control.repositories .selectize-dropdown .title {
            display: block;
        }

        .selectize-control.repositories .selectize-dropdown .description {
            font-size: 12px;
            display: block;
            color: #a0a0a0;
            white-space: nowrap;
            width: 100%;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .selectize-control.repositories .selectize-dropdown .meta {
            list-style: none;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }

        .selectize-control.repositories .selectize-dropdown .meta [class^="icon-"] {
            font-size: 0.8rem;
        }

        .selectize-control.repositories .selectize-dropdown .meta [class^="icon-"]:before {
            margin-right: 8px;
        }

        .selectize-control.repositories .selectize-dropdown .meta li {
            margin: 0;
            padding: 0;
            display: inline;
            margin-right: 10px;
        }

        .selectize-control.repositories .selectize-dropdown .meta li span {
            font-weight: bold;
        }

        .selectize-control.movies::before {
            -moz-transition: opacity 0.2s;
            -webkit-transition: opacity 0.2s;
            transition: opacity 0.2s;
            content: ' ';
            z-index: 2;
            position: absolute;
            display: block;
            top: 12px;
            right: 34px;
            width: 16px;
            height: 16px;
            background: url(../../../../images/icons/spinner.gif);
            background-size: 16px 16px;
            opacity: 0;
        }

        .selectize-control.movies.loading::before {
            opacity: 0.4;
        }

        .selectize-control.movies .selectize-dropdown [data-selectable] {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            height: 60px;
            position: relative;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            padding: 10px 10px 10px 60px;
        }

        .selectize-control.movies .selectize-dropdown [data-selectable]:last-child {
            border-bottom: 0 none;
        }

        .selectize-control.movies .selectize-dropdown .by {
            font-size: 11px;
            opacity: 0.8;
        }

        .selectize-control.movies .selectize-dropdown .by ::before {
            content: 'by ';
        }

        .selectize-control.movies .selectize-dropdown .name {
            font-weight: bold;
            margin-right: 5px;
        }

        .selectize-control.movies .selectize-dropdown .description {
            font-size: 12px;
            color: #a0a0a0;
        }

        .selectize-control.movies .selectize-dropdown .actors,
        .selectize-control.movies .selectize-dropdown .description,
        .selectize-control.movies .selectize-dropdown .title {
            display: block;
            white-space: nowrap;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .selectize-control.movies .selectize-dropdown .actors {
            font-size: 10px;
            color: #a0a0a0;
        }

        .selectize-control.movies .selectize-dropdown .actors span {
            color: #606060;
        }

        .selectize-control.movies .selectize-dropdown img {
            height: 60px;
            left: 10px;
            position: absolute;
            border-radius: 3px;
            background: rgba(0, 0, 0, 0.04);
        }

        .selectize-control.movies .selectize-dropdown .meta {
            list-style: none;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }

        .selectize-control.movies .selectize-dropdown .meta li {
            margin: 0;
            padding: 0;
            display: inline;
            margin-right: 10px;
        }

        .selectize-control.movies .selectize-dropdown .meta li span {
            font-weight: bold;
        }

        .selectize-control.multi .selectize-input.has-items {
            padding-left: 8px !important;
        }

        .selectize-control.multi .selectize-input.has-items.disabled [data-value] {
            color: #FFFFFF;
        }

        .selectize-control.multi .selectize-input [data-value] {
            background-image: none !important;
            padding: 3px 6px;
            background-color: #3BAFDA !important;
            border-color: #2494be !important;
            margin-right: 7px;
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .selectize-control.plugin-remove_button [data-value] .remove {
            border-left-color: #2494be !important;
        }

    </style>
@endsection

@section('content')
    {{--@include('layouts.search_banner')--}}
    <section id="category_jobs">
        <div class="container">
            <form id="search_form" data-link="{{ url('/jobs/') }}">
                <div class="row">
                    <div class=" col-lg-4 col-md-4">
                        <div class="row left__side_job_filter">
                            <!-- job categories -->
                            <div class="col-lg-12 col-md-12 col-sm-12 ">
                                <div class="leftside_job_categories_wrapper box--shadow">
                                    <div class="leftside_job_categories_heading title-head title-head box-header">
                                        Filter Jobs
                                    </div>
                                    <div class="leftside_job_categories_content">
                                        <div class="p-3 ">
                                            <div class="form-group">
                                                <label for="job_industry">Industries</label>
                                                <select name="job_industry[]" data-filter_title="Job Industry"
                                                        id="job_industry" multiple="multiple"
                                                        placeholder="Filter by Industry">
                                                    @foreach($industries as $indus)
                                                        <option value="{{ $indus->id }}"
                                                                @isset($industry) @if($industry->id==$indus->id) selected @endif @endisset >{{ $indus->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="job_category">Category</label>
                                                <select name="job_category[]" data-filter_title="Job Category"
                                                        id="job_category" multiple="multiple"
                                                        placeholder="Filter by Category">
                                                    <option value="Top Job">Top Job</option>
                                                    <option value="Hot Job">Hot Job</option>
                                                    <option value="Featured Job">Feature Job</option>
                                                    <option value="Free job">Free Job</option>
                                                    <option value="Newspaper Job">Newspaper Job</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="job_level">Level</label>
                                                <select name="job_level[]" data-filter_title="Job Level" id="job_level"
                                                        multiple="multiple"
                                                        placeholder="Filter by Job Level">
                                                    <option value="Top Level">Top Level</option>
                                                    <option value="Senior Level">Senior Level</option>
                                                    <option value="Mid Level">Mid Level</option>
                                                    <option value="Entry Level">Entry Level</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="job_education">Education</label>
                                                <select name="job_education[]" data-filter_title="Education"
                                                        id="job_education" multiple="multiple"
                                                        placeholder="Filter by Eduction ">
                                                    @foreach($educations as $education)
                                                        <option value="{{ $education->id }}">{{ $education->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="skills">Skills</label>
                                                <select name="skills[]" data-filter_title="Skills" id="skills"
                                                        multiple="multiple"
                                                        placeholder="Filter by Skills ">
                                                    @foreach($skills as $skill)
                                                        <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="job_type">Employment Type</label>
                                                <select name="job_type[]" data-filter_title="Employment Type"
                                                        id="job_type" multiple="multiple"
                                                        placeholder="Filter by Job Type">
                                                    <option value="Full Time">Full Time</option>
                                                    <option value="Part time">Part Time</option>
                                                    <option value="Contract">Contract</option>
                                                    <option value="Home Based">Home Based</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="job_location">Job Location</label>
                                                <select name="job_location[]" data-filter_title="Job Location"
                                                        id="job_location" multiple="multiple"
                                                        placeholder="Filter by Job Location">
                                                    @foreach($locations as $location)
                                                        <option value="{{ $location}}">{{ $location }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class=" right__side_jobs">
                            <div id="appliedFilter">
                            </div>
                            <div class="row">
                                @isset($query)
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card box--shadow">
                                            <div class="card-block">
                                                <div class="form-group row m-2">
                                                    <h5><label for="search_query" class="col-lg-12 col-md-12 col-sm-12  col-form-label">You searched for :</label></h5>

                                                    <div class=" col-lg-12 col-md-12 col-sm-12">
                                                        <input type="text" name="query" class="form-control" id="search_query" value="{{ $query }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endisset

                            </div>
                            <div id="searched_jobs">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card box--shadow ">
                                            <div class="card-block row m-3">
                                                <div class="col-6">
                                                    @isset($jobs)
                                                        <h5>
                                                            Showing {{ $jobs->count() }} job of {{ $jobs->total() }}
                                                        </h5>
                                                    @endisset
                                                </div>
                                                <div class="col-6">
                                                    <ul class="nav nav-inline float-right">
                                                        <li class="nav-item mr-3">
                                                    <span id="sort_by_date" data-select="all"
                                                          class="text-secondary">
                                                        <span class="icon-calendar"></span>
                                                        Posted:
                                                        <span id="date_value" style="clear: both">
                                                            All time
                                                        </span>
                                                    </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        @if($jobs  && $jobs->count())
                                            @foreach($jobs as $job)
                                                <div class="job-specification">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 ">
                                                            <a href="{{ route('jobs-single',['slug'=>$job->slug]) }}"
                                                               class="d-flex d-flex align-items-center">
                                                                <div class="company-img">
                                                                    @isset($job->company)
                                                                        @if(file_exists('uploads/companies/logos/thumbnails/' . $job->company->logo))
                                                                            <img class="post_img"
                                                                                 src="{{ asset('uploads/companies/logos/thumbnails/' . $job->company->logo) }}"
                                                                                 alt="">
                                                                        @else
                                                                            <img class="post_img"
                                                                                 src="{{ asset('uploads/default/default-company-logo.png') }}"
                                                                                 alt="">
                                                                        @endif
                                                                    @endisset
                                                                </div>
                                                                <div class="job-description">
                                                                    <h4 title="{{ $job->title }}"
                                                                        class="job-title">{{ str_limit($job->title,35) }}</h4>
                                                                    @isset($job->company)
                                                                        <p title="{{ $job->company->title }}"> {{ str_limit($job->company->title,25) }} </p> @endisset
                                                                    <div>
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        {{ $job->location }}
                                                                    </div>
                                                                    <!--<div>-->
                                                                    <!--    <i class="far fa-sticky-note"></i>-->
                                                                    <!--    Posted:-->
                                                                    <!--    {{ \Carbon\Carbon::parse($job->created_at) ->diffForHumans(null,null, false, 1) }}-->
                                                                    <!--</div>-->
                                                                </div>
                                                            </a>
                                                            <hr>
                                                            <div class="d-flex">
                                                                <div class="text-success mx-3">
                                                                    <span>Views: </span> <span
                                                                            class="badge badge-success"> {{ $job->count }}</span>
                                                                </div>
                                                                <div>
                                                          <span class="">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            Deadline:
                                                          </span>
                                                                    {{ \Carbon\Carbon::parse($job->job_deadline) ->diffForHumans(null,null, false, 2) }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                                            <div class="job-type">
                                                                <ul>
                                                                    @php
                                                                        $status=checkSaved($job->id)
                                                                    @endphp
                                                                    <li @if($status=='not logged in'||$status=='user not jobseeker')
                                                                        title="You are not Logged in with Job Seekers Account"
                                                                        disabled="" class="disabled"
                                                                            @endif>
                                                                        <a id="{{$job->slug}}"
                                                                           class="btn btn-danger btn-save-job"
                                                                           data-id="{{ $job->id }}">


                                                                            @switch(checkSaved($job->id))
                                                                                @case('not saved')
                                                                                <i class="far fa-bookmark"></i>Save
                                                                                @break
                                                                                @case('saved')
                                                                                <i class="fas fa-bookmark"></i>Saved
                                                                                @break
                                                                                @case('not logged in')
                                                                                <i class="far fa-bookmark disabled"
                                                                                   title="Log in to Save Job"></i>Save
                                                                                @break
                                                                                @case('user not jobseeker')
                                                                                <i class="far fa-bookmark disabled"
                                                                                   title="You are not Logged in with Job Seekers Account"></i>
                                                                                Save
                                                                                @break

                                                                                @default
                                                                                <i class="far fa-bookmark"></i>Save
                                                                            @endswitch
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('print-job',$job->id)}}"
                                                                           class="btn btn-primary">
                                                                            <i class="far fa-file-pdf"></i>Print
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('jobs-single',['slug'=>$job->slug]) }}"
                                                                           class="btn btn-success ">Apply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="job-specification">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <strong class="center"> No job Found</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        @endisset
                                    </div>

                                </div>

                                <!--Pagination-->
                                <nav aria-label="pagination ">
                                    <ul class="pagination justify-content-center pg-blue">
                                        {{--<nav aria-label="pagination ">--}}
                                        <ul class="pagination justify-content-center pg-blue">
                                            @isset($jobs)
                                                {{ $jobs->links() }}
                                            @endisset
                                        </ul>
                                        {{--</nav>--}}

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <input id="id_start_date" name="start_date" type="hidden">
                    <input id="id_end_date" name="end_date" type="hidden">
                </div>
            </form>

        </div>
    </section>
@endsection

@section('scripts')

    <script>

        $('#job_industry').selectize({
            plugins: ['remove_button'],
            maxItems: 3,
            delimiter: ',',
            persist: false,
            create: function (input) {
                return {
                    value: input,
                    text: input
                }
            }
        });

        $('#job_category').selectize({
            plugins: ['remove_button'],
            maxItems: 2,
            delimiter: ',',
            persist: false,

        });

        $('#job_level').selectize({
            plugins: ['remove_button'],
            maxItems: 2,
            delimiter: ',',
            persist: false,

        });

        $('#job_education').selectize({
            plugins: ['remove_button'],
            maxItems: 3,
            delimiter: ',',
            persist: false,

        });

        $('#skills').selectize({
            plugins: ['remove_button'],
            maxItems: 3,
            delimiter: ',',
            persist: false,

        });

        $('#job_type').selectize({
            plugins: ['remove_button'],
            maxItems: 2,
            delimiter: ',',
            persist: false,

        });

        $('#job_location').selectize({
            plugins: ['remove_button'],
            maxItems: 3,
            delimiter: ',',
            persist: false,

        });

        $('#sort_by_date').daterangepicker();

    </script>

    <script type="text/javascript">
        function dateRangePicker() {
            var $date_filter = $("#sort_by_date");

            $date_filter.daterangepicker({
                opens: 'left',
                startDate: moment().subtract(1, 'month'),
                endDate: moment(),
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {cancelLabel: 'reset'}
            }, cb);

            $date_filter.on('cancel.daterangepicker', function (ev, picker) {
                updateDate(null, null);
                searchJobs({start_date: null, end_date: null});
                $('#date_value').html("All Time");
            });

            function cb(start, end) {
                var start_date = start.format('YYYY-MM-DD');
                var end_date = end.format('YYYY-MM-DD');
                $('#date_value').html("<span class='badge badge-info'>" +
                    start_date + ' - ' + end_date + "</span>");
                updateDate(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                searchJobs();
            }

            function updateDate(start_date, end_date) {
                $("#id_start_date").val(start_date);
                $("#id_end_date").val(end_date);
            }
        }
    </script>

    <script>
        $(document).on('input',"#search_query",function(e){
             console.log($('#search_query').val());
            e.preventDefault();
            searchJobs();
        });
        // search bar and Search Job With DatePicker Range
        var $search_form = $("#search_form");
        var searchUrl = $search_form.data('link');
        // var $date_filter = $("#sort_by_date");
        var appliedFilter = [];

        // dateRangePicker();

        // $('#loading').hide();

        // $search_form.submit(function (e) {
        //     e.preventDefault();
        // });

        $search_form.on('change', function (e) {
            e.preventDefault();
            searchJobs();
        });

        function searchJobs() {
            var searchData = $search_form.serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: searchUrl,
                data: searchData,
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $("#loading").hide();
                },
                success: function (data) {
                    $("#searched_jobs").html(data);
                    dateRangePicker();
                }
            });
        }

        var entityMap = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
            '/': '&#x2F;',
            '`': '&#x60;',
            '=': '&#x3D;'
        };

        function escapeHtml(string) {
            return String(string).replace(/[&<>"'`=\/]/g, function (s) {
                return entityMap[s];
            });
        }

        function clearFilter(id) {
            if (id === '') {
                $("input[name='q']").val('');
                searchJobs()
            } else {
                var input = $("#" + id);
                input.selectize()[0].selectize.clear();
                input.prop('selectedIndex', null);
            }
        }

        function clearAllFilters() {
            var selects = $('select');
            $("input[name='q']").val('');
            selects.each(function (index) {
                var id = selects[index].id;
                var input = $("#" + id);
                input.selectize()[0].selectize.clear();
                input.prop('selectedIndex', null);
            });
            $("#appliedFilter").html('');
            searchJobs()
        }
    </script>





@endsection