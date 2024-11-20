<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="universal admin is super flexible, powerful, clean & modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, universal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{url('/'.request()->get('favicon'))}}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{url('/'.request()->get('favicon'))}}" type="image/x-icon" />
    <title>@yield('title')</title>
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">
    <!-- ico-font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">
    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css')}}">
    <!-- Flag icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">
    <!-- prism css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <!-- SVG icon css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/whether-icon.css')}}">
    <!-- Chartist -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">

</head>
<body>

<!-- Loader starts -->
<div class="loader-wrapper">
    <div class="loader bg-white">
        <div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div>
        <h4>{{request()->get('name')}}<span>&#x263A;</span></h4>
    </div>
</div>

<div class="page-wrapper">
    <!--Page Header Start-->
    @include('portion.header')    
    <!--Page Body Start-->
    <div class="page-body-wrapper">

        <!--Page Sidebar Start-->
        @include('portion.nav')
        <div class="page-body">
            @yield('content')

            @include('portion.footer')

            @include('sweetalert::alert')
        </div>
           
    </div>
</div>

<!-- latest jquery-->
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/popper.min.js')}}" ></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.js')}}" ></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/js/sidebar-menu.js')}}" ></script>
<!-- prism js -->
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<!-- clipboard js -->
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}" ></script>
<!-- custom card js  -->
<script src="{{asset('assets/js/custom-card/custom-card.js')}}" ></script>
<!--Sparkline  Chart JS-->
<script src="{{asset('assets/js/sparkline/sparkline.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}" ></script>
<!--Height Equal Js-->
<script src="{{asset('assets/js/height-equal.js')}}"></script>
<!-- Counter js-->
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>

<script src="{{asset('assets/js/popover-custom.js')}}"></script>

<!--Summernote js-->
<script  src="{{asset('assets/js/summernote/summernote.js')}}"></script>
<script  src="{{asset('assets/js/summernote/summernote.custom.js')}}"></script>

<script src="{{asset('assets/dropify/js/dropify.min.js')}}"></script>
<!-- sortable -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $('.dropify').dropify();
</script>
</body>
</html>