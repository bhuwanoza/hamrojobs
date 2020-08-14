<div class="tab-pane" id="about">
    <div class="form-group{{ $errors->has('who_we_are') ? ' has-error' : '' }}">
        <label for="who_we_are" class="col-sm-2 control-label">Who we are</label>
        <div class="col-sm-10">
            <textarea name="who_we_are" id="who_we_are" class="form-control"
                      rows="5">{{ getConfiguration('who_we_are') }}</textarea>
            @if($errors->has('who_we_are'))
                <span class="help-block">
                    {{ $errors->first('who_we_are') }}
                </span>
            @endif
        </div>
    </div>

    {{--new --}}
    <div class="form-group{{ $errors->has('what_we_do') ? ' has-error' : '' }}">
        <label for="what_we_do" class="col-sm-2 control-label">What we Do?</label>
        <div class="col-sm-10">
            <textarea name="what_we_do" id="what_we_do" class="form-control"
                      rows="5">{{ getConfiguration('what_we_do') }}</textarea>
            @if($errors->has('what_we_do'))
                <span class="help-block">
                    {{ $errors->first('what_we_do') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('why_we_do_it') ? ' has-error' : '' }}">
        <label for="why_we_do_it" class="col-sm-2 control-label">Why we Do it?</label>
        <div class="col-sm-10">
            <textarea name="why_we_do_it" id="why_we_do_it" class="form-control"
                      rows="5">{{ getConfiguration('why_we_do_it') }}</textarea>
            @if($errors->has('why_we_do_it'))
                <span class="help-block">
                    {{ $errors->first('why_we_do_it') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('our_mission') ? ' has-error' : '' }}">
        <label for="our_mission" class="col-sm-2 control-label">Mission</label>
        <div class="col-sm-10">

            <textarea name="our_mission" id="our_mission" class="form-control"
                      rows="5">{{ getConfiguration('our_mission') }}</textarea>
            @if ($errors->has('our_mission'))
                <span class="help-block">
                    {{ $errors->first('our_mission') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('corporate_responsibility') ? ' has-error' : '' }}">
        <label for="corporate_responsibility" class="col-sm-2 control-label">Corporate Responsibility</label>
        <div class="col-sm-10">
            <textarea name="corporate_responsibility" id="corporate_responsibility" class="form-control"
                      rows="5">{{ getConfiguration('corporate_responsibility') }}</textarea>
            @if($errors->has('corporate_responsibility'))
                <span class="help-block">
                    {{ $errors->first('corporate_responsibility') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('visual_page_builder') ? ' has-error' : '' }}">
        <label for="visual_page_builder" class="col-sm-2 control-label">Visual Page Builder</label>
        <div class="col-sm-10">
            <textarea name="visual_page_builder" id="visual_page_builder" class="form-control"
                      rows="5">{{ getConfiguration('visual_page_builder') }}</textarea>
            @if($errors->has('visual_page_builder'))
                <span class="help-block">
                    {{ $errors->first('visual_page_builder') }}
                </span>
            @endif
        </div>
    </div>


</div>
<!-- /.tab-pane -->