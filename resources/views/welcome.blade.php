<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <title>{{ request()->get('name') }} | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->        
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/'.request()->get('favicon'))}}">
    @include('portion.'.request()->get('design').'.header-links')

</head>
    <body>
        @include('portion.'.request()->get('design').'.header')
        
        @include('portion.'.request()->get('design').'.home_slider')

        <!-- greeings -->
        @include('portion.'.request()->get('design').'.greetings')

        <!-- Start Counter area -->
        @include('portion.'.request()->get('design').'.fun_factors')

        <!-- Start service area multiple menu -->
        @if(request()->get('home-post-single-menu')!='')
            @include('portion.'.request()->get('design').'.home-post')
        @endif

        <!--  Blog Area-->
        @if(request()->get('home-post-multiple-menu-number') !='')
         @include('portion.'.request()->get('design').'.latest-post-at-home') @endif

        <!-- Start Brand slider -->
        @include('portion.'.request()->get('design').'.logo-slider')

        <!-- Start Footer Area -->
        @include('portion.'.request()->get('design').'.footer')

        @include('sweetalert::alert')
      
        <!-- all js here -->
        @include('portion.'.request()->get('design').'.footer-links')
    </body>
</html>