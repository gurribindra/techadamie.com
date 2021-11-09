@extends('layouts.main')

@section('content')
<!-- <section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>Courses</p>
                    <h2>Newest Courses</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($newestCourses as $course)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{ optional($course->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                        <div class="special_cource_text">
                            @foreach($course->disciplines as $discipline)
                                <a href="{{ route('courses.index') }}?discipline={{ $discipline->id }}" class="btn_4 mr-1 mb-1">{{ $discipline->name }}</a>
                            @endforeach
                            <h4>{{ $course->getPrice() }}</h4>
                            <a href="{{ route('courses.show', $course->id) }}"><h3>{{ $course->name }}</h3></a>
                            <p>{{ Str::limit($course->description, 100) }}</p>
                            @if($course->institution)
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{ optional($course->institution->logo)->thumbnail ?? asset('img/no_image.png') }}" alt="" class="rounded-circle">
                                        <div class="author_info_text">
                                            <p>Institution</p>
                                            <h5><a href="{{ route('courses.index') }}?institution={{ $course->institution->id }}">{{ $course->institution->name }}</a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="blog_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>Institutions</p>
                    <h2>Random Institutions</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($randomInstitutions as $institution)
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{ optional($institution->logo)->url ?? asset('img/no_image.png') }}" class="card-img-top" alt="{{ $institution->name }}">
                            <div class="card-body">
                                <a href="{{ route('courses.index') }}?institution={{ $institution->id }}">
                                    <h5 class="card-title">{{ $institution->name }}</h5>
                                </a>
                                <p>{{ Str::limit($institution->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> -->

<section>
    <div class="container">
                <div class="row mt-120">
                    <div class="col-lg-7 col-md-6">
                        <div class="ab-thumb">
                            <img src="assets/images/home/1.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="ab-content">
                            <h3>Preparing the student  to realize and utilize their full potential.</h3>
                            <p class="mid-item">Each child is unique... so are their contributions to the world.</p>
                            <p>Your child needs a mentor and a teacher…</p>
    <ul>
        <li>To help shorten their learning curve.</li>
        <li>Open their minds to new ideas and possibilities.</li>
        <li>Identify development opportunities .</li>
        <li>Get them to be future ready.</li></ul>

                            <a class="bisylms-btn" href="#">Take Charge, Today.</a>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>

                
            </div>
        </section>
        <!-- Course End -->

        <!-- Feature Course Start -->
        <section class="feature-course-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="sec-title"><span>Pricing Structure. </span> Choose the best suited plan for your kid </h2>
                    </div>
                    <div class="col-md-4">
                        <!-- <ul class="shaf-filter">
                            <li class="active" data-group="all">All</li>
                            <li data-group="elementory">Eduedge Elementory </li>
                            <li data-group="middleschool">Eduedge Middle School </li>
                            <li data-group="highschool">Eduedge High School</li>
                            <li data-group="highschool">Edupro Skill</li>
                        
                        </ul> -->
                    </div>
                </div>
                <div class="row shafull-container">
                    <div class="col-lg-3 col-md-6 shaf-item" data-groups='["all", "elementory"]'>
                        <div class="feature-course-item">
                            <div class="flipper">
                                <div class="front">
                                    <div class="fcf-thumb">
                                        <img src="assets/images/home/course/1.png" alt="">
                                    </div>
                                    <p>Intro Session</p>
                                    <h4>Single Session </h4>
                                
                                </div>
                                <div class="back">
                                    <div class="fcf-thumb">
                                        <img src="assets/images/home/course/1.png" alt="">
                                    </div>
                                <a href="#" class="c-cate">Introductory Session </a>
                                    <p>When you suddenly need help occasionally.</p>
                                
                                    <div class="course-price">
                                       
                                    
                                    </div>
                                <p> Applicable taxes and Fees are extra <br>
        This is paid on demand while you schedule the class </p>

                                    
                            
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 shaf-item" data-groups='["all", "middleschool"]'>
                        <div class="feature-course-item">
                            <div class="flipper">
                                <div class="front">
                                    <div class="fcf-thumb">
                                        <img src="assets/images/home/course/2.png" alt="">
                                    </div>
                                    <p>PB 10</p>
                                    <h4>Prepaid block of 10 Hours</h4>
                                
                                </div>
                                <div class="back">
                                    <div class="fcf-thumb">
                                        <img src="assets/images/home/course/2.png" alt="">
                                    </div>
                                    <a href="#" class="c-cate">PB 10</a>
                                    <p>When you know you will need help but not sure when and how much.</p>
                                    
                                    <div class="course-price">
                                       
                                    </div>
                                    <div class="author">
                                    
                                    <p>Applicable taxes and Fees are extra <br>
        This is to be paid in advance 
    </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    <div class="col-lg-3 col-md-6 shaf-item" data-groups='["all", "middleschool"]'>
                        <div class="feature-course-item">
                            <div class="flipper">
                                <div class="front">
                                    <div class="fcf-thumb">
                                        <img src="assets/images/home/course/2.png" alt="">
                                    </div>
                                    <p>PB 25  </p>
                                    <h4>Prepaid block of 25 Hours </h4>
                                
                                </div>
                                <div class="back">
                                    <div class="fcf-thumb">
                                        <img src="assets/images/home/course/2.png" alt="">
                                    </div>
                                    <a href="#" class="c-cate">PB 25</a>
                                    <p>For students needing tutoring occasionally (up to Two hours a month as and example)
    </p>
                                    
                                <div class="course-price">
                                    

                                   
                                </div>
                                <div class="author">
                                    
                                    <p>Applicable taxes and Fees are extra <br>
        This is to be paid in advance 
    </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    <div class="col-lg-3 col-md-6 shaf-item" data-groups='["all", "middleschool"]'>
                        <div class="feature-course-item">
                            <div class="flipper">
                                <div class="front">
                                    <div class="fcf-thumb">
                                        <img src="assets/images/home/course/2.png" alt="">
                                    </div>
                                    <p>PB 50</p>
                                    <h4>Prepaid block of 50 Hours at   </h4>
                                
                                </div>
                                <div class="back">
                                    <div class="fcf-thumb">
                                        <img src="assets/images/home/course/2.png" alt="">
                                    </div>
                                    <a href="#" class="c-cate">PB 50</a>
                                    <p>Ideal for ongoing tutoring.</p>
                                    
                                    <div class="course-price">
                                      

                                    
                                    </div>
                                    <div class="author">
                                    
                                    <p>Applicable taxes and Fees are extra <br>
        This is to be paid in advance 
    </p>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
               


            </div>
        </div>
</section>
    <!-- Feature Course End -->

    <!-- Cta Start -->
    <section class="cta-section" style="background-image: url(assets/images/cta-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="sec-title"><span>Teachers and Mentors.</span> Join us as our certified faculty.</h2>
                    <p>If you take your mentorship responsibilities seriously, then this is the ideal platform for you to perform and be rewarded for it, in both money and satisfaction.</p>
                    <a href="#" class="bisylms-btn">Get Started</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Cta End -->

    <!-- Video Start -->
    <div class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="video-banner" style="background-image: url(assets/images/home/video-bg.jpg);">
                      @include('partials.slider_1')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->

    <!-- Event Start -->
    <!-- <section class="event-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="sec-title"><span>Contact Now</span> Upcoming Events</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="event-item-1">
                        <div class="e-date">24 <span>Jun</span></div>
                        <p><i class="icon_pin_alt"></i>New York, US</p>
                        <h4><a href="single-event.html">Consumer Food Safety Education Conference</a></h4>
                        <a class="bisylms-btn" href="#">Get Ticket</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="event-item-1">
                        <div class="e-date">27 <span>July</span></div>
                        <p><i class="icon_pin_alt"></i>Vancouver, Canada</p>
                        <h4><a href="single-event.html">Build Education Website Using WordPress</a></h4>
                        <a class="bisylms-btn" href="#">Get Ticket</a>
                    </div>
                </div>

                

            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="read-more" href="#">View all Events<i class="arrow_right"></i></a>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Event End -->

    <!-- Package Start -->
    <section class="package-section" style="background-image: url(assets/images/home/package-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="sec-title"><span>Eduedge </span> Simplified programs based on your unique needs, <br>learning gaps and aspirations.</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div id="card-slider" class="pack-slider">
                        <div class="package-item">
                            <div class="pack-thumb">
                                <img src="assets/images/EduEdge-Support.png" alt="">
                                <div class="pack-middle">
                                    <img src="assets/images/criteria-side.jpg" alt="">
                                </div>
                            </div>
                            <div class="pack-details">
                                
                                <h3>Eduedge  Support</h3>
                                
                                <p>Help your child catch up in class by assisting with homework and clearing any doubts that may exist. </p>
                                <a href="#" class="bisylms-btn">Know More</a>
                            </div>
                        </div>
                        <div class="package-item">
                            <div class="pack-thumb">
                                <img src="assets/images/EduEdge-Excel.png" alt="">
                                <div class="pack-middle">
                                    <img src="assets/images/criteria-side.jpg" alt="">
                                </div>
                            </div>
                            <div class="pack-details">
                               
                                <h3>Eduedge  Excel</h3>
                                
                                <p>Help your child gain advanced knowledge by enhancing the education being received in their class. </p>
                                <a href="#" class="bisylms-btn">Know More</a>
                            </div>
                        </div>
                        <div class="package-item">
                            <div class="pack-thumb">
                                <img src="assets/images/EduEdge-prosper.png" alt="">
                                <div class="pack-middle">
                                    <img src="assets/images/criteria-side.jpg" alt="">
                                </div>
                            </div>
                            <div class="pack-details">
                                
                                <h3>Eduedge Prosper</h3>
                                <p>Shift gears to help your child meet educational standards of Indian education</p>
                                <a href="#" class="bisylms-btn">Know More</a>
                            </div>
                        </div>

                           <div class="package-item">
                            <div class="pack-thumb">
                                <img src="assets/images/EduEdge-Excel.png" alt="">
                                <div class="pack-middle">
                                    <img src="assets/images/criteria-side.jpg" alt="">
                                </div>
                            </div>
                            <div class="pack-details">
                                
                                <h3>Edu-Edge </h3>
                                <p>Simplified programs based on your unique needs, learning gaps and aspirations.</p>
                                <a href="#" class="bisylms-btn">Know More</a>
                            </div>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Package End -->


@endsection