<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8 offset-md-2">
            <!-- modal of user detail -->
            <div class="modal fade" id="edit_user_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">User Detail</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3 text-right"><label
                                                    for="id_name" class="pl-3 pl-md-0  requiredField ">
                                                Name<span>*</span> </label></div>
                                        <div class="col-md-8">
                                            <input type="text" name="name" value="" class=" textInput form-control"
                                                   maxlength="100" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3 text-right">
                                            <label for="id_gender" class="pl-3 pl-md-0  requiredField ">
                                                Gender<span>*</span> </label></div>
                                        <div class="col-md-8"><select name="gender" class="select form-control"
                                                                      required="" id="id_gender">
                                                <option value="">---------</option>
                                                <option value="Male" selected="">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>

                                            </select></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 text-right"><label
                                                    for="id_dob" class="pl-3 pl-md-0  requiredField ">
                                                Date of Birth<span>*</span> </label></div>
                                        <div class="col-md-8"><input type="text" name="dob" value="1994-10-18"
                                                                     class=" datepicker form-control"
                                                                     required="" data-date-format="yyyy-mm-dd"
                                                                     placeholder="YYYY-MM-DD"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 text-right"><label
                                                    for="id_marital_status" class="pl-3 pl-md-0  requiredField ">
                                                Marital status<span>*</span> </label></div>
                                        <div class="col-md-8"><select name="marital_status"
                                                                      class="select form-control" required=""
                                                                      id="id_marital_status">
                                                <option value="">---------</option>
                                                <option value="Married">Married</option>
                                                <option value="Unmarried" selected="">Unmarried</option>

                                            </select></div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-right"><label
                                                    for="id_religion" class="pl-3 pl-md-0 ">
                                                Religion
                                            </label></div>
                                        <div class="col-md-8">
                                            <select name="religion" class="select form-control"

                                                    tabindex="-1">
                                                <option value="10" selected="selected">Hinduism</option>
                                                <option value="10" selected="selected">Hinduism</option>
                                                <option value="10" selected="selected">Hinduism</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-right"><label
                                                    for="id_nationality"
                                                    class="pl-3 pl-md-0  requiredField ">
                                                Nationality<span>*</span> </label></div>

                                        <div class="col-md-8">
                                            <select name="nationality" class="select form-control" tabindex="-1">
                                                <option value="10" selected="selected">Nepali</option>
                                                <option value="10" selected="selected">NEw Zealand</option>
                                                <option value="10" selected="selected">Hinduism</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="location-form">
                                    <div class="form-group  ">
                                        <div class="row">
                                            <div class="col-md-3 text-right"><label
                                                        for="id_address" class="pl-3 pl-md-0  requiredField ">
                                                    Current Address<span>*</span> </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="address"
                                                       value="Lalitpur Sub-Metropolitan City, Central Development Region, Nepal"
                                                       class=" textInput form-control" maxlength="200"
                                                       id="id_address"
                                                       required="" placeholder="Enter a location"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="location-form">
                                    <div id="div_id_paddress" class="row mb-3">
                                        <div class="col-md-3"><label for="id_paddress"
                                                                     class="form-control-label pl-md-0 pl-3 float-left float-md-right requiredField">
                                                Permanent Address<span>*</span> </label></div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" name="paddress"
                                                       class="textInput form-control"
                                                       maxlength="100"
                                                       required=""
                                                       placeholder="Enter a location"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="user_contact">
                                    <div id="contact-formset">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="float-left float-md-right pl-md-0 pl-3 requiredField">
                                                    Contact Number<span>*</span>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <div id="div_id_form-1-number_type" class="form-group">
                                                    <div class="">
                                                        <select name="form-1-number_type"
                                                                class="select form-control"
                                                                style="background: none!important;">
                                                            <option value="Mobile" selected="">Mobile</option>
                                                            <option value="Home">Home</option>
                                                            <option value="Work">Work</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div id="div_id_form-1-number" class="form-group">
                                                    <div class="">
                                                        <input type="text" name="form-1-number" value="9813931792"
                                                               class="textInput form-control"
                                                               placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <i class="far fa-trash-alt btn btn-danger delete-edit"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="mx-3 text-xs-center mb-3">
                                    <a href="javascript:void(0)" class="" id="add-more-contact">
                                        <span class="icon-circle-add mr-2"></span>Add Another Contact Number
                                    </a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-xs-right">
                        <button type="submit" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            <!--  modal of job detail -->
            <div class="modal fade" id="edit_job_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Job Preference</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="row Job_categories">
                                    <div class="col-md-3">
                                        <label for="float-left" class="pl-3 pl-md-0  requiredField ">
                                            Job categories<span class="asteriskField">*</span> </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class=" select  form-control" name="states[]">
                                                <option value="web ">web Developer</option>
                                                <option value="Designer">Designer</option>
                                                <option value="Graphics">Graphics</option>
                                                <option value="Andriod">Andriod</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row Looking_for">
                                    <div class="col-md-3">
                                        <label for="float-left" class="pl-3 pl-md-0  requiredField ">
                                            Looking for<span class="asteriskField">*</span> </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class=" select  form-control" name="states[]">
                                                <option value="web ">web Developer</option>
                                                <option value="Designer">Designer</option>
                                                <option value="Graphics">Graphics</option>
                                                <option value="Andriod">Andriod</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row Available_for">
                                    <div class="col-md-3">
                                        <label for="float-left" class="pl-3 pl-md-0  requiredField ">
                                            Available for<span class="asteriskField">*</span> </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class=" select  form-control" name="states[]">
                                                <option value="web ">web Developer</option>
                                                <option value="Designer">Designer</option>
                                                <option value="Graphics">Graphics</option>
                                                <option value="Andriod">Andriod</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row Specialization">
                                    <div class="col-md-3">
                                        <label for="float-left" class="pl-3 pl-md-0  requiredField ">
                                            Specialization<span class="asteriskField">*</span> </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class=" select  form-control" name="states[]">
                                                <option value="web ">------</option>
                                                <option value="Designer">Designer</option>
                                                <option value="Graphics">Graphics</option>
                                                <option value="Andriod">Andriod</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  Skill">
                                    <div class="col-md-3">
                                        <label for="float-left" class="pl-3 pl-md-0  requiredField ">
                                            Skill<span class="asteriskField">*</span> </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class=" select  form-control" name="states[]">
                                                <option value="web ">------</option>
                                                <option value="Designer">Designer</option>
                                                <option value="Graphics">Graphics</option>
                                                <option value="Andriod">Andriod</option>
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
                                            <div id="salary_currency" class="form-group col-md-2 pr-0 ">
                                                <div class="form-group">
                                                    <select name="salary_currency" class="select form-control"
                                                            id="id_salary_currency"
                                                            style="background: none!important;">
                                                        <option value="NRs" selected="">NRs</option>
                                                        <option value="$">$</option>
                                                        <option value="IRs">IRs</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div id="salary_operator" class="form-group col-md-2 p-0 pl-1">
                                                <div class="form-group">
                                                    <select name="salary_operator" class="select form-control"
                                                            style="background: none!important;">
                                                        <option value="Above" selected="">Above</option>
                                                        <option value="Below">Below</option>
                                                        <option value="Equals">Equals</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="salary_amount" class="form-group col-md-5 p-0 pl-1 ">
                                                <div class="form-group">
                                                    <input type="text" name="salary" value="25000.00"
                                                           class="textInput form-control" required=""
                                                           placeholder="Amount" maxlength="15">
                                                </div>
                                            </div>
                                            <div id="salary_unit" class="form-group col-md-3  p-0 pl-1">
                                                <div class="form-group">
                                                    <select name="salary_unit" class="select form-control"
                                                            style="background: none!important;">
                                                        <option value="Hourly">Hourly</option>
                                                        <option value="Daily">Daily</option>
                                                        <option value="Weekly">Weekly</option>
                                                        <option value="Monthly" selected="">Monthly</option>
                                                        <option value="Yearly">Yearly</option>
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
                                            <div id="salary_currency" class="form-group col-md-2 pr-0 ">
                                                <div class="form-group">
                                                    <select name="current_currency" class="select form-control"
                                                            id="id_current_currency"
                                                            style="background: none!important;">
                                                        <option value="NRs" selected="">NRs</option>
                                                        <option value="$">$</option>
                                                        <option value="IRs">IRs</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div id="current_operator" class="form-group col-md-2 p-0 pl-1">
                                                <div class="form-group">
                                                    <select name="salary_operator" class="select form-control"
                                                            style="background: none!important;">
                                                        <option value="Above" selected="">Above</option>
                                                        <option value="Below">Below</option>
                                                        <option value="Equals">Equals</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="salary_amount" class="form-group col-md-5 p-0 pl-1 ">
                                                <div class="form-group">
                                                    <input type="text" name="salary" value="25000.00"
                                                           class="textInput form-control" required=""
                                                           placeholder="Amount" maxlength="15">
                                                </div>
                                            </div>
                                            <div id="salary_unit" class="form-group col-md-3  p-0 pl-1">
                                                <div class="form-group">
                                                    <select name="salary_unit" class="select form-control"
                                                            style="background: none!important;">
                                                        <option value="Hourly">Hourly</option>
                                                        <option value="Daily">Daily</option>
                                                        <option value="Weekly">Weekly</option>
                                                        <option value="Monthly" selected="">Monthly</option>
                                                        <option value="Yearly">Yearly</option>
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
                                            <input type="text" class=" form-control" name="location" value="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-xs-right">
                        <button type="submit" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            <!-- modal of education detail -->
            <div class="modal fade" id="edit_edu_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Education</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <div class="formset-form">
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <label for="id_form-0-degree-selectized"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Degree<span class="asteriskField">*</span> </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select data-local="true" class="select form-control selectized"
                                                    tabindex="-1">
                                                <option value="1" selected="selected">Bachelor</option>
                                                <option value="1" selected="selected">HSEB</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <label for="id_form-0-program-selectized"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Education Program<span class="asteriskField">*</span> </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="form-0-program" class="select form-control selectized"
                                                    tabindex="-1">
                                                <option value="58688" selected="selected">Bim (Bachelor Of
                                                    Information
                                                    Management)
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 ">
                                            <label for="id_form-0-board-selectized"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Education Board<span class="asteriskField">*</span> </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="form-0-board" class="select form-control selectized"
                                                    tabindex="-1">
                                                <option value="1" selected="selected">Tribhuvan University</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 "><label for="id_form-0-institution-selectized"
                                                                      class="pl-3 pl-md-0  requiredField ">
                                                Name of Institute<span class="asteriskField">*</span> </label></div>
                                        <div class="col-md-8">
                                            <select name="form-0-institution" id="id_form-0-institution"
                                                    class="select form-control selectized"
                                                    tabindex="-1">
                                                <option value="413887" selected="selected">Nagarjuna College Of It
                                                    (Ncit)
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="offset-md-3 pl-2">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 form-group">
                                            <div id="div_id_form-0-is_current" class="checkbox">
                                                <label for="id_form-0-is_current" class="">
                                                    <input type="checkbox" name="form-0-is_current"
                                                           class="is-current checkboxinput" checked=""> </label>
                                                <span id="hint_id_form-0-is_current" class="text-muted">Currently studying here?</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row marks-secured">
                                    <div class="col-md-3"><span class="float-left pl-3 pl-md-0 float-md-right">Marks Secured In</span>
                                    </div>
                                    <div class="col-md-3 col-6 pr-0">
                                        <div id="div_id_form-0-grade_type" class="form-group">
                                            <div class="form-group">
                                                <select name="form-0-grade_type" class="w-100 select form-control"
                                                        style="background: none!important;">
                                                    <option value="" selected="">---------</option>
                                                    <option value="Percentage">Percentage</option>
                                                    <option value="CGPA">CGPA</option>

                                                </select></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 pl-1">
                                        <div id="div_id_form-0-marks_secured" class="form-group">
                                            <div class="form-group"><input type="text" name="form-0-marks_secured"
                                                                           placeholder="Marks Secured"

                                                                           class="textInput form-control"
                                                                           maxlength="20"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-inline pb-3 graduation-date" style="align-items: flex-start">
                                    <div class="col-md-3"><label class="float-left float-md-right graduation-label">Started
                                            Year</label></div>
                                    <div class="completion-form-year">
                                        <div id="div_id_form-0-year" class="form-group">
                                            <div class="form-group">
                                                <select name="form-0-year" placeholder="Year"
                                                        id="id_form-0-year"
                                                        class="w-100 select form-control"
                                                        style="background: none!important;">
                                                    <option value="">Year</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014" selected="">2014</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2000">2000</option>
                                                    <option value="1999">1999</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1951">1951</option>
                                                    <option value="1950">1950</option>
                                                    <option value="1949">1949</option>
                                                    <option value="1948">1948</option>
                                                    <option value="1947">1947</option>
                                                    <option value="1946">1946</option>
                                                    <option value="1945">1945</option>
                                                    <option value="1944">1944</option>
                                                    <option value="1943">1943</option>
                                                    <option value="1942">1942</option>
                                                    <option value="1941">1941</option>
                                                    <option value="1940">1940</option>
                                                    <option value="1939">1939</option>
                                                    <option value="1938">1938</option>
                                                    <option value="1937">1937</option>
                                                    <option value="1936">1936</option>
                                                    <option value="1935">1935</option>
                                                    <option value="1934">1934</option>
                                                    <option value="1933">1933</option>
                                                    <option value="1932">1932</option>
                                                    <option value="1931">1931</option>
                                                    <option value="1930">1930</option>
                                                    <option value="1929">1929</option>
                                                    <option value="1928">1928</option>
                                                    <option value="1927">1927</option>
                                                    <option value="1926">1926</option>
                                                    <option value="1925">1925</option>
                                                    <option value="1924">1924</option>
                                                    <option value="1923">1923</option>
                                                    <option value="1922">1922</option>
                                                    <option value="1921">1921</option>
                                                    <option value="1920">1920</option>
                                                    <option value="1919">1919</option>

                                                </select></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div id="div_id_form-0-month" class="form-group">
                                            <div class="form-group"><select name="form-0-month" placeholder="Month"
                                                                            id="id_form-0-month"
                                                                            class="ml-1 w-100 completion-form-month select form-control"
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
                                                    <option value="10" selected="">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>

                                                </select></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- modal of work detail -->
            <div class="modal fade" id="edit_work_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Work</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <div class="formset-form location-form">
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-org_name" class="pl-3 pl-md-0  requiredField ">
                                                Organization name<span class="asteriskField">*</span> </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="form-2-org_name" value="pagoda Labs"
                                                   maxlength="255"
                                                   class="textinput textInput form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-hide_org_name" class="pl-3 pl-md-0 ">
                                                Hide org name
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="form-2-hide_org_name" class="checkboxinput"
                                                   checked="">
                                            <span id="hint_id_form-0-hide_org_name" class="text-muted">Click to hide organization name.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-industry-selectized"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Nature of Organization<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="form-2-industry" class="select form-control selectized"
                                                    tabindex="-1">
                                                <option value="" selected="selected"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-job_location"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Job location<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="form-2-job_location"
                                                   value="shakhamul kathmandu"
                                                   class="address_autocomplete textinput textInput form-control"
                                                   maxlength="100" placeholder="Enter a location">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-designation-selectized"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Job Title<span class="asteriskField">*</span> </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="form-2-designation" class="select form-control selectized"
                                                    tabindex="-1">
                                                <option value="" selected="selected"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-job_category-selectized"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Job category<span class="asteriskField">*</span> </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="form-2-job_category" class="select form-control"
                                                    tabindex="-1">
                                                <option value="" selected="selected"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-job_level" class="pl-3 pl-md-0  requiredField ">
                                                Job level<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="form-2-job_level" class="select form-control">
                                                <option value="">---------</option>
                                                <option value="top_level">Top Level</option>
                                                <option value="senior_level">Senior Level</option>
                                                <option value="mid_level">Mid Level</option>
                                                <option value="entry_level" selected="">Entry Level</option>

                                            </select></div>
                                    </div>
                                </div>
                                <div class="offset-md-3 pl-2">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 form-group">
                                            <div id="div_id_form-0-is_current" class="checkbox">
                                                <label for="id_form-2-is_current" class="">
                                                    <input type="checkbox" class="is-current checkboxinput"
                                                           checked="">
                                                </label>
                                                <span id="hint_id_form-0-is_current" class="text-muted">Currently working here?</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-inline pb-md-3 exp-start-date">
                                    <div class="col-md-3">
                                        <label class="float-left float-md-right">Start Date<span
                                                    class="asteriskField">*</span>
                                        </label>
                                    </div>
                                    <div class="row col-md-8 pl-4 date-month">
                                        <div id="div_id_form-0-start_year" class="form-group">
                                            <div class="form-group">
                                                <select name="form-2-start_year"
                                                        class="w-100 completion-form-year select form-control"
                                                        placeholder="Year" style="background: none!important;">
                                                    <option value="">Year</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017" selected="">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2000">2000</option>
                                                    <option value="1999">1999</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1951">1951</option>
                                                    <option value="1950">1950</option>
                                                    <option value="1949">1949</option>
                                                    <option value="1948">1948</option>
                                                    <option value="1947">1947</option>
                                                    <option value="1946">1946</option>
                                                    <option value="1945">1945</option>
                                                    <option value="1944">1944</option>
                                                    <option value="1943">1943</option>
                                                    <option value="1942">1942</option>
                                                    <option value="1941">1941</option>
                                                    <option value="1940">1940</option>
                                                    <option value="1939">1939</option>
                                                    <option value="1938">1938</option>
                                                    <option value="1937">1937</option>
                                                    <option value="1936">1936</option>
                                                    <option value="1935">1935</option>
                                                    <option value="1934">1934</option>
                                                    <option value="1933">1933</option>
                                                    <option value="1932">1932</option>
                                                    <option value="1931">1931</option>
                                                    <option value="1930">1930</option>
                                                    <option value="1929">1929</option>
                                                    <option value="1928">1928</option>
                                                    <option value="1927">1927</option>
                                                    <option value="1926">1926</option>
                                                    <option value="1925">1925</option>
                                                    <option value="1924">1924</option>
                                                    <option value="1923">1923</option>
                                                    <option value="1922">1922</option>
                                                    <option value="1921">1921</option>
                                                    <option value="1920">1920</option>
                                                    <option value="1919">1919</option>

                                                </select></div>
                                        </div>
                                        <div id="div_id_form-0-start_month" class="form-group">
                                            <div class="form-group"><select name="form-2-start_month"
                                                                            class="ml-1 w-100 completion-form-month select form-control"
                                                                            placeholder="Month"
                                                                            style="background: none!important;">
                                                    <option value="">Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4" selected="">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>

                                                </select></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-inline pb-md-3 exp-end-date">
                                    <div class="col-md-3">
                                        <label class="float-left float-md-right">End Date*</label>
                                    </div>
                                    <div class="row col-md-8 pl-4 date-month">
                                        <div id="div_id_form-0-end_year" class="form-group">
                                            <div class="form-group">
                                                <select name="form-2-end_year"
                                                        class="w-100 completion-form-year select form-control wasrequired"
                                                        placeholder="Year" style="background: none!important;">
                                                    <option value="" selected="">Year</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2000">2000</option>
                                                    <option value="1999">1999</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1951">1951</option>
                                                    <option value="1950">1950</option>
                                                    <option value="1949">1949</option>
                                                    <option value="1948">1948</option>
                                                    <option value="1947">1947</option>
                                                    <option value="1946">1946</option>
                                                    <option value="1945">1945</option>
                                                    <option value="1944">1944</option>
                                                    <option value="1943">1943</option>
                                                    <option value="1942">1942</option>
                                                    <option value="1941">1941</option>
                                                    <option value="1940">1940</option>
                                                    <option value="1939">1939</option>
                                                    <option value="1938">1938</option>
                                                    <option value="1937">1937</option>
                                                    <option value="1936">1936</option>
                                                    <option value="1935">1935</option>
                                                    <option value="1934">1934</option>
                                                    <option value="1933">1933</option>
                                                    <option value="1932">1932</option>
                                                    <option value="1931">1931</option>
                                                    <option value="1930">1930</option>
                                                    <option value="1929">1929</option>
                                                    <option value="1928">1928</option>
                                                    <option value="1927">1927</option>
                                                    <option value="1926">1926</option>
                                                    <option value="1925">1925</option>
                                                    <option value="1924">1924</option>
                                                    <option value="1923">1923</option>
                                                    <option value="1922">1922</option>
                                                    <option value="1921">1921</option>
                                                    <option value="1920">1920</option>
                                                    <option value="1919">1919</option>
                                                </select></div>
                                        </div>
                                        <div id="div_id_form-0-end_month" class="form-group">
                                            <div class="form-group"><select name="form-2-end_month"
                                                                            class="ml-1 w-100 completion-form-month select form-control wasrequired"
                                                                            placeholder="Month">
                                                    <option value="">Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9" selected="">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>

                                                </select></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-job_description"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Duties &amp; Responsibilities<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">

                                                <textarea rows="7" name="editor1"
                                                          placeholder="Job Description"></textarea>
                                            <span id="hint_id_form-0-job_description" class="text-muted">
                                                You are suggested to fill your actual duties and responsibilities,
                                                along with your major achievements to highlight yourself among the recruiters.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- modal of social detail -->
            <div class="modal fade" id="edit_social_detail" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Social Account</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <div class="formset-form">
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-account_name"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Account name<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="form-2-account_name"
                                                   value="Instagram"
                                                   class="textinput textInput form-control"
                                                   placeholder="eg.: Facebook" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-2-url" class="pl-3 pl-md-0  requiredField ">
                                                Url<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="url" name="form-2-url" value=""
                                                   class="urlinput form-control"
                                                   placeholder="eg.: https://facebook.com/user"
                                                   maxlength="255"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- modal of refer detail -->
            <div class="modal fade" id="edit_refer_detail" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Social Account</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <div class="formset-form">
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-0-name" class="pl-3 pl-md-0  requiredField ">
                                                Reference's Name<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="form-0-name" id="id_form-0-name"
                                                   class="textinput textInput form-control"
                                                   maxlength="255">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-0-designation-selectized"
                                                   class="pl-3 pl-md-0  requiredField ">
                                                Job Title<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="form-0-designation" class="select form-control selectized"
                                                    tabindex="-1">
                                                <option value="" selected="selected"></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label
                                                    for="id_form-0-org_name" class="pl-3 pl-md-0  requiredField ">
                                                Organization Name<span class="asteriskField">*</span>
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="form-0-org_name"

                                                   class="textinput textInput form-control"
                                                   maxlength="255">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <div class="row">
                                        <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                            <label for="id_form-0-email" class="pl-3 pl-md-0 ">
                                                Email
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="email" name="form-0-email" class="emailinput form-control"
                                                   maxlength="254">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label class="float-left float-md-right">Contact
                                            Number(s)*</label>
                                    </div>
                                    <div class="col-md-9 form-inline form-group">
                                        <div id="div_id_form-0-type1" class="form-group">
                                            <div class="form-group">
                                                <select name="form-0-type1" class="mr-3 select form-control">
                                                    <option value="Mobile" selected="">Mobile</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Work">Work</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div id="div_id_form-0-phone1" class="form-group">
                                            <div class="form-group">
                                                <input type="text" name="form-0-phone1"
                                                       class="textinput textInput form-control"
                                                       maxlength="15">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 form-inline form-group">
                                        <div id="div_id_form-0-type2" class="form-group">
                                            <div class="form-group">
                                                <select name="form-0-type2" class="mr-3 select form-control">
                                                    <option value="Mobile" selected="">Mobile</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Work">Work</option>

                                                </select></div>
                                        </div>
                                        <div id="div_id_form-0-phone2" class="form-group">
                                            <div class="form-group">
                                                <input type="text" name="form-0-phone2"
                                                       class="textinput textInput form-control"
                                                       maxlength="15"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9 form-inline form-group">
                                        <div id="div_id_form-0-type3" class="form-group">
                                            <div class="form-group">
                                                <select name="form-0-type3" class="mr-3 select form-control">
                                                    <option value="Mobile" selected="">Mobile</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Work">Work</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div id="div_id_form-0-phone3" class="form-group">
                                            <div class="form-group"><input type="text" name="form-0-phone3"
                                                                           class="textinput textInput form-control"
                                                                           maxlength="15"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>