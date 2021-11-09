<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-file-alt nav-icon">

                        </i>
                        Pages
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.about.index") }}" class="nav-link">
                                    <i class="fa-fw fas fa-arrow-right nav-icon">

                                    </i>
                                    About Us
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.eduedge.index") }}" class="nav-link">
                                    <i class="fa-fw fas fa-arrow-right nav-icon">

                                    </i>
                                    Eduedge
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.edupro.index") }}" class="nav-link">
                                    <i class="fa-fw fas fa-arrow-right nav-icon">
                                    </i>
                                    Edupro
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.careers.index") }}" class="nav-link">
                                    <i class="fa-fw fas fa-arrow-right nav-icon">

                                    </i>
                                    Careers
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.contact.index") }}" class="nav-link">
                                    <i class="fa-fw fas fa-arrow-right nav-icon">

                                    </i>
                                    Contact Us
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.coreteam.index") }}" class="nav-link {{ request()->is('admin/coreteam') || request()->is('admin/coreteam/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-user-friends nav-icon">

                        </i>
                        Core Team
                    </a>
                </li>
            @can('discipline_access')
                <li class="nav-item">
                    <a href="{{ route("admin.disciplines.index") }}" class="nav-link {{ request()->is('admin/disciplines') || request()->is('admin/disciplines/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-book-open nav-icon">

                        </i>
                        {{ trans('cruds.discipline.title') }}
                    </a>
                </li>
            @endcan
            @can('course_access')
                <li class="nav-item">
                    <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is('admin/courses') || request()->is('admin/courses/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-certificate nav-icon">

                        </i>
                        {{ trans('cruds.course.title') }}
                    </a>
                </li>
            @endcan
            @can('course_access')
                <li class="nav-item">
                    <a href="{{ route("admin.menus.index") }}" class="nav-link {{ request()->is('admin/menus') || request()->is('admin/menus/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-bars nav-icon">

                        </i>
                        Menus
                    </a>
                </li>
            @endcan
            @can('course_access')
                <li class="nav-item">
                    <a href="{{ route("admin.blog.index") }}" class="nav-link {{ request()->is('admin/blog') || request()->is('admin/blog/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-rss-square nav-icon">
                        </i>
                        Blog
                    </a>
                </li>
            @endcan

            @can('enquiries_access')
                <li class="nav-item">
                    <a href="{{ route("admin.enquiries.index") }}" class="nav-link {{ request()->is('admin/enquiries') || request()->is('admin/enquiries/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-comments nav-icon">

                        </i>
                        {{ trans('cruds.enquiries.title') }}
                    </a>
                </li>
            @endcan

            @can('slides_access')
            <li class="nav-item">
                    <a href="{{ route("admin.slides.index") }}" class="nav-link {{ request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-images nav-icon">

                        </i>
                        {{ trans('cruds.slides.title') }}
                    </a>
                </li>
            @endcan

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>