<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <meta name="author" content="{{ getConfiguration('site_meta') }}">
    @if(Route::currentRouteName() == 'jobs-single')
    <meta property="og:url" content="{{ route('jobs-single',['slug'=>$job->slug]) }}" />
    <meta property="og:title" content="{{ $job->title }}" />
    <meta property="og:description" content="{!! strip_tags($job->jobadditional->description) !!}" />
    <meta property="og:image" content="{{ asset('uploads/companies/logos/' . $job->company->logo) }}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $job->title }}">
    <meta name="twitter:description" content="{!! strip_tags($job->jobadditional->description) !!}">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="{{ asset('uploads/companies/logos/' . $job->company->logo) }}">
    
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $job->title }}">
    <meta itemprop="description" content="{!! strip_tags($job->jobadditional->description) !!}">
    <meta itemprop="image" content="{{ asset('uploads/companies/logos/' . $job->company->logo) }}">
    @elseif(Route::currentRouteName() == 'blog.show')
    <meta property="og:url" content="{{ route('blog.show',['slug'=>$blogpost->slug]) }}" />
    <meta property="og:title" content="{{ $blogpost->title }}" />
    <meta property="og:description" content="{!! strip_tags($blogpost->content) !!}" />
    <meta property="og:image" content="{{ asset('uploads/blogs/'.$blogpost->image) }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $blogpost->title }}">
    <meta name="twitter:description" content="{!! strip_tags($blogpost->content) !!}">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="{{ asset('uploads/blogs/'.$blogpost->image) }}">
    
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $blogpost->title }}">
    <meta itemprop="description" content="{!! strip_tags($blogpost->content) !!}">
    <meta itemprop="image" content="{{ asset('uploads/blogs/'.$blogpost->image) }}">
    @else
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:title" content="{{ getConfiguration('site_title') }}" />
    <meta property="og:description" content="{!! getConfiguration('site_description') !!}" />
    <meta property="og:image" content="{{ asset('/settings/') }}/{{ getConfiguration('site_logo') }}" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ getConfiguration('site_title') }}">
    <meta name="twitter:description" content="{!! getConfiguration('site_description') !!}">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="{{ asset('/settings/') }}/{{ getConfiguration('site_logo') }}">
    
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ getConfiguration('site_title') }}">
    <meta itemprop="description" content="{!! getConfiguration('site_description') !!}">
    <meta itemprop="image" content="{{ asset('/settings/') }}/{{ getConfiguration('site_logo') }}">
    @endif

    @if(getConfiguration('site_favicon'))
        <link rel="shortcut icon" href="{{ asset('settings') . '/' . getConfiguration('site_favicon') }}"
              type="image/x-icon"/>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')| {{ getConfiguration('site_title') }}  </title>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130663898-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130663898-1');
</script>

    @include('layouts.styles')
    @yield('styles')
    <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.2'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="1306115336120345">
</div>
    
</head>
<body>

@include('layouts.header')
@include('layouts.notification')
@yield('content')
@include('layouts.footer')
@include('layouts.scripts')

@yield('scripts')


<script>
    $(document).on("click", '.btn-save-job', function (e) {
        e.preventDefault();
        var job_id = '#' + $(this).attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $(this).attr('data-id');
        var tempurl = "{{ route('job-save',':id') }}";
        tempurl = tempurl.replace(':id', id);

        $.post(tempurl, function (data) {
            console.log(data);
            if (data === 'false') {
                $(job_id).html('<i class="far fa-bookmark"></i> Save')
            } else if (data === 'true') {
                $(job_id).html('<i class="fas fa-bookmark"></i> Saved')
            }
        });
    })
</script>

</body>
</html>