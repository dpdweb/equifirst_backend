<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li >
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('hero-slides.index') }}" class="waves-effect">
                        <i class="ti-settings"></i>
                        <span>Hero Sliders</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('teams.index') }}" class="waves-effect">
                        <i class="ti-user"></i>
                        <span>Teams</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect" aria-expanded="false">
                        <i class="ti-pencil-alt"></i>
                        <span>FAQs</span>
                    </a>
                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="false" style="">
                        <li><a href="{{ route('faqs.index') }}">FAQs</a></li>
                        <li><a href="{{ route('faq-categories.index') }}">FAQ Categories</a></li>
                    </ul>
                </li>




                <li>
                    <a href="{{ route('posts.index') }}" class="waves-effect">
                        <i class="ti-pencil"></i>
                        <span>Posts</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('testimonials.index') }}" class="waves-effect">
                        <i class="ti-user"></i>
                        <span>Testimonials</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('settings.index') }}" class="waves-effect">
                        <i class="ti-settings"></i>
                        <span>Settings</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
