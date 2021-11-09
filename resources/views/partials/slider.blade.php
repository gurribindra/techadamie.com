 <!-- Hero Slider Start -->
        <section class="hero-slider-section">
            <div class="hero-slider owl-carousel">
                @foreach($slide as $slider)
                <!-- Single Slider item  -->
                <div class="single-slide bg-img d-flex align-items-center" data-bg-image="{{$slider->photo->getUrl() }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slider-content">
                                    <div class="sub animated">{!! $slider->title !!}</div>
                                    <h3 class="animated">
                                       {!! $slider->description !!}
                                    </h3>
                                    @if(!empty($slider->btn_text) && $slider->btn_text !='')
                                    <a href="{{ $slider->url }}" class="animated bisylms-btn-3">{{$slider->btn_text}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider item  -->
                @endforeach


            </div>
        </section>
        <!-- Hero Slider End -->