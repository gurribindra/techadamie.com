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
                        <div class="hero-content">
                            {!! $blocks[0]->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!-- Banner End -->
       
        <p>&nbsp;</p>       
        <p>&nbsp;</p>

@endsection