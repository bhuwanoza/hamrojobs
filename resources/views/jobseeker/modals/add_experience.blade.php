<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form id="addExperience" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Experience</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">

                <div class="formset-form location-form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="organization_title" class="pl-3 pl-md-0  requiredField ">
                                    Organization name<span class="asteriskField">*</span> </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="organization_title" id="organization_title"
                                       maxlength="255"
                                       class="textinput textInput form-control">
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-3 pl-2">
                        <div class="form-group">
                            <div class="col-sm-offset-2 form-group">
                                <div class="checkbox">
                                    <input type="checkbox" name="hide_organization" id="hide_organization"
                                           class="is-current checkboxinput">
                                    <label for="hide_organization">
                                        <span class="text-muted">Hide org name?</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="organization_nature"
                                       class="pl-3 pl-md-0  requiredField ">
                                    Nature of Organization<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="organization_nature" id="organization_nature"
                                       class="select form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="job_location"
                                       class="pl-3 pl-md-0  requiredField ">
                                    Job Location<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="job_location" id="job_location" class="form-control"
                                       maxlength="100" placeholder="Enter a location">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="job_title" class="pl-3 pl-md-0  requiredField ">
                                    Job Title<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input name="job_title" id="job_title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="job_category"
                                       class="pl-3 pl-md-0  requiredField ">
                                    Job category
                                    <span class="asteriskField">*</span> </label>
                            </div>
                            <div class="col-md-8">
                                <select name="job_category" id="job_category" class="select form-control">
                                    @isset($industries)
                                        @foreach($industries as $industry)
                                            <option value="{{ $industry->id }}"> {{ $industry->title }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="job_level" class="pl-3 pl-md-0  requiredField ">
                                    Job level<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <select name="job_level" id="job_level" class="select form-control">
                                    <option value="Top Level">Top Level</option>
                                    <option value="Senior Level">Senior Level</option>
                                    <option value="Mid Level">Mid Level</option>
                                    <option value="Entry Level" selected="">Entry Level</option>

                                </select></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="organization" class="pl-3 pl-md-0  requiredField ">
                                    Organization Type<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <select name="organization" id="organization" class="select form-control">
                                    <option value="Private">Private</option>
                                    <option value="Public">Public</option>
                                    <option value="Government">Government</option>
                                    <option value="NGO">NGO</option>
                                    <option value="INGOS">INGOS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-3 pl-2">
                        <div class="form-group">
                            <div class="col-sm-offset-2 form-group">
                                <div class="checkbox">
                                    <input type="checkbox" name="currently_working" id="currently_working"
                                           class="is-current checkboxinput">
                                    <label for="currently_working">
                                        <span class="text-muted">Currently Working here?</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-inline pb-md-3 exp-start-date" id="exp_start_year">
                        <div class="col-md-3">
                            <label class="float-left float-md-right">Start Date<span
                                        class="asteriskField">*</span>
                            </label>
                        </div>
                        <div class="completion-form-year">
                            <div class="form-group">
                                <div class="form-group">
                                    <select name="start_date_year" id="start_date_year"
                                            class="w-100 select form-control" style="background: none!important;">
                                        @php
                                            $year= Date('Y');
                                        @endphp

                                        @for($i=1985; $i<=$year; $i++)
                                            <option value="{{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="start_date_month" id="start_date_year"
                                    class="ml-1  completion-form-month select form-control"
                                    style="background: none!important;">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10" selected>October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>

                            </select>
                            <select name="start_date_day" id="start_date_day"
                                    class="ml-1  completion-form-month select form-control"
                                    style="background: none!important;">
                                @for($i=1; $i<=31; $i++)
                                    <option value="{{ $i }}"> {{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                    </div>
                    <div class="form-inline pb-md-3 exp-end-date" id="exp_end_year">
                        <div class="col-md-3">
                            <label class="float-left float-md-right">End Date*</label>
                        </div>
                        <div class="completion-form-year">
                            <div class="form-group">
                                <div class="form-group">
                                    <select name="end_date_year"
                                            id="end_date_year"
                                            class="w-100 select form-control"
                                            style="background: none!important;">
                                        @php
                                            $year= Date('Y');
                                        @endphp

                                        @for($i=1985; $i<=$year; $i++)
                                            <option value="{{ $i }}"> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="end_date_month" id="end_date_month"
                                    class="ml-1  completion-form-month select form-control"
                                    style="background: none!important;">
                                <option value="">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10" selected>October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>

                            <select name="end_date_day" id="end_date_month"
                                    class="ml-1  completion-form-month select form-control"
                                    style="background: none!important;">
                                @for($i=1; $i<=31; $i++)
                                    <option value="{{ $i }}"> {{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="duties_responsibilities"
                                       class="pl-3 pl-md-0  requiredField ">
                                    Duties &amp; Responsibilities<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <textarea rows="7" class="form-control" name="duties_responsibilities"
                                          id="duties_responsibilities" placeholder="Job Description"></textarea>
                                <span id="" class="text-muted">
                                    You are suggested to fill your actual duties and responsibilities,
                                    along with your major achievements to highlight yourself among the recruiters.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="submit" class="btn btn-primary ">Save</button>
            </div>
        </form>
    </div>
</div>