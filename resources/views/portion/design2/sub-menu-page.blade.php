<section class="section">
    <div class="container">
        <div class="row"> 
            @if($menu->page_post_type=='list')
                @foreach($posts as $key=>$post)
                <div class="col-md-4">
                    <article class="post blog-post">
                        <div class="post-preview">
                            <a href="#">  @if($post->photo == null && !file_exist('/'.$post->photo))
                                <img class="img-fluid mx-auto d-block" src="/images/coming-soon-bg.jpg">
                                @else <img class="img-fluid mx-auto d-block" src="/{{$post->photo}}">
                                @endif 
                            </a>
                        </div>

                        <div class="post-header">
                            <h4 class="post-title"><a href="#"> {{$post->title}}</a></h4>
                            <div class="post-content">
                                @if( strlen(strip_tags($post->description))>100 )
                                    <p class="text-muted"> {{mb_substr(strip_tags($post->description),0,100)}} 
                                    </p> 
                                    <div class="post-more text-right"><a href="#">Read More <i class="mdi mdi-arrow-right"></i></a> </div>
                                @else {{strip_tags($post->description)}} @endif
                            </div>

                        </div>
                    </article>
                </div>
                @endforeach
            @else
                @foreach($posts as $key=>$post)
                    <div class="row align-items-center features-four">
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
                    </div>
                @endforeach          
            @endif
        </div>

        <!-- Pagination-->
        <div class="row mt-4">
            <div class="col-sm-12">
                <ul class="pagination justify-content-center">
                    <li class="next">
                       
                    </li>
                   
                </ul>
            </div>
        </div>
        <!-- Pagination end-->
    </div>
</section>
        
