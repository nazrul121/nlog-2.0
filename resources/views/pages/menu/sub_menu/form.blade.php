<div class="form-group">
    <label for="recipient-name" class="col-form-label">Sub-Menu name</label>
    <input type="text" class="form-control" id="recipient-name" placeholder="menu name" name="title" value="{{old('title')??$sub->title}}">
    <span class="text-danger">{{ $errors->first('title')}}</span>
</div>

<div class="form-group">
    <label>Menu banner (if any) (Recommend size: 1200x800px</label>
  	<input type="file" class="dropify" name="icon" data-default-file="{{url('/'.$sub->icon)}}">
  	<span class="text-danger">{{ $errors->first('icon')}}</span> 
</div>

<div class="form-group">
    <label for="recipient-name" class="col-form-label">Main-Menu</label>
   <select class="form-control" name="main_menu_id">
   	<option value="">Choose one</option>
   	@foreach($menus as $menu)
      @if($menu->id !='1' && $menu->page_post_type !='single')
     	<option @if($menu->id==$sub->main_menu_id)selected @endif value="{{$menu->id}}">{{$menu->title}}</option> @endif
   	@endforeach
   </select>
   <span class="text-danger">{{ $errors->first('main_menu_id')}}</span> 
</div>

<div class="form-group">
    <label>Short description (optional)</label>
    <textarea class="form-control" name="short_description" rows="4">{{old('short_description')??$sub->short_description}}</textarea>
    <span class="text-danger">{{ $errors->first('short_description')}}</span> 
</div>

<div class="col pb-3">
  <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
      <div class="radio-primary mb-2">
        <label>Page post type </label> 
        
        <button type="button" class="btn btn-info example-popover btn-xs pull-right" data-toggle="popover" data-content="Choose, how your <b>page content</b> will show on the front view" data-html='true' data-original-title="Why this field for?">?</button>

      </div>
      <div class="radio radio-primary">
          <input type="radio" name="page_post_type" id="page_post_type1" value="descriptive" @if($sub->page_post_type=='descriptive')checked @endif>
          <label for="page_post_type1" class="mb-0">Descriptive</label>
      </div>
      <div class="radio radio-primary">
          <input type="radio" name="page_post_type" id="page_post_type2" value="list" @if($sub->page_post_type=='list')checked @endif>
          <label for="page_post_type2" class="mb-0">List show</label>
      </div>
  </div>
  <span class="text-danger">{{ $errors->first('page_post_type')}}</span> 
</div>
<hr>
<div class="col-md-12 pb-3">
    <div class="form-group row text-right m-0">
        <div class="col-md-12">
            <div class="form-group mb-0 m-checkbox-inline mb-0 row">
                <label>Menu Visibility &nbsp; &nbsp; </label>
                <div class="radio radio-primary">
                    <input type="radio" name="status" id="status12" value="1" @if($sub->status=='1')checked @endif>
                    <label for="status12" class="mb-0">Publish Now</label>
                </div>
                <div class="radio radio-primary">
                    <input type="radio" name="status" id="status22" value="0" @if($sub->status=='0')checked @endif>
                    <label for="status22" class="mb-0">Publish Later</label>
                </div>
            </div>
            <span class="text-danger">{{ $errors->first('status')}}</span>
        </div>
    </div>
</div>

