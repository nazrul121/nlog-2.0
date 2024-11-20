@if($forms->count()>0)     
    @foreach($forms as $form)     
    <h5 class="p3 text-center m3" style="margin:3em">{{$form->title}} </h5>
    <div class="row">
        <form action="/submit-form" method="post" class="contact-form" enctype="multipart/form-data"> @csrf
            <input type="hidden" name="form_id" value="{{$form->id}}">
            @foreach($formM->form_detail_info($form->id) as $row)
                @if($row->field_type=='text' || $row->field_type=='number' || $row->field_type=='email' || $row->field_type=='password')
                    <div class="col-md-{{$row->width}} col-sm-{{$row->width}} col-xs-12 mt-2">
                        <label>{{$row->label}}</label>
                        <input type="{{$row->field_type}}" name="{{$row->field_name}}" class="form-control" placeholder="{{$row->placeholder}}" @if($row->is_required=='1') required @endif> 
                        <span class="text-danger">{{ $errors->first($row->field_name)}}</span> 
                    </div>
                @endif
                
                @if($row->field_type=='file')
                    <div class="col-md-{{$row->width}} col-sm-{{$row->width}} col-xs-12 mt-2">
                        <label>{{$row->label}}</label>
                        <input type="{{$row->field_type}}" name="{{$row->field_name}}" class="form-control" placeholder="{{$row->placeholder}}" @if($row->is_required=='1') required @endif> 
                        <span class="text-danger">{{ $errors->first($row->field_name)}}</span> 
                    </div>
                @endif
                
                @if($row->field_type=='radio')   
                    <div class="col-md-{{$row->width}} col-sm-{{$row->width}} col-xs-12 mt-2">
                        <label>{{$row->label}} &nbsp; &nbsp; </label><br/>
                    @foreach(explode(',',$row->options) as $key=> $option)
                        <label class="radio-inline">
                        <input type="radio" value="{{explode(',',$row->option_values)[$key]}}" name="{{$row->field_name}}" @if($row->is_required=='1') required @endif> 
                        {{$option}}
                        </label>
                    @endforeach
                    <span class="text-danger">{{ $errors->first($row->field_name)}}</span> 
                </div>
                @endif  

                @if($row->field_type=='textarea')
                <div class="col-md-{{$row->width}} col-sm-{{$row->width}} col-xs-12 mt-2">
                    <label>{{$row->label}} &nbsp; &nbsp; </label>
                    <textarea name="{{$row->field_name}}" placeholder="{{$row->placeholder}}" rows="7" class="form-control" @if($row->is_required=='1') required @endif></textarea> 
                    <span class="text-danger">{{ $errors->first($row->field_name)}}</span> 
                </div>
                @endif

                @if($row->field_type=='checkbox')   
                   <!-- {{COUNT(explode(',',$row->options))}} -->
                   <div class="col-md-{{$row->width}} col-sm-{{$row->width}} col-xs-12 mt-2">
                    <label>{{$row->label}} &nbsp; &nbsp; </label>
                    @foreach(explode(',',$row->options) as $key=> $option)
                    <label class="checkbox-inline">
                        <input type="checkbox" name="{{ltrim($row->field_name)}}[]" @if($row->is_required=='1') required @endif value="{{ $row->option_values==null ? explode(',',$row->options)[$key] : explode(',',$row->option_values)[$key]}}"> {{$option}}
                    </label>
                    @endforeach 
                    <span class="text-danger">{{ $errors->first($row->field_name)}}</span> 
                    </div>
                @endif 
                

                @if($row->field_type=='select')
                    <div class="col-md-{{$row->width}} col-sm-{{$row->width}} col-xs-12 mt-2">
                        <select name="{{$row->field_name}}" class="form-control" @if($row->is_required=='1') required @endif>
                            @foreach(explode(',',$row->options) as $key=> $option)
                            <option value="{{explode(',',$row->option_values)[$key]}}">{{$option}}</option>
                            {{$option}}
                        @endforeach
                        </select> 
                        <span class="text-danger">{{ $errors->first($row->field_name)}}</span> 
                    </div>
                @endif
            @endforeach <br>
            <input type="hidden" name="table" value="{{$form->table_name}}">
            
            @if($formM->form_detail_info($form->id)->count() >0)
            <div class="col-md-12 col-sm-12 col-xs-12 mt-2">
                <input type="hidden" name="form_id" value="{{$form->id}}">
                <button type="submit" id="submit" class="add-btn contact-btn pull-right"> Submit Form</button>
                <div class="clearfix"></div>
            </div>
            @endif
        </form>
    </div>
    @endforeach
    @endif