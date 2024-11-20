<div class="row mt-md-3 mt-sm-30">
    <div class="col-lg-3 col-md-6">
        <div class="contact-details text-center mt-30 p-20">
            <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="spacer-15"></div>
            <div class="contact-head">
                <p class="mb-0 info-title">Location</p>
                <p class="mb-0"><a href="#" class="text-muted">{{ request()->get('address') }}</a></p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="contact-details text-center mt-30 p-20">
            <div class="contact-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="spacer-15"></div>
            <div class="contact-head">
                <p class="mb-0 info-title">Email</p>
                <p class="mb-0"><a href="#" class="text-muted">{{ request()->get('email') }}</a></p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="contact-details text-center mt-30 p-20">
            <div class="contact-icon">
                <i class="fas fa-globe"></i>
            </div>
            <div class="spacer-15"></div>
            <div class="contact-head">
                <p class="mb-0 info-title">Website</p>
                <p class="mb-0"><a href="#" class="text-muted">{{ request()->get('website') }}</a></p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="contact-details text-center mt-30 p-20">
            <div class="contact-icon">
                <i class="fas fa-phone"></i>
            </div>
            <div class="spacer-15"></div>
            <div class="contact-head">
                <p class="mb-0 info-title">Call</p>
                <p class="mb-0">{{ request()->get('phone') }} 
                    <!-- <br> {{ request()->get('open_time') }}  -->
                </p>
            </div>
        </div>
    </div>
</div>

