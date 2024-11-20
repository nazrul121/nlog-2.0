<div id="preloader">
    <div id="status">
        <div class="spinner">  <div class="double-bounce1"></div> <div class="double-bounce2"></div> </div>
    </div>
</div>

<!-- Navigation Bar-->
<div class="tagline hidden-md">
    <div class="container">
        <div class="float-left">
            <div class="phone">
                <i class="fas fa-phone"></i> {{request()->get('phone')}}
            </div>
            <div class="phone">
                <i class="fas fa-envelope"></i> {{request()->get('email')}}
            </div>
        </div>
        <div class="float-right">
            <ul class="top_socials">
                @foreach(request()->get('social_media') as $media)
                <li title="{{$media->media_name}}"><a target="_" href="{{$media->link}}"><i class="{{$media->media_icon}}"></i></a></li>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>

@inject('subM','App\Models\Sub_menu')
<header id="topnav" class="defaultscroll fixed-top navbar-sticky sticky">
    <div class="container">
        <div> <a href="/" class="logo"><img src="/{{request()->get('logo')}}" alt="" height="50"></a></div>
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines"> <span></span> <span></span><span></span></div>
                </a>
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                @foreach($menus as $menu)  
                    @if($menu->sub_menus->count()>0)
                    <li class="has-submenu"><a href="javascript:void(0)">{{$menu->title}}</a>
                        <span class="menu-arrow"></span>
                        <ul class="submenu">
                            @foreach($subM->sub_menus($menu->id) as $sub)
                            <li><a href="{{$sub->path()}}">{{$sub->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @else
                        <li><a href="@if($menu->id=='1') {{url('/')}} @else{{ url('/'.strtolower(str_replace(' ','-',$menu->title)))}} @endif">{{$menu->title}}</a></li>
                    @endif
                @endforeach
            </ul>
            <!-- End navigation menu-->
        </div>
    </div>
</header>
