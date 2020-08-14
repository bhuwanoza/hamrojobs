<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form  enctype="multipart/form-data" id="updateCompanyForm" data-id="{{ $company->id }}">
            {{csrf_field()}}
        <div class="modal-header bg_light_blue">
            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-edit"></i>
                <h3 class="box-title"> Edit Company : <span>"@isset($company){{ $company->title }} @endisset"</span></h3>
            </div>
        </div>
        <div class="modal-body">

                <div class="row">
                    <div class="header">
                        <h2 class="text-center"><strong class="label label-warning"><i class="fa fa-briefcase"></i>  @isset($company->title){{ $company->title }}@endisset </strong>  </h2>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input class="form-control" id="company_name" name="company_name"
                                           value="@isset($company->title){{ $company->title }}@endisset" type="text">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_industry">Select Industry</label>
                                    <select class="form-control select select2" id="company_industry" name="company_industry">
                                        @if(isset($industries))
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->id }}" @if($company->industry_id ==$industry->id) selected @endisset> {{ $industry->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Address </label>
                                    <input type="text" class="form-control" name="company_address" id="company_address"
                                           value="@isset($company->address){{ $company->address }}@endisset" placeholder="Baneshwor, Kathmandu, Nepal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_email">Company Email</label>
                                    <input name="company_email" type="email" class="form-control" id="company_email"
                                           value="@isset($company->email){{ $company->email }}@endisset" placeholder="Eg : info@company.com">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Phone</label>
                                    <input name="company_phone" type="tel" class="form-control" id="company_phone"
                                           value="@isset($company->phone){{ $company->phone }}@endisset" placeholder="Eg : 01420202">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_website">Company Website</label>
                                    <input name="company_website" type="text" class="form-control" id="company_website"
                                           value="@isset($company->website){{ $company->website }}@endisset" placeholder="Eg : https://company.org">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Fax</label>
                                    <input name="company_fax" type="tel" class="form-control" id="company_fax"
                                           value="@isset($company->fax){{ $company->fax }}@endisset" placeholder="Eg : 01420202">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_employers">Number of Employers</label>
                                    <select name="company_employers" id="company_employers" class="form-control">
                                        <option value="1-10" @isset($company->total_employees) @if($company->total_employees=='1-10') selected @endif @endisset>1-10</option>
                                        <option value="10-50" @isset($company->total_employees) @if($company->total_employees=='10-50') selected @endif @endisset>10-50</option>
                                        <option value="50-100" @isset($company->total_employees) @if($company->total_employees=='50-100') selected @endif @endisset>50-100</option>
                                        <option value="100-200" @isset($company->total_employees) @if($company->total_employees=='100-200') selected @endif @endisset>100-200</option>
                                        <option value="200-500" @isset($company->total_employees) @if($company->total_employees=='200-500') selected @endif @endisset>200-500</option>
                                        <option value="500-1000" @isset($company->total_employees) @if($company->total_employees=='500-1000') selected @endif @endisset>500-1000</option>
                                        <option value="Above 1000" @isset($company->total_employees) @if($company->total_employees=='Above 1000') selected @endif @endisset>Above 1000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_branches">Number of Branches</label>
                                    <input name="company_branches" type="number" class="form-control"
                                           value="@isset($company->branches){{ $company->branches }}@endisset" id="company_branches" min="0" max="100">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_establish">Established Data </label>
                                    <input type="date" class="form-control" id="company_establish"
                                           value="@isset($company->established_date){{ $company->established_date }}@endisset" name="company_establish" placeholder="2018">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_ownership">Ownership Type</label>
                                    <select name="company_ownership" class="select form-control" required=""
                                            id="company_ownership">
                                        <option value="Private"@isset($company->ownership) @if($company->ownership=='Private') selected @endif @endisset >Private</option>
                                        <option value="Public" @isset($company->ownership) @if($company->ownership=='Public') selected @endif @endisset>Public</option>
                                        <option value="Government" @isset($company->ownership) @if($company->ownership=='Government') selected @endif @endisset>Government</option>
                                        <option value="NGO" @isset($company->ownership) @if($company->ownership=='NGO') selected @endif @endisset>NGO'S</option>
                                        <option value="INGOS" @isset($company->ownership) @if($company->ownership=='INGOS') selected @endif @endisset>INGO'S</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_description">Company Description</label>
                                    <textarea name="company_description" id="company_description" cols="110" rows="6">@isset($company->description){{ $company->description }}@endisset</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_logo">Company Logo</label>
                                    <input id="company_logo" class="image" name="company_logo" type="file" accept="image">
                                </div>
                                <p class="note" style="color: red"><strong>Note : </strong> Leave the field blank if you don't want to change picture.</p>
                                @if(file_exists('uploads/companies/logos/' . $company->logo))
                                    <img class="profile-user-img img-responsive "
                                         src="{{ asset('uploads/companies/logos/' . $company->logo) }}"
                                         alt="" style="height: 150px; width: 80%">
                                @else
                                    <img class="profile-user-img img-responsive "
                                         src="{{ asset('uploads/default/default-company-logo.png') }}"
                                         alt="" style="height: 150px; width: 80%">
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_banner">Company Banner</label>
                                    <input id="company_banner" class="image" name="company_banner" type="file" accept="image">
                                </div>
                                <p class="note" style="color: red"><strong>Note : </strong> Leave the field blank if you don't want to change picture.</p>


                                @if(file_exists(public_path('uploads/companies/covers/' . $company->cover_image)))
                                    <img class="profile-user-img img-responsive "
                                         src="{{ asset('uploads/companies/covers/' . $company->cover_image) }}"
                                         alt="" style="height: 200px; width: 100%">
                                @else
                                    <img class="profile-user-img img-responsive "
                                         src="{{ asset('uploads/default/default-company-cover.png') }}"
                                         alt="" style="height: 200px; width: 100%">
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-show" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
            <button type="submit" class="btn btn-success" ><i class="fa fa-briefcase"></i> Update Company</button>
        </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('company_description');
</script>
