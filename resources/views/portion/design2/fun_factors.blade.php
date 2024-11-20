@inject('funFieldM','App\Models\Fun_factor_field')
@if($fun_factor)
<section class="section bg-counter" style="background-image: url(/{{$fun_factor->model_photo}});">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row" id="counter">
            @foreach($funFieldM->factor_fields($fun_factor->id) as $field)
            <div class="col-lg-3 col-md-3">
                <div class="text-center counter-funfact p-4 mt-3 text-white">
                    <i class="counter-icon"></i>
                    <h2 class="counter-value" data-count="654">{{$field->field_value}}</h2>
                    <p class="counter-name mb-0">{{$field->field_name}}s</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
        