<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form id="editPreferences" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Job Preference</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row Job_categories">
                    <div class="col-md-3">
                        <label for="job_categories" class="pl-3 pl-md-0  requiredField ">
                            Job categories<span class="asteriskField">*</span> </label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select id="job_categories" name="job_categories[]" multiple="multiple">
                                @foreach($industries as $industry)
                                    @isset($jobseeker->additional->industries)
                                        <option value="{{ $industry->id }}"
                                                @foreach($jobseeker->additional->industries as $indus) @if( $indus->id==$industry->id) selected @endif @endforeach > {{ $industry->title }}</option>
                                    @else
                                        <option value="{{ $industry->id }}"> {{ $industry->title }}</option>
                                    @endisset
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row Looking_for">
                    <div class="col-md-3">
                        <label for="looking_for" class="pl-3 pl-md-0  requiredField ">
                            Looking for<span class="asteriskField">*</span> </label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select id="looking_for" class="select  form-control" name="looking_for">
                                <option value="Top Level"
                                        @isset($jobseeker->additional) @if($jobseeker->additional->looking_for=='Top Level') selected @endif @endisset>
                                    Top Level
                                </option>
                                <option value="Senior Level"
                                        @isset($jobseeker->additional) @if($jobseeker->additional->looking_for=='Senior Level') selected @endif @endisset>
                                    Senior Level
                                </option>
                                <option value="Mid Level"
                                        @isset($jobseeker->additional) @if($jobseeker->additional->looking_for=='Mid Level') selected @endif @endisset>
                                    Mid Level
                                </option>
                                <option value="Entry Level"
                                        @isset($jobseeker->additional) @if($jobseeker->additional->looking_for=='Entry Level') selected @endif @endisset>
                                    Entry Level
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row Available_for">
                    <div class="col-md-3">
                        <label for="available_for" class="pl-3 pl-md-0  requiredField ">
                            Available for<span class="asteriskField">*</span> </label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select id="available_for" class="form-control" name="available_for">
                                <option value="Full Time"
                                        @isset($jobseeker->additional) @if($jobseeker->additional->available_for=='Full Time') selected @endif @endisset >
                                    Full Time
                                </option>
                                <option value="Part Time"
                                        @isset($jobseeker->additional) @if($jobseeker->additional->available_for=='Part Time') selected @endif @endisset >
                                    Part Time
                                </option>
                                <option value="Contract"
                                        @isset($jobseeker->additional) @if($jobseeker->additional->available_for=='Contract') selected @endif @endisset >
                                    Contract
                                </option>
                                <option value="Home Based"
                                        @isset($jobseeker->additional) @if($jobseeker->additional->available_for=='Home Based') selected @endif @endisset>
                                    Home Based
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row Specialization">
                    <div class="col-md-3">
                        <label for="specialization" class="pl-3 pl-md-0  requiredField ">
                            Specialization<span class="asteriskField">*</span> </label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="specialization" class="form-control" id="specialization"
                                   value="@isset($jobseeker->additional) {{ $jobseeker->additional->specialization }} @endisset">
                        </div>
                    </div>
                </div>
                <div class="row  Skill">
                    <div class="col-md-3">
                        <label for="skills" class="pl-3 pl-md-0  requiredField ">
                            Skill<span class="asteriskField">*</span> </label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="skills[]" multiple="multiple" id="skills">
                                @foreach($skills as $skill)
                                    @isset($jobseeker->skills)
                                        <option value="{{ $skill->id }}"
                                                @foreach($jobseeker->skills as $ski) @if( $ski->id==$skill->id)
                                                selected @endif @endforeach> {{ $skill->title }}</option>
                                    @else
                                        <option value="{{ $skill->id }}"> {{ $skill->title }}</option>
                                    @endisset
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row exp-start-date ">
                    <div class="col-md-3">
                        <label class="float-left ">Expected Salary*</label>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div id="expected_salary_currency" class="form-group col-md-2 pr-0 ">
                                <div class="form-group">
                                    <select name="expected_salary_currency" class="select form-control"
                                            style="background: none!important;">
                                        <option value="NRS"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_currency=='NRS') selected @endif @endisset >
                                            NRs
                                        </option>
                                        <option value="USD"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_currency=='USD') selected @endif @endisset >
                                            $
                                        </option>
                                        <option value="INR"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_currency=='INR') selected @endif @endisset >
                                            IRs
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div id="expected_salary_boundary" class="form-group col-md-2 p-0 pl-1">
                                <div class="form-group">
                                    <select name="expected_salary_boundary" class="select form-control"
                                            style="background: none!important;">
                                        <option value="Above"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_boundary=='Above') selected @endif @endisset>
                                            Above
                                        </option>
                                        <option value="Below"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_boundary=='Below') selected @endif @endisset>
                                            Below
                                        </option>
                                        <option value="Equals"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_boundary=='Equals') selected @endif @endisset>
                                            Equals
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div id="expected_salary" class="form-group col-md-5 p-0 pl-1 ">
                                <div class="form-group">
                                    <input type="text" name="expected_salary"
                                           value="@isset($jobseeker->additional) {{ $jobseeker->additional->expected_salary }} @endisset"
                                           class="textInput form-control"
                                           placeholder="Amount" maxlength="15">
                                </div>
                            </div>
                            <div id="expected_salary_basic" class="form-group col-md-3  p-0 pl-1">
                                <div class="form-group">
                                    <select name="expected_salary_basic" class="select form-control"
                                            style="background: none!important;">
                                        <option value="Hourly"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_basic=='Hourly') selected @endif @endisset>
                                            Hourly
                                        </option>
                                        <option value="Daily"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_basic=='Daily') selected @endif @endisset>
                                            Daily
                                        </option>
                                        <option value="Weekly"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_basic=='Weekly') selected @endif @endisset>
                                            Weekly
                                        </option>
                                        <option value="Monthly"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_basic=='Monthly') selected @endif @endisset>
                                            Monthly
                                        </option>
                                        <option value="Yearly"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->expected_salary_basic=='Yearly') selected @endif @endisset>
                                            Yearly
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row exp-start-date ">
                    <div class="col-md-3">
                        <label class="float-left ">Current Salary*</label>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div id="current_salary_currency" class="form-group col-md-2 pr-0 ">
                                <div class="form-group">
                                    <select name="current_salary_currency" class="select form-control"
                                            style="background: none!important;">
                                        <option value="NRS"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_currency=='NRS') selected @endif @endisset >
                                            NRs
                                        </option>
                                        <option value="USD"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_currency=='USD') selected @endif @endisset >
                                            $
                                        </option>
                                        <option value="INR"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_currency=='INR') selected @endif @endisset >
                                            IRs
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div id="current_salary_boundary" class="form-group col-md-2 p-0 pl-1">
                                <div class="form-group">
                                    <select name="current_salary_boundary" class="select form-control"
                                            style="background: none!important;">
                                        <option value="Above"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_boundary=='Above') selected @endif @endisset>
                                            Above
                                        </option>
                                        <option value="Below"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_boundary=='Below') selected @endif @endisset>
                                            Below
                                        </option>
                                        <option value="Equals"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_boundary=='Equals') selected @endif @endisset>
                                            Equals
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div id="current_salary" class="form-group col-md-5 p-0 pl-1 ">
                                <div class="form-group">
                                    <input type="text" name="current_salary"
                                           value="@isset($jobseeker->additional) {{ $jobseeker->additional->current_salary }} @endisset"
                                           class="textInput form-control"
                                           placeholder="Amount" maxlength="15">
                                </div>
                            </div>
                            <div id="current_salary_basic" class="form-group col-md-3  p-0 pl-1">
                                <div class="form-group">
                                    <select name="current_salary_basic" class="select form-control"
                                            style="background: none!important;">
                                        <option value="Hourly"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_basic=='Hourly') selected @endif @endisset>
                                            Hourly
                                        </option>
                                        <option value="Daily"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_basic=='Daily') selected @endif @endisset>
                                            Daily
                                        </option>
                                        <option value="Weekly"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_basic=='Weekly') selected @endif @endisset>
                                            Weekly
                                        </option>
                                        <option value="Monthly"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_basic=='Monthly') selected @endif @endisset>
                                            Monthly
                                        </option>
                                        <option value="Yearly"
                                                @isset($jobseeker->additional) @if($jobseeker->additional->current_salary_basic=='Yearly') selected @endif @endisset>
                                            Yearly
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  location">
                    <div class="col-md-3">
                        <label for="float-left" class="pl-3 pl-md-0  requiredField ">
                            Location<span class="asteriskField">*</span> </label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class=" form-control" name="job_preference_location" id="job_preference_location"
                                   value="@isset($jobseeker->additional) {{ $jobseeker->additional->job_preference_location }}  @endisset">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="float-xs-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary ">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>


    $(document).ready(function () {
        $('#job_categories').select2({
            multiple: true,
            placeholder: 'Select Job Categories',
            width: '100%',
        });
        $('#skills').select2({
            multiple: true,
            placeholder: 'Select Skills',
            width: '100%',
        });
    });


</script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-kHRaqZRqIjrKryJfhy6V0svlzVak3tg&libraries=places"></script>

<script>
    var input = document.getElementById('job_preference_location');
    var options = {
        types: ['(cities)'],
        componentRestrictions: {country: 'np'}
    };


    autocomplete = new google.maps.places.Autocomplete(input, options);
</script>