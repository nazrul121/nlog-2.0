@extends('layouts.dashboard')

@section('title','Edit '.$form->table_title)
@section('content')

@inject('formM','App\Models\Form')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Form Visualization</h3>
                <span>See created form. Have a look</span>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"> Dashboard</i></a></li>
                    <li class="breadcrumb-item">Form edit</li>
                    <li class="breadcrumb-item active">{{$form->table_title}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-612">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card">
                            <div class="card-header"><h5>{{$form->table_title}} 
                                <small class="pull-right"><a href="{{url('/access/website/show-form/'.$form->id)}}">Sort fields</a></small></h5> </div>
                            <form class="form theme-form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            @foreach($formM->form_detail_info($form->id) as $row)
                                      
                                            @if($row->field_type=='text' || $row->field_type=='number' || $row->field_type=='email' || $row->field_type=='password' || $row->field_type=='file')
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">{{$row->label}}</label>
                                                    <div class="col-sm-7">
                                                        <input type="{{$row->field_type}}" name="{{$row->field_name}}" class="form-control" placeholder="{{$row->placeholder}}"  @if($row->is_required=='1') required @endif> 
                                                    </div>
                                                    <div class="col-sm-2 text-right">
                                                        <a class="edit" data-id="{{$row->id}}" data-toggle="modal" data-target="#editField"><i class="fa fa-edit"></i> edit</a> &nbsp; 
                                                    
                                                        <a onClick="return deleteField();" href="/access/delete-form-field/{{$row->id}}"><i class="fa fa-trash text-danger"></i> remove</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($row->field_type=='radio')   
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">{{$row->label}}</label>
                                                    <div class="col-sm-7">
                                                        @foreach(explode(',',$row->options) as $key=> $option)
                                                        <label class="radio-inline">
                                                        <input type="radio" value="{{explode(',',$row->option_values)[$key]}}" name="{{$row->field_name}}" @if($row->is_required=='1') required @endif> 
                                                        {{$option}}
                                                        </label>
                                                        @endforeach
                                                    </div>

                                                    <div class="col-sm-2 text-right">
                                                        <a class="edit" data-id="{{$row->id}}" data-toggle="modal" data-target="#editField"><i class="fa fa-edit"></i> edit</a> &nbsp; 
                                                    
                                                        <a onClick="return deleteField();" href="{{url('/access/delete-form-field/'.$row->id)}}"><i class="fa fa-trash text-danger"></i> remove</a>
                                                    </div>
                                                </div>
                                            @endif  

                                            @if($row->field_type=='textarea')
                                             <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{$row->label}}</label>
                                                <div class="col-sm-7">
                                                    <textarea name="{{$row->field_name}}" placeholder="{{$row->placeholder}}" class="form-control" @if($row->is_required=='1') required @endif></textarea> 
                                                </div>

                                                <div class="col-sm-2 text-right">
                                                    <a class="edit" data-id="{{$row->id}}" data-toggle="modal" data-target="#editField"><i class="fa fa-edit"></i> edit</a> &nbsp; 

                                                    <a href="{{url('/access/delete-form-field/'.$row->id)}}"onClick="return deleteField();" ><i class="fa fa-trash text-danger"></i> remove</a>
                                                </div>
                                            </div>
                                            @endif

                                            @if($row->field_type=='checkbox')   
                                              <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{$row->label}}</label>
                                                <div class="col-sm-7">
                                                    @foreach(explode(',',$row->options) as $key=> $option)
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="{{ltrim($row->field_name)}}[]" value="{{explode(',',$row->option_values)[$key]}}"> {{$option}}
                                                    </label>
                                                    @endforeach 
                                                </div>
                                                <div class="col-sm-2 text-right">
                                                    <a class="edit" data-id="{{$row->id}}" data-toggle="modal" data-target="#editField"><i class="fa fa-edit"></i> edit</a> &nbsp; 

                                                    <a onClick="return deleteField();" href="{{url('/access/delete-form-field/'.$row->id)}}"><i class="fa fa-trash text-danger"></i> remove</a>
                                                </div>
                                               </div>
                                            @endif 

                                            @if($row->field_type=='select')
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">{{$row->label}}</label>
                                                    <div class="col-sm-7">
                                                        <select name="{{$row->field_name}}" class="form-control" @if($row->is_required=='1') required @endif>
                                                            @foreach(explode(',',$row->options) as $key=> $option)
                                                            <option value="{{explode(',',$row->option_values)[$key]}}">{{$option}}</option>
                                                            {{$option}}
                                                        @endforeach
                                                        </select> 
                                                    </div>
                                                    <div class="col-sm-2 text-right">
                                                        <a class="edit" data-id="{{$row->id}}" data-toggle="modal" data-target="#editField"><i class="fa fa-edit"></i> edit</a> &nbsp; 

                                                        <a onClick="return deleteField();" href="{{url('/access/delete-form-field/'.$row->id)}}"><i class="fa fa-trash text-danger"></i> remove</a>                                                       
                                                    </div>
                                                </div>
                                            @endif

                                            
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>

<!-- Modal to edit single field item -->
<div class="modal fade" id="editField" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close theme-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="card">
                    <form class="theme-form" method="post"> @csrf
                    <div class="card-header"> <h5>Edit form filed</h5> </div>
                    <div class="card-body form-field-result">
                        <div class="loader text-center"><div class="line bg-primary"></div><div class="line bg-primary"></div><div class="line bg-primary"></div><div class="line bg-primary"></div></div>
                    </div>
                    <div class="card-footer mb-3">
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Edit Field info</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script>
  function deleteField(){
    return confirm('Are you sure to remove the field permametly?? --- It will also remove all relavent data!!');
  }
  $(function () {
    $('.edit').on('click',function(){
        // alert( $(this).data('id') )
        $('.theme-form').attr('action','/access/website/update-form-fields/'+$(this).data('id'))
        $.ajax({
            type: "get",url: '/access/get-form-detail-item/' + $(this).data('id'),
            success: function(data){
                $('.form-field-result').html(data);
            }
        });
    });
  })

</script>
@endsection