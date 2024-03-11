@extends('front.layouts.app')

@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center "  class="" data-bg="{{ asset('assets/images/banner6.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <!-- <h1>Your Dreams, Your Career</h1>
                <h3 class="text-light"> Explore, Achieve, Thrive</h3> -->
                <!-- <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a></div> -->
            </div>
        </div>
    </div>
</section>

<section class="section-1 py-5 "> 
    <div class="container">
        <div class="card border-0 shadow p-5">
            <form action="{{ route('jobs') }}" method="GET">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select a Category</option>
                            @if ($newCategories->isNotEmpty())
                                @foreach ($newCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>  
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                        <div class="d-grid gap-2">
                            {{-- <a href="jobs.html" class="btn btn-primary btn-block">Search</a> --}}
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </div>
                        
                    </div>
                </div> 
            </form>           
        </div>
    </div>
</section>

<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-5">

            @if ($categories->isNotEmpty())
            @foreach ($categories as $category)
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="{{ route('jobs').'?category='.$category->id }}"><h4 class="pb-2">{{ $category->name }}</h4></a>
                    <p class="mb-0"> <span>0</span> Available position</p>
                </div>
            </div> 
            @endforeach                
            @endif
        </div>
    </div>
</section>

<section class="our-story bg-1">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="our-story-img py-2">
                    <img src="{{ asset('assets/images/banner5.jpg')}}" alt="" class="px-5 py-2 rounded-end">
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="about-info">
                    <div class="heading-wrapper mt-0 py-5">
                        <h4>
                            Our Story
                        </h4>
                        <h2>

                            NW Employment Now: Where Careers Connect!
                        </h2>
                    </div>
                    <p class="mb-3 py-2 text-justify">
                        NW Employment Now is more than just a platform; it's your partner in progress. Through personalized recommendations, innovative tools, and community events, we're here to support your journey every step of the way. Our success is intertwined with yours, and that's what makes NW Employment Now more than a job portal – it's a shared adventure.
                        Join us on this exciting journey where careers flourish, connections blossom, and dreams become reality. NW Employment Now is not just a platform; it's a thriving community waiting to welcome you. Your next opportunity is just a click away!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 bg-2  py-5">
    <div class="container">
        <h2>Featured Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($featuredJobs->isNotEmpty())
                            @foreach ($featuredJobs as $featuredJob)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $featuredJob->title }}</h3>
                                        
                                        <p>{{ Str::words(strip_tags($featuredJob->description), 5) }}</p>

                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{ $featuredJob->location }}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{ $featuredJob->jobType->name }}</span>
                                            </p>
                                            @if (!is_null($featuredJob->salary))
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">{{ $featuredJob->salary }}</span>
                                            </p>
                                            @endif                                            
                                        </div>
    
                                        <div class="d-grid mt-3">
                                            <a href="{{ route('jobDetail',$featuredJob->id) }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 bg-1 py-5">
    <div class="container">
        <h2>Latest Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($latestJobs->isNotEmpty())
                            @foreach ($latestJobs as $latestJob)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $latestJob->title }}</h3>
                                        
                                        <p>{{ Str::words(strip_tags($latestJob->description), 5) }}</p>

                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{ $latestJob->location }}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{ $latestJob->jobType->name }}</span>
                                            </p>
                                            @if (!is_null($latestJob->salary))
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">{{ $latestJob->salary }}</span>
                                            </p>
                                            @endif                                            
                                        </div>
    
                                        <div class="d-grid mt-3">
                                            <a href="{{ route('jobDetail',$latestJob->id) }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif                                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection