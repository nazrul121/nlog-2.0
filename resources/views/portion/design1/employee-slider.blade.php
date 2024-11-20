@if($sliders->count()>0)
   <div class="team-area area-padding-2" >
        <div class="container">
            @inject('empSlider','App\Employee_slider')
            @foreach($sliders as $slider)
                @if( $slider->slider_type_id=='3' )
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="section-headline text-center">
                                <h3>{{$slider->title}}</h3><hr>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="team-member">
                            @foreach($empSlider->employee_slider('main_menu',$menu->id) as $emp)
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="single-member">
                                    <div class="team-img">
                                        <a href="#"> <img src="{{$emp->employee->photo}}" alt="">
                                        </a>
                                    </div>
                                    <div class="team-content text-center">
                                        <h4><a href="#">{{$emp->employee->name}}</a></h4>
                                        <p>{{$emp->employee->position}}</p>
                                        <ul class="social-icon">
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif