<div class="team-area area-padding-2">
   <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
                <p style="max-width:80%;">{{$menu->short_description}}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        @if($menu->page_post_type=='list')
        <div class="team-member">
            @foreach($posts as $key=>$post)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="single-member">
                    <div class="team-img">
                        <a href="{{$post->path()}}">
                            @if($post->photo == null && !file_exist('/'.$post->photo))
                                <img src="/images/coming-soon-bg.jpg" alt="">
                            @else
                                <img src="/{{$post->photo}}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="team-content text-center">
                        <h4><a href="{{$post->path()}}">{{$post->title}}</a></h4> 
                        {{strip_tags($post->description)}} ....
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            @foreach($posts as $post)
            <div class="blog-left-content single-member">
                <!-- Start single blog -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="single-blog ">
                        <div class="col-md-4">
                            <div class="blog-image">
                                <a href="{{$post->path()}}" class="image-scale">
                                <img src="/{{$post->photo}}"> </a>
                            </div>
                        </div> 
                        <div class="col-md-8">
                            <div class="blog-content">
                                <h3>{{$post->title}}</h3>
                                @if( strlen(strip_tags($post->description))>400 )
                                    <p class="text-justify"> {{mb_substr(strip_tags($post->description),0,400)}} </p> 
                                    <a class="blog-btn pull-right"href="{{$post->path()}}"> Read more</a>
                                @else
                                    {{strip_tags($post->description)}} @endif
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            @endforeach                    
        @endif
        </div>
    </div>
</div>