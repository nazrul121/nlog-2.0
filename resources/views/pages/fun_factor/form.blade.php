<div class="col-md-12">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label pt-0">Page Selection</label>
            <select class="form-control mian_menu" name="main_menu_id">
                <option value="">Select</option>
                @foreach($menus as $menu)
                <option @if($fun_factor->main_menu_id==$menu->id)selected @endif value="{{$menu->id}}">{{$menu->title}}</option> @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('main_menu_id')}}</span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-form-label pt-0">Inner-page Selection</label>
            <select class="form-control sub_menu" name="sub_menu_id">
                <option value="">Select</option>
            </select>
            <small class="pull-right text-info">Sub-Menu field is optional</small>
            <span class="text-danger">{{ $errors->first('sub_menu_id')}}</span>
        </div>
    </div>
  
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label class="col-form-label pt-0">Background photo <small>[ optional ]-[ Recomand a <code>.png</code> format ] </small></label>
            <input type="file" class="dropify" name="background_photo" 
            @if($fun_factor->background_photo)data-default-file="{{url('/'.$fun_factor->background_photo)}}" @endif>
            <small class="form-text text-danger">{{ $errors->first('background_photo')}}</small>
            <small class="pull-right">[Recomanded photo size: 300x300px]</small>
        </div>
    </div>    
    <div class="col-md-6 mt-3">
        <div class="form-group">
            <label class="col-form-label pt-0">Model photo <small>[ optional ]-[ Recomand a <code>.png</code> format ]</small></label>
            <input type="file" class="dropify" name="model_photo" 
            @if($fun_factor->model_photo)data-default-file="{{url('/'.$fun_factor->model_photo)}}" @endif>
            <small class="form-text text-danger">{{ $errors->first('model_photo')}}</small>
            <small class="pull-right">[Recomanded photo size: 1000x800px]</small>
        </div>
    </div>

    
    <div class="col-md-12 mt-3">
        <div class="row">
            <div class="col-md-8 text-right">
                <div class="form-group m-t-10 m-checkbox-inline mb-0 ">
                    <label class="col-form-label pt-0">How many factor field items want to display on a page?</label> 
                </div>
                <small class="form-text text-danger"></small>
            </div>
            <div class="col-md-4 text-right">   
                <input type="number" class="form-control" name="display_number" placeholder="display number" value="{{$fun_factor->display_number??old('display_number','4')}}">
            <small class="form-text text-danger">{{ $errors->first('display_number')}}</small>
            </div>
        </div>  
    </div>

</div>
</div>