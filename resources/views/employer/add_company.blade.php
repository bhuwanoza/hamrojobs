@extends('layouts.master')
@section('title')
    @if(isset($title))
        {{ $title }}
    @endif
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

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="adding-jobs">

        <div class="container">
            <form action="" id="formCompany" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="job_form_heading_wrapper">
                        <h4 class="section-title text-center">
                            Welcome, {{ \App\User::authUser()->first_name }} {{ \App\User::authUser()->last_name }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_name">Company Name</label>
                            <input class="form-control" id="company_name" name="company_name"
                                   placeholder="Eg: Apple Inc" type="text">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_industry">Select Industry</label>
                            <select class="form-control select " id="company_industry" name="company_industry">
                                @if(isset($industries))
                                    @foreach($industries as $industry)
                                        <option value="{{ $industry->id }}"> {{ $industry->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label>Company Address </label>
                            <input type="text" class="form-control" name="company_address" id="company_address"
                                   placeholder="Baneshwor, Kathmandu, Nepal">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_email">Company Email</label>
                            <input name="company_email" type="email" class="form-control" id="company_email"
                                   value="{{ Sentinel::check()->email? Sentinel::check()->email:'' }}"
                                   placeholder="Eg : info@company.com">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_ownership">Ownership Type</label>
                            <select name="company_ownership" class="select form-control" required=""
                                    id="company_ownership">
                                <option value="Private" selected>Private</option>
                                <option value="Public" selected>Public</option>
                                <option value="Government" selected>Government</option>
                                <option value="NGO" selected>NGO'S</option>
                                <option value="INGOS" selected>INGO'S</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_website">Company Website</label>
                            <input name="company_website" type="text" class="form-control" id="company_website"
                                   placeholder="Eg : https://company.org">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_phone">Company Phone</label>
                            <input name="company_phone" type="tel" class="form-control" id="company_phone"
                                   placeholder="Eg : 01420202">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_fax">Company Fax</label>
                            <input name="company_fax" type="tel" class="form-control" id="company_fax"
                                   placeholder="Eg : 01420202">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_employers">Number of Employers</label>
                            <select name="company_employers" id="company_employers" class="form-control">
                                <option value="1-10">1-10</option>
                                <option value="10-50">10-50</option>
                                <option value="50-100">50-100</option>
                                <option value="100-200">100-200</option>
                                <option value="200-500">200-500</option>
                                <option value="500-1000" >500-1000</option>
                                <option value="Above 1000">Above 1000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_branches">Number of Branches</label>
                            <input name="company_branches" type="number" class="form-control" id="company_branches"
                                   min="0" max="100">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_establish">Established Data </label>
                            <input type="date" class="form-control" id="company_establish" name="company_establish"
                                   placeholder="2018">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="job_textarea_main_wrapper">
                            <label for="company_description">Company Description Type</label>
                            <textarea name="company_description" id="company_description" cols="110"
                                      rows="6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_logo">Company Logo</label>
                            <input id="company_logo" class="form-control image" name="company_logo" type="file"
                                   accept="image">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="job_form_wrapper">
                            <label for="company_banner">company Banner</label>
                            <input id="company_banner" class="form-control image" name="company_banner" type="file"
                                   accept="image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="job_choose_resume_bottom_btn_post float-right">
                            <ul>
                                <li><button  class="btn btn-success" id="btnSubmitcompany"><i
                                                class="fas fa-arrow-right"></i> Next</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).on("click", "#btnSubmitcompany", function (e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            $(this).attr('disabled');
            var form = new FormData($('#formCompany')[0]);
            var params = $('#formCompany').serializeArray();
            var type = "POST";
            var myUrl = "{{ route('add-company.store') }}";

            $.each(params, function (i, val) {
                form.append(val.name, val.value)
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: type,
                url: myUrl,
                contentType: false,
                processData: false,
                data: form,
                beforeSend: function (data) {
                },
                success: function (data) {
                    if (data == 'success') {
                        window.location = '{{ route('profile.index') }}'
                    }
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(5000));
                        });
                    }
                }
            });
        });
    </script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('company_description');
    </script>





@endsection
