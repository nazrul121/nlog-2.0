<div class="service-area bg-color area-padding-2" style="background:white;">
    <div class="container">
        @if($posts->count()>0)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <p style="max-width:80%;">{{$menu->short_description}}</p>
                </div>
            </div>
        </div> @endif

        <!-- show company info - check which pages are requied-->
        <?php $array = explode(',', request()->get('show-company-info'));
        $url = str_replace('-', ' ', \Request::segment(1)); ?>

        @if (in_array($url, $array))
            @include('portion.'.request()->get('design').'.company-info')
        @else 
        
        @endif

        @if(request()->get('photo-slider-at')=='top')
            <!-- Start Brand slider -->
            @include('portion.'.request()->get('design').'.logo-slider')
            <!-- page post starts -->
            @include('portion.'.request()->get('design').'.main-page-post')
        @else 
            <!-- page post starts -->
            @include('portion.'.request()->get('design').'.main-page-post')
            <!-- Start Brand slider -->
            @include('portion.'.request()->get('design').'.logo-slider')

        @endif

        <!-- Start Counter/fun factor -->
        @include('portion.'.request()->get('design').'.fun_factors')

        <!-- slider employee-->
        @include('portion.'.request()->get('design').'.employee-slider')
        
        <!-- FORM SetUp -->
        @include('portion.'.request()->get('design').'.main-page-form')
    </div>
</div>
