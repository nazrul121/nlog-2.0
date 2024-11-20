<div class="formArea">
<input type="hidden" value="{{$form_id}}" name="form_id">
<div class="form-group row">
	<label class="col-md-12 control-label"> {{$text}} Title </label>
	<div class="col-md-12">
		<input class="form-control field" data-type="input" type="text" name="field_name"  value="{{$form_detail->field_name}}">
	</div>
</div><div class="form-group row">
	<label class="col-md-12 control-label"> Label Text </label>
	<div class="col-md-12">
		<input class="form-control field" data-type="input" type="text" name="label" value="{{$form_detail->label}}">
	</div>
</div>
@if($type=='text' || $type=='email' || $type=='number' || $type=='password' || $type=='textarea')
<div class="form-group row">
	<label class="col-md-12 control-label"> Placeholder </label>
	<div class="col-md-12">
		<input class="form-control field" data-type="input" type="text" name="placeholder" value="{{$form_detail->placeholder}}">
	</div>
</div>
@else <input type="hidden" name="placeholder" value="{{$form_detail->placeholder}}">
@endif

<input type="hidden" name="field_type" value="{{$type}}">

@if($type=='radio' || $type=='checkbox' || $type=='select')
<div class="form-group row">
	<label class="col-md-12 control-label"> Options [seperated by coma (,)]</label>
	<div class="col-md-12">
	<textarea class="form-control field" data-type="textarea-split" name="options">@if($form_detail) {{$form_detail->options}} @else {{$text}} one, {{$text}} two @endif </textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-12 control-label"> Values [seperated by coma (,)]</label>
	<div class="col-md-12">
	<textarea class="form-control field" data-type="textarea-split" name="option_values">@if($form_detail) {{$form_detail->option_values}} @else {{$text}} one, {{$text}} two @endif</textarea>
	</div>
</div>
@else 
<input type="hidden" name="options" value="{{$form_detail->options}}">
<input type="hidden" name="option_values" value="{{$form_detail->option_values}}">
@endif

<div class="col-sm-12"><h5>Is required</h5> </div>
<div class="col">
    <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
        <div class="radio radio-primary">
            <input type="radio" name="is_required" id="radioinline1" value="1" required="" @if($form_detail->is_required=='1')checked @endif>
            <label for="radioinline1" class="mb-0">Field is Required</label>
        </div>
        <div class="radio radio-primary">
            <input type="radio" name="is_required" id="radioinline2" value="0" required="" @if($form_detail->is_required=='0')checked @endif>
            <label for="radioinline2" class="mb-0">Field is Option</label>
        </div>
    </div>
</div><br><hr>



<div class="col-sm-12 row"><h5>Field width</h5> </div>
<div class="col">
    <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
        <div class="radio radio-primary">
            <input type="radio" name="width" id="width1" value="12" required="" @if($form_detail->width=='12')checked @endif>
            <label for="width1" class="mb-0">Full page</label>
        </div>
        <div class="radio radio-primary">
            <input type="radio" name="width" id="width2" value="6" required="" @if($form_detail->width=='6')checked @endif>
            <label for="width2" class="mb-0">1/2</label>
        </div>

        <div class="radio radio-primary">
            <input type="radio" name="width" id="width3" value="4" required="" @if($form_detail->width=='4')checked @endif>
            <label for="width3" class="mb-0">1/3</label>
        </div>

         <div class="radio radio-primary">
            <input type="radio" name="width" id="width4" value="3" required="" @if($form_detail->width=='3')checked @endif>
            <label for="width4" class="mb-0">1/4</label>
        </div>
    </div>
</div>
</div>

<div class="form-details-result"></div>
