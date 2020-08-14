<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(getConfiguration('site_favicon'))
        <link rel="shortcut icon" href="{{ asset('settings') . '/' . getConfiguration('site_favicon') }}"
              type="image/x-icon"/>
    @endif
    <title> @yield('title') | {{ getConfiguration('site_title') }} </title>

    @include('admin.layouts.styles')
    @yield('extra_styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="load">
    @include('admin.layouts.header')
    @include('admin.layouts.main-sidebar')
    @yield('content')
    @include('admin.layouts.footer')
    <div id="loader" class="hidden"></div>

    <style>
        #loader{
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 1;
            background: url({{ asset('uploads/loader.gif') }}) 50% 50% no-repeat rgb(249,249,249);
        }

    </style>
</div>
@include('admin.layouts.scripts')
@yield('extra_scripts')
</body>
</html>









