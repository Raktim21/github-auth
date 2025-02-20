<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.style')
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">

                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search In Enzo .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <i class="close-search" data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>

                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper">
                        <a href="index.html">
                            <img class="img-fluid" src="{{ asset('admin_dashboard/assets/images/logo/login.png') }}" alt="">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                    </div>
                </div>

                <div class="left-header col horizontal-wrapper ps-0">
                    {{-- <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text mobile-search">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <input class="form-control" type="text" placeholder="Search Here........">
                    </div> --}}
                </div>

                <div class="nav-right col-8 pull-right right-header p-0">
                    <ul class="nav-menus">
                        {{-- <li class="onhover-dropdown">
                            <div class="notification-box">
                                <i class="fa fa-bell-o"> </i>
                                <span class="badge rounded-pill badge-primary">4 </span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i data-feather="bell"> </i>
                                    <h6 class="f-18 mb-0">Notifications</h6>
                                </li>
                                <li>
                                    <a href="email_read.html">
                                        <p>
                                            <i class="fa fa-circle-o me-3 font-primary"> </i>
                                            Delivery processing
                                            <span class="pull-right">10 min.</span>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="email_read.html">
                                        <p>
                                            <i class="fa fa-circle-o me-3 font-success"></i>
                                            Order Complete
                                            <span class="pull-right">1 hr</span>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="email_read.html">
                                        <p>
                                            <i class="fa fa-circle-o me-3 font-info"></i>
                                            Tickets Generated
                                            <span class="pull-right">3 hr</span>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="email_read.html">
                                        <p>
                                            <i class="fa fa-circle-o me-3 font-danger"></i>
                                            Delivery Complete
                                            <span class="pull-right">6 hr</span>
                                        </p>
                                    </a>
                                </li>
                                <li><a class="btn btn-primary" href="email_read.html">Check all notification</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li>
                            <div class="mode">
                                <i class="fa fa-moon-o"></i>
                            </div>
                        </li> --}}

                        <li class="maximize">
                            <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>

                        <li class="profile-nav onhover-dropdown p-0 me-0">
                            <div class="d-flex profile-media">
                                <img class="b-r-50" src="{{ asset('admin_dashboard/assets/images/dashboard/profile.jpg') }}" alt="">
                                <div class="flex-grow-1">
                                    <span>{{ Auth::user()->name }}</span>
                                    <p class="mb-0 font-roboto">{{ Auth::user()->email }} <i class="middle fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                {{-- <li>
                                    <a href="{{ route('profile.edit') }}">
                                        <i data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li> --}}
                                
                                <li>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                            <i data-feather="log-in"> </i>
                                            <span>Log out</span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                {{-- <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">                        
                        <div class="ProfileCard-avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0">
                                <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                                <polygon points="12 15 17 21 7 21 12 15"></polygon>
                            </svg>
                        </div>
                        <div class="ProfileCard-details">
                            <div class="ProfileCard-realName">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                    </div>
                </script>

                <script class="empty-template" type="text/x-handlebars-template">
                    <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
                </script> --}}
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                @include('admin.layout.nav')
            </div>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid default-dash">
                    @yield('content')

                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 p-0 footer-left">
                            <p class="mb-0">Copyright © 2024 Shariar Raktim.</p>
                        </div>
                        <div class="col-md-6 p-0 footer-right">
                            <ul class="color-varient">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <p class="mb-0 ms-3">Hand-crafted & made with <i class="fa fa-heart font-danger"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- latest jquery-->
    @include('admin.layout.script')
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>
