<div class="media">
    <div class="media-body">
       <div class="form-group">
            <label class="col-form-label pt-0">Greeting Title</label>
            <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Title" value="{{old('title')??$greeting->title}}">
            <span class="text-danger">{{ $errors->first('title')}}</span>
        </div>
    </div>
</div>

<div class="media">
    <div class="media-body">
       <div class="form-group">
            <label class="col-form-label pt-0">Video Link</label>
            <input type="text" class="form-control" name="video_link" placeholder="video link" value="{{old('video_link')??$greeting->video_link}}">
            <span class="text-danger">{{ $errors->first('video_link')}}</span>
        </div>
    </div>
</div>


<div class="media">
    <div class="media-body">
       <div class="form-group">
            <label class="col-form-label pt-0">Feature Photo</label>
            <input type="file" name="photo" class="dropify" data-default-file="{{url('/'.$greeting->photo)}}" />
            <span class="text-danger">{{ $errors->first('photo')}}</span>
        </div>
    </div>
</div>

<div class="media">
    <div class="media-body">
       <div class="form-group">
            <label class="col-form-label pt-0">Descriptions</label>
            <textarea class="form-control" rows="4" name="description">{{old('description')??$greeting->description}}</textarea>
            <span class="text-danger">{{ $errors->first('description')}}</span> 
        </div>
    </div>
</div>

<div class="media">
    <div class="media-body">
       <div class="form-group">
            <label class="col-form-label pt-0">Backgound color</label>
            <input type="color" class="form-control" name="bg_color" aria-describedby="bg_color" placeholder="bg coloor" value="{{old('bg_color')??$greeting->bg_color}}">
            <span class="text-danger">{{ $errors->first('bg_color')}}</span>
        </div>
    </div>
</div>


<div class="form-group row m-0">
    <div class="form-group mb-0 m-checkbox-inline mb-0 custom-radio-ml">
        <label>Greetings Visibility </label> <br>
        <div class="radio radio-primary pull-right">
            <input type="radio" name="status" id="status1" value="1" @if($greeting->status=='1')checked @endif>
            <label for="status1" class="mb-0">Publish Now</label>
        </div>
        <div class="radio radio-primary pull-right">
            <input type="radio" name="status" id="status2" value="0" @if($greeting->status=='0')checked @endif>
            <label for="status2" class="mb-0">Publish Later</label>
        </div>
    </div>
    <span class="text-danger">{{ $errors->first('status')}}</span>
       
</div>
