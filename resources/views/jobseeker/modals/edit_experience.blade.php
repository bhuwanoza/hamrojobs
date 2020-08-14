<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form id="editExperience" enctype="multipart/form-data" data-id="{{ $experience->id }}">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Experience</h4>
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
                                <input type="text" name="organization_title" id="organization_title" value="{{ $experience->organization_title }}"
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
                                           class="is-current checkboxinput"  @if($experience->hide_organization=='Yes')  checked @endif>
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
                                <input type="text" name="organization_nature" id="organization_nature" value="{{ $experience->organization_nature }}"
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
                                       value="{{ $experience->job_location }}"
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
                                <input name="job_title" id="job_title" class="form-control" value="{{ $experience->job_title }}">
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
                                            <option value="{{ $industry->id }}" @if($experience->job_industry==$industry->id) selected @endif> {{ $industry->title }}</option>
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
                                    <option value="Top Level" @if($experience->job_level=='Top Level') selected @endif>Top Level</option>
                                    <option value="Senior Level" @if($experience->job_level=='Senior Level') selected @endif>Senior Level</option>
                                    <option value="Mid Level" @if($experience->job_level=='Mid Level') selected @endif>Mid Level</option>
                                    <option value="Entry Level" @if($experience->job_level=='Entry Level') selected @endif>Entry Level</option>

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
                                    <option value="Private" @if($experience->organization=='Private') selected @endif>Private</option>
                                    <option value="Public" @if($experience->organization=='Public') selected @endif>Public</option>
                                    <option value="Government" @if($experience->organization=='Government') selected @endif>Government</option>
                                    <option value="NGO" @if($experience->organization=='NGO') selected @endif>NGO</option>
                                    <option value="INGOS" @if($experience->organization=='INGOS') selected @endif>INGOS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-3 pl-2">
                        <div class="form-group">
                            <div class="col-sm-offset-2 form-group">
                                <div class="checkbox">
                                    <input type="checkbox" name="currently_working" id="currently_working"
                                           class="is-current checkboxinput" @if($experience->end_date==null)  checked @endif>
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

                        @php
                            $date = explode("-", $experience->start_date);
                            $s_day = $date[2];
                            $s_month = $date[1];
                            $s_year = $date[0];

                        @endphp
                        <div class="completion-form-year">
                            <div class="form-group">
                                <div class="form-group">
                                    <select name="start_date_year" id="start_date_year"
                                            class="w-100 select form-control" style="background: none!important;">
                                        @php
                                            $year= Date('Y');
                                        @endphp
                                        @for($i=1985; $i<=$year; $i++)
                                            <option value="{{ $i }}" @if($s_year==$i) selected @endif> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="start_date_month" id="start_date_year"
                                    class="ml-1  completion-form-month select form-control"
                                    style="background: none!important;">
                                <option value="1" @if($s_month==1) selected @endif>January</option>
                                <option value="2" @if($s_month==2) selected @endif>February</option>
                                <option value="3" @if($s_month==3) selected @endif>March</option>
                                <option value="4" @if($s_month==4) selected @endif>April</option>
                                <option value="5" @if($s_month==5) selected @endif>May</option>
                                <option value="6" @if($s_month==6) selected @endif>June</option>
                                <option value="7" @if($s_month==7) selected @endif>July</option>
                                <option value="8" @if($s_month==8) selected @endif>August</option>
                                <option value="9" @if($s_month==9) selected @endif>September</option>
                                <option value="10" @if($s_month==10) selected @endif>October</option>
                                <option value="11" @if($s_month==11) selected @endif>November</option>
                                <option value="12" @if($s_month==12) selected @endif>December</option>

                            </select>
                            <select name="start_date_day" id="start_date_day"
                                    class="ml-1  completion-form-month select form-control"
                                    style="background: none!important;">
                                @for($i=1; $i<=31; $i++)
                                    <option value="{{ $i }}" @if($s_day==$i) selected @endif> {{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                    </div>
                    <div class="form-inline pb-md-3 exp-end-date" id="exp_end_year" @if(!$experience->end_date) style="display: none;" @endif>
                        <div class="col-md-3">
                            <label class="float-left float-md-right">End Date*</label>
                        </div>

                        @php
                            if(isset($experience->end_date)){
                                $date = explode("-", $experience->end_date);
                                $e_day = $date[2];
                                $e_month = $date[1];
                                $e_year = $date[0];
                            }
                        @endphp
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
                                            <option value="{{ $i }}"
                                                    @isset($e_year) @if($e_year==$i) selected @endif @endisset> {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="end_date_month" id="end_date_month"
                                    class="ml-1  completion-form-month select form-control"
                                    style="background: none!important;">
                                <option value="1" @isset($e_month) @if($e_month==1) selected @endif @endisset>
                                    January
                                </option>
                                <option value="2" @isset($e_month) @if($e_month==2) selected @endif @endisset>
                                    February
                                </option>
                                <option value="3" @isset($e_month) @if($e_month==3) selected @endif @endisset>
                                    March
                                </option>
                                <option value="4" @isset($e_month) @if($e_month==4) selected @endif @endisset>
                                    April
                                </option>
                                <option value="5" @isset($e_month) @if($e_month==5) selected @endif @endisset>
                                    May
                                </option>
                                <option value="6" @isset($e_month) @if($e_month==6) selected @endif @endisset>
                                    June
                                </option>
                                <option value="7" @isset($e_month) @if($e_month==7) selected @endif @endisset>
                                    July
                                </option>
                                <option value="8" @isset($e_month) @if($e_month==8) selected @endif @endisset>
                                    August
                                </option>
                                <option value="9" @isset($e_month) @if($e_month==9) selected @endif @endisset>
                                    September
                                </option>
                                <option value="10" @isset($e_month) @if($e_month==10) selected @endif @endisset>
                                    October
                                </option>
                                <option value="11" @isset($e_month) @if($e_month==11) selected @endif @endisset>
                                    November
                                </option>
                                <option value="12"
                                        @isset($e_month)  @if($e_month==12) selected @endif @endisset>December
                                </option>
                            </select>

                            <select name="end_date_day" id="end_date_month"
                                    class="ml-1  completion-form-month select form-control"
                                    style="background: none!important;">
                                @for($i=1; $i<=31; $i++)
                                    <option value="{{ $i }}"
                                            @isset($e_day) @if($e_day==$i) selected @endif @endisset> {{ $i }}</option>
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
                                          id="duties_responsibilities" placeholder="Job Description">{{ $experience->duties_responsibilities }}</textarea>
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