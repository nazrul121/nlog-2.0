<p>Field demo <i class="fa fa-arrow-down"></i></p> 
<hr>
@if($type=='text' || $type=='email' || $type=='number' || $type=='password')
<div class="form-group row">
  <label class="col-lg-12 control-label text-lg-left" for="textinput">{{$type}} Input</label>  
  <div class="col-lg-12">
  	<input id="textinput" type="{{$type}}" placeholder="placeholder" class="form-control btn-square input-md">  
  </div>
</div>
@elseif($type=='radio')
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <label class="col-sm-3 col-form-label pb-0">Gender</label>
      <div class="col-sm-9">
        <div class="form-group m-t-10 m-checkbox-inline mb-0 custom-radio-ml">
          <div class="radio radio-primary">
              <input type="radio" name="radio1" id="radioinline19">
              <label for="radioinline19" class="mb-0"><span class="digits"> Male</span></label>
          </div> <div class="radio radio-primary">
              <input type="radio" name="radio1" id="radioinline29">
              <label for="radioinline29" class="mb-0"><span class="digits"> Female</span></label>
          </div> <div class="radio radio-primary">
              <input type="radio" name="radio1" id="radioinline39">
              <label for="radioinline39" class="mb-0"><span class="digits"> Other</span></label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@elseif($type=='checkbox')
<div class="form-group row mb-0">
    <label class="col-sm-3 col-form-label pb-0">Favorite color</label>
    <div class="col-sm-9">
        <div class="form-group m-checkbox-inline mb-0">
            <div class="checkbox checkbox-primary">
                <input id="inline-form-13" type="checkbox">
                <label for="inline-form-13" class="mb-0">Blue</label>
            </div><div class="checkbox checkbox-primary">
                <input id="inline-form-23" type="checkbox">
                <label for="inline-form-23" class="mb-0">White</label>
            </div><div class="checkbox checkbox-primary">
                <input id="inline-form-33" type="checkbox">
                <label for="inline-form-33" class="mb-0">Redish</label>
            </div>
        </div>
    </div>
</div>
@elseif($type=='textarea')
<div class="form-group row">
  <label class="col-lg-12 control-label text-lg-left" for="textinput">{{$type}} Input</label>  
  <div class="col-lg-12">
  	<textarea class="form-control btn-square" id="textarea">Address</textarea>
  </div>
</div>

@elseif($type=='select')
<div class="form-group row">
  <label class="col-lg-12 control-label text-lg-left" for="selectbasic">Select One</label>
  <div class="col-lg-12">
    <select id="selectbasic" class="form-control btn-square">
      <option value="1">Option one</option>
      <option value="2">Option two</option>
    </select>
  </div>
</div>
@else
	{{$type}}
@endif
