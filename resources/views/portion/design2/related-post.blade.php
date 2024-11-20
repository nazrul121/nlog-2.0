<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="project-inner project-carousel-2">
        @foreach($related_posts as $row)
        <div class="project-image">
            <a href="post/{{$row->id}}-{{$row->title}}"><img src="/{{$row->photo}}"></a>
        </div>
        @endforeach
    </div>
</div>