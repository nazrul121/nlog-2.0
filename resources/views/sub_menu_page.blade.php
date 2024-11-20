<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ request()->get('name') }} | {{Request::segment(1)}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->        
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/'.request()->get('favicon'))}}">
    <!-- all css here -->
    @include('portion.'.request()->get('design').'.header-links')
</head>
<body>
    @include('portion.'.request()->get('design').'.header')
    @include('portion.'.request()->get('design').'.header-bottom')
        @inject('subM','App\Models\Sub_menu')

        @include('portion.'.request()->get('design').'.sub-menu-page')
       
    <!-- Footer Area -->
    @include('portion.'.request()->get('design').'.footer')

    @include('sweetalert::alert')

    @include('portion.'.request()->get('design').'.footer-links')
    
</body>
</html>
           