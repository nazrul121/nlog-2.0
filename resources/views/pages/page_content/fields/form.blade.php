
<div class="form-group">
    <label for="recipient-name" class="col-form-label">Field name</label>
    <input type="text" class="form-control" id="recipient-name" placeholder="menu name" name="field_name" value="{{old('field_name')??$field->field_name}}">
    <span class="text-danger">{{ $errors->first('field_name')}}</span> 
</div>

<div class="form-group">
    <label for="recipient-name" class="col-form-label">Field Value ( optional )</label>
    <input type="text" class="form-control" id="recipient-name" placeholder="menu name" name="field_value" value="{{old('field_name')??$field->field_value}}">
    <span class="text-danger">{{ $errors->first('field_value')}}</span> 
</div>