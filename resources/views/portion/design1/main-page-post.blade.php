@if($posts->count()>0)
<div class="row">
    @if($menu->page_post_type=='list')
    <div class="blog-grid home-blog">
        @foreach($posts as $post)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="single-blog">
                <div class="blog-image">
                    <a class="image-scale" href="{{$post->path()}}">
                        @if($post->photo != null) <img class="round_effect2" src="/{{$post->photo}}" alt=""> @else <img src="images/coming-soon-bg.jpg" alt=""> @endif
                    </a>
                </div>
                <div class="blog-content">
                    <h4><a href="{{$post->path()}}">
                        @if( strlen($post->title)>30 ) {{mb_substr($post->title,0,30)}} ... @else {{$post->title}} @endif</a></h4> 
                   
                    @if( strlen(strip_tags($post->description))>150 )
                        <p class="text-justify"> {{mb_substr(strip_tags($post->description),0,150)}} </p> 
                        <a class="blog-btn pull-right"href="{{$post->path()}}"> Read more</a>
                    @else {!! strip_tags($post->description) !!} @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    
    @foreach($posts as $post)
    <div class="blog-left-content single-member">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row" style="background: white;">
                @if ($post->main_menu->page_post_type=='single')
                    <style>
                        body {
                            margin: 0;
                            padding: 0;
                            font-family: Arial, sans-serif;
                        }

                
                        .background-container::before {
                            content: "";
                            position: absolute;
                            top: 0;    left: 0;
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
                    <?php if ($post->photo==null) {
                        $col = 12;
                    }else $col = 9 ?>
                    @if ($post->photo!=null)
                    <div class="col-md-3">
                        <div class="blog-image">
                            <a href="{{$post->path()}}" class="image-scale">
                            <img class="round_effect2" src="/{{$post->photo}}"> </a>
                        </div>
                    </div> @endif
                    <div class="col-md-{{$col}}">
                        <div class="blog-content" style="background: none"><h5>{{$post->title}}</h5>
                            <!-- {{strlen(strip_tags($post->description))}} -->
                            @if( strlen(strip_tags($post->description))>400 )
                                <p class="text-justify"> {{mb_substr(strip_tags($post->description),0,400)}} </p> 
                                <a class="blog-btn pull-right"href="{{$post->path()}}"> Read more</a>
                            @else {!! strip_tags($post->description) !!} @endif
                        </div>
                    </div> 
                @endif
               
            </div>

        </div>
    </div>
    @endforeach
    @endif
</div>
@else

@endif
