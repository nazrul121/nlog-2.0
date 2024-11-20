<section class="section bg-light"> 
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="section-title text-center">
                    <h3>{{$home_post_title}}</h3>
                    <div class="spacer-30"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="port portfolio-masonry mt-3">
            <div class="portfolioContainer row">
                @foreach($home_posts as $post)
                <div class="col-lg-3 col-md-6 part">
                    <div class="portfolio-box">
                        <a class="mfp-image" href="/{{$post->photo}}" title="Business Post">
                            <img src="/{{$post->photo}}" class="img-fluid" alt="work-image">
                        </a>
                        <div class="gallary-title text-center">
                            <h6><a href="{{$post->path()}}">{{$post->title}}</a></h6>
                            @if( strlen(strip_tags($post->description))>50 )
                                <p class="text-capitalize"> {{substr(strip_tags($post->description),0,50)}} ... <a style="color:blue" href="{{$post->path()}}"> Read more</a> </p> 
                                
                            @else {!! $post->description !!} @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
