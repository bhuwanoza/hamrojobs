@if(Session('success_message'))
    <div class="notify">
        <div id="notif-messages" class="alert alert-success" style="display: block;">
            <span class="icon-circle-check mr-2"></span>
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            {{ Session('success_message') }}
        </div>
    </div>
@endif
@if(Session('error_message'))
    <div class="notify">
        <div id="notif-messages" class="alert alert-danger" style="display: block;">
            <span class="icon-circle-check mr-2"></span>
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            {{ Session('error_message') }}
        </div>
    </div>
@endif
@if(Session('warning_message'))
    <div class="notify">
        <div id="notif-messages" class="alert alert-warning" style="display: block;">
            <span class="icon-circle-check mr-2"></span>
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            {{ Session('warning_message') }}
        </div>
    </div>
@endif

<div class="notify"  id="notify-error" style="display: none;">
    <div id="notify-messages" class="alert alert-danger" style="display: block;">
        <span class="circle"> <i class="fa fa-info-circle"></i>  <strong> ERROR !</strong> </span>
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <div class="alert-message" id="error-message"></div>
    </div>
</div>
<div class="notify " id="notify-success" style="display: none;">
    <div id="notify-messages" class="alert alert-success" style="display: block;">
        <span class="circle"> <i class="fa fa-info-circle"></i>  <strong> Success !</strong> </span>
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <div class="alert-message" id="success-message"></div>
    </div>
</div>