@extends('layouts.main')

@section('content')

<section class="hero-banner-1" style="background-image: url(assets/images/home2/banner.png);">
            <!-- shape -->
            <div class="shape-wrap">
                <div class="b-shape-1">
                    <img src="assets/images/home2/shape-1.png" alt="">
                </div>
                <div class="b-shape-2">
                    <img src="assets/images/home2/shape-2.png" alt="">
                </div>
                <div class="b-shape-3">
                    <img src="assets/images/home2/shape-3.png" alt="">
                </div>
                <div class="b-shape-4">
                    <img src="assets/images/home2/shape-4.png" alt="">
                </div>
            </div>
            <!-- shape -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="banner-thumb">
                            <img src="{{$blocks[0]->photo->getUrl()}}" class="w-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                           {!! $blocks[0]->description !!}
                    </div>
                </div>
            </div>
        </section>  
        <!-- Banner End -->

        <!-- Course Start -->
        <section class="popular-course-section-2">
            <div class="container">
                  <div class="row mt-120">
                    <div class="col-lg-5">
                        <div class="ab-content-2">
                           {!! $blocks[1]->description !!}
                           
                        </div>
                        <!-- <div class="fact-wrapper">
                            <div class="funfact-item text-center">
                                <img src="assets/images/home2/f1.png" alt="">
                                <h2><span data-counter="24200" class="timer">24200</span>+</h2>
                                <p>Students</p>
                            </div>
                            <div class="funfact-item text-center">
                                <img src="assets/images/home2/f2.png" alt="">
                                <h2><span data-counter="6214" class="timer">6214</span>+</h2>
                                <p>Courses</p>
                            </div>
                            <div class="funfact-item text-center">
                                <img src="assets/images/home2/f3.png" alt="">
                                <h2><span data-counter="2500" class="timer">2500</span>+</h2>
                                <p>Award</p>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-7">
                        <div class="ab-thumb">
                            <img src="{{$blocks[1]->photo->getUrl()}}" alt="">
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Course End -->

        <!-- Feature Course Start -->
        <section class="feature-course-section-2">
            <div class="container">
                
               <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="ab-thumb">
                        <img src="{{$blocks[2]->photo->getUrl()}}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="ab-content">
                        {!! $blocks[2]->description !!}
                      
                    </div>
                </div>
            </div>


            </div>
        </section>
        <!-- Feature Course End -->

        <!-- Teachers Section Start -->
        <section class="teachers-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="sec-title mb-15"><span>People you can rely</span> Meet the core team</h2>
                        <p class="sec-desc">
                           We have a team of train setter, passionate about imparting quality education to every young individual.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="teachers-slider owl-carousel">
                        @foreach($team as $row)
                            <div class="teacher-item">
                                <div class="teacher-thumb">
                                    <img src="{{$row->photo->getUrl()}}" class="img-fluid" alt="" style="display: initial;width: auto; height: 300px;">
<!--                                     <div class="teacher-social">
                                        <a href="{{$row->facebook_link}}"><i class="social_facebook"></i></a>
                                        <a href="{{$row->twitter_link}}"><i class="social_twitter"></i></a>
                                        <a href="{{$row->instagram_link}}"><i class="social_instagram"></i></a>
                                        <a href="{{$row->linkedin_link}}"><i class="social_linkedin"></i></a>
                                    </div> -->
                                </div>
                                <div class="teacher-meta">
                                    <h5><a href="#">{{$row->name}}</a></h5>
                                    <p style="line-height:normal;">{{$row->possition}} </p>
                                </div>
                            </div>
                        @endforeach
                                                
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Teachers Section End -->

        <!-- Testimonial Start -->
        <section class="testimonial-section" style="background-image: url(assets/images/home2/testimonial-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="sec-title"><span>What Our</span> Students Have to Say</h2>
                        <div class="fact-wrapper">
                            <div class="funfact-item-2 text-center">
                                <div class="fact-thumb">
                                    <img src="assets/images/home2/f4.png" alt="">
                                </div>
                                <h2><span data-counter="100000" class="timer">100000</span>+</h2>
                                <p>Udacity graduations and<br> counting</p>
                            </div>
                            <div class="funfact-item-2 text-center">
                                <div class="fact-thumb">
                                    <img src="assets/images/home2/f5.png" alt="">
                                </div>
                                <h2><span data-counter="300" class="timer">300</span>+</h2>
                                <p>Industry experts partnering<br> to build our content</p>
                            </div>
                            <div class="funfact-item-2 text-center">
                                <div class="fact-thumb">
                                    <img src="assets/images/home2/f6.png" alt="">
                                </div>
                                <h2><span data-counter="100" class="timer">100</span>+</h2>
                                <p>Udacity graduations and<br> counting</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial-slider owl-carousel">
                            <div class="testimonial-item">
                                <div class="testi-author">
                                    <img src="assets/images/home2/t1.png" alt="">
                                    <h5>Russell Sprout</h5>
                                    <span>Data Scientist</span>
                                </div>
                                <p>
                                    Say horse play squiffy codswallop twit mufty barmy gutted mate, cup of char the little rotter Richard wellies bum bag bits and bobs don't get shirty with me chinwag, only a quid grub me old mucker give us a bell.
                                </p>
                            </div>
                            <div class="testimonial-item">
                                <div class="testi-author">
                                    <img src="assets/images/home2/t2.png" alt="">
                                    <h5>Jackson Pot</h5>
                                    <span>Web Developer</span>
                                </div>
                                <p>
                                    Say horse play squiffy codswallop twit mufty barmy gutted mate, cup of char the little rotter Richard wellies bum bag bits and bobs don't get shirty with me chinwag, only a quid grub me old mucker give us a bell.
                                </p>
                            </div>
                            <div class="testimonial-item">
                                <div class="testi-author">
                                    <img src="assets/images/home2/t1.png" alt="">
                                    <h5>Russell Sprout</h5>
                                    <span>Data Scientist</span>
                                </div>
                                <p>
                                    Say horse play squiffy codswallop twit mufty barmy gutted mate, cup of char the little rotter Richard wellies bum bag bits and bobs don't get shirty with me chinwag, only a quid grub me old mucker give us a bell.
                                </p>
                            </div>
                            <div class="testimonial-item">
                                <div class="testi-author">
                                    <img src="assets/images/home2/t2.png" alt="">
                                    <h5>Jackson Pot</h5>
                                    <span>Web Developer</span>
                                </div>
                                <p>
                                    Say horse play squiffy codswallop twit mufty barmy gutted mate, cup of char the little rotter Richard wellies bum bag bits and bobs don't get shirty with me chinwag, only a quid grub me old mucker give us a bell.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial End -->

        <p>&nbsp;</p>       
        <p>&nbsp;</p>

        @endsection