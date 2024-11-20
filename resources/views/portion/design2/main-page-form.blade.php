@if($forms->count()>0)     
    @foreach($forms as $form) 
    <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="section-title text-center">
                            <h3>{{$form->title}}</h3> <div class="spacer-30"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="custom-form">
                            <form action="/submit-form" method="post" class="row contact-form"> @csrf
                                @foreach($formM->form_detail_info($form->id) as $row)
                                    @if($row->field_type=='text' || $row->field_type=='number' || $row->field_type=='email' || $row->field_type=='password')
                                        <div class="col-md-{{$row->width}}">
                                            <div class="form-group app-label">
                                                <label>{{$row->label}}</label>
                                                <input type="{{$row->field_type}}" name="{{$row->field_name}}" class="form-control" placeholder="{{$row->placeholder}}" @if($row->is_required=='1') required @endif> 
                                                <span class="text-danger">{{ $errors->first($row->field_name)}}</span> 
                                            </div>
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
                                    <div class="col-md-{{$row->width}} col-sm-{{$row->width}}">
                                        <div class="form-group app-label">
                                        <label>{{$row->label}} &nbsp; &nbsp; </label>
                                        <textarea name="{{$row->field_name}}" placeholder="{{$row->placeholder}}" rows="7" class="form-control" @if($row->is_required=='1') required @endif></textarea> 
                                        <span class="text-danger">{{ $errors->first($row->field_name)}}</span> </div>
                                    </div>
                                    @endif

                                    @if($row->field_type=='checkbox')   
                                       <!-- {{COUNT(explode(',',$row->options))}} -->
                                       <div class="col-md-{{$row->width}} col-sm-{{$row->width}}">
                                        <label>{{$row->label}} &nbsp; &nbsp; </label>
                                        @foreach(explode(',',$row->options) as $key=> $option)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="{{ltrim($row->field_name)}}[]" value="{{explode(',',$row->option_values)[$key]}}"> {{$option}}
                                        </label>
                                        @endforeach 
                                        <span class="text-danger">{{ $errors->first($row->field_name)}}</span> 
                                        </div>
                                    @endif 

                                    @if($row->field_type=='select')
                                        <div class="col-md-{{$row->width}} col-sm-{{$row->width}}">
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
                                
                                <div class="col-sm-12 text-right">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom" value="Send Message">
                                    
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="map video-app-box mt-30">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6030.418742494061!2d-111.34563870463673!3d26.01036670629853!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1471908546569" style="border: 0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endforeach
@endif
