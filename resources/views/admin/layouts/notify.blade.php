@if(Session::has('success_message'))
    <div class="alert alert-success">
        <strong>Success !</strong> {!! Session::get('success_message') !!}
    </div>
@endif

@if(Session::has('success_message'))
    <div class="alert alert-danger">
        <strong>Error !</strong> {!! Session::get('error_message') !!}
    </div>
@endif

