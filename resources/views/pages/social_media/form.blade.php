<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label pt-0">Social media name</label>
        <input type="text" class="form-control" name="media_name" placeholder="Media Name" value="{{old('media_name')??$sociel_media->media_name}}">
        <small class="form-text text-danger">{{ $errors->first('media_name')}}</small>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="col-form-label pt-0">Media icon</label>
        <button data-toggle="modal" data-target="#mediaIcon" type="button" class="form-control" >
            <span class="setIcon {{$sociel_media->media_icon}}"> Choose Media Icon</span></button>
        <input type="hidden" name="media_icon" value="{{old('media_icon')??$sociel_media->media_icon}}">
        <small class="form-text text-danger">{{ $errors->first('media_icon')}}</small>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label class="col-form-label pt-0">Social media name</label>
        <input type="text" class="form-control" name="link" placeholder="page link" value="{{old('link')??$sociel_media->link}}">
        <small class="form-text text-danger">{{ $errors->first('link')}}</small>
    </div>
</div>

<!-- Modal to create !-->
<div class="modal fade" id="mediaIcon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Choose Media Icon & click</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-b-0">Brand Icons</h5>
                        </div>
                        <div class="card-body">
                            @include('pages.social_media.icons')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>