@extends('layouts.master')
@section('title') Notifications @endsection
@section('content')
    <section id="user-profile">
        <div class="container">
            <div class="row">
                @include('jobseeker.partial.sidebar')
                <div class="col-md-8 col-sm-8 col-xs-12">

                    <div class="{{--tab-content--}} tab__detail">
                        <div class="tab-pane" id="job__notification" role="tabpanel">

                            <div class=" notification">
                                <h3 class="alerts-title">Your Notifications</h3>
                                <div class="notification-item">
                                    <div class="thums">
                                        <img src="https://merojob.com/media/cache/ce/70/ce700665f14763fb9ce43ceb294f3d81.jpg"
                                             alt="">
                                    </div>
                                    <div class="text-left">
                                        <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                                        <span class="time"><i class="ti-time"></i>3 Hours ago</span>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <div class="thums">
                                        <img src="https://merojob.com/media/cache/5a/f2/5af211b2ca3d7ad08216e5ec74061890.jpg"
                                             alt="">
                                    </div>
                                    <div class="text-left">
                                        <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                                        <span class="time"><i class="ti-time"></i>3 Hours ago</span>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <div class="thums">
                                        <img src="https://merojob.com/media/cache/51/cb/51cb141f2e1801fd6b1e4e2bce975c10.jpg"
                                             alt="">
                                    </div>
                                    <div class="text-left">
                                        <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                                        <span class="time"><i class="ti-time"></i>3 Hours ago</span>
                                    </div>
                                </div>


                                <!--Pagination-->
                                <nav aria-label="pagination ">
                                    <ul class="pagination justify-content-center pg-blue">

                                        <!--Arrow left-->
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                Previous
                                            </a>
                                        </li>

                                        <li class="page-item active">
                                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>

                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                Next
                                            </a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- modals for edit profile -->
    @include('jobseeker.modals.modal')

@endsection

