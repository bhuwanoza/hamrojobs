@extends('layouts.master')
@section('title') Page Not Found @endsection
@section('content')
    <div class="error_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2 col-sm-12 col-xs-12 text-center">
                    <div class=" error_page_cntnt">
                        <h2>
                            <span>4</span>
                            <span>0</span>
                            <span>4</span>
                        </h2>
                        <h3>{{ $message }}</h3>
                        <p> <a href="{{ route('index') }}">Home Page</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection