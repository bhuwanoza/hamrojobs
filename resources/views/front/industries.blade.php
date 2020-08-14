@extends('layouts.master')
@section('title')
    Industries
@endsection

@section('content')
     <section id="promotion-footer" class="mt-4 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="center">Jobs by Industries</h4>
                    <hr class="border-300">
                </div>
                <div class="col-12 mt-4 text-sans-serif">
                    <div class="row">
                        @foreach($industries->chunk($industries->count()/4) as $chunk)
                        <div class="col-6 col-lg">
                            <ul class="list-unstyled">
                                @foreach($chunk as $industry)
                                <li class="industry-count">
                                    <a class="py-1 d-inline-block text-700" href="{{ route('industry.show',['slug'=>$industry->slug]) }}">
                                        {{ $industry->title }}
                                    </a>
                                    <span> ( {{ $industry->jobs->count() }} Jobs)</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
         <hr class="border-300">
        <!-- end of .container-->
    </section>


@endsection
