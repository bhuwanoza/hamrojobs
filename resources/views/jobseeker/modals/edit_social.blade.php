
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="" id="editSocial" enctype="multipart/form-data" data-id="{{ $social->id }}">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Social Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="formset-form">
                    <div class="form-group  ">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="social_account"
                                       class="pl-3 pl-md-0  requiredField ">
                                    Account name<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="social_account" id="social_account" value="{{ $social->social_account }}"
                                       class="textinput textInput form-control"
                                       placeholder="eg.: Instagram" maxlength="100">
                            </div>
                        </div>
                    </div>
                    <div class="form-group  ">
                        <div class="row">
                            <div class="col-md-3 text-xs-left text-sm-right text-md-right">
                                <label for="social_link" class="pl-3 pl-md-0  requiredField ">
                                    Url<span class="asteriskField">*</span>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input type="url" name="social_link"  id="social_link" value="{{ $social->social_link }}"
                                       class="urlinput form-control"
                                       placeholder="eg.: https://instagram.com/user"
                                       maxlength="255">
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