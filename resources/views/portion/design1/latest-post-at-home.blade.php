<div class="blog-area fix bg-color mt-3">
    <div class="container">
        <div class="row" style="padding-top:3em">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h4>{{$post_multiple_title}}</h4> <hr>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:2em">
            <div class="blog-grid home-blog">
                @foreach($multiple_posts as $key=>$post)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a class="image-scale" href="{{$post->path()}}">
                                <img class="round_effect2" src="{{$post->photo}}" alt="">
                            </a>
                        </div>
                        <a href="{{$post->path()}}"> <h4 class="postTitle">{{$post->title}}</h4> </a>

                        <a class="pull-right" href="{{$post->path()}}">Read More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <style type="text/css">
        .postTitle{padding: 5px 15px;font-size:18px;color:grey;}
        .postTitle:hover{color:black;}
        </style>
    </div>
</div>