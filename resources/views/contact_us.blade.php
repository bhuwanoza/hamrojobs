@extends('layouts.master')
@section('title')
    Contact Us
@endsection

@section('content')

    <section class="breadcrumbs-banner" uk-parallax="bgy: -200"
             style="background: url(http://gva.edu.np/wp-content/uploads/2017/05/banner-aus.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Contact</h2>
                    <ul class="bread-list">
                        <li><a href="{{ route('index') }}">Home<i class="fa fa-angle-right"></i></a></li>
                        <li class="active"><a>Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section id="contact-section">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="medium-title">
                        Contact Us
                    </h2>
                    <div class="information">
                        <div class="contact-datails">
                            <div class="icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="info">
                                <h3>Address</h3>
                                <span class="detail">{!!  html_entity_decode(getConfiguration('site_address')) !!}</span>
                                <br>
                                {{--<span class="datail">Customer Center: NO.130-45 Streen Name- City, Country</span>--}}
                            </div>
                        </div>
                        <div class="contact-datails">
                            <div class="icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="info">
                                <h3>Phone Numbers</h3>
                                <span class="detail">Main Office: {{ getConfiguration('site_primary_phone') }}</span>
                                <br>
                                <span class="datail">Customer Support: {{ getConfiguration('site_secondary_phone') }} </span>
                            </div>
                        </div>
                        <div class="contact-datails">
                            <div class="icon">
                                <i class="ti-location-arrow"></i>
                            </div>
                            <div class="info">
                                <h3>Email Address</h3>
                                <span class="detail">Customer Support:
                                    <a href="mail:{{ getConfiguration('site_primary_email') }}" class="__cf_email__">{{ getConfiguration('site_primary_email') }}
                                    </a>
                                </span>
                                <br>
                                <span class="detail">Technical Support:
                                    <a href="mail:{{ getConfiguration('site_secondary_email') }}" class="__cf_email__">{{ getConfiguration('site_secondary_email') }}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                    <form id="contactForm" class="contact-form" data-toggle="validator" novalidate="true">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group is-empty">
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                   placeholder="First Name" required=""
                                                   data-error="Please enter your First name">
                                            <div class="help-block with-errors"></div>
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group is-empty">
                                            {{--<label for="last_name">Last Name</label>--}}
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                   placeholder="Last Name" required=""
                                                   data-error="Please enter your Last name">
                                            <div class="help-block with-errors"></div>
                                            <span class="material-input"></span></div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group is-empty">
                                            {{--<label for="msg_subject">Subject</label>--}}
                                            <input type="text" placeholder="Subject"
                                                   class="form-control" required="" name="subject"
                                                   data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group is-empty">
                                            {{--<label for="email">Your Email</label>--}}
                                            <input type="text" class="form-control" id="email" name="email"
                                                   placeholder="mail@sitename.com" required=""
                                                   data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group is-empty">
                                            {{--<label for="email">Your Email</label>--}}
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                   placeholder="98********" required=""
                                                   data-error="Please enter your mobile">
                                            <div class="help-block with-errors"></div>
                                            <span class="material-input"></span></div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group is-empty">
                                            {{--<label for="message">Your Message</label>--}}
                                            <textarea class="form-control" id="message" placeholder="Your Message" name="message"
                                                      rows="11" data-error="Write your message" required=""></textarea>
                                            <div class="help-block with-errors"></div>
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit"class="btn btn-success"
                                                style="pointer-events: all; cursor: pointer;">Send Us
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>


@endsection

@section('scripts')



    <script>
        $(document).on("submit", "#contactForm", function (e) {
            e.preventDefault();
            var params = $('#contactForm').serializeArray();
            var formData = new FormData($('#contactForm')[0]);

            $.each(params, function (i, val) {
                formData.append(val.name, val.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('contact-us.save') }}",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function (data) {
                },
                success: function (data) {
                    $('#contactForm').trigger('reset');
                $.confirm({
                    closeIcon: true,
                    closeIconClass: 'fa fa-close',
                    title: 'Success!',
                    content: data,
                    type: 'blue',
                    typeAnimated: true,
                    buttons: {

                    }
                });
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                        });
                    }
                },
                complete: function () {
                }
            });
        });
    </script>


@endsection
