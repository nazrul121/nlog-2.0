@inject('subM','App\Models\Sub_menu')
@inject('addiM','App\Models\Post_additional_info')
<div class="col-sm-12">
    <div class="card">
        <div class="media p-20">
            <div class="media-body">
               <div class="form-group">
                    <label class="col-form-label pt-0">Post Title</label>
                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Title" value="{{old('title')??$post->title}}">
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
                        <option @if($menu->id==$post->main_menu_id)selected @endif value="{{$menu->id}}">{{$menu->title}}</option> @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('main_menu_id')}}</span>
                </div>
            </div>
        </div>
        <div class="media p-20">
            <div class="media-body">
               <div class="form-group">
                    <label class="col-form-label pt-0">Sub-Menu Selection</label>
                    <select class="form-control sub_menu" name="sub_menu_id">
                        <option value="">Select Sub-Menu</option>
                        @if($post->sub_menu_id !='' || $post->sub_menu_id !=null)
                            <option selected="" value="{{$post->sub_menu_id}}">{{$subM->sub_menu_name($post->sub_menu_id)->title}}</option>
                        @endif
                    </select>
                    <small class="pull-right text-info">Sub-Menu field is optional</small>
                    <span class="text-danger">{{ $errors->first('sub_menu_id')}}</span>
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
                    <label class="col-form-label pt-0">Feature Photo [ Recommanded size: 900x650px ]</label>
                    <input type="file" name="photo" class="dropify" data-default-file="{{url('/'.$post->photo)}}" />
                    <span class="text-danger">{{ $errors->first('photo')}}</span>
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
                    <label class="col-form-label pt-0">Page Contents Details</label>
                    <textarea class="textarea" name="description">{{old('description')??$post->description}}</textarea>
                    <span class="text-danger">{{ $errors->first('description')}}</span> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="media p-20">
            <label>Post Visibility &nbsp; &nbsp; </label>
            <div class="radio radio-primary">
                <input type="radio" name="status" id="radioinline1" value="1" @if($post->status=='1')checked @else checked @endif >
                <label for="radioinline1" class="mb-0">Publish Now</label>
            </div> &nbsp; &nbsp;
            <div class="radio radio-primary">
                <input type="radio" name="status" id="radioinline2" value="0" @if($post->status=='0')checked @endif >
                <label for="radioinline2" class="mb-0">Publish Later</label>
            </div>
            <span class="text-danger">{{ $errors->first('status')}}</span>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="media p-20">
            <button type="button" class="btn btn-pill btn-outline-secondary-2x example-popover " data-toggle="popover" data-content="When the post showes alone, show some related post at the bottom the this post" data-original-title="Why this field for?" style="padding:0px 8px">?</button>  &nbsp; &nbsp;  &nbsp; &nbsp; 
            <div class="form-group mb-0 m-checkbox-inline mb-0 custom-radio-ml">
                <label>Show Related Post &nbsp; &nbsp; </label>
                    

                <div class="radio radio-primary"> &nbsp; &nbsp; 
                    <input type="radio" name="related_post" id="relatedPost1" value="1" @if($post->related_post=='1')checked @else checked @endif>
                    <label for="relatedPost1" class="mb-0">Show Related Post</label>
                </div>
                <div class="radio radio-primary">
                    <input type="radio" name="related_post" id="relatedPost2" value="0" @if($post->related_post=='0')checked @endif >
                    <label for="relatedPost2" class="mb-0">Don`t show Related Post</label>
                </div>
            </div>
            <span class="text-danger">{{ $errors->first('related_post')}}</span>
        </div>
    </div>
</div>

<div class="col-sm-12">

    <div id="accordionoc" class="default-according style-1">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="mb-0">
                    <button type="button" class="btn btn-link txt-white collapsed" data-toggle="collapse" data-target="#collapseicon" aria-expanded="false" aria-controls="collapse11">
                        <i class="fa fa-tags"></i> Post Additional information [ optional ]
                    </button>
                </h5>
            </div>
            <div id="collapseicon" class="collapse" aria-labelledby="collapseicon" data-parent="#accordionoc" style="">
                <div class="card-body">
                    <div class="row">
                        @foreach($fields as $key=>$field)
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="checkbox p-0">
                                        <input id="checkbox{{$key}}" type="checkbox" name="field_names[]" value="{{$field->id}}" class="checkbox" @if($addiM->is_field_exist($post->id,$field->id))checked @endif>
                                        <label for="checkbox{{$key}}" class="mb-0">{{$field->field_name}}</label>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    @if(Request::segment(3)=='create-post')
                                        <input type="text" name="field_value[]" class="form-control field_value{{$field->id}}" value="{{$field->field_value}}" disabled="">
                                    @else
                                        @if($addiM->is_field_exist($post->id,$field->id))
                                        <input type="text" name="field_value[]" class="form-control field_value{{$field->id}}" value="{{$addiM->is_field_exist($post->id,$field->id)->field_value}}">
                                        @else
                                        <input type="text" name="field_value[]" class="form-control field_value{{$field->id}}" value="{{$field->field_value}}" disabled="">

                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>@endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

          
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript">
    $(function(){
        $('[type=checkbox]').on('change',function(){
            if ($(this).is(':checked')) {
                $('.field_value' + $(this).val()).prop('disabled',false);
            }else{
                $('.field_value' + $(this).val()).prop('disabled',true);
            }
        });
    })
</script>

