
@if($menu->page_post_type=='list')
    <div class="port portfolio-masonry">
        <div class="portfolioContainer">
            @foreach($posts as $post)
            <div class="col-lg-3 col-md-6 natural personal p-0">
                <div class="portfolio-box mt-0 mb-0">
                    <a class="mfp-image" href="/{{$post->photo}}" title="Business Post">
                        <img src="/{{$post->photo}}" class="img-fluid" alt="member-image">                
                        <div class="portfolio-overlay">
                            <div class="portfolio-box-detail">
                                <h5> @if( strlen($post->title)>30 ) 
                                    {{mb_substr($post->title,0,30)}} ... @else {{$post->title}} @endif
                                </h5>
                               <p>{{mb_substr(strip_tags($post->description),0,100)}} ...</p>
                            </div>
                        </div>
                    </a>
                </div>
                <h4 class="text-center"><a href="{{$post->path()}}"> @if( strlen($post->title)>30 ) 
                    {{mb_substr($post->title,0,30)}} ... @else {{$post->title}} @endif</a>
                </h4>
            </div>   
            @endforeach
        </div>
    </div> 
@else
<section class="section bg-light">
    <div class="container">
        @foreach($posts as $key=>$post)
            <div class="row align-items-center features-four">
                @if ($post->main_menu->page_post_type=='single')
                    <style>
                        body {
                            margin: 0;
                            padding: 0;
                            font-family: Arial, sans-serif;
                        }
                
                        .background-container {
                            position: relative;
                            height: 100vh; /* Full viewport height */
                            overflow: hidden; /* Prevent overflow of pseudo-element */
                        }
                
                        .background-container::before {
                            content: "";
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-image: url({{url($post->photo)}}); /* Replace with your image URL */
                            background-size: cover;
                            background-position: center;
                            opacity: 0.1;
                            z-index: -1; /* Place the pseudo-element behind other content */
                        }
                
                        .content {
                            position: relative;
                            padding: 20px;
                            color: #333; /* Text color */
                        }
                
                        .content h1 {
                            margin-top: 0;
                        }
                    </style>
                    <div class="col-md-12">
                        <div class="background-container">
                            <div class="content">
                                <h1>{{ $post->title }}</h1>
                                {!!  $post->description !!}
                            </div>
                        </div>
                    </div> 
                @else
                    @if($key%2==0)
                        <div class="col-sm-6">
                            <div class="features-box">
                                <h4 class="font-20"> @if( strlen($post->title)>30 ) 
                                {{mb_substr($post->title,0,30)}} ... @else {{$post->title}} @endif</h4>
                                <div class="spacer-15"></div>
                                @if( strlen(strip_tags($post->description))>250 )
                                    <p class="text-muted mb-0"> {{mb_substr(strip_tags($post->description),0,250)}} ...</p> 
                                    <a class="blog-btn pull-right"href="{{$post->path()}}"> Read more</a>
                                @else {!! strip_tags($post->description) !!} @endif
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <img src="/{{$post->photo}}" width="350" class="img-fluid mt-sm-30" alt="img">
                        </div>
                    @else
                        <div class="col-sm-6 text-center">
                            <img src="/{{$post->photo}}" width="350" class="img-fluid mt-sm-30" alt="img">
                        </div>
                        <div class="col-sm-6">
                            <div class="features-box">
                                <h4 class="font-20"> @if( strlen($post->title)>30 ) 
                                {{mb_substr($post->title,0,30)}} ... @else {{$post->title}} @endif</h4>
                                <div class="spacer-15"></div>
                                @if( strlen(strip_tags($post->description))>250 )
                                    <p class="text-muted mb-0"> {{mb_substr(strip_tags($post->description),0,250)}} ...</p> 
                                    <a class="blog-btn pull-right"href="{{$post->path()}}"> Read more</a>
                                @else {!! strip_tags($post->description) !!} @endif
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        @endforeach
    </div>
</section>
@endif

