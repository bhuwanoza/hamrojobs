@extends('layouts.master')
@section('title')
    All Companies
@endsection

@section('content')
    <section id="promotion-footer" class="mt-4 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="center"> All Companies </h4>
                    <hr class="border-300">
                </div>
                <div class="col-12 mt-4 text-sans-serif">
                    <div class="row">
                        @foreach($companies->chunk($companies->count()/4) as $chunk)
                            <div class="col-6 col-lg">
                                <ul class="list-unstyled">
                                    @foreach($chunk as $company)
                                        <li class="industry-count">
                                            <a class="py-1 d-inline-block text-700" href="{{ route('company.show',['slug'=>$company->slug]) }}">
                                                {{ $company->title }}
                                            </a>
                                            {{--<span> ( {{ $company->jobs->count() }} Jobs)</span>--}}
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
