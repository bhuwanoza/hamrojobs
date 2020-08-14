@extends('layouts.master')
@section('title')
    About Us
@endsection

@section('content')


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
    </section>
    <div id="about-section">
        <div class="who_are_we">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <div class="aboutus_text_section">
                            <h2>Who We <span>Are</span></h2>
                            <p>{!! html_entity_decode(getConfiguration('who_we_are')) !!} .</p>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <!-- accordion -->
                        <div class="accordion_wrapper ">
                            <ul uk-accordion>
                                <li class="uk-open">
                                    <a class="uk-accordion-title" href="#">Our Visions and Missions</a>
                                    <div class="uk-accordion-content">
                                        <p>
                                            {!! html_entity_decode(getConfiguration('our_mission')) !!}
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#"> Our Corporate Responsibility</a>
                                    <div class="uk-accordion-content">
                                        <p>{!! html_entity_decode(getConfiguration('corporate_responsibility')) !!}</p>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#"> Visual Page Builder</a>
                                    <div class="uk-accordion-content">
                                        <p>{!! html_entity_decode(getConfiguration('visual_page_builder')) !!}</p>
                                    </div>
                                </li>
                            </ul>
                            <!--end of accordion-->
                        </div>

                    </div>
                    <!--end of /.col-sm-6-->
                </div>
            </div>
        </div>
        <div class="about-who-how">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                        <div class="about_text_wrapper">
                            <div class="section_heading section_2_heading">
                                <h2>What we <span>do ?</span></h2>
                            </div>
                            {!! html_entity_decode(getConfiguration('what_we_do')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="about_text_wrapper abt_2_para">
                            <div class="section_heading section_2_heading">
                                <h2>why we<span> do it ?</span></h2>
                            </div>
                            {!!  html_entity_decode(getConfiguration('why_we_do_it')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

