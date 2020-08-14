@extends('layouts.master')
@section('title') Blogs @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 center">Blog Posts </h1>
                <div class="row">
                    @if($blogposts->isNotEmpty())
                        @foreach ($blogposts as $blog_post)
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    @if(file_exists(public_path('uploads/blogs/'.$blog_post->image)))
                                        <img class="card-img-top" src="{{ asset('uploads/blogs/'.$blog_post->image) }}">
                                    @endif
                                    <div class="card-body" >
                                        <h5 class="card-title">{{ $blog_post->title }}</h5>
                                        <div class="card-text" style="height:105px; overflow: hidden">
                                            {!! str_limit(strip_tags($blog_post->content),100) !!}
                                        </div>
                                        <a href="{{ route('blog.show',$blog_post->slug) }}" class="btn btn-primary">Read More</a>
                                    </div>
                                    <div class="card-footer text-muted">
                                        {{--Posted on  {{ $blog_post->created_at->differFromHuman() }}--}}
                                        {{ \Carbon\Carbon::parse($blog_post->created_at)->format('d M, Y') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                    @endif
                </div>

                <ul class="pagination justify-content-center mb-4">
                    @if($blogposts->isNotEmpty())
                    {{ $blogposts->links() }}
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
