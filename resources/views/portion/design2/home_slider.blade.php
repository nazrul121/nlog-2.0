<section class="home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $key=>$slider)
                        <div class="carousel-item @if($key==0)active @endif" style="background-image:url('/{{$slider->photo}}');">
                            <div class="bg-overlay"></div>
                            <div class="home-center">
                                <div class="home-desc-center">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="title-heading text-center">
                                                    <h1 class="">{{$slider->title}}</h1>
                                                    <p class="text-white-50 mx-auto">{{$slider->description}}</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
        


<!-- <div class="intro-area-2" style="margin-bottom:2em">
    <div class="intro-carousel">
        @if($sliders->count() ==1)
           <div class="intro-content-2">
                <div class="slider-images">
                    <img src="{{url('/'.$sliders[0]->photo)}}" alt="">
                </div>
            </div>
        @endif
        @foreach($sliders as $slider)
        <div class="intro-content-2">
            <div class="slider-images">
                <img src="/{{$slider->photo}}" alt="">
            </div>
            <div class="slider-content">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                     
                                    <div class="layer-1 wow fadeInUp" data-wow-delay="0.3s">
                                        <h3 class="slider_title" class="title2">{{$slider->title}}</h3>
                                    </div>
                                    <div class="layer-2 wow fadeInUp hidden-sm" data-wow-delay="0.5s">
                                       <p style="background: rgba(25, 25, 25, 0.3);padding:10px;border-radius:20px;color:white;max-width: 100%;">{{$slider->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> -->