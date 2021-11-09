@extends('layouts.main')

@section('content')

 <!-- Blog Start -->
 <section class="blogpage-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="row">
                            @foreach($blog as $bg)
                            <div class="col-lg-6">
                                <div class="post-item-1">
                                    <img src="{{ $bg->photo->getUrl() }}" alt="">
                                    <div class="b-post-details">
                                        <div class="bp-meta">
                                            <a href="#"><i class="icon_clock_alt"></i>
                                            {{ date('M d, Y',strtotime($bg->created_at)) }}</a>
                                            <a href="#"><i class="icon_chat_alt"></i>6 Comments</a>
                                        </div>
                                        <h3><a href="">{{ $bg->title }}</a></h3>
                                        <a class="read-more" href="#">Read More<i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="bisylms-pagination">
                                    <span class="current">01</span>
                                    <a href="#">02</a>
                                    <a class="next" href="#">next<i class="arrow_right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="blog-sidebar">
                            <aside class="widget widget-search">
                                <form class="search-form" action="#" method="post">
                                    <input type="search" name="s" placeholder="Search...">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </aside>
                            <aside class="widget widget-categories">
                                <h3 class="widget-title">Categories</h3>
                                <ul>
                                    <li><a href="#">Web Design</a><span>(24)</span></li>
                                    <li><a href="#">Marketing</a><span>(15)</span></li>
                                    <li><a href="#">Frontend</a><span>(8)</span></li>
                                    <li><a href="#">IT & Software</a><span>(13)</span></li>
                                    <li><a href="#">Photography</a><span>(4)</span></li>
                                    <li><a href="#">Technology</a><span>(16)</span></li>
                                    <li><a href="#">General</a><span>(12)</span></li>
                                </ul>
                            </aside>
                            <aside class="widget widget-trend-post">
                                <h3 class="widget-title">Popular Posts</h3>
                                <div class="popular-post">
                                    <a href=""><img src="assets/images/blog/p1.jpg" alt=""></a>
                                    <h5><a href="#">Using creative problem Solving</a></h5>
                                    <span>March 10, 2020</span>
                                </div>
                                <div class="popular-post">
                                    <a href="#"><img src="assets/images/blog/p2.jpg" alt=""></a>
                                    <h5><a href="#">Fundamentals of UI Design</a></h5>
                                    <span>Jan 14, 2020</span>
                                </div>
                                <div class="popular-post">
                                    <a href="#"><img src="assets/images/blog/p3.jpg" alt=""></a>
                                    <h5><a href="#">Making music with Other people</a></h5>
                                    <span>April 12, 2020</span>
                                </div>
                                <div class="popular-post">
                                    <a href="#"><img src="assets/images/blog/p4.jpg" alt=""></a>
                                    <h5><a href="#">Brush strokes energize Trees in paintings</a></h5>
                                    <span>July 4, 2020</span>
                                </div>
                            </aside>
                            <aside class="widget">
                                 <h3 class="widget-title">Popular Tags</h3>
                                 <div class="tags">
                                    <a href="#">Bisy LMS</a>
                                    <a href="#">Design</a>
                                    <a href="#">General</a>
                                    <a href="#">Online</a>
                                    <a href="#">Prevention</a>
                                    <a href="#">Artist</a>
                                    <a href="#">Education</a>
                                    <a href="#">Motivation</a>
                                    <a href="#">Politico</a>
                                    <a href="#">Live Cases</a>
                                 </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog End -->

        <p>&nbsp;</p>       
        <p>&nbsp;</p>
        
@endsection