<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <div class="modal-header bg_light_blue">
            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-briefcase"></i>
                <h3 class="box-title"> Add New Employer</h3>
            </div>
        </div>
        <div class="modal-body">
            <form id="addEmployerForm" enctype="multipart/form-data">
                <div class="row">
                    <div class="header">
                        <h3 style="margin: 10px"> Personal Information</h3>
                        <hr>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Id</label>
                                <input type="email" name="email" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile No</label>
                                <input type="text" name="mobile" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Repeat Password</label>
                                <input type="password" name="password_confirmation" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="header">
                        <h3 style="margin: 10px"> Company Information</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input class="form-control" id="company_name" name="company_name"
                                           placeholder="Eg: Apple Inc" type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_industry">Select Industry</label>
                                    <select class="form-control select select2" id="company_industry" name="company_industry">
                                        @if(isset($industries))
                                            @foreach($industries->sortBy('title') as $industry)
                                                <option value="{{ $industry->id }}"> {{ $industry->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Address </label>
                                    <input type="text" class="form-control" name="company_address" id="company_address"
                                           placeholder="Baneshwor, Kathmandu, Nepal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_email">Company Email</label>
                                    <input name="company_email" type="email" class="form-control" id="company_email"
                                           placeholder="Eg : info@company.com">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Phone</label>
                                    <input name="company_phone" type="tel" class="form-control" id="company_phone"
                                           placeholder="Eg : 01420202">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_website">Company Website</label>
                                    <input name="company_website" type="text" class="form-control" id="company_website"
                                           placeholder="Eg : https://company.org">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Fax</label>
                                    <input name="company_fax" type="tel" class="form-control" id="company_fax"
                                           placeholder="Eg : 01420202">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_employers">Number of Employers</label>
                                    <select name="company_employers" id="company_employers" class="form-control">
                                        <option value="1-10">1-10</option>
                                        <option value="10-50">10-50</option>
                                        <option value="50-100">50-100</option>
                                        <option value="100-200">100-200</option>
                                        <option value="200-500">200-500</option>
                                        <option value="500-1000" >500-1000</option>
                                        <option value="Above 1000">Above 1000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_branches">Number of Branches</label>
                                    <input name="company_branches" type="number" class="form-control"
                                           id="company_branches" min="0" max="100">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_establish">Established Data </label>
                                    <input type="date" class="form-control" id="company_establish"
                                           name="company_establish" placeholder="2018">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_ownership">Ownership Type</label>
                                    <select name="company_ownership" class="select form-control" required=""
                                            id="company_ownership">
                                        <option value="Private" selected>Private</option>
                                        <option value="Public" selected>Public</option>
                                        <option value="Government" selected>Government</option>
                                        <option value="NGO" selected>NGO'S</option>
                                        <option value="INGOS" selected>INGO'S</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_description">Company Description Type</label>
                                    <textarea name="company_description" id="company_description" cols="110" rows="6">
                                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_logo">Company Logo</label>
                                    <input id="company_logo" class="image" name="company_logo" type="file"
                                           accept="image">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_banner">Company Banner</label>
                                    <input id="company_banner" class="image" name="company_banner"
                                           type="file" accept="image">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-briefcase"></i> Add Employer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('company_description');
</script>