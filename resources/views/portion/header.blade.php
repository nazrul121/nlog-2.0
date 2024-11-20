<div class="page-main-header">
    <div class="main-header-left">
        <div class="logo-wrapper">
            <a href="/home">
                <img src="{{ url(request()->get('logo')) }}" class="image-dark" alt=""/>
                <img src="{{ url(request()->get('logo'))}}" class="image-light" alt=""/>
            </a>
        </div>
    </div>
    <div class="main-header-right row">
        <div class="mobile-sidebar">
            <div class="media-body text-right switch-sm">
                <label class="switch">
                    <input type="checkbox" id="sidebar-toggle" checked>
                    <span class="switch-state"></span>
                </label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li>
                    <a href="{{url('/')}}" class="text-dark" target="_">  Website  </a>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="text-dark">
                        <img class="align-self-center pull-right mr-2" src="{{url('images/dashboard/browser.png')}}" alt="header-browser">
                    </a>
                </li>
                <li class="onhover-dropdown">
                    <a href="#!" class="txt-dark">
                        <img class="align-self-center pull-right mr-2" src="{{url('images/dashboard/translate.png')}}" alt="header-translate">
                    </a>
                    <ul class="language-dropdown onhover-show-div p-20">
                        <li>
                            <a href="#" data-lng="en">
                                <i class="flag-icon flag-icon-ws"></i> English
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="onhover-dropdown">
                    <a href="#!" class="txt-dark">
                        <img class="align-self-center pull-right mr-2" src="{{url('images/dashboard/notification.png')}}" alt="header-notification">
                        <span class="badge badge-pill badge-primary notification">3</span>
                    </a>
                    <ul class="notification-dropdown onhover-show-div">
                        <li>Notification <span class="badge badge-pill badge-secondary text-white text-uppercase pull-right">3 New</span></li>
                        <li>
                            <div class="media">
                                <i class="align-self-center notification-icon icofont icofont-shopping-cart bg-primary"></i>
                                <div class="media-body">
                                    <h6 class="mt-0">Your order ready for Ship..!</h6>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                    <span><i class="icofont icofont-clock-time p-r-5"></i>Just Now</span>
                                </div>
                            </div>
                        </li>
                       
                        <li class="text-center">You have Check <a href="#">all</a> notification  </li>
                    </ul>

                </li>
                <li class="onhover-dropdown">
                    <div class="media  align-items-center">
                        <img class="align-self-center pull-right mr-2" src="{{url('images/dashboard/user.png')}}" alt="header-user"/>
                        <div class="media-body">
                            <h6 class="m-0 txt-dark f-16">
                                My Account
                                <i class="fa fa-angle-down pull-right ml-2"></i>
                            </h6>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20">
                        <li>
                            <a href="/access/profile">
                                <i class="icon-user"></i>
                                My Profile
                            </a>
                        </li>                        
                        <li>
                            <a href="/access/password">
                                <i class="icon-lock"></i>
                                Password
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>  {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle">
                <i class="icon-more"></i>
            </div>
        </div>
    </div>
</div>
    