@if(Request::segment(1) == 'contact')
<section class="page-banner" style="background-image: url(assets/images/page-top-banner-contact.jpg);">
@elseif(Request::segment(1) == 'blog')
<section class="page-banner" style="background-image: url(assets/images/banner.jpg);">
@else
<section class="page-banner" style="background-image: url(assets/images/page-top-banner-about-us.jpg);">
@endif
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="banner-title">{{ $breadcrumb }}</h2>
                        <div class="bread-crumbs">
                            <a href="{{ route('home') }}">Home</a> <span></span> {{ $breadcrumb }}
                        </div>
                    </div>
                </div>
            </div>
        </section>  