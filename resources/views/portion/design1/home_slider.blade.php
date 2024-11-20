<div class="intro-area-2" style="margin-bottom:2em">
     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        @foreach($sliders as $key=>$slider)
            <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" @if($key=='0') class="active" @endif ></li>
         @endforeach
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
         @foreach($sliders as $key=>$slider)
        <div class="item @if($key==0)active @endif">
          <img src="{{url('/'.$slider->photo)}}" alt="{{$slider->title}}">
          <div class="carousel-caption">
            {{$slider->title}} <br/>
            {{$slider->description}}
          </div>
        </div>
        @endforeach
      </div>
    
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <i class="ti-angle-left" style="position:relative;top:50%;border:1px solid white;padding:0.7em"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <i class="ti-angle-right" style="position:relative;top:50%;border:1px solid white;padding:0.7em"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div>
