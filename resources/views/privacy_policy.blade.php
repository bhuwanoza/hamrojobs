@extends('layouts.master')
@section('title')
    Privacy Policy
@endsection

@section('content')
    <section class="breadcrumbs-banner" uk-parallax="bgy: -200" style="background: url(http://gva.edu.np/wp-content/uploads/2017/05/banner-aus.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Privacy Policy</h2>
                    <ul class="bread-list">
                        <li><a href="{{ route('index') }}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a>Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div id="privacy-policy">
        <div class="container mt-3 mb-3">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="title">
                        <h2>Privacy Policy</h2>

                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit perspiciatis quam at laboriosam
                        labore sunt voluptas deleniti similique voluptates atque commodi, veritatis aut, doloribus minima
                        repudiandae tenetur quasi, accusamus unde!</p>

                    <h4>Personal Info</h4>
                    <p>>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit perspiciatis quam at laboriosam
                        labore sunt voluptas deleniti similique voluptates atque commodi, veritatis aut, doloribus minima
                        repudiandae tenetur quasi, accusamus unde!</p>
                </div>
            </div>
        </div>

    </div>


@endsection

