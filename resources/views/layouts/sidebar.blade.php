<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('index') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('organizations.index') }}" class="waves-effect">
                        <i class="ti-settings"></i>
                        <span>Organizations</span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('categories.index') }}" class="waves-effect">
                        <i class="ti-settings"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('inventories.index') }}" class="waves-effect">
                        <i class="ti-settings"></i>
                        <span>Inventories</span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('settings.index') }}" class="waves-effect">
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
