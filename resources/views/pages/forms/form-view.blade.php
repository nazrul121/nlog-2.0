@extends('layouts.dashboard')

@section('title',$form->table_title)
@section('content')

@inject('formM','App\Models\Form')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>{{$form->table_title}}</h3>
                <span>See created form. Have a look</span>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Home</i></a></li>
                    <li class="breadcrumb-item">Form </li>
                    <li class="breadcrumb-item active">Form View</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-612">
            
            <div class="sort_resutl">Sorting result</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-header"><h5>{{$form->table_title}}
                            <small class="pull-right"><a href="{{url('/access/website/edit-form-fields/'.$form->id)}}"><i class="fa fa-edit"></i> Edit form</a></small>
                            </h5> </div>
                            <div class="form theme-form">
                                <div class="card-body">
                                    
                                    <div id="sortable">
                                    @foreach($formM->form_detail_info($form->id) as $row)
                                  
                                        @if($row->field_type=='text' || $row->field_type=='number' || $row->field_type=='email' || $row->field_type=='password' || $row->field_type=='file')
                                        <div class="ui-state-default" id="{{$row->id}}"> 
                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label text-right"><i class="fa fa-arrows-alt"></i>  &nbsp; {{$row->label}}</label>
                                                <div class="col-sm-7">
                                                    <input type="{{$row->field_type}}" name="{{$row->field_name}}" class="form-control btn-pill" placeholder="{{$row->placeholder}}"  @if($row->is_required=='1') required @endif > 
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        
                                   

                                        @if($row->field_type=='radio') 
                                        <div class="ui-state-default" id="{{$row->id}}">  
                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label text-right"><i class="fa fa-arrows-alt"></i>  &nbsp;  {{$row->label}}</label>
                                                <div class="col-sm-7">
                                                    @foreach(explode(',',$row->options) as $key=> $option)
                                                    <label class="radio-inline">
                                                    <input type="radio" value="{{explode(',',$row->option_values)[$key]}}" name="{{$row->field_name}}" @if($row->is_required=='1') required @endif> 
                                                    {{$option}}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif  

                                        @if($row->field_type=='textarea')
                                        <div class="ui-state-default" id="{{$row->id}}">
                                         <div class="form-group row mt-3">
                                            <label class="col-sm-3 col-form-label text-right"><i class="fa fa-arrows-alt"></i> &nbsp;   {{$row->label}}</label>
                                            <div class="col-sm-7">
                                                <textarea name="{{$row->field_name}}" placeholder="{{$row->placeholder}}" rows="7" class="form-control btn-pill" @if($row->is_required=='1') required @endif></textarea> 
                                            </div>
                                         </div>
                                        </div>
                                        @endif

                                        @if($row->field_type=='checkbox')   
                                        <div class="ui-state-default" id="{{$row->id}}">  
                                          <div class="form-group row mt-3">
                                            <label class="col-sm-3 col-form-label text-right"><i class="fa fa-arrows-alt"></i>  &nbsp; {{$row->label}}</label>
                                            @foreach(explode(',',$row->options) as $key=> $option)
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="{{ltrim($row->field_name)}}[]" value="{{explode(',',$row->option_values)[$key]}}"> {{$option}}
                                            </label>
                                            @endforeach 
                                            </div>
                                        </div>
                                        @endif 

                                        @if($row->field_type=='select')
                                        <div class="ui-state-default" id="{{$row->id}}">
                                            <div class="form-group row mt-3">
                                                <label class="col-sm-3 col-form-label text-right"><i class="fa fa-arrows-alt"></i> &nbsp; {{$row->label}}</label>
                                                <div class="col-md-7">
                                                    <select name="{{$row->field_name}}" class="form-control btn-pill" @if($row->is_required=='1') required @endif>
                                                        @foreach(explode(',',$row->options) as $key=> $option)
                                                        <option value="{{explode(',',$row->option_values)[$key]}}">{{$option}}</option>
                                                        {{$option}}
                                                    @endforeach
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>


<style type="text/css">
    .ui-state-default{background: #f1eaff;margin: 10px 0px; padding: 1px;}
</style>

<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript">
    $(function(){
        $( "#sortable" ).sortable({
            update  : function(event, ui) {
                var page_id_array = new Array();
                $('.ui-state-default').each(function(){
                    page_id_array.push($(this).attr("id"));
                });
                // alert(page_id_array);
                $.ajax({ 
                    url:"/access/sort-fields", method:"get",data:{page_id_array:page_id_array},
                   success:function(data){ $('.sort_resutl').html(data);}
                });
            }
        })
    })
</script>
@endsection