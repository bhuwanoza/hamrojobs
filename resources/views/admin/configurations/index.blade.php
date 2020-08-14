@extends('admin.layouts.master')

@section('title') Settings @endsection
@section('extra_styles')
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/semantic.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/dataTables.semanticui.min.css') }}" type="text/css">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Settings
                <small>Customize you website </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="{{ url('/admin/academics') }}" disabled="">Settings</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <section class="content">
                        <form action="{{ route('settings.update') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Settings</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                                            <li><a href="#about" data-toggle="tab">About Us</a></li>
                                            <li><a href="#social" data-toggle="tab">Social</a></li>

                                            <li><a href="#footer" data-toggle="tab">Footer</a></li>
                                            <li><a href="#seo" data-toggle="tab">SEO</a></li>
                                            {{--<li><a href="#referal" data-toggle="tab">Referal</a></li>--}}
                                        </ul>
                                        <div class="tab-content" style="margin-top: 15px;">
                                            @include('admin.configurations.general')
                                            @include('admin.configurations.about')
                                            @include('admin.configurations.social')

                                            @include('admin.configurations.footer')
                                            @include('admin.configurations.seo')
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- /.nav-tabs-custom -->
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-upload"></i>Update Setting</button>
                                </div>
                            </div>
                        </form>

                    </section>
                </div>
                <div class="box-footer">
                </div>
            </div>
        </section>
    </div>

@endsection
@section('extra_scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('why_we_do_it');
        CKEDITOR.replace('what_we_do');
        CKEDITOR.replace('who_we_are');
        CKEDITOR.replace('our_mission');
        CKEDITOR.replace('corporate_responsibility');
        CKEDITOR.replace('visual_page_builder');

        CKEDITOR.replace('site_address');
        CKEDITOR.replace('site_map');
    </script>
@endsection


