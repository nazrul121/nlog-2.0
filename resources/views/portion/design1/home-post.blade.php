<div class="project-area bg-info">
    <div class="container">
        <div class="row" style="padding-top:3em;"">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h4>{{$home_post_title}}</h4>
                    <hr style="height:1px;background:#9bd4f1">
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom:2em">
            <div class="project-carousel">
                @foreach($home_posts as $post)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-awesome-project">
                        <div class="awesome-img">
                            <a href="{{$post->path()}}">
                                <img src="{{$post->photo}}" />
                            </a>
                            <div class="add-actions text-center">
                                <a class="venobox" data-gall="myGallery" href="{{$post->photo}}">
                                    <i class="port-icon ti-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="project-dec">
                            <h5>{{strip_tags($post->title)}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>      
        </div>  
    </div>
    <!-- End main content -->
</div>