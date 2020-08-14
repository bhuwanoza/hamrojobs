<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <div class="modal-header">
            <h5 class="modal-title">Edit Job</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="updateJob" enctype="multipart/form-data" data-id="{{ $jobpost->id }}">
                <div class="row">
                    <div>
                        <h4 style="margin: 10px"> Basic Information</h4>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input class="form-control" id="job_title" name="job_title"
                                           placeholder="Job Title" type="text"
                                           value="@isset($jobpost->title) {{ $jobpost->title }}@endisset">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_of_vacancies">Number of vacancies</label>
                                    <input class="form-control" id="no_of_vacancies" name="no_of_vacancies"
                                           type="number"
                                           @isset($jobpost->number_of_vacancies) value="{{ $jobpost->number_of_vacancies }}"
                                           @endisset max="500" min="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Level</label>
                                    <select name="job_level" class="select form-control" required="" id="job_level">
                                        <option value="Top Level"
                                                @isset($jobpost->job_level)@if($jobpost->job_level=="Top Level") selected @endif @endisset>
                                            Top Level
                                        </option>
                                        <option value="Senior Level"
                                                @isset($jobpost->job_level)@if($jobpost->job_level=="Senior Level") selected @endif @endisset>
                                            Senior Level
                                        </option>
                                        <option value="Mid Level"
                                                @isset($jobpost->job_level)@if($jobpost->job_level=="Mid Level") selected @endif @endisset>
                                            Mid Level
                                        </option>
                                        <option value="Entry Level"
                                                @isset($jobpost->job_level)@if($jobpost->job_level=="Entry Level") selected @endif @endisset>
                                            Entry Level
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job_industry">Job Industry</label>
                                    <select class="form-control select " id="job_industry" name="job_industry">
                                        @if(isset($industries))
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->id }}"
                                                        @isset($jobpost->industry) @if($industry->id == $jobpost->industry->id ) selected @endif @endisset> {{ $industry->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_type">Job Type </label>
                                    <select name="job_type" class="select form-control" required="" id="job_type">
                                        <option value="Full Time"
                                                @isset($jobpost->job_type)@if($jobpost->job_type=="Full Time") selected @endif @endisset>
                                            Full Time
                                        </option>
                                        <option value="Part time"
                                                @isset($jobpost->job_type)@if($jobpost->job_type=="Part Time") selected @endif @endisset>
                                            Part Time
                                        </option>
                                        <option value="Contract"
                                                @isset($jobpost->job_type)@if($jobpost->job_type=="Contract") selected @endif @endisset>
                                            Contract
                                        </option>
                                        <option value="Home Based"
                                                @isset($jobpost->job_type)@if($jobpost->job_type=="Home Based") selected @endif @endisset>
                                            Home Based
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_deadline">Deadline </label>
                                    <input type="date" class="form-control" id="job_deadline" name="job_deadline"
                                           @isset($jobpost->job_deadline) value="{{ $jobpost->job_deadline }}"
                                           @endisset placeholder="2018-09-09">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job_category">Job Location</label>
                                    <input class="form-control" id="job_location" name="job_location"
                                           @isset($jobpost->location) value="{{ $jobpost->location }}"
                                           @endisset  placeholder="Job Location" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" id="radioCheck">
                                    <label class="header">Salary Type</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="radio">
                                                <label>
                                                    <input name="salary_type" id="salary_fixed" value="Fixed"
                                                           @isset($jobpost->salary_type) @if($jobpost->salary_type=="Fixed") checked
                                                           @endif @endisset type="radio">
                                                    <label for="salary_fixed"> Fixed </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio">
                                                <label>
                                                    <input name="salary_type" id="salary_range" value="Range"
                                                           @isset($jobpost->salary_type) @if($jobpost->salary_type=="Range") checked
                                                           @endif @endisset type="radio">
                                                    <label for="salary_range">Range </label>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="radio">
                                                <label>
                                                    <input name="salary_type" id="salary_negotiable" value="Negotiable"
                                                           @isset($jobpost->salary_type) @if($jobpost->salary_type=="Negotiable") checked
                                                           @endif @endisset type="radio">
                                                    <label for="salary_negotiable">Negotiable </label>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="min_salary_div">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="max_salary"> Min Offered salary</label>
                                    <input name="min_salary" id="min_salary" class="form-control"
                                           @isset($jobpost->min_salary) value="{{ $jobpost->min_salary }}"
                                           @endisset placeholder="Min salary" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="max_salary_div">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="max_salary"> Max Offered Salary</label>
                                    <input name="max_salary" id="max_salary" class="form-control"
                                           @isset($jobpost->max_salary) value="{{ $jobpost->max_salary }}"
                                           @endisset placeholder="Max salary" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="header">
                        <h3 style="margin: 10px">More Information</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="job_form__wrapper  pb-2">
                            <h5 class="d-inline-block">Education Qualification</h5>
                            <label class="bs-switch" style="  margin-bottom: -15px; margin-left: 20px">
                                <span class="tog-yes">yes</span>
                                <input id="edu-qua" type="checkbox"
                                       @if(!empty($jobpost->jobadditional->required_education))checked
                                       @endif name="toggle_education">
                                <span class="slider round"></span><span class="tog-no">No</span>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="education_level">Education Level </label>
                                    @isset($qualifications)
                                        <select name="education_level" class="select form-control" required=""
                                                id="education_level">
                                            @foreach($qualifications as $qualification)
                                                <option value="{{ $qualification->id }}"
                                                        @isset($jobpost->jobadditional->education_level) @if($jobpost->jobadditional->qualification->id==$qualification->id) selected @endif @endisset >{{ $qualification->title }}</option>
                                            @endforeach
                                        </select>
                                    @endisset
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Required Education</label>
                                    <input type="text" class="form-control" name="required_education"
                                           @isset($jobpost->jobadditional->required_education) value="{{ $jobpost->jobadditional->required_education  }}"
                                           @endisset id="required_education">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="job_form__wrapper  pb-2">
                            <h5 class="d-inline-block">Work Experience</h5>
                            <label class="bs-switch" style="margin-bottom: -15px; margin-left: 20px">
                                <span class="tog-yes">yes</span>
                                <input id="work-exp" type="checkbox" name="toggle_experience" @isset($jobpost->jobadditional->experience)  checked   @endisset >
                                <span class="slider round"></span><span class="tog-no">No</span>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="required_experience_limit"> Experience Exact </label>
                                    <select name="required_experience_limit" class="select form-control "
                                            id="required_experience_limit">
                                        <option value="Greater than"
                                                @isset($jobpost->jobadditional->experience_boundary) @if($jobpost->jobadditional->experience_boundary=="Greater than") selected @endif @endisset>
                                            Greater than
                                        </option>
                                        <option value="Greater or Equals to"
                                                @isset($jobpost->jobadditional->experience_boundary) @if($jobpost->jobadditional->experience_boundary=="Greater or Equals to") selected @endif  @endisset>
                                            Greater or Equals to
                                        </option>
                                        <option value="Less than"
                                                @isset($jobpost->jobadditional->experience_boundary) @if($jobpost->jobadditional->experience_boundary=="Less than") selected @endif  @endisset>
                                            Less than
                                        </option>
                                        <option value="Less or Equals to"
                                                @isset($jobpost->jobadditional->experience_boundary) @if($jobpost->jobadditional->experience_boundary=="Less or Equals to") selected @endif  @endisset>
                                            Less or Equals to
                                        </option>
                                        <option value="Equals to"
                                                @isset($jobpost->jobadditional->experience_boundary) @if($jobpost->jobadditional->experience_boundary=="Equals to") selected @endif  @endisset>
                                            Equals to
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="required_experience">Required Experience</label>
                                    <select name="required_experience" class="select form-control "
                                            id="required_experience">
                                        <option value="0">Select</option>
                                        @for($i=1; $i<=20; $i++)
                                            <option value="{{ $i }}"
                                                    @isset($jobpost->jobadditional->experience) @if($jobpost->jobadditional->experience==$i) selected @endif @endisset > {{ $i }}@if($i== 1)
                                                    Year @else Years @endif</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="experience_measure">Experience Year/Month(s)</label>
                                    <select name="experience_measure" class="select form-control "
                                            id="experience_measure">
                                        <option value="Years"
                                                @isset($jobpost->jobadditional->experience_measure) @if($jobpost->jobadditional->experience_measure=="Years") selected @endif  @endisset>
                                            Years
                                        </option>
                                        <option value="Months"
                                                @isset($jobpost->jobadditional->experience_measure) @if($jobpost->jobadditional->experience_measure=="Months") selected @endif  @endisset>
                                            Months
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <label class="h5">Required Skills</label>
                        <hr>
                        <div class="job_form__wrapper  pb-2">
                            <h3 class="d-inline-block">Required Skills </h3>
                            <label class="bs-switch" style="  margin-bottom: -15px; margin-left: 20px"><span
                                        class="tog-yes">yes</span>
                                <input id="skill-req" type="checkbox" name="toggle-skill" @if($jobpost->skills->isNotEmpty()) checked @endif>
                                <span class="slider round"></span><span class="tog-no">No</span>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="required_skill">Required Skill </label>
                                    <select id="skills" name="skills[]" multiple="multiple">
                                        @foreach($skills as $skill)
                                            @isset($jobpost->skills)
                                                <option value="{{ $skill->id }}"
                                                        @isset($jobpost->skills)@foreach($jobpost->skills as $ski) @if( $ski->id==$skill->id)
                                                        selected @endif @endforeach @endisset> {{ $skill->title }}</option>
                                            @else
                                                <option value="{{ $skill->id }}"> {{ $skill->title }}</option>
                                            @endisset
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="job_form__wrapper  pb-2">
                            <h4 class="d-inline-block">Gender </h4>
                            <label class="bs-switch" style="  margin-bottom: -15px; margin-left: 20px"><span
                                        class="tog-yes">yes</span>
                                <input id="gender-req" type="checkbox" name="toggle_gender" @isset($jobpost->jobadditional->gender) checked @endisset>
                                <span class="slider round"></span><span class="tog-no">No</span>
                            </label>
                        </div>

                        @isset($jobpost->jobadditional) {{ $jobpost->jobadditional->gender }} @endisset
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="radio" name="gender" value="Male"
                                           @isset($jobpost->jobadditional->gender) @if($jobpost->jobAdditional->gender=='Male') checked
                                           @endif @endisset id="male-check">
                                    <label for="male-check">Male</label>
                                    <input type="radio" name="gender" value="Female"
                                           @isset($jobpost->jobadditional->gender) @if($jobpost->jobAdditional->gender=='Female') checked
                                           @endif @endisset id="female-check">
                                    <label for="female-check"> Female</label>
                                </div>
                            </div>
                        </div>
                        <label class="h5">Other Specification</label>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="other_specification">Other Specification</label>
                                    <textarea class="form-control" id="other_specification"
                                              name="other_specification">@isset($jobpost->jobadditional->specification){{$jobpost->jobadditional->specification }} @endisset</textarea>
                                </div>
                            </div>
                        </div>
                        <label class="h5">Job Description</label>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description"
                                              name="description">@isset($jobpost->jobadditional->description) {{ $jobpost->jobadditional->description }} @endisset</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_banner">File input</label>
                                    <input id="job_banner" name="job_banner" type="file" accept="image">
                                    <p class="note-check"> Note: Image must be minimum 200x200px</p>

                                    @if(file_exists(public_path('uploads/jobposts/' . $jobpost->job_banner)))
                                        <img class="img-responsive"
                                             src="{{ asset('uploads/jobposts/' . $jobpost->job_banner) }}"
                                             alt="" style="height: 130px; width: 200px;">
                                        <p class="note-check"> Upload if you want replace this job banner</p>
                                    @else

                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success btn-update-job" data-id="{{ $jobpost->id }}"><i
                                class="fa fa-briefcase"></i> Update Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    CKEDITOR.replace('other_specification');
    CKEDITOR.replace('description');
    $('#skills').select2({
        multiple: true
    });

    $(document).ready(function () {
        $('#edu-qua').on('click', function () {
            if ($(this).is(':checked')) {
                $('#education_level,#required_education').removeClass("disabled");
            }
            else
                $('#education_level, #required_education').addClass("disabled");
            $('#required_education').val(null);
        });

        $('#work-exp').on('click', function () {
            if ($(this).is(':checked')) {
                $('#required_experience_limit, #required_experience, #experience_measure').removeClass("disabled");
            }
            else
                $('#required_experience_limit, #required_experience, #experience_measure').addClass("disabled");
            $('#required_experience').val(null);
        });


        $('#age-bar').click(function () {
            if ($(this).is(':checked')) {
                $('#age_limit, #age').removeClass("disabled");
            }
            else
                $('#age_limit, #age').addClass("disabled");
            $('#age').val(null);
        });

        $('#gender-req').click(function () {
            if ($(this).is(':checked')) {
                $('#female-check, #male-check').removeAttr('disabled');
            }
            else
                $('#female-check, #male-check').attr('disabled', 'disabled').prop('checked', false);
        });

        $('#skill-req').click(function () {
            if ($(this).is(':checked')) {
                $('#skills').removeAttr("disabled");
            }
            else
                $('#skills').attr('disabled', 'disabled').val(null).trigger("change");
        });
    });
</script>