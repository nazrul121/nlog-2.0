@inject('subM','App\Models\Sub_menu')
<div class="col-sm-12">
    <div class="card">
        <div class="media p-20">
            <div class="media-body">
               <div class="form-group">
                    <label class="col-form-label pt-0">Post Title</label>
                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Title" value="{{old('title')??$slider->title}}">
                    <span class="text-danger">{{ $errors->first('title')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card">
        <div class="media p-20">
            <label>Slider Type &nbsp; &nbsp; </label>
            <div class="radio radio-primary">
                <input type="radio" name="slider_type_id" id="type1" value="1" @if($slider->slider_type_id=='1')checked @endif >
                <label for="type1" class="mb-0">Main centent slider</label>
            </div> &nbsp; &nbsp;
            <div class="radio radio-primary">
                <input type="radio" name="slider_type_id" id="type2" value="2" @if($slider->slider_type_id=='2')checked @endif >
                <label for="type2" class="mb-0">Logo Slider</label>
            </div> &nbsp; &nbsp; 
            <div class="radio radio-primary">
                <input type="radio" name="slider_type_id" id="type3" value="3" @if($slider->slider_type_id=='3')checked @endif >
                <label for="type3" class="mb-0">Employee Slider</label>
            </div>
        </div>
        <span class="text-danger">{{ $errors->first('slider_type_id')}}</span>
    </div>
</div>


<div class="col-sm-12 clientOrPartner" style="display: @if($slider->slider_type_id=='2')block @else none @endif ">
    <div class="card">
        <div class="media p-20">
            <label>slider photo soruce &nbsp; &nbsp; &nbsp; &nbsp; </label>
            <div class="radio radio-primary">
                <input type="radio" name="clientOrPartner" id="clientPartner1" value="client" @if($slider->clientOrPartner=='client')checked @endif >
                <label for="clientPartner1" class="mb-0">From Client List</label>
            </div> &nbsp; &nbsp;
            <div class="radio radio-primary">
                <input type="radio" name="clientOrPartner" id="clientPartner2" value="partner" @if($slider->clientOrPartner=='partner')checked @endif >
                <label for="clientPartner2" class="mb-0">From Partner list</label>
            </div>
        </div>
        <span class="text-danger">{{ $errors->first('clientOrPartner')}}</span>
    </div>
</div>


<div class="col-sm-6 cat_area">
    <div class="card">
        <div class="col-md-12">
            <div class="row">
                <div class="media p-20 col-md-12 cat">
                    <div class="media-body">
                       <div class="form-group">
                            <label class="col-form-label pt-0">Main-Menu Selection</label>
                            <select class="form-control mian_menu" name="main_menu_id">
                                <option value="">Select</option>
                                @foreach($menus as $menu)
                                <option @if($menu->id==$slider->main_menu_id)selected @endif value="{{$menu->id}}">{{$menu->title}}</option> @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('main_menu_id')}}</span>
                        </div>
                    </div>
                </div>
                <div class="media p-20 col-md-12 cat">
                    <div class="media-body">
                       <div class="form-group">
                            <label class="col-form-label pt-0">Sub-Menu Selection</label>
                            <select class="form-control sub_menu" name="sub_menu_id">
                                <option value="">Select Sub-Menu</option>
                                @if($slider->sub_menu_id !='')
                                    <option selected="" value="{{$slider->sub_menu_id}}">{{$subM->sub_menu_name($slider->sub_menu_id)->title}}</option>
                                @endif
                            </select>
                            <small class="pull-right text-info">Sub-Menu field is optional</small>
                            <span class="text-danger">{{ $errors->first('sub_menu_id')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-6 photo_area">
    <div class="card">
        <div class="media p-20">
            <div class="media-body">
               <div class="form-group">
                    <label class="col-form-label pt-0">Feature Photo [recommanded size: 1920,1080 px]</label>
                    <input type="file" name="photo" class="dropify" data-default-file="/{{$slider->photo}}" />
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
                    <label class="col-form-label pt-0">Slider Contents Details</label>
                    <textarea class="form-control" rows="10" name="description">{{old('description')??$slider->description}}</textarea>
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
                <input type="radio" name="status" id="status1" value="1" @if($slider->status=='1')checked @endif >
                <label for="status1" class="mb-0">Publish Now</label>
            </div> &nbsp; &nbsp;
            <div class="radio radio-primary">
                <input type="radio" name="status" id="status2" value="0" @if($slider->status=='0')checked @endif >
                <label for="status2" class="mb-0">Publish Later</label>
            </div>
            <span class="text-danger">{{ $errors->first('status')}}</span>
        </div>
    </div>
</div>


<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({height:250})

    $('.dropify').dropify({height:160});

    $('.mian_menu').on('change',function(){
        $.ajax({
           type: "get",url: "{{ url('/access/get-sub-menus') }}/" + $(this).val(),
           success: function(data) { $('.sub_menu').html(data);}
        });
    });

    $('[name=slider_type_id]').on('change',function(){
        // alert($(this).val());
        if( ( $(this).val()=='3' ) || ( $(this).val()=='2') ){
            $('.photo_area').slideUp();
            $(".cat_area").removeClass("col-md-6");
            $(".cat_area").addClass("col-md-12");
            $(".cat").addClass("col-md-6");
            $(".cat").removeClass("col-md-12");
           
        }else{
            $('.photo_area').slideDown();
            $(".cat_area").removeClass("col-md-12");
            $(".cat_area").addClass("col-md-6");
            $(".cat").addClass("col-md-12");
            $(".cat").removeClass("col-md-6");
        }

        if( $(this).val()=='2' ){
            $('.clientOrPartner').slideDown();
        }else{
            
            $('.clientOrPartner').slideUp();
        }
    });

    @if($slider->slider_type_id=='3' || $slider->slider_type_id=='2')
        $('.photo_area').slideUp();
        $(".cat_area").removeClass("col-md-6");
        $(".cat_area").addClass("col-md-12");
        $(".cat").addClass("col-md-6");
        $(".cat").removeClass("col-md-12"); 
    @endif

  })
</script>