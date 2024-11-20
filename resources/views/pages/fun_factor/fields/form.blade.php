
<div class="form-group">
    <label class="col-form-label pt-0">field name</label>
    <input type="text" class="form-control" name="field_name" value="{{old('field_name')??$fun_factor_field->field_name}}">
    <span class="text-danger">{{ $errors->first('field_name')}}</span>
</div>

<input type="hidden" name="fun_factor_id" value="{{old('fun_factor_id')??$fun_factor_field->fun_factor_id}}">

<div class="form-group">
    <label class="col-form-label pt-0">field Value</label>
    <input type="text" class="form-control" name="field_value" value="{{old('field_name')??$fun_factor_field->field_value}}">
    <span class="text-danger">{{ $errors->first('field_value')}}</span>
</div>

<div class="form-group row m-0">

    <div class="form-group mb-0 m-checkbox-inline mb-0 custom-radio-ml">
        <label>Field Visibility </label> <br>
        <div class="radio radio-primary pull-right">
            <input type="radio" name="status" id="status2" value="0" @if($fun_factor_field->status=='0')checked @endif>
            <label for="status2" class="mb-0">Publish Later</label>
        </div>
        <div class="radio radio-primary pull-right">
            <input type="radio" name="status" id="status1" value="1" @if($fun_factor_field->status=='1')checked @endif>
            <label for="status1" class="mb-0">Publish Now</label>
        </div>
    </div>
    <span class="text-danger">{{ $errors->first('status')}}</span>
       
</div>
