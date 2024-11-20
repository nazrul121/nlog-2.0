<div id="preloader"></div>

<header class="header-one">
    <div class="topbar-area fix hidden-xs">
        <div class="container">
            <div class="row">
                <div class=" col-md-9 col-sm-9">
                    <div class="topbar-left">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{request()->get('email')}}</a></li>
                            <li><a href="#"><i class="fa fa-phone-square"></i> {{request()->get('phone')}}</a></li>
                            
                        </ul>  
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="top-social">
                        <ul>
                            @foreach(request()->get('social_media') as $media)
                            <li title="{{$media->media_name}}"><a target="_" href="{{$media->link}}"><i class="{{$media->media_icon}}"></i></a></li>
                            @endforeach
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- header-area start -->
    <div id="sticker" class="header-area header-area-2 hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="logo">
                        <a class="navbar-brand page-scroll black-logo" href="{{url('/')}}">
                            <img src="{{url('/'.request()->get('logo'))}}" alt="">
                        </a>
                    </div>
                </div>

                @inject('subM','App\Models\Sub_menu')
                <div class="col-md-9 col-sm-9">
                    <nav class="navbar navbar-default">
                        <div class="collapse navbar-collapse" id="navbar-example">
                            <div class="main-menu">
                                <ul class="nav navbar-nav navbar-right">
                                    @foreach($menus as $menu)  
                                    @if($menu->sub_menus->count()>0)
                                    <li><a class="pages" href="#">{{$menu->title}}</a>
                                        <ul class="sub-menu">
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
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
	
	
    <!-- mobile-menu-area start -->
    <div class="mobile-menu-area hidden-lg hidden-md">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{url(request()->get('logo'))}}"/></a>
                        </div>
                        <nav id="dropdown">
                            <ul>
                                @foreach($menus as $menu)   
                                    @if($menu->sub_menus->count()>0)
                                        <li><a class="pages" href="#">Products</a>
                                            <ul class="sub-menu">
                                            @foreach($subM->sub_menus($menu->id) as $sub)
                                                <li><a href="{{$sub->path()}}">{{$sub->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="@if($menu->id=='1'){{url('/')}} @else{{ url(strtolower(str_replace(' ','-',$menu->title))) }} @endif">{{$menu->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>                  
                </div>
            </div>
        </div>
    </div> 
	
</header>