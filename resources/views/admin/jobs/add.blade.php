<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <div class="modal-header bg_light_blue">
            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-suitcase "></i>

                <h3 class="box-title"> Add New Job</h3>
            </div>
        </div>
        <div class="modal-body">
            <form id="addJobForm" enctype="multipart/form-data">
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
                                    <select class="form-control" id="job_company" name="job_company">
                                        @if(isset($companies))
                                            @foreach($companies->sortBy('title') as $company)
                                                <option value="{{ $company->id }}"> {{ $company->title }}</option>
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
                                           placeholder="Job Title" type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="job_service">Job Service</label>
                                    <select name="job_service" class="select form-control" required="" id="job_service">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_of_vacancies">Number of vacancies</label>
                                    <input class="form-control" id="no_of_vacancies" name="no_of_vacancies"
                                           type="number" max="500" min="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job_industry">Job Industry</label>
                                    <select class="form-control select " id="job_industry" name="job_industry">
                                        @if(isset($industries))
                                            @foreach($industries->sortBy('title') as $industry)
                                                <option value="{{ $industry->id }}"> {{ $industry->title }}</option>
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
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part time">Part Time</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Home Based">Home Based</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_deadline">Deadline </label>
                                    <input type="date" class="form-control" id="job_deadline" name="job_deadline"
                                           placeholder="2018-09-09">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="job_category">Job Location</label>
                                    <input class="form-control" id="job_location" name="job_location"
                                           placeholder="Job Location" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="header">Salary Type</div>
                                    <div class="radio">
                                        <label>
                                            <input name="salary_type" id="salary_fixed" value="Fixed"
                                                   type="radio">
                                            <label for="salary_fixed"> Fixed </label>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="salary_type" id="salary_range" value="Range" type="radio" checked>
                                            <label for="salary_range">Range </label>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input name="salary_type" id="salary_negotiable" value="Negotiable"
                                                   type="radio">
                                            <label for="salary_negotiable">Negotiable </label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="min_salary_div">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="max_salary"> Min Offered salary</label>

                                    <input name="min_salary" id="min_salary" class="form-control"
                                           placeholder="Min salary" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="max_salary_div">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="max_salary"> Max Offered Salary</label>
                                    <input name="max_salary" id="max_salary" class="form-control"
                                           placeholder="Max salary" type="text">
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
                                                <option value="{{ $qualification->id }}">{{ $qualification->title }}</option>
                                            @endforeach
                                        </select>
                                    @endisset
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="required_education">Required Education</label>
                                    <input type="text" class="form-control" name="required_education" id="required_education">
                                </div>
                            </div>
                        </div>
                        <label class="h5">Required Work Experience</label>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="required_experience_limit"> Experience Exact </label>
                                    <select name="required_experience_limit" class="select form-control " id="required_experience_limit">
                                        <option value="Greater than"> Greater than </option>
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
                                            id="required_experience">
                                        <option value="0">Select</option>
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
                                            id="experience_measure">
                                        <option value="Years" >Years</option>
                                        <option value="Months" >Months</option>
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
                                    <select id="skills" name="skills[]" multiple="multiple" class="form-control">
                                        @foreach($skills as $skill)
                                            <option value="{{ $skill->id }}"> {{ $skill->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label class="h5">Required Gender and Age bar</label>
                        <hr>

                        <label class="h5">Gender</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="radio" name="gender" value="male" id="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" value="female" id="female">
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
                                              name="specification"></textarea>
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
                                              name="description"></textarea>
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


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job_status">Job Status</label>
                                    <select name="job_status" class="select form-control" required="" id="job_status">
                                        <option value="Active">
                                            Active
                                        </option>
                                        <option value="Pending">
                                            Pending
                                        </option>
                                        <option value="Draft">
                                            Draft
                                        </option>
                                        <option value="Inactive">
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
                    <button type="submit" class="btn btn-success "><i class="fa fa-briefcase"></i> Post Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

<script>
    $('#skills').select2({
        multiple: true
    });


    // $(function(){
    //     $('#skills').selectize({
    //         create:function (input, callback){
    //             $.ajax({
    //                 url: '/remote-url/',
    //                 type: 'GET',
    //                 success: function (result) {
    //                     if (result) {
    //                         callback({ value: result.id, text: input });
    //                     }
    //                 }
    //             });
    //         }
    //     });
    // });
    CKEDITOR.replace('specification');
    CKEDITOR.replace('description');
</script>