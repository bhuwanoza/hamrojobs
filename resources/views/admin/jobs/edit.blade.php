<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <div class="modal-header bg_light_blue">
            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-edit"></i>
                <h3 class="box-title"> Edit Job : <span class="bg bg-danger">"{{ $jobpost->title }}"</span></h3>
            </div>
        </div>
        <div class="modal-body">
            <form id="editJobForm" enctype="multipart/form-data" data-id="{{ $jobpost->id }}">
                <div class="row">
                    <div class="header bg-success">
                        <h3 style="margin: 10px"> Basic Information</h3>
                        <hr>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job_company"><strong>Select Company Name</strong></label>
                                    <select class="form-control select-company" id="job_company" name="job_company">
                                        @if(isset($companies))
                                            @foreach($companies->sortBy('title') as $company)
                                                <option value="{{ $company->id }}"
                                                        @isset($jobpost->industry) @if($company->id == $jobpost->company_id ) selected @endif @endisset>  {{ $company->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input class="form-control" id="job_title" name="job_title"
                                           placeholder="Job Title" type="text"
                                           value="@isset($jobpost->title) {{ $jobpost->title }}@endisset">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="job_service">Job Service</label>
                                    <select name="job_service" class="select form-control" required="" id="job_service">
                                        <option value="Top Job"
                                                @isset($jobpost->service_type)@if($jobpost->service_type=="Top Job") selected @endif @endisset>
                                            Top Job
                                        </option>
                                        <option value="Hot Job"
                                                @isset($jobpost->service_type)@if($jobpost->service_type=="Hot Job") selected @endif @endisset>
                                            Hot Job
                                        </option>
                                        <option value="Featured Job"
                                                @isset($jobpost->service_type)@if($jobpost->service_type=="Featured Job") selected @endif @endisset>
                                            Feature Job
                                        </option>
                                        <option value="Free job"
                                                @isset($jobpost->service_type)@if($jobpost->service_type=="Free Job") selected @endif @endisset>
                                            Free Job
                                        </option>
                                        <option value="Newspaper Job"
                                                @isset($jobpost->service_type)@if($jobpost->service_type=="Newspaper Job") selected @endif @endisset>
                                            Newspaper Job
                                        </option>
                                        <option value="Other Job"
                                                @isset($jobpost->service_type)@if($jobpost->service_type=="Other Job") selected @endif @endisset>
                                            Other Jobs
                                        </option>
                                    </select>
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
                                    <label for="job_level">Job Level</label>
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
                                            @foreach($industries->sortBy('title') as $industry)
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
                                    <div class="header">Salary Type</div>
                                    <div class="radio">
                                        <label>
                                            <input name="salary_type" id="salary_fixed" value="Fixed"
                                                   @isset($jobpost->salary_type) @if($jobpost->salary_type=="Fixed") checked
                                                   @endif @endisset type="radio">
                                            <label for="salary_fixed"> Fixed </label>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="salary_type" id="salary_range" value="Range"
                                                   @isset($jobpost->salary_type) @if($jobpost->salary_type=="Range") checked
                                                   @endif @endisset type="radio">
                                            <label for="salary_range">Range </label>
                                        </label>
                                    </div>
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
                        <div class="row" id="min_salary_div" @isset($jobpost->salary_type) @if($jobpost->salary_type=="Negotiable")  style="display: none;"     @endif @endisset >
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="max_salary"> Min Offered salary</label>

                                    <input name="min_salary" id="min_salary" class="form-control"
                                           @isset($jobpost->min_salary) value="{{ $jobpost->min_salary }}"
                                           @endisset placeholder="Min salary" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="max_salary_div" @isset($jobpost->salary_type) @if($jobpost->salary_type=="Negotiable" || $jobpost->salary_type=="Fixed")  style="display: none;"     @endif @endisset>
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
                        <h4 style="margin: 10px">More Information</h4>
                    </div>
                    <hr>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label class="h5">Education Qualification</label>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="education_level">Education Level</label>
                                    @isset($qualifications)
                                        <select name="education_level" class="select form-control" required=""
                                                id="education_level">
                                            <option value="">----</option>
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
                                    <label for="required_education">Required Education</label>
                                    <input type="text" class="form-control" name="required_education"
                                           @isset($jobpost->jobadditional->required_education) value="{{ $jobpost->jobadditional->required_education  }}"
                                           @endisset id="required_education">
                                </div>
                            </div>
                        </div>
                        <label class="h5">Required Work Experience</label>
                        <hr>
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
                                        @for($i=1; $i<=25; $i++)
                                            <option value="{{ $i }}"
                                                    @isset($jobpost->jobadditional->experience) @if($jobpost->jobadditional->experience==$i) selected @endif @endisset > {{ $i }}</option>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="skills">Required Skill</label>
                                    <select id="skills" name="skills[]" multiple="multiple" class="form-group">
                                        @foreach($skills as $skill)
                                            @isset($jobpost->skills)
                                                <option value="{{ $skill->id }}"
                                                        @isset($jobpost->skills)
                                                        @foreach($jobpost->skills as $ski)
                                                        @if( $ski->id==$skill->id)
                                                        selected
                                                        @endif
                                                        @endforeach
                                                        @endisset>
                                                    {{ $skill->title }}
                                                </option>
                                            @else
                                                <option value="{{ $skill->id }}"> {{ $skill->title }}</option>
                                            @endisset
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label class="h5">Required Gender and Age bar</label>
                        <hr>

                        <label class="h5">Gender</label>
                        @isset($jobpost->jobadditional) {{ $jobpost->jobadditional->gender }} @endisset
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="radio" name="gender" value="male"
                                           @isset($jobpost->jobadditional->gender) @if($jobpost->jobAdditional->gender=='male') checked
                                           @endif @endisset  id="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" value="female"
                                           @isset($jobpost->jobadditional->gender) @if($jobpost->jobAdditional->gender=='female') checked
                                           @endif @endisset  id="female">
                                    <label for="female"> Female</label>
                                </div>
                            </div>
                        </div>
                        <label class="h5">Other Specification</label>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="specification">Other Specification</label>
                                    <textarea class="form-control" id="specification"
                                              name="specification">@isset($jobpost->jobadditional->specification){{$jobpost->jobadditional->specification }} @endisset</textarea>
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

                                    @if(file_exists(public_path('uploads/jobposts/thumbnails/' . $jobpost->job_banner)))
                                        <img class="rounded-circle"
                                             src="{{ asset('uploads/jobposts/thumbnails/' . $jobpost->job_banner) }}"
                                             alt="">
                                        <p class="note-check"> Upload new banner replaces job banner</p>
                                    @else
                                        <img class="rounded-circle"
                                             src="{{ asset('uploads/default/default-job-banner.png') }}"
                                             alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_status">Job Status</label>
                                    <select name="job_status" class="select form-control" required="" id="job_status">
                                        <option value="Active"
                                                @isset($jobpost->status)@if($jobpost->status=="Active") selected @endif @endisset>
                                            Active
                                        </option>
                                        <option value="Pending"
                                                @isset($jobpost->status)@if($jobpost->status=="Pending") selected @endif @endisset>
                                            Pending
                                        </option>
                                        <option value="Draft"
                                                @isset($jobpost->status)@if($jobpost->status=="Draft") selected @endif @endisset>
                                            Draft
                                        </option>
                                        <option value="Inactive"
                                                @isset($jobpost->status)@if($jobpost->status=="Inactive") selected @endif @endisset>
                                            inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success " ><i
                                class="fa fa-briefcase"></i> Update Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
{{--<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>--}}

<script>
    var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
</script>

<!-- CKEditor init -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>
    var options = {
        height: 100,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    };
</script>

<script>
    $('#skills').select2({
        multiple: true
    });
    {{--var options = {--}}
        {{--filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
        {{--filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',--}}
        {{--filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
        {{--filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'--}}
    {{--};--}}
    CKEDITOR.replace('specification',options);
    CKEDITOR.replace('description',options);
</script>