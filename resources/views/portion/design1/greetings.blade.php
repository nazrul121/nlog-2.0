@if($greeting->count()>0)
<div class="about-area fix">
    <div class="container">
        <div class="row" style="background:{{ $greeting->bg_color }}">
            <div class="col-md-7 col-sm-8 col-xs-12" style="height: 365px;">
                <div class="support-all about-content" style="padding: 40px;background:{{ $greeting->bg_color }}">
                    <div class="section-headline right-headline white-headline">
                        <h3>{{$greeting->title}}</h3>
                        @if( strlen(strip_tags($greeting->description))>400 )
                        <pre style="white-space:pre-line;color:black;font-size:15px;font-family:sans-serif;overflow-y:none"> 
                            {{mb_substr(strip_tags($greeting->description),0,400)}} 
                        </pre> 
                        <a class="blog-btn pull-right"href="#" data-toggle="modal" data-target="#moreGreeting"> Read more</a>
                        @else <pre class="pre" style="overflow-y:auto">{{ strip_tags($greeting->description) }}</pre> @endif
                    </div>
                    
                </div>
            </div>
            
            <div class="col-md-5 col-sm-4 col-xs-12" 
            style="background: url({{url('/'.$greeting->photo)}});background-size:cover;height: 365px;">
                <div class="about-image">
                    <div class="video-content">
                        <a href="{{$greeting->video_link}}" class="video-play vid-zone"> <i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="moreGreeting" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{$greeting->title}}</h4>
        </div>
        <div class="modal-body">
          <pre style="white-space: pre-line;color: black;font-size: 15px;font-family: sans-serif;">{{$greeting->description}}</pre>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>@endif

<style type="text/css">
    .pre{white-space:break-spaces;font-size:15px;font-family:unset;overflow-y: scroll;max-height: 208px;}
</style>