<?php  
$array1 = explode('-', Request::segment(1));
$array2 = explode('-', Request::segment(2)); array_shift($array2);
?>

<div class="page-area" style="background:url({{url('/'.$menu->icon)}})no-repeat center center / cover #edfaff;">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        @if(Request::segment(1)=='page')
                            <h3>@foreach ($array2 as $key => $value)  {{ucfirst($value).' '}} @endforeach</h3>
                        @else <h3><h3>@foreach ($array1 as $key => $value)  {{ucfirst($value).' '}} @endforeach</h3></h3> @endif
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>@if(Request::segment(2)=='')
                            {{ucfirst(Request::segment(1))}}
                        @else
                            @foreach ($array2 as $key => $value) {{ucfirst($value).' ' }} @endforeach
                        @endif</li>
                    </ul>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>