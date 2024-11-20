<div class="page-sidebar custom-scrollbar">
    <div class="sidebar-user text-center">
        <div>
            <img class="img-50 rounded-circle" src="{{url(Auth::user()->photo)}}" alt="#">
        </div>
        <h6 class="mt-3 f-12">{{Auth::user()->name}}</h6>
    </div>

    <ul class="sidebar-menu">
        <li class="@if(Request::segment(1)=='home')active @endif">
            <div class="sidebar-title">Menu Bar</div>
            <a href="{{url('/home')}}" class="sidebar-header">
                <i class="icon-desktop"></i><span> Dashboard</span>
            </a>
        </li>
        <li class="@if(Request::segment(2)=='website')active @endif">
            <a href="#" class="sidebar-header">
                 <i class="icon-world"></i><span> Websie Setup</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{url('access/website/main-menus')}}" class="@if(Request::segment(3)=='main-menus')active @endif"><i class="fa fa-angle-right"></i> Menus & Pages</a></li>
                <li><a class="@if(Request::segment(3)=='posts')active @endif" href="{{url('/access/website/posts')}}"><i class="fa fa-angle-right"></i> Page Contents</a></li>

                <li class="@if(Request::segment(3)=='slider')active @endif">
                    <a href="#"><i class="fa fa-angle-right"></i>Sliders<i class="fa fa-angle-down pull-right"></i></a>
                    <ul class="sidebar-submenu @if(Request::segment(3)=='slider')menu-open @endif">
                        
                        <li><a href="{{url('/access/website/slider/create-slider')}}"><i class="fa fa-angle-right"></i> Create Slider</a></li>

                        <li><a href="{{url('/access/website/slider/index/1')}}"><i class="fa fa-angle-right"></i>Main-Content-Sliders</a></li>

                        <li><a href="{{url('/access/website/slider/index/2')}}"><i class="fa fa-angle-right"></i>Logo Slider</a></li>

                        <li><a href="{{url('/access/website/slider/index/3')}}"><i class="fa fa-angle-right"></i>Employee Slider</a></li>

                        <li><a href="{{url('/access/website/slider/types')}}"><i class="fa fa-angle-right"></i> Slider Types</a></li>
                    </ul>
                </li>
    
                <li><a class="@if(Request::segment(3)=='forms')active @endif" href="{{url('/access/website/forms')}}"><i class="fa fa-angle-right"></i> Forms</a></li>
                
                <li><a class="@if(Request::segment(3)=='greetings')active @endif" href="{{url('/access/website/greetings')}}"><i class="fa fa-angle-right"></i> Welcome Greetings</a></li>

                <li><a class="@if(Request::segment(3)=='fun-factors')active @endif" href="{{url('/access/website/fun-factors')}}"><i class="fa fa-angle-right"></i> Fun factors </a></li>

                <li><a class="@if(Request::segment(3)=='content-settings')active @endif" href="{{url('/access/website/content-settings')}}"><i class="fa fa-angle-right"></i> Content Settings</a></li>

            </ul>
        </li>

        <li class="@if(Request::segment(2)=='company')active @endif">
            <a href="#" class="sidebar-header">
                <i class="icon-settings"></i><span> Company info</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{url('/access/company/company-info')}}" class="@if(Request::segment(3)=='company-info')active @endif"><i class="fa fa-angle-right"></i>General information</a></li>
                <li><a href="{{url('/access/company/company-social-info')}}" class="@if(Request::segment(3)=='company-social-info')active @endif"><i class="fa fa-angle-right"></i> Social Information</a></li>
            </ul>
        </li>

        <li class="@if(Request::segment(2)=='employee')active @endif">
            <a href="#" class="sidebar-header">
                <i class="icon-user"></i><span> Employees</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{url('/access/employee/employee-table')}}" class="@if(Request::segment(3)=='employee-table')active @endif"><i class="fa fa-angle-right"></i>Employee data</a></li>
                
                <li><a href="{{url('/access/employee/create-employee')}}" class="@if(Request::segment(3)=='create-employee')active @endif"><i class="fa fa-angle-right"></i> Deploy new</a></li>
                
                <li><a href="{{url('/access/employee/category')}}" class="@if(Request::segment(3)=='category')active @endif"><i class="fa fa-angle-right"></i> Employee Category</a></li>
            </ul>
        </li>

        @inject('formM','App\Models\Form')
        <li class="@if(Request::segment(2)=='form')active @endif">
            <a href="#" class="sidebar-header">
                <i class="fa fa-envelope-open"></i><span> Messages</span>
                <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                @foreach($formM->table_names() as $table)
                <li><a href="{{url('/access/form/form-messege/'.$table->id)}}" class="@if(Request::segment(3)=='form-messege')active @endif"><i class="fa fa-angle-right"></i>
                @if( strlen($table->table_title)>20 )
                    {{substr($table->table_title,0,20)}} ....
                @else {{ $table->table_title}} @endif </a></li>
                @endforeach
            </ul>
        </li>

        <li class="@if(Request::segment(2)=='client')active @endif">
            <a href="#" class="sidebar-header">
                <i class="fa fa-user-plus"></i><span> Clients</span>  <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="/access/client/index" class="@if(Request::segment(3)=='index')active @endif"><i class="fa fa-angle-right"></i> Client database</a></li>
                @if(Auth::user()->role=='admin')
                <li><a href="/access/client/create-client" class="@if(Request::segment(3)=='create-client')active @endif"><i class="fa fa-angle-right"></i> Add new Client</a></li>@endif
            </ul>
        </li>

        <li class="@if(Request::segment(2)=='partner')active @endif">
            <a href="#" class="sidebar-header">
                <i class="fa fa-handshake-o"></i><span> Partners</span>  <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="/access/partner/index" class="@if(Request::segment(3)=='index')active @endif"><i class="fa fa-angle-right"></i> Partner database</a></li>
                @if(Auth::user()->role=='admin')
                <li><a href="/access/partner/create-partner" class="@if(Request::segment(3)=='create-partner')active @endif"><i class="fa fa-angle-right"></i> Add new Partner</a></li>@endif
            </ul>
        </li>

        <li class="@if(Request::segment(2)=='user')active @endif">
            <a href="#" class="sidebar-header">
                <i class="fa fa-users"></i><span> Uers</span>  <i class="fa fa-angle-right pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="{{url('/access/user/users')}}" class="@if(Request::segment(3)=='users')active @endif"><i class="fa fa-angle-right"></i> Users record</a></li>
                @if(Auth::user()->role=='admin')
                <li><a href="{{url('/access/user/create-user')}}" class="@if(Request::segment(3)=='create-user')active @endif"><i class="fa fa-angle-right"></i> Create new user</a></li>@endif
            </ul>
        </li>
    </ul>

    <div class="sidebar-widget text-center">
        <div class="sidebar-widget-top">
            <h6 class="mb-2 fs-14">For any Query</h6> <i class="icon-bell"></i>
        </div>
        <div class="sidebar-widget-bottom p-20 m-20">
            <p>+1880 1749 015 457
                <br>info@zeroinfosys.com <br><a href="http://www.zeroinfosys.com" target="_blank">Visit Us</a>
            </p>
        </div>
    </div>
</div>
        