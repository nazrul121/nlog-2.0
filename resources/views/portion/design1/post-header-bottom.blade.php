<?php  $array = explode('-', Request::segment(2)); array_shift($array);?>
<div class="page-area" style="background:url({{url('/'.$post->photo)}})no-repeat center center / cover #edfaff;">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <!-- <h3>{{str_replace('-',' ',ucfirst(Request::segment(1)))}}</h3> -->
                        <h3>@foreach ($array as $key => $value)  {{ucfirst($value).' '}} @endforeach</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>@if(Request::segment(2)=='')
                            {{ucfirst(Request::segment(1))}}
                        @else
                            @foreach ($array as $key => $value) {{ucfirst($value).' '}} @endforeach
                        @endif</li>
                    </ul>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>