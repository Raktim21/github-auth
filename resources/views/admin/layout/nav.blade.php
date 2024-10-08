<div>
    <div class="logo-wrapper">
        <a href="{{ route('dashboard') }}">
            {{-- <img class="img-fluid for-light" src="{{ asset('admin_dashboard/assets/images/logo/logo.png') }}" alt=""> --}}
            <p></p>
        </a>
        <div class="back-btn">
            <i class="fa fa-angle-left"></i>
        </div>
        {{-- <div class="toggle-sidebar">
            <i class="fa fa-cog status_toggle middle sidebar-toggle"> </i>
        </div> --}}
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('dashboard') }}">
            {{-- <img class="img-fluid" src="{{ asset('admin_dashboard/assets/images/logo/logo-icon1.png') }}" alt=""> --}}
        </a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow">
            <i data-feather="arrow-left"></i>
        </div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn">
                    <a href="{{ route('dashboard') }}">
                        {{-- <img class="img-fluid" src="{{ asset('admin_dashboard/assets/images/logo/logo-icon.png') }}" alt="">    --}}
                    </a>
                    <div class="mobile-back text-end">
                        <span>Back</span>
                        <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                    </div>
                </li>
                <li class="sidebar-main-title">
                    <h6>Dashboard</h6>
                </li>
                <li class="menu-box">
                    <ul>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav @yield('dashboard')" href="{{ route('dashboard') }}">
                                <i data-feather="home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="sidebar-main-title">
                    <h6>Users</h6>
                </li>
                <li class="menu-box">
                    <ul>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav @yield('admin.users.index')" href="{{ route('admin.users.index') }}">
                                <i data-feather="user-check"></i>
                                <span>Admins</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow">
            <i data-feather="arrow-right"></i>
        </div>
    </nav>
</div>
