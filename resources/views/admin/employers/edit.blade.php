<div class="modal-dialog modal-lg">
    <div class="modal-content data">
        <div class="modal-header bg_light_blue">
            <div class="box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-edit"></i>
                <h3 class="box-title"> Edit Employer :
                    <span>@isset($employer) {{ $employer->user->first_name }} {{ $employer->user->last_name }} @endisset
                        "</span></h3>
            </div>
        </div>
        <div class="modal-body">
            <form id="updateEmployerForm" enctype="multipart/form-data" data-id="{{ $employer->user->id }}">
                <div class="row">
                    <div class="header ">
                        <h3 style="margin: 10px"> Personal Information</h3>
                        <hr>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control"
                                       value="@isset($employer->user->first_name){{ $employer->user->first_name }}@endisset"
                                       placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control"
                                       value="@isset($employer->user->last_name){{ $employer->user->last_name }}@endisset"
                                       placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Id</label>
                                <input type="email" name="email" class="form-control"
                                       value="@isset($employer->user->email){{ $employer->user->email }}@endisset">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile No</label>
                                <input type="text" name="mobile" class="form-control"
                                       value="@isset($employer->user->mobile){{ $employer->user->mobile }}@endisset">
                            </div>
                        </div>
                        <p class="note" style="color: red"><strong>Note : </strong> Enter password if you want to update
                            password</p>
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
                                <input type="text" name="address" class="form-control"
                                       value="@isset($employer->user->address){{ $employer->user->address }}@endisset">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="header ">
                        <h3 style="margin: 10px"> Company Information </h3>
                        {{--@isset($employer->company->title){{ $employer->company->title }}@endisset--}}
                        <hr>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input class="form-control" id="company_name" name="company_name"
                                           value="@isset($employer->company->title){{ $employer->company->title }}@endisset"
                                           type="text">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_industry">Select Industry</label>
                                    <select class="form-control select select2" id="company_industry"
                                            name="company_industry">
                                        @if(isset($industries))
                                            @foreach($industries->sortBy('title') as $industry)
                                                <option value="@isset($industries){{ $industry->id }}@endisset"> {{ $industry->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Address </label>
                                    <input type="text" class="form-control" name="company_address" id="company_address"
                                           value="@isset($employer->company->address){{ $employer->company->address }}@endisset"
                                           placeholder="Baneshwor, Kathmandu, Nepal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_email">Company Email</label>
                                    <input name="company_email" type="email" class="form-control" id="company_email"
                                           value="@isset($employer->company->email){{ $employer->company->email }}@endisset"
                                           placeholder="Eg : info@company.com">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Phone</label>
                                    <input name="company_phone" type="tel" class="form-control" id="company_phone"
                                           value="@isset($employer->company->phone){{ $employer->company->phone }}@endisset"
                                           placeholder="Eg : 01420202">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_website">Company Website</label>
                                    <input name="company_website" type="text" class="form-control" id="company_website"
                                           value="@isset($employer->company->website){{ $employer->company->website }}@endisset"
                                           placeholder="Eg : https://company.org">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Fax</label>
                                    <input name="company_fax" type="tel" class="form-control" id="company_fax"
                                           value="@isset($employer->company->fax){{ $employer->company->fax }}@endisset"
                                           placeholder="Eg : 01420202">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_employers">Number of Employers</label>
                                    <select name="company_employers" id="company_employers" class="form-control">
                                        <option value="1-10" @isset($employer->company->total_employees) @if($employer->company->total_employees=='1-10') selected @endif @endisset>1-10</option>
                                        <option value="10-50" @isset($employer->company->total_employees) @if($employer->company->total_employees=='10-50') selected @endif @endisset>10-50</option>
                                        <option value="50-100" @isset($employer->company->total_employees) @if($employer->company->total_employees=='50-100') selected @endif @endisset>50-100</option>
                                        <option value="100-200" @isset($employer->company->total_employees) @if($employer->company->total_employees=='100-200') selected @endif @endisset>100-200</option>
                                        <option value="200-500" @isset($employer->company->total_employees) @if($employer->company->total_employees=='200-500') selected @endif @endisset>200-500</option>
                                        <option value="500-1000" @isset($employer->company->total_employees) @if($employer->company->total_employees=='500-1000') selected @endif @endisset>500-1000</option>
                                        <option value="Above 1000" @isset($employer->company->total_employees) @if($employer->company->total_employees=='Above 1000') selected @endif @endisset>Above 1000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_branches">Number of Branches</label>
                                    <input name="company_branches" type="number" class="form-control"
                                           value="@isset($employer->company->branches){{ $employer->company->branches }}@endisset"
                                           id="company_branches" min="0" max="100">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_establish">Established Data </label>
                                    <input type="date" class="form-control" id="company_establish"
                                           value="@isset($employer->company->established_date){{ $employer->company->established_date }}@endisset"
                                           name="company_establish" placeholder="2018">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_ownership">Ownership Type</label>
                                    <select name="company_ownership" class="select form-control" required=""
                                            id="company_ownership">
                                        <option value="Private"
                                                @isset($employer->company->ownership) @if($employer->company->ownership=='Private') selected @endif @endisset >
                                            Private
                                        </option>
                                        <option value="Public"
                                                @isset($employer->company->ownership) @if($employer->company->ownership=='Public') selected @endif @endisset>
                                            Public
                                        </option>
                                        <option value="Government"
                                                @isset($employer->company->ownership) @if($employer->company->ownership=='Government') selected @endif @endisset>
                                            Government
                                        </option>
                                        <option value="NGO"
                                                @isset($employer->company->ownership) @if($employer->company->ownership=='NGO') selected @endif @endisset>
                                            NGO'S
                                        </option>
                                        <option value="INGOS"
                                                @isset($employer->company->ownership) @if($employer->company->ownership=='INGOS') selected @endif @endisset>
                                            INGO'S
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_description">Company Description Type</label>
                                    <textarea name="company_description" id="company_description" cols="110"
                                              rows="6">@isset($employer->company->description){{ $employer->company->description }}@endisset</textarea>
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
                                @isset($employer->company)
                                    <p class="note" style="color: red"><strong>Note : </strong> Leave blank if you don't
                                        want to update company logo.</p>
                                    @if(file_exists(public_path('uploads/companies/logos/' . $employer->company->logo)))
                                        <img class="profile-user-img img-responsive "
                                             src="{{ asset('uploads/companies/logos/' . $employer->company->logo) }}"
                                             alt="" style="height: 150px; width: 80%">
                                    @else
                                        <img class="profile-user-img img-responsive "
                                             src="{{ asset('uploads/default/default-company-logo.png') }}"
                                             alt="" style="height: 150px; width: 80%">
                                    @endif
                                @endisset
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_banner">Company Banner</label>
                                    <input id="company_banner" class="image" name="company_banner" type="file"
                                           accept="image">
                                </div>
                                @isset($employer->company)
                                    <p class="note" style="color: red"><strong>Note : </strong>Leave blank if you don't
                                        want
                                        to update company banner.</p>
                                    @if(file_exists(public_path('uploads/companies/covers/' . $employer->company->cover_image)))
                                        <img class="profile-user-img img-responsive "
                                             src="{{ asset('uploads/companies/covers/' . $employer->company->cover_image) }}"
                                             alt="" style="height: 200px; width: 100%">
                                    @else
                                        <img class="profile-user-img img-responsive "
                                             src="{{ asset('uploads/default/default-company-cover.png') }}"
                                             alt="" style="height: 200px; width: 100%">
                                    @endif
                                @endisset
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success"><i
                                class="fa fa-briefcase"></i> Update Employer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('company_description');
</script>