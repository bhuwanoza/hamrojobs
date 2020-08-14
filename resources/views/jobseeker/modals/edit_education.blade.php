<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="" id="editEducation" enctype="multipart/form-data" data-id="{{ $academic->id }}">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Education</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="formset-form">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3 ">
                                <label for="academic_degree"
                                       class="pl-3 pl-md-0  requiredField ">
                                    Degree
                                    <span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">

                                <select class="form-control" name="academic_degree" id="academic_degree">
                                    @isset($qualifications)
                                        @foreach($qualifications as $qualification)
                                            <option value="{{ $qualification->id }}" @if($qualification->id==$academic->qualification->id) selected @endif>{{ $qualification->title }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3 ">
                                <label for="academic_program"
                                       class="pl-3 pl-md-0  requiredField ">
                                    Education Program<span class="asteriskField">*</span> </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="academic_program" id="academic_program"
                                       value="{{ $academic->academic_program }}"
                                       placeholder="Eg: Bachelor of Information Technology">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3 ">
                                <label for="academic_board"
                                       class="pl-3 pl-md-0  requiredField ">
                                    Education Board<span class="asteriskField">*</span> </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="academic_board" id="academic_board"
                                       value="{{ $academic->academic_board }}"
                                       placeholder="Eg: Purbanchal University">
                            </div>
                        </div>
                    </div>
                    <div class="form-group  ">
                        <div class="row">
                            <div class="col-md-3 ">
                                <label for="academic_institute" class="pl-3 pl-md-0  requiredField ">
                                    Name of Institute<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="academic_institute"
                                       value="{{ $academic->academic_institute }}"
                                       id="academic_institute" placeholder="Eg: Nepal Commerce Campus">
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-3 pl-2">
                        <div class="form-group">
                            <div class="col-sm-offset-2 form-group">
                                <div class="checkbox">
                                    <input type="checkbox" name="currently_studying" id="currently_studying"
                                           class="is-current checkboxinput"
                                           @if($academic->end_date==null)  checked @endif>
                                    <label for="currently_studying">
                                        <span class="text-muted">Currently studying here?</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row marks-secured">
                        <div class="col-md-3">
                            <span class="float-left pl-3 pl-md-0 float-md-right">Marks Secured In</span>
                        </div>
                        <div class="col-md-3 col-6 pr-0">
                            <div class="form-group">
                                <div class="form-group">
                                    <select name="grade_type" class="w-100 select form-control"
                                            style="background: none!important;">
                                        <option value="Percentage" @if($academic->grade_type=='Percentage') selected @endif>Percentage</option>
                                        <option value="CGPA" @if($academic->grade_type=='CGPA') selected @endif>CGPA</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 pl-1">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" name="mark_secured" id="mark_secured"
                                           value="{{ $academic->mark_secured }}"
                                           placeholder="Marks Secured: 80%"
                                           class="textInput form-control" maxlength="20"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">

                            <div class="form-inline pb-3 graduation-date" id="grad_start_year" style="align-items: flex-start">
                                <div class="col-md-3">
                                    <label class="float-left float-md-right graduation-label">
                                        Started Year
                                    </label>
                                </div>

                                @php
                                    $date = explode("-", $academic->start_date);
                                    $s_day = $date[2];
                                    $s_month = $date[1];
                                    $s_year = $date[0];

                                @endphp

                                <div class="completion-form-year">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select name="start_date_year" id="start_date_year"
                                                    class="w-100 select form-control"
                                                    style="background: none!important;">
                                                @php
                                                    $year= Date('Y');
                                                @endphp
                                                @for($i=1985; $i<=$year; $i++)
                                                    <option value="{{ $i }}"
                                                            @if($s_year==$i) selected @endif> {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
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
                            </div>
                            <div class="form-inline pb-3 graduation-date" id="grad_end_year" style="align-items: flex-start ;@if(!$academic->end_date) display:none; @endif">
                                <div class="col-md-3">
                                    <label class="float-left float-md-right graduation-label">Graduation
                                        Year
                                    </label>
                                </div>

                                @php
                                    if($academic->end_date){
                                        $date = explode("-", $academic->end_date);
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