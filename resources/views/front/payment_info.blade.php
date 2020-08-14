@extends('layouts.master')
@section('title')
    Payments
@endsection

@section('content')

    {{--
        <section class="breadcrumbs-banner" uk-parallax="bgy: -200"
                 style="background: url(http://gva.edu.np/wp-content/uploads/2017/05/banner-aus.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>About</h2>
                        <ul class="bread-list">
                            <li><a href="{{ route('index') }}">Home<i class="fa fa-angle-right"></i></a></li>
                            <li class="active"><a>About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>--}}
    <div id="about-section">
        <div class="who_are_we">
            <div class="container">
                <h4> <span> We Accepts Payments  </span></h4>
                <div class="row">

                    @isset($payments)
                        @foreach($payments as $payment)
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <div class="accordion_wrapper ">
                            <ul uk-accordion>
                                <li class="uk-open">
                                    <a class="uk-accordion-title" href="#">{{ $payment->bank_title }}</a>
                                    <div class="uk-accordion-content row">
                                        <div class="col-md-3">
                                            <figure class="account-listing-image">
                                                @if(file_exists(public_path('uploads/payments/'.$payment->image)))
                                                    <img src="{{ asset('uploads/payments/'.$payment->image) }}" alt="" height="50px" width="50px">
                                                @endif
                                            </figure>

                                        </div>
                                        <ul class="col-md-9 account-listing">
                                            <li><span class="account-listing--number">
                                                    <i class="fas fa-key"></i> Account number: <strong>{{$payment->account_number  }}</strong></span></li>
                                            <li><span class="account-listing--name" >
                                                   <span uk-icon="icon: user"></span> Account name: <strong>{{$payment->account_name  }}</strong>
                                                </span></li>

                                            <li><span class="account-listing--type">
                                                    <span uk-icon="icon:  more-vertical"></span> Account type: <strong>{{$payment->account_type  }}</strong></span></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>

@endsection

