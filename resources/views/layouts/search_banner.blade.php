<!--<section id="banner" style="background: url('https://d19m59y37dris4.cloudfront.net/places/1-1-2/img/hero-bg.jpg') no-repeat;" class="hero d-flex align-items-center">-->
    <section id="banner" style="background: linear-gradient(to bottom, rgba(0,0,0,0.8) 0%,rgba(255,255,255,0.7) 90%) ,url('https://images.pexels.com/photos/905873/pexels-photo-905873.jpeg?auto=format%2Ccompress&cs=tinysrgb&dpr=2&h=650&w=940') no-repeat" class="hero d-flex align-items-center">
    <div class="container">
        <p class="small-text-hero"><i class="icon-localizer text-primary mr-1"></i>Search<span class="text-primary">ing</span>
            Jobs</p>
        <h1>We <span class="text-primary">place</span> you anywhere</h1>
        <p class="text-hero">Search, Apply & Get Jobs in Nepal - Free</p>
        <div class="search-bar">
            <form action="{{ route('job-search') }}" method="get">
                <div class="row">
                    <div class="form-group col-lg-8 col-md-8 col-sm-8">
                        <input autocomplete="off" type="search" name="query" placeholder="Search for Skills, Companies, Industries, Jobs.......">
                    {{--</div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-3">
                        <input type="text" name="location" placeholder="Location" id="location">
                    </div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-3">
                        <div class="listing-categories">
                            <select title="Categories <i class=&quot;fa fa-angle-down&quot;></i>" class="listing-categories" tabindex="-98"><option class="bs-title-option" value="">Categories <i class="fa fa-angle-down"></i></option>
                                <option value="small">Restaurants</option>
                                <option value="medium">Hotels</option>
                                <option value="large">Cafes</option>
                                <option value="x-large">Garages</option>
                            </select>
                        </div>--}}
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <div class="search-btn">
                            <button type="submit" value="Search" class="btn btn-primary"> Search</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>