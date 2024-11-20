<section class="section" id="work"> 
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="section-title text-center">
                    <h3 class="font-26">{{$menu->short_description}}</h3>
                    <div class="spacer-15"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-30">
        <!-- show company info - check which pages are requied-->
        <?php $array = explode(',', request()->get('show-company-info'));
        $url = str_replace('-', ' ', \Request::segment(1)); ?>

        @if (in_array($url, $array))
            @include('portion.'.request()->get('design').'.company-info')
        @else <hr>  @endif
      
        <!-- page post starts -->
        @include('portion.'.request()->get('design').'.main-page-post')
        

        <!-- Start Counter/fun factor -->
        @include('portion.'.request()->get('design').'.fun_factors')

        <!-- slider employee-->
        @include('portion.'.request()->get('design').'.employee-slider')
        
        <!-- FORM SetUp -->
        @include('portion.'.request()->get('design').'.main-page-form')
        
    </div>
</section>
        
