<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        @php
           $user=\Sentinel::getUser();
           $employer=$user->employer;
        @endphp

        <form enctype="multipart/form-data" id="updateCompany">
            <div class="modal-header">
                <h5 class="modal-title">Update Company Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input class="form-control" id="company_name" name="company_name"
                                           value="@isset($employer->company->title){{ $employer->company->title }}@endisset" type="text">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_industry">Select Industry</label>
                                    <select class="form-control select select2" id="company_industry" name="company_industry">
                                        @if(isset($industries))
                                            @foreach($industries as $industry)
                                                <option value="{{ $industry->id }}" @if($employer->company->industry_id ==$industry->id) selected @endisset> {{ $industry->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Address </label>
                                    <input type="text" class="form-control" name="company_address" id="company_address"
                                           value="@isset($employer->company->address){{ $employer->company->address }}@endisset" placeholder="Baneshwor, Kathmandu, Nepal">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_email">Company Email</label>
                                    <input name="company_email" type="email" class="form-control" id="company_email"
                                           value="@isset($employer->company->email){{ $employer->company->email }}@endisset" placeholder="Eg : info@company.com">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Phone</label>
                                    <input name="company_phone" type="tel" class="form-control" id="company_phone"
                                           value="@isset($employer->company->phone){{ $employer->company->phone }}@endisset" placeholder="Eg : 01420202">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_website">Company Website</label>
                                    <input name="company_website" type="text" class="form-control" id="company_website"
                                           value="@isset($employer->company->website){{ $employer->company->website }}@endisset" placeholder="Eg : https://company.org">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Company Fax</label>
                                    <input name="company_fax" type="tel" class="form-control" id="company_fax"
                                           value="@isset($employer->company->fax){{ $employer->company->fax }}@endisset" placeholder="Eg : 01420202">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_employers">Number of Employers</label>
                                    <input name="company_employers" type="number" class="form-control"
                                           value="@isset($employer->company->total_employees){{ $employer->company->total_employees }}@endisset"  id="company_employers" min="3" max="1000">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_branches">Number of Branches</label>
                                    <input name="company_branches" type="number" class="form-control"
                                           value="@isset($employer->company->branches){{ $employer->company->branches }}@endisset" id="company_branches" min="0" max="100">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_establish">Established Data </label>
                                    <input type="date" class="form-control" id="company_establish"
                                           value="@isset($employer->company->established_date){{ $employer->company->established_date }}@endisset" name="company_establish" placeholder="2018">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_ownership">Ownership Type</label>
                                    <select name="company_ownership" class="select form-control" required=""
                                            id="company_ownership">
                                        <option value="Private" @isset($employer->company->ownership) @if($employer->company->ownership=='Private') selected @endif @endisset >Private</option>
                                        <option value="Public" @isset($employer->company->ownership) @if($employer->company->ownership=='Public') selected @endif @endisset>Public</option>
                                        <option value="Government" @isset($employer->company->ownership) @if($employer->company->ownership=='Government') selected @endif @endisset>Government</option>
                                        <option value="NGO" @isset($employer->company->ownership) @if($employer->company->ownership=='NGO') selected @endif @endisset>NGO'S</option>
                                        <option value="INGOS" @isset($employer->company->ownership) @if($employer->company->ownership=='INGOS') selected @endif @endisset>INGO'S</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="company_description">Company Description</label>
                                    <textarea name="company_description" id="company_description" class="form-control">@isset($employer->company->description){{ $employer->company->description }}@endisset</textarea>
                                </div>
                            </div>
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
    CKEDITOR.replace('company_description');
</script>