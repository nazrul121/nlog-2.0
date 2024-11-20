@inject('subM','App\Models\Sub_menu')
<div class="col-sm-12">
    <div class="card">
        <div class="media p-20">
            <div class="media-body">
               <div class="form-group">
                    <label class="col-form-label pt-0">Form Title ( <span class="text-success">this title will be desplied as form title in public view</span>)</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{old('title')??$form->title}}">
                    <span class="text-danger">{{ $errors->first('title')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="card">
        <div class="media p-20">
            <div class="media-body">
               <div class="form-group">
                    <label class="col-form-label pt-0">Main-Menu Selection</label>
                    <select class="form-control mian_menu" name="main_menu_id">
                        <option value="">Select</option>
                        @foreach($menus as $menu)
                        <option @if($form->main_menu_id==$menu->id)selected @endif value="{{$menu->id}}">{{$menu->title}}</option> @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('main_menu_id')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="card">
        <div class="media p-20">
            <div class="media-body">
               <div class="form-group">
                    <label class="col-form-label pt-0">Sub-Menu Selection</label>
                    <select class="form-control sub_menu" name="sub_menu_id">
                        <option value="">Select Sub-Menu</option>
                        @if($form->sub_menu_id !='' || $form->sub_menu_id !=null)
                            <option selected="" value="{{$post->sub_menu_id}}">{{$subM->sub_menu_name($form->sub_menu_id)->title}}</option>
                        @endif
                    </select>
                    <small class="pull-right text-info">Sub-Menu field is optional</small>
                    <span class="text-danger">{{ $errors->first('sub_menu_id')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="media p-20">
            <div class="media-body">
               <div class="form-group">
                    <label class="col-form-label pt-0">Form Description</label>
                    <textarea class="form-control" rows="6" name="description">{{old('description')??$form->description}}</textarea>
                    <span class="text-danger">{{ $errors->first('description')}}</span> 
                </div>
                <div class="row text-right">
                    <label class="col-md-4">Table Name </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="table_title" placeholder="Table Title" value="{{old('table_title')??$form->table_title}}">
                        <small>A short name to identify your table among tables</small><br>
                        <span class="text-danger">{{ $errors->first('table_title')}}</span> 
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group row text-right m-0">
        <div class="col-md-12">
            <div class="form-group mb-0 m-checkbox-inline mb-0 custom-radio-ml">
                <label>Form Visibility &nbsp; &nbsp; </label>
                <div class="radio radio-primary">
                    <input type="radio" name="status" id="status1" value="1" @if($form->status=='1')checked @endif>
                    <label for="status1" class="mb-0">Publish Now</label>
                </div>
                <div class="radio radio-primary">
                    <input type="radio" name="status" id="status2" value="0" @if($form->status=='0')checked @endif>
                    <label for="status2" class="mb-0">Publish Later</label>
                </div>
            </div>
            <span class="text-danger">{{ $errors->first('status')}}</span>
        </div>
    </div>
</div>
