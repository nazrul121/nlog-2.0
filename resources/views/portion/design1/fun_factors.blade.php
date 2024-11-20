@inject('funFieldM','App\Models\Fun_factor_field')
@if($fun_factor)
<div class="counter-area fix area-padding">
    <div class="container">

        <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-12">
               <div class="counter-image">
                    <div class="rotmate-image rotateme">
                        <img src="{{url('/'.$fun_factor->background_photo)}}" alt="">
                    </div>
                    <div class="top-img">
                        <img src="{{url('/'.$fun_factor->model_photo)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="fun-text-all">
                    @foreach($funFieldM->factor_fields($fun_factor->id) as $field)
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="fun_text wow fadeInUp" data-wow-delay="0.2s">
                            <span class="counter">{{$field->field_value}}</span>
                            <h4>{{$field->field_name}}</h4>
                        </div>
                    </div>@endforeach
                </div>
            </div>
        </div> 
        @if($funFieldM->factor_fields($fun_factor->id)->count()<5) <br> <br><br> @endif
    </div>
</div>
@endif
        