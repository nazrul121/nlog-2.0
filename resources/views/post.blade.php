<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$post->title}} | {{ request()->get('name') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->        
        <link rel="shortcut icon" type="image/x-icon" href="{{url('/'.request()->get('favicon'))}}">
        <!-- all css here -->
        @include('portion.design1.header-links')
    </head>
    <body>
        @include('portion.design1.header')

        @include('portion.design1.post-header-bottom')
        
        <div class="project-single area-padding">
            <div class="container">
                <div class="row">
                    @if($additional_data->count() <1)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="project-details">
                                <h3>{{$post->title}}</h3>
                               <p> {!!$post->description!!}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            @if($post->photo==null)
                            <img src="{{url('/images/coming-soon-bg.jpg')}}" style="width: 100%">
                            @else <img src="{{url('/'.$post->photo)}}" style="width: 100%">  @endif
                        </div>
                    @else
                    <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="project-history mt-1">
                            <div class="project-name">
                                <ul>
                                    @foreach($additional_data as $field)
                                    <li><span>{{$field->post_additional_field->field_name}}</span>: {{$field->field_value}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="project-details">
                            <img src="{{url('/'.$post->photo)}}" style="width: 100%">
                            <h3>{{$post->title}}</h3>
                           <p> {!!$post->description!!}</p>
                        </div>
                    </div>
                    @endif
                </div> <br><hr><br>
                <div class="row"> 
                @if($post->related_post=='1')
                @include('portion.design1.related-post') @endif
                </div>
            </div>
        </div>

        <!-- Footer Area -->
        @include('portion.design1.footer')

        @include('sweetalert::alert')

        @include('portion.design1.footer-links')
    </body>
</html>
