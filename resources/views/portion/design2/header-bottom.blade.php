<?php  
$array1 = explode('-', Request::segment(1));
$array2 = explode('-', Request::segment(2)); array_shift($array2);
?>

<section class="bg-half" style="background-image: url('/{{$menu->icon}}');">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="page-next-level text-white">
                            <h4 class="text-uppercase">
                            @if(Request::segment(1)=='page')
                                @foreach ($array2 as $key => $value)  {{ucfirst($value).' '}} @endforeach
                            @else @foreach ($array1 as $key => $value)  {{ucfirst($value).' '}} @endforeach @endif </h4>

                            <div class="page-next"> 
                                <a href="index-2.html">Home</a>
                                <i class="mdi mdi-chevron-right"></i> &nbsp;
                                <a href="#">
                                    @if(Request::segment(2)=='')
                                        {{ucfirst(Request::segment(1))}}
                                    @else
                                        @foreach ($array2 as $key => $value) {{ucfirst($value).' ' }} @endforeach
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>

