<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

        <form enctype="multipart/form-data" id="editProfile">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Your Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group ">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="center">
                                <div class="thumb "
                                     style="height: 150px;width: 250px; padding: 10px 20px">
                                    @if(file_exists(public_path('uploads/jobseekers/' . $jobseeker->image)))
                                        <img class="rounded-circle" src="{{ asset('uploads/jobseekers/' . $jobseeker->image) }}"
                                             alt="">
                                    @else
                                        <img class="rounded-circle" src="{{ asset('uploads/default/default-user.png') }}"
                                             alt="">
                                    @endif
                                </div>
                                <div class="center">
                                    <label for="user_image"> <i class="fa fa-upload"></i>
                                        Update image</label>
                                    <input type="file" name="user_image"
                                           id="user_image" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="first_name" class="pl-3 pl-md-0  requiredField ">
                                First Name<span>*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}"
                                   class=" textInput form-control" maxlength="100" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="last_name" class="pl-3 pl-md-0  requiredField ">
                                Last Name<span>*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}"
                                   class=" textInput form-control" maxlength="100" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="id_gender" class="pl-3 pl-md-0  requiredField ">
                                Gender<span>*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <select name="gender" class="select form-control"  id="id_gender">
                                <option value="Male" @if($jobseeker->gender=='Male') selected @endif>Male</option>
                                <option value="Female" @if($jobseeker->gender=='Female')selected @endif>Female</option>
                                <option value="Not Specified" @if($jobseeker->gender=='Not Specified')selected @endif>
                                    Not Specified
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="id_dob" class="pl-3 pl-md-0  requiredField ">
                                Date of Birth<span>*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input type="date" name="dob" id="id_dob" value="{{ $jobseeker->dob }}"
                                   class="datepicker form-control"
                                   required="" data-date-format="yyyy-mm-dd"
                                   placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="id_marital_status" class="pl-3 pl-md-0  requiredField ">
                                Marital status<span>*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <select name="marital_status" class="select form-control" required=""
                                    id="id_marital_status">
                                <option value="Single" @if($jobseeker->marital_status=='Single') selected @endif>
                                    Unmarried
                                </option>
                                <option value="Married" @if($jobseeker->marital_status=='Married') selected @endif>
                                    Married
                                </option>
                                <option value="Not Specified"
                                        @if($jobseeker->marital_status=='Not Specified') selected @endif>Not Specified
                                </option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="id_religion" class="pl-3 pl-md-0 ">
                                Religion
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="religion" id="id_religion" value="{{ $jobseeker->religion }}"
                                   class=" textInput form-control" maxlength="100">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="id_nationality" class="pl-3 pl-md-0  requiredField ">
                                Nationality<span>*</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nationality" id="id_nationality"
                                   value="{{ $jobseeker->nationality }}"
                                   class=" textInput form-control" maxlength="20">
                        </div>
                    </div>
                </div>
                <div class="location-form">
                    <div class="form-group  ">
                        <div class="row">
                            <div class="col-md-3 text-right">
                                <label for="id_current_address" class="pl-3 pl-md-0  requiredField ">
                                    Current Address<span>*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="current_address"
                                       value="{{ $jobseeker->current_address }}"
                                       class=" textInput form-control" maxlength="200" id="id_current_address"
                                       placeholder="Enter your current address" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="location-form">
                    <div class="form-group  ">
                        <div class="row">
                            <div class="col-md-3 text-right">
                                <label for="id_permanent_address" class="pl-3 pl-md-0  requiredField ">
                                    Permanent Address<span>*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="permanent_address"
                                       value="{{ $jobseeker->permanent_address }}"
                                       class=" textInput form-control" maxlength="200" id="id_permanent_address"
                                       placeholder="Enter your permanent address" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="user_contact">
                    <div id="contact-formset">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="mobile_primary"
                                       class="float-left float-md-right pl-md-0 pl-3 requiredField">
                                    Mobile (Primary)<span>*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <div id="div_id_form-1-number" class="form-group">
                                    <div class="">
                                        <input type="text" name="mobile_primary" id="mobile_primary"
                                               value="{{ $user->mobile }}"
                                               class="textInput form-control"
                                               placeholder="Primary Mobile Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="contact-formset">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="mobile_secondary"
                                       class="float-left float-md-right pl-md-0 pl-3 requiredField">
                                    Mobile (Secondary)
                                </label>
                            </div>
                            <div class="col-md-8">
                                <div id="div_id_form-1-number" class="form-group">
                                    <div class="">
                                        <input type="text" name="mobile_secondary" id="mobile_secondary"
                                               value="{{ $jobseeker->mobile }}"
                                               class="textInput form-control"
                                               placeholder="Secondary Mobile Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label for="id_about_me" class="pl-3 pl-md-0  ">
                                About Me
                            </label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="about_me" id="id_about_me" class="form-control" cols="30" rows="10">{{ $jobseeker->about_me }}</textarea>
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