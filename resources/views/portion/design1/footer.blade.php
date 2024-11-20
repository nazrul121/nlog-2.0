@inject('subM','App\Models\Sub_menu')
<footer class="footer1">
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="footer-content logo-footer">
                        <div class="footer-head">
                            <div class="footer-logo">
                                <a href="#"><img src="{{url(request()->get('logo'))}}" alt=""></a>
                            </div>
                            <p class="hidden-sm">Are you looking for professional advice for your new business??
                                <br>--- You may contact us freely, 24/7 with any queires <br>
                                Subscribe us to receive useful articles and special offers
                            </p>
                            <div class="subs-feilds">
                                <div class="suscribe-input">
                                    <input type="email" class="email form-control width-80" id="sus_email" placeholder="Type Email">
                                    <button type="submit" id="sus_submit" class="add-btn">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-3 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Website Links</h4>

                            <ul class="footer-list">
                                @foreach($menus as $menu)
                                <li><a href="@if($menu->id=='1') url('/') @else {{ url(strtolower(str_replace(' ','-',$menu->title)))}} @endif">{{$menu->title}}</a></li>@endforeach
                            </ul>
                            <ul class="footer-list hidden-sm">
                                @foreach($subM->sub_menu() as $sub)
                                <li><a href="{{$sub->path()}}">{{$sub->title}}</a></li>@endforeach

                                <li><a href="/login">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="footer-content last-content">
                        <div class="footer-head">
                            <h4>Information</h4>
                            <div class="footer-contacts">
                                <p><span>Location :</span> {{request()->get('address')}}</p>
                                <p><span>Cell :</span> {{request()->get('phone')}}</p>
                                <p><span>Email :</span> {{request()->get('email')}}</p>
                            </div> 
                            <div class="footer-icons">
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
        </div>
    </div>
    <!-- Start Footer Bottom Area -->
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright">
                        <p>
                            Copyright © {{date('Y')}}
                            <a href="#">{{request()->get('name')}}</a> All Rights Reserved
                            <b class="pull-right">by <a href="">Zero Infosys</a></b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style type="text/css">
    
.effect-bg{
    color: black;
    transition: all 0.9s ease 0s;
    -moz-transition: all 0.9s ease 0s;
    -webkit-transition: all 0.9s ease 0s;
    -o-transition: all 0.9s ease 0s;
}
.effect-bg:hover{
    background: #fee1a5;
    transition: all 0.9s ease 0s;
    -moz-transition: all 0.9s ease 0s;
    -webkit-transition: all 0.9s ease 0s;
    -o-transition: all 0.9s ease 0s;
}
.round_effect, .round_effect2{
    transition: all 0.9s ease 0s;
    -moz-transition: all 0.9s ease 0s;
    -webkit-transition: all 0.9s ease 0s;
    -o-transition: all 0.9s ease 0s;
}
.round_effect:hover{
    transition: all 0.9s ease 0s;
    -moz-transition: all 0.9s ease 0s;
    -webkit-transition: all 0.9s ease 0s;
    -o-transition: all 0.9s ease 0s;
    
    transform: rotateY(360deg);
    /*
    -webkit-transform:translate(360deg);
    -ms-transform:translate(360deg);
    -o-transform:translate(360deg);
    -moz-transform:translate(360deg);
    transform:translateX(-360deg);
    transform: rotate(-360deg);*/
}
.round_effect2:hover{
    transition: all 0.9s ease 0s;
    -moz-transition: all 0.9s ease 0s;
    -webkit-transition: all 0.9s ease 0s;
    -o-transition: all 0.9s ease 0s;
    
    transform: rotateY(180deg);
    /*
    -webkit-transform:translate(180deg);
    -ms-transform:translate(180deg);
    -o-transform:translate(180deg);
    -moz-transform:translate(180deg);
    */
}

</style>