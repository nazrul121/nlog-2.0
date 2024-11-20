
<div class="form-group">
    <label for="recipient-name" class="col-form-label">Main-Menu name</label>
    <input type="text" class="form-control" id="recipient-name" placeholder="menu name" name="title" value="{{old('title')??$menu->title}}">
    <span class="text-danger">{{ $errors->first('title')}}</span> 
</div>
@if($menu->id !='1')
<div class="form-group">
    <label>Menu banner (if any) (Recommend size: 1200x800px</label>
    <input type="file" class="dropify" name="icon" data-default-file="{{url('').'/'.$menu->icon}}">
    <span class="text-danger">{{ $errors->first('icon')}}</span> 
</div>

<div class="form-group">
    <label>Short description (optional)</label>
    <textarea class="form-control" name="short_description" rows="4">{{old('short_description')??$menu->short_description}}</textarea>
    <span class="text-danger">{{ $errors->first('short_description')}}</span> 
</div>
@endif
<div class="col pb-3">
  <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
      <div class="radio-primary mb-2">
        <label>Page post type </label> 
        
        <button type="button" class="btn btn-info example-popover btn-xs pull-right" data-toggle="popover" data-content="Choose, how your <b>page content</b> will show on the front view" data-html='true' data-original-title="Why this field for?">?</button>
      </div>
      <div class="radio radio-primary">
          <input type="radio" name="page_post_type" id="radioinline1" value="descriptive" @if($menu->page_post_type=='descriptive')checked @endif>
          <label for="radioinline1" class="mb-0">Descriptive</label>
      </div>
      <div class="radio radio-primary">
          <input type="radio" name="page_post_type" id="radioinline2" value="list" @if($menu->page_post_type=='list')checked @endif>
          <label for="radioinline2" class="mb-0">List show</label>
      </div>
      <div class="radio radio-primary">
        <input type="radio" name="page_post_type" id="radioinline3" value="single" @if($menu->page_post_type=='single')checked @endif>
        <label for="radioinline3" class="mb-0">Single Page</label>
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
                    <input type="radio" name="status" id="status1" value="1" @if($menu->status=='1')checked @endif>
                    <label for="status1" class="mb-0">Publish Now</label>
                </div>
                <div class="radio radio-primary">
                    <input type="radio" name="status" id="status2" value="0" @if($menu->status=='0')checked @endif>
                    <label for="status2" class="mb-0">Publish Later</label>
                </div>
            </div>
            <span class="text-danger">{{ $errors->first('status')}}</span>
        </div>
    </div>
</div>