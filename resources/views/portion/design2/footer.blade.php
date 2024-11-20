@inject('subM','App\Models\Sub_menu')

<footer class="footer">
    <div class="section-two">
        <div class="container">
            <!--Footer Info -->
            <div class="row footer-info">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="">
                        <a href="/" class="logo">
                            <img src="/{{request()->get('logo')}}" alt="" height="30">
                        </a>
                    </div>
                  
                    <p class="text-footer-clr mt-3">
                        <b>You may contact us freely, 24/7 with any queires</b><br>
                        <span>Cell :</span> {{request()->get('phone')}}<br>
                        <span>Email :</span> {{request()->get('email')}}<br>
                        <span>Location :</span> {{request()->get('address')}}
                    </p>

                    <div>
                        <ul class="list-unstyled social-icon">
                            @foreach(request()->get('social_media') as $media)
                            <li title="{{$media->media_name}}" class="list-inline-item"><a target="_" href="{{$media->link}}"><i class="{{$media->media_icon}}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4">
                    <div class="footer-head">
                        <h5 class="text-light">Company</h5>
                    </div>
                    <div class="footer-item mt-3">
                        <ul class="list-unstyled">
                            @foreach($menus as $menu)
                                <li><a href="@if($menu->id=='1') url('/') @else {{ url(strtolower(str_replace(' ','-',$menu->title)))}} @endif"><i class="fas fa-chevron-right mr-2"></i>  {{$menu->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4">
                    <div class="footer-head">
                        <h5 class="text-light">Useful</h5>
                    </div>
                    <div class="footer-item mt-3">
                        <ul class="list-unstyled">
                            @foreach($subM->sub_menu() as $sub)
                            <li><a href="{{$sub->path()}}">{{$sub->title}}</a></li>@endforeach

                            <li><a href="/login">Login</a></li>
                        </ul>
                    </div>
                </div>
               
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-head">
                        <h5 class="text-light">Newsletter</h5>
                    </div>
                    <div class="footer-news mt-3">
                        <p class="text-footer-clr">
                             Are you looking for professional advice for your new business??<br>
                            Subscribe to our email newsletter to receive useful articles and special offers. <br>
                       </p>
                        <div class="subscribed-form">
                            <div class="subcribed-form">
                                <form action="#">
                                    <input name="email" type="email" placeholder="Your Email" id="email" required="">
                                    <button type="submit" class=""><span class="fab fa-telegram-plane"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Info -->
        </div>
    </div>
    <hr>

    <!-- Copyright Bar -->
    <section class="section-30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-left">
                        <p class="copy-rights text-white mb-0">
                         Copyright © {{date('Y')}}
                            <a href="#">{{request()->get('name')}}</a> All Rights Reserved
                            <b class="pull-right">by <a href="">Zero Infosys</a></b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Copyright Bar -->
</footer>
<!-- FOOTER END -->

<!-- Back to top -->    
<a href="#" class="back-to-top" id="back-to-top"> 
    <i class="mdi mdi-chevron-up"> </i> 
</a>