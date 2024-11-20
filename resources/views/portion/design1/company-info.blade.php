<div class="row">
    <div class="contact-inner">
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
                <div class="single-icon">
                    <i class="ti-mobile"></i>
                    <p>
                        Call : {{ request()->get('phone') }}<br>
                        <span>{{ request()->get('open_time') }} </span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
                <div class="single-icon">
                    <i class="ti-email"></i>
                    <p>
                        Email : {{ request()->get('email') }} <br>
                        <span>Web: {{ request()->get('website') }} </span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
                <div class="single-icon">
                    <i class="ti-location-pin"></i>
                    <p>
                       {{ request()->get('address') }} 
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>