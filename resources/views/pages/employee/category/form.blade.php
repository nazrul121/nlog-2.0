<div class="form-group">
    <label for="exampleInputEmail1" class="col-form-label pt-0">Category Name</label>
    <input type="text" class="form-control" name="name" placeholder="Title" value="{{old('name')??$employee_type->name}}">
    <small class="form-text text-danger">{{ $errors->first('name')}}</small>
</div>

<div class="form-group">
    <label for="exampleInputEmail1" class="col-form-label pt-0">Category short-description</label>
    <textarea class="form-control" name="description" placeholder="Short details" rows="5">{{old('description')??$employee_type->description}}</textarea>
    <small class="form-text text-danger">{{ $errors->first('description')}}</small>
</div>
