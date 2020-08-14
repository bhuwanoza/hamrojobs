@extends('layouts.master')
@section('title')
    Job Specification
@endsection
@section('content')
    <section id="adding-jobs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="specificationForm" enctype="multipart/form-data">
                        <div class="job_form_heading_wrapper">
                            <h2>Job Specification : <span class="badge badge-danger"> {{ $jobpost->title }}</span></h2>
                            <p>Fields with * are mandatory</p>
                        </div>

                        <div class="job_form_wrapper">
                            <div class="job_form__wrapper  pb-2">
                                <h3 class="d-inline-block">Education Qualification</h3>
                                <label class="bs-switch" style="  margin-bottom: -15px; margin-left: 20px">
                                    <span class="tog-yes">yes</span>
                                    <input id="edu-qua" type="checkbox" name="toggle_education">
                                    <span class="slider round"></span><span class="tog-no">No</span>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="education_level">Education Level</label>
                                        @isset($qualifications)
                                            <select name="education_level" class="select form-control"
                                                    id="education_level" disabled="disabled">
                                                @foreach($qualifications as $qualification)
                                                    <option value="{{ $qualification->id }}">{{ $qualification->title }}</option>
                                                @endforeach
                                            </select>
                                        @endisset
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="required_education">Required Education</label>
                                        <input type="text" class="form-control" name="required_education"
                                               id="required_education" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="job_form_wrapper">

                            <div class="job_form__wrapper  pb-2">
                                <h3 class="d-inline-block">Work Experience</h3>
                                <label class="bs-switch" style="margin-bottom: -15px; margin-left: 20px">
                                    <span class="tog-yes">yes</span>
                                    <input id="work-exp" type="checkbox" name="toggle_experience">
                                    <span class="slider round"></span><span class="tog-no">No</span>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="required_experience_limit"> Experience Exact </label>
                                        <select name="required_experience_limit" class="select form-control "
                                                id="required_experience_limit" disabled="disabled">
                                            <option value="Greater than">Greater than</option>
                                            <option value="Greater or Equals to">Greater or Equals to</option>
                                            <option value="Less than">Less than</option>
                                            <option value="Less or Equals to">Less or Equals to</option>
                                            <option value="Equals to">Equals to</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="required_experience">Required Experience</label>
                                        <select name="required_experience" class="select form-control "
                                                id="required_experience" disabled="disabled">
                                            @for($i=1; $i<=25; $i++)
                                                <option value="{{ $i }}">{{ $i }}  </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="experience_measure">Experience Year/Month(s)</label>
                                        <select name="experience_measure" class="select form-control "
                                                id="experience_measure" disabled="disabled">
                                            <option value="Years">Years</option>
                                            <option value="Months">Months</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="job_form_wrapper">
                            <div class="job_form__wrapper  pb-2">
                                <h3 class="d-inline-block">Age Specific </h3>
                                <label class="bs-switch" style="  margin-bottom: -15px; margin-left: 20px"><span
                                            class="tog-yes">yes</span>
                                    <input id="age-bar" type="checkbox" name="toggle_age">
                                    <span class="slider round"></span><span class="tog-no">No</span>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="age_limit">Age limit </label>
                                        <select name="age_limit" class="select form-control " id="age_limit" disabled="disabled">
                                            <option value="Greater than">Greater than</option>
                                            <option value="Greater or Equals to">Greater or Equals to</option>
                                            <option value="Less than">Less than</option>
                                            <option value="Less or Equals to">Less or Equals to</option>
                                            <option value="Equals to">Equals to</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="age">Required Age</label>
                                        <select name="age" class="select form-control " id="age" disabled="disabled">
                                            @for($i=16; $i<=70; $i++)
                                                <option value="{{ $i }}">{{ $i }} Years </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="job_form_wrapper">
                            <div class="job_form__wrapper  pb-2">
                                <h3 class="d-inline-block">Gender </h3>
                                <label class="bs-switch" style="  margin-bottom: -15px; margin-left: 20px"><span
                                            class="tog-yes">yes</span>
                                    <input id="gender-req" type="checkbox" name="toggle_gender">
                                    <span class="slider round"></span><span class="tog-no">No</span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled  type="radio" name="gender"
                                       id="male-check" value="Male">
                                <label class="form-check-label" for="male-check">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" disabled type="radio" name="gender"
                                       id="female-check" value="Female">
                                <label class="form-check-label" for="female-check">Female</label>
                            </div>

                        </div>

                        <div class="job_form_wrapper">
                            <div class="job_form__wrapper  pb-2">
                                <h3 class="d-inline-block">Required Skills </h3>
                                <label class="bs-switch" style="  margin-bottom: -15px; margin-left: 20px"><span
                                            class="tog-yes">yes</span>
                                    <input id="skill-req" type="checkbox" name="toggle-skill">
                                    <span class="slider round"></span><span class="tog-no">No</span>
                                </label>
                            </div>
                            <label for="skills">Skills</label>
                            <select id="skills" name="skills[]" multiple="multiple" disabled>
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}"> {{ $skill->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="job_form_wrapper">
                            <label for="specification">Other Specification</label>
                            <textarea class="form-control" id="specification" name="specification"></textarea>
                        </div>
                        <div class="job_form_wrapper">
                            <label for="description">Description *</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="hidden" name="job_id" value="{{$jobpost->id }}">
                            <a href="" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-info pull-right" id="btnPostJob">Publish Job</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </section>

@endsection

@section('scripts')
    <script>

        $("#specificationForm").on('submit', function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var form = new FormData($('#specificationForm')[0]);
            var params = $('#specificationForm').serializeArray();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var type = "POST";
            var myUrl = "{{ route('specification.store') }}";
            $.ajax({
                type: type,
                url: myUrl,
                contentType: false,
                processData: false,
                data: form,
                beforeSend: function (data) {
                },
                success: function (response) {
                    if (response == 'success') {
                        window.location = "{{ url('employer/company-profile') }}";
                    }
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
    </script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('specification');
        CKEDITOR.replace('description');
    </script>



    <script src="{{ asset('assets/admin/js/select2.full.min.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/select2.min.css') }}" type="text/css">
    <script>
        $('#skills').select2({
            multiple: true
        });
    </script>

@endsection
