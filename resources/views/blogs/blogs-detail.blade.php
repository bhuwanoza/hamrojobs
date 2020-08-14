@extends('layouts.master')

@section('title') {{ $blogpost->title }}
@endsection
@section('content')




    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Blog Posts
                    {{--<small>Secondary Text</small>--}}
                </h1>

                <div class="card mb-4">
                    @if(file_exists(public_path('uploads/blogs/'.$blogpost->image)))
                        <img class="card-img-top" src="{{ asset('uploads/blogs/'.$blogpost->image) }}" >
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{ $blogpost->title }}</h2>
                        <p class="card-text">
                            {!! html_entity_decode($blogpost->content) !!}
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        {{--Posted on  {{ $blog_post->created_at->differFromHuman() }}--}}
                        {{ \Carbon\Carbon::parse($blogpost->created_at)->format('d M, Y') }}
                    </div>
                    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                    <div class="addthis_inline_share_toolbox_4yy9" data-url="{{ Request::fullUrl() }}" data-title="{{ $blogpost->title }}" data-media="{{ asset('uploads/blogs/'.$blogpost->image) }}"></div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

            <!-- Categories Widget -->
                <div class="card my-4">{{--
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>--}}
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                   {{-- <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature
                        the new Bootstrap 4 card containers!
                    </div>--}}
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5beab45447528fe3"></script>

@endsection
