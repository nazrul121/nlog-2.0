<section class="section bg-light">
    <div class="container"> 
        @if($sliders->count()>0)
          @inject('empSlider','App\Models\Employee_slider')
            @foreach($sliders as $slider)
                @if( $slider->slider_type_id=='3')
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="section-title text-center">
                            <h3>{{$slider->title}}</h3> <div class="spacer-30"></div> <hr>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($empSlider->employee_slider('main_menu',$menu->id) as $emp)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-box mt-30">
                            <div class="team-box-img">
                                <img src="/{{$emp->employee->photo}}" alt="" class="img-fluid">
                            </div>
                            <div class="team-overlay">
                                <div class="team-content">
                                    <div class="member-info text-center">
                                        <h3>{{$emp->employee->name}}</h3>
                                        <small>{{$emp->employee->position}}</small>
                                        <div class="text-center">
                                            <ul class="list-unstyled team-icon">
                                                <li class="list-inline-item"><a href="#"><i class="fab fa-apple"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                  
                </div>
                @endif
            @endforeach
        @endif
    </div>
</section>
