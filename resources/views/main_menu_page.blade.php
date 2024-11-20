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
        
        @inject('formM','App\Models\Form')

        
        <!-- main menu page -->
        @include('portion.'.request()->get('design').'.main-menu-page')

        
        <!-- Footer Area -->
        @include('portion.'.request()->get('design').'.footer')

        @include('sweetalert::alert')

        @include('portion.'.request()->get('design').'.footer-links')
        <style type="text/css">
            body.swal2-toast-shown .swal2-container.swal2-top-end, body.swal2-toast-shown .swal2-container.swal2-top-right {
                    top: 0; right: 0;  bottom: none;left: none; 
                }
            .swal2-popup.swal2-toast .swal2-title{font-size:15px}

            body.swal2-toast-shown .swal2-container{
                background-color: silver;
            }
        </style>
        
        
    </body>
</html>
