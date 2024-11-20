<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="section-title text-center">
                    <h3>{{$post_multiple_title}}</h3><div class="spacer-30"></div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($multiple_posts as $key=>$post)
            <div class="col-md-4">
                <article class="post mt-30">
                    <div class="post-preview">
                        <a href="{{$post->path()}}"><img src="/{{$post->photo}}" alt="" class="img-fluid mx-auto d-block"></a>
                    </div>

                    <div class="post-header">
                        <h4 class="post-title"><a href="{{$post->path()}}">{{$post->title}}</a></h4>
                        <ul class="post-meta">
                            <li><i class="mdi mdi-calendar"></i> <small>{{date('F m, Y',strtotime($post->created_at))}}</small></li>
                            <li class="pull-right"><i class="fa fa-link"></i>
                                <a class="text-right" href="{{$post->path()}}"> <small>More</small></a></li>
                        </ul>
                        <span class="bar"></span>

                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>