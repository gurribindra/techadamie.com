    <!-- Header Start -->
    <header class="header-01 sticky  {{ isset($breadcrumb) ? 'single_page_menu' : 'home_menu' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <!-- logo Start-->
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/images/logo-techmadia1.png" alt="">
                            <img class="sticky-logo" src="assets/images/logo4.png" alt="">
                        </a>
                        <!-- logo End-->

                        <!-- Moblie Btn Start -->
                        <button class="navbar-toggler" type="button">
                            <i class="fal fa-bars"></i>
                        </button>
                        <!-- Moblie Btn End -->

                        <!-- Nav Menu Start -->
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav"> 
                            @foreach($menus as $menu)
                                <li class="{{ count($menu->childs) ? 'menu-item-has-children' : '' }}">
                                    <a href="{{ $menu->slug }}">{{ $menu->title }}</a>
                                    @if(count($menu->childs))
                                    <ul class="sub-menu">
                                        @include('admin.menu.menusub',['childs' => $menu->childs])
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <!-- Nav Menu End -->

                        <!-- User Btn -->
                        <div class="dropdown">
                        <a href="#" class="user-btn"><i class="ti-user"></i></a>
                        <div class="dropdown-content">
                            <a href="#">Student</a>
                            <a href="#">Parent</a>
                            <a href="#">Teacher</a>
                            <a href="#">Associates Partners</a>
                        </div>
                        </div>
                        <!-- User Btn -->

                         <!-- Join Btn -->
                        <a href="{{ route('enquiry') }}" class="join-btn">Enquiry</a>
                        <!-- Join Btn -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->