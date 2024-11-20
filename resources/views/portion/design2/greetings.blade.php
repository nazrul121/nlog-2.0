@if($greeting->count()>0)
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <div class="about-pic">
                    <a href="{{$greeting->video_link}}" class="video-play vid-zone">
                        <img src="/{{$greeting->photo}}" class="img-fluid"> </a>
                </div>
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="about-section mt-sm-30 ml-lg-3">
                    <h4 class="text-uppercase">{{$greeting->title}}</h4>
                    <div class="spacer-15"></div>

                    @if( strlen(strip_tags($greeting->description))>300 )
                        <p class="text-muted"> {{mb_substr(strip_tags($greeting->description),0,300)}} </p>
                        <a href="#" data-toggle="modal" data-target="#moreGreeting" class="btn btn-custom pull-right">read more</a>
                    @else <pre style="white-space:break-spaces;font-size:15px;font-family:unset;">{{ strip_tags($greeting->description) }}</pre> @endif
                 
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="moreGreeting" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title">{{$greeting->title}}</h4></div>
        <div class="modal-body">
          <pre style="white-space: pre-line;color: black;font-size: 15px;font-family: sans-serif;">{{$greeting->description}}</pre>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>@endif